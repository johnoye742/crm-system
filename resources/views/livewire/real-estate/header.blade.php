<div>
    <div
        class="lg:flex flex-col
            h-[100vh] overflow-hidden
            w-[25%] gap-8
            fixed item-center
            lg:px-10 px-3
            py-5 bg-[#153448]
            shadow-md text-white
            hidden"
    >
        <div>
            <h1
                class=" font-mono lato-black text-2xl">
                    <a href="{{ route('homepage') }}">CRMStar</a>
            </h1>
        </div>

        <ul class="lg:flex flex-col w-full gap-2 hidden text-xl">

            @auth
                <li class="w-full">
                    <a href={{ route('dashboard') }}
                        class="py-3 px-3 w-[100vw] @if($page == 'dashboard') bg-slate-500 @endif hover:bg-slate-500 flex flex-row gap-2 items-center rounded-full" wire:navigate>
                        <i class="fi fi-rr-house-chimney mb-[-3px]"></i> <span>Home</span>
                    </a>
                </li>
                @if (strtolower(auth() -> user() -> role) == 'admin')
                    <li><a href={{ route('employees') }}
                        class="py-3 px-3 w-[100vw] @if($page == 'employees') bg-slate-500 @endif hover:bg-slate-500 flex flex-row items-center gap-2 rounded-full" wire:navigate>
                        <i class="fi fi-rr-users-alt mb-[-3px]"></i> <span>Employees</span>
                    </a></li>
                @endif
                <li
                    class="absolute bottom-20 border-t-2 border-slate-500">
                    <button
                        wire:click="logout"
                        class="p-3 text-red-400 flex flex-row gap-2 items-center"
                    >
                        <i class="fi fi-rr-sign-out-alt"></i> <span>Logout</span>
                    </button>
                </li>
            @endauth
        </ul>


        @assets
            <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        @endassets
    </div>
    <div class="flex flex-col
            h-[100dvh] overflow-hidden
            w-[15%] gap-8
            fixed item-center
            lg:px-10 px-3
            py-5 bg-[#153448]
            shadow-md text-white
            lg:hidden"
>

        <ul class="flex flex-col w-full gap-2 justify-between text-xl">

            @auth
                <div>
                    <li class="w-full">
                        <a href={{ route('dashboard') }}
                            class="py-3 px-3 w-[100vw] @if($page == 'dashboard') bg-slate-500 @endif hover:bg-slate-500 flex flex-row gap-2 items-center rounded-full" wire:navigate>
                            <i class="fi fi-rr-house-chimney mb-[-3px]"></i></span>
                        </a>
                    </li>
                    @if (strtolower(auth() -> user() -> role) == 'admin')
                        <li><a href={{ route('employees') }}
                            class="py-3 px-3 w-[100vw] @if($page == 'employees') bg-slate-500 @endif hover:bg-slate-500 flex flex-row items-center gap-2 rounded-full" wire:navigate>
                            <i class="fi fi-rr-users-alt mb-[-3px]"></i>
                        </a></li>
                    @endif
                </div>
                <li
                    class=" border-t-2 border-slate-500">
                    <button
                        wire:click="logout"
                        class="p-3 text-red-400 flex flex-row gap-2 items-center"
                    >
                        <i class="fi fi-rr-sign-out-alt"></i>
                    </button>
                </li>
            @endauth
        </ul>
    </div>
</div>
