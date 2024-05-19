<div class="w-full flex flex-row item-center justify-between lg:px-10 px-3 py-5 bg-[#153448] shadow-md text-white">
    <div>
        <h1 class=" font-mono"><a href="{{ route('homepage') }}">CRMStar</a></h1>
    </div>

    <ul class="lg:flex flex-row gap-2 hidden">
        
        @auth
            <li><a href={{ route('dashboard') }} wire:navigate>Dashboard</a></li>
            @if (strtolower(auth() -> user() -> role) == 'admin')
                <li><a href={{ route('employees') }} wire:navigate>Employees</a></li>
            @endif
            <li><button wire:click="logout">Logout</button></li>    
        @endauth
    </ul>

    <div class="{{ $showNav ? 'block' : 'hidden' }} fixed top-0 w-full left-0 bg-[#00000060] z-[1000]"> 
        <div class="flex py-5 px-8 flex-row justify-between h-[100dvh] bg-[#153448] left-0 z-[1000] w-full">
            <div class="flex flex-col gap-5">
                <h1 class="font-mono">CrmStar</h1>
                <ul class="gap-3">
                    @auth
                        <li><a href={{ route('dashboard') }} wire:navigate>Dashboard</a></li>
                        @if (strtolower(auth() -> user() -> role) == 'admin')
                            <li><a href={{ route('employees') }} wire:navigate>Employees</a></li>
                        @endif
                        <li><button wire:click="logout">Logout</button></li>    
                    @endauth
                </ul>
            </div>

            <i wire:click="show">X</i>
        </div>  
    </div>
    <i wire:click="show">O</i>
</div>
