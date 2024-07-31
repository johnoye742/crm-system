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

                <li class="w-full">
                    <a href={{ route('real-estate.properties') }}
                        class="py-3 px-3 w-[100vw] @if($page == 'properties') bg-slate-500 @endif hover:bg-slate-500 flex flex-row gap-2 items-center rounded-full" wire:navigate>
                         <i class="fi fi-rr-apartment mb-[-3px]"></i><span>Properties</span>
                    </a>
                </li>


                <li class="w-full">
                    <a href={{ route('dashboard') }}
                        class="py-3 px-3 w-[100vw] @if($page == 'sales') bg-slate-500 @endif hover:bg-slate-500 flex flex-row gap-2 items-center rounded-full" wire:navigate>
                        <i class="fi fi-rr-basket-shopping-simple mb-[-3px]"></i> <span>Sales</span>
                    </a>
                </li>


                <li class="w-full">
                    <a href={{ route('dashboard') }}
                        class="py-3 px-3 w-[100vw] @if($page == 'clients') bg-slate-500 @endif hover:bg-slate-500 flex flex-row gap-2 items-center rounded-full" wire:navigate>
                        <i class="fi fi-rr-hr-group mb-[-3px]"></i> <span>Clients</span>
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
</div>

    <div class="flex flex-row
            w-full overflow-hidden
            gap-8
            fixed bottom-0 item-center
            lg:px-10 px-3
            py-3 bg-[#153448]
            shadow-md text-white
            lg:hidden"
>

        <ul class="flex flex-row w-full gap-2 items-center justify-between text-xl">


            @auth
                    <li class="w-fit">
                        <a href={{ route('dashboard') }}
                            class="py-2 px-3 w-fit @if($page == 'dashboard') bg-slate-500 @endif hover:bg-slate-500 flex flex-row gap-2 items-center rounded-full" wire:navigate>
                            <i class="fi fi-rr-house-chimney mb-[-3px]"></i></span>
                        </a>
                    </li>
                    @if (strtolower(auth() -> user() -> role) == 'admin')
                        <li class"w-fit"><a href={{ route('employees') }}
                            class="py-3 px-3 w-fit @if($page == 'employees') bg-slate-500 @endif hover:bg-slate-500 flex flex-row items-center gap-2 rounded-full" wire:navigate>
                            <i class="fi fi-rr-users-alt mb-[-3px]"></i>
                        </a></li>
                    @endif

                <li
                    class="">
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
