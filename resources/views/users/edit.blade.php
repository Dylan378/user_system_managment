@extends('layout')

@section('content')
   
    <div class="w-full flex justify-center">
        <div class="m-4 w-1/2 bg-white p-8 rounded-md">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Update User Information') }}
                </h2>
    
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update the user's information, including name, email, country, and occupation.") }}
                </p>
            </header>
    
            <form method="post" action="{{ route('users.update', $user->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('put')
    
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
    
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
    
                <div>
                    <x-input-label for="country" :value="__('Country')" />
                    <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $user->country)" autocomplete="country" />
                    <x-input-error class="mt-2" :messages="$errors->get('country')" />
                </div>
    
                <div>
                    <x-input-label for="occupation" :value="__('Occupation')" />
                    <x-text-input id="occupation" name="occupation" type="text" class="mt-1 block w-full" :value="old('occupation', $user->occupation)" autocomplete="occupation" />
                    <x-input-error class="mt-2" :messages="$errors->get('occupation')" />
                </div>
    
                <div class="flex items-center gap-4">
                    <x-button>{{ __('Save') }}</x-button>
    
                    @if (session('status') === 'user-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
       </div>
    </div>

@endsection
