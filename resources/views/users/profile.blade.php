<div class="relative inline-flex content-center">

    <a href="{{ route('profile.show') }}" class="flex">

        <div class="flex items-center hover:underline">
            <p>
                {{ auth()->user()->name }}
            </p>

            <i class="pl-2 fa-solid fa-user fa-xl"></i>
        </div>
    
    </a>
</div>