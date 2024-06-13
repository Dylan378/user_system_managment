@extends('layout')

@section('content')

<div class="max-w-xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h2 class="text-xl font-semibold mb-4">Create user</h2>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <x-label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</x-label>
            <x-input id="name" name="name" type="text" placeholder="Taylor Otwell" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') @enderror" />
        </div>

        <div class="mb-4">
            <x-label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</x-label>
            <x-input id="email" name="email" placeholder="test@example.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></x-input>
        </div>

        <div class="mb-4">
            <x-label for="occupation" class="block text-gray-700 text-sm font-bold mb-2">Occupation</x-label>
            <x-input id="occupation" name="occupation" placeholder="Musician" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></x-input>
        </div>

        <div class="mb-4">
            <x-label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country</x-label>
            <x-input id="country" name="country" placeholder="Country" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></x-input>
        </div>

        <div class="mb-4">
            <x-label for="birth_date" class="block text-gray-700 text-sm font-bold mb-2">Birth date</x-label>
            <x-input type="date" id="birth_date" name="birth_date" placeholder="11/02/1973" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></x-input>
        </div>

        <div class="mb-4">
            <x-label for="password" class="block text-gray-700 text-sm font-bold mb-2">Access password for this user</x-label>
            <x-input id="password" name="password" placeholder="*********" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></x-input>
        </div>

        {{-- <div class="mb-4">
            <x-label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</x-label>
            <select id="category_id" name="category_id" class="focus:border-0 focus:ring-gray-300 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('category_id') @enderror">
                
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div> --}}
        
        <div class="mb-4">
            <x-label for="user_photo" class="block text-gray-700 text-sm font-bold mb-2">photo</x-label>
            <x-input id="user_photo" name="user_photo" type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="flex items-center justify-end">
            <x-button>Create User</x-button>
        </div>
    </form>
</div>

@endsection
