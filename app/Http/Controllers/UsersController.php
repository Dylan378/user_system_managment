<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UsersStoreRequest;
use App\Models\User;
use App\Traits\GeneratesPhotoHashes;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    use GeneratesPhotoHashes;

    public function create(): View
    {
        return view('users.create');
    }

    public function store(UsersStoreRequest $request)
    {
        $path = config('images.storage_path');

        $user = User::create($request->validated());

        if ($request->user_photo) {
            $user->photo_hash = $this->generatePhotoHash();
            $user->save();

            Image::make($request->user_photo)
                ->orientate()
                ->fit(config('images.user_photos.width'), config('images.user_photos.height'))
                ->save("{$path}/user_photos/{$user->photo_filename}");
        }

        $user->save();

        return redirect()->route('dashboard');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return redirect()->route('dashboard');
    }
    
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('dashboard');
    }
}
