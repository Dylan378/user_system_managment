@props(['user'])

    <div class="mt-4">
        {{ $image }}
    </div>

    <div class="w-fit p-4">
        
        {{ $text }}

        @isset($footer)                    
            <div class="mt-4 text-gray-500">
                {{ $footer }}
            </div>
        @endisset

    </div>

