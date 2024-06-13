@extends('layout')

@section('content')

<h1 class="text-4xl text-center text-gray-800 font-extrabold py-5">Dashboard</h1>

<div class="container mx-auto flex p-4 justify-center">
    <div class="bg-white shadow-md rounded justify-center my-6 w-fit">
        <table class="table-auto w-fit">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Photo</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Birth date</th>
                    <th class="py-3 px-6 text-left">Country</th>
                    <th class="py-3 px-6 text-left">Occupation</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center whitespace-nowrap">
                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ userPhotoPath($user->photo_filename) }}" alt="">
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <a href="{{ route('users.show', ['user' => $user]) }}" class="hover:underline font-medium">{{ $user->name }}</a>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span>{{ $user->email }}</span>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span class="rounded-md ">{{ $user->birth_date }}</span>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span class="rounded-md ">{{ $user->country }}</span>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span class="rounded-md ">{{ $user->occupation }}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="{{ route('users.edit', ['user' => $user]) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <div>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </div>
                                </a>
                                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
