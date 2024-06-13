<div class="relative inline-block text-left">
    <form class="p-4 text-center" method="POST" action="{{ route('logout') }}">
        @csrf

        <button>Log out</button>
    </form>
</div>
