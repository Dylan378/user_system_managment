<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'users' => User::get(),
        ]);
    }

    public function dashboard(): View
    {
        return view('dashboard', [
            'users' => User::get(),
        ]);
    }
}
