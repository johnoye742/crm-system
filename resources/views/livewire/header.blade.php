<div class="w-full flex flex-row justify-between lg:px-10 px-3 py-5 bg-[#153448] shadow-md text-white">
    <div>
        <h1 class=" font-mono"><a href="{{ route('homepage') }}">CRMStar</a></h1>
    </div>

    <ul class="flex flex-row gap-2">
        
        @auth
            <li><a href={{ route('dashboard') }} wire:navigate>Dashboard</a></li>
            @if (strtolower(auth() -> user() -> role) == 'admin')
                <li><a href="#employees">Employees</a></li>
            @endif
            <li><button wire:click="logout">Logout</button></li>    
        @endauth
    </ul>
</div>
