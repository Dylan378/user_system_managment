<div class="flex w-screen px-6 space-x-6 items-center">
    
    <ul class="flex justify-between w-full font-semibold items-center">
        <li class="flex flex-col font-bold text-2xl">
            <a href="{{ route('home') }}" class="text-xl hover">
                <i class="fa-solid fa-house fa-xl"></i>
            </a>
        </li>

        <li class="space-x-6 flex items-center">

            @auth
                <a class="hover:underline" href="{{ route('users.create') }}">
                    Add user
                    <i class="fa-solid fa-circle-plus fa-xl"></i>
                </a>
            @endauth

            <a href="{{ route('dashboard') }}" class="flex hover:underline">
                <div class="flex items-center hover:underline">
                    <p>
                        Dashboard
                    </p>
                        
                    <i class="pl-2 fa-solid fa-table-columns fa-xl"></i>
                </div>
            </a>
                        
            @guest
                <a href="{{ route('login') }}" class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Log in</a>
                <a href="{{ route('register') }}" class="inline-block px-4 py-2 text-sm font-medium leading-5 text-blue-600 transition-colors duration-150 bg-transparent border border-blue-600 rounded-lg hover:text-white hover:bg-blue-600 focus:outline-none focus:text-white focus:bg-blue-600">Sign in</a>
            @endguest
            
            @auth
                @include('users.profile')
                
                @include('partials.log-out')
            @endauth
        </li>

    </ul>

</div>