@extends('layout')

@section('content')

    <div class="w-full flex justify-center mb-4">
        <div>

            <div class="w-fit bg-white shadow-lg rounded-lg overflow-hidden mt-8">
                <x-card :$user>
                    
                    <x-slot:image>
                        <div class="relative">
                            <a href="{{ route('users.edit', ['user' => $user]) }}" class="absolute top-0 right-0 font-bold px-4 rounded">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="absolute top-0 left-0 font-bold px-4 rounded">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        
                            <img class="h-60 object-cover object-center px-8 py-2" src="{{ userPhotoPath($user->photo_filename) }}" alt="">
                        </div>                    
                    </x-slot:image>
                    
                    <x-slot:text>
                        <h2 class="text-gray-900 font-bold text-xl mb-2 h-10">{{ $user->name }}</h2>
                        <p class="text-gray-700 text-base h-10">{{ $user->email }}</p>
                    </x-slot:text>
                    
                    <x-slot:footer>
                        <p class="">Country: {{ $user->country }}</p>
                        <p class="">Occupation: {{ $user->occupation }}</p>
                        <p class="">
                            Birth date: {{ $user->birth_date }}
                        </p> 
                    </x-slot:footer>
                </x-card>
                
                {{-- <x-comments :$user></x-comments> --}}
            </div>
        </div>
    </div>
        
@endsection