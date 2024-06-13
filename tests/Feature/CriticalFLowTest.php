<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class CriticalFLowTest extends TestCase
{
    protected User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'occupation' => 'Student',
        ]);
    }

    public function test_landing_page(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSeeText('Users');
    }

    public function test_dashboard(): void
    {
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText('Dashboard');
    }

    public function test_users_are_shown_in_landing_page(): void
    {
        $this->user;

        $this->get(route('home'))
            ->assertOk()
            ->assertSeeText('View details');

        $this->assertDatabaseHas('users', [
            'name' => $this->user->name,
        ]);
    }

    public function test_unauthenticated_user_cannot_see_user_details(): void
    {
        $response = $this
            ->from(route('home'))
            ->get(route('users.show', ['user' => $this->user]));

        $response
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_see_user_details(): void
    {
        
        $this
            ->actingAs($this->user)
            ->from(route('home'))
            ->get(route('users.show', ['user' => $this->user]))
            ->assertSee($this->user->name);
    }

    public function test_user_show_can_be_accesed_from_dashboard(): void
    {
        
        $this
            ->actingAs($this->user)
            ->from(route('dashboard'))
            ->get(route('users.show', ['user' => $this->user]))
            ->assertSee($this->user->name);
    }

    public function test_unauthenticated_user_cannot_edit_user(): void
    {
        $this
            ->from(route('dashboard'))
            ->get(route('users.edit', ['user' => $this->user]))
            ->assertRedirectToRoute('login');
    }

    public function test_authenticated_user_can_access_edit_view(): void
    {
        $this
            ->actingAs($this->user)
            ->from(route('dashboard'))
            ->get(route('users.edit', ['user' => $this->user]))
            ->assertOk()
            ->assertSeeText('Update User Information');
    }

    public function test_authenticated_user_can_update_user(): void
    {
        $this
            ->actingAs($this->user)
            ->put(route('users.update', $this->user), [
                'name' => 'Dylan Celis',
                'email' => 'dylancelis05@gmail.com'
            ])
            ->assertSessionDoesntHaveErrors();

        $this->assertDatabaseHas('users', [
            'name' => 'Dylan Celis',
        ]);
    }

    public function test_unauthenticated_user_cannot_delete_users(): void
    {
        $this
            ->from(route('dashboard'))
            ->get(route('users.destroy', ['user' => $this->user]))
            ->assertRedirectToRoute('login');
    }

    public function test_authenticated_can_delete_users(): void
    {
        $this
            ->from(route('dashboard'))
            ->actingAs($this->user)
            ->delete(route('users.destroy', $this->user));

            $this->refreshDatabase();

            $this->assertDatabaseMissing('users', [
                'id' => $this->user->id,
            ]);
    }

    public function test_unauthenticated_user_cannot_create_user(): void
    {
        $this
            ->from(route('home'))
            ->get(route('users.create'))
            ->assertRedirectToRoute('login');
    }

    public function test_authenticated_user_can_create_user(): void
    {
        $this
            ->actingAs($this->user)
            ->from(route('users.create'))
            ->post(route('users.store'), [
                'name' => 'Dylan Celis',
                'email' => 'dylancelis05@gmail.com',
                'occupation' => 'Software developer',
                'country' => 'Mexico',
                'birth_date' => now()->subYears(23),
                'password' => 'password',
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Dylan Celis',
            'occupation' => 'Software developer'
        ]);
    }
}
