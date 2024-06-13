@extends('layout')

@section('content')

    <h1 class="text-4xl text-center text-gray-800 font-extrabold py-5">Users</h1>
    <div class="text-center text-gray-600 mb-3">
        {{ count($users) }} Users
    </div>
    <div class="w-full flex flex-wrap justify-center space-x-6">
        @foreach ($users as $user)
            @include('users.index')
        @endforeach
    </div>

@endsection