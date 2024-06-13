<div class="w-80 bg-white shadow-lg rounded-lg overflow-hidden mt-8">
    <x-card :$user>
        <x-slot:image>
            <div class="justify-center flex">
                <img class="h-56 object-cover object-center" src="{{ userPhotoPath($user->photo_filename) }}" alt="">
            </div>
        </x-slot:image>
        
        <x-slot:text>
            <h2 class="text-gray-900 font-bold text-xl h-12">{{ $user->name }}</h2>
            <h2 class="text-gray-900 h-12">{{ $user->email }}</h2>
        </x-slot:text>

        <x-slot:footer>
            <div class="flex justify-between">
                <a href="{{ route('users.show', ['user' => $user]) }}" class="rounded-md p-2 bg-blue-500 w-fit text-sm hover:underline text-gray-800 font-bold">View details</a>
            </div>
        </x-slot:footer>
    </x-card>
</div>