<div class="py-12 px-10">
    <h1 class="text-2xl">Edit Employee Info</h1>

    <form wire:submit="save" class="flex flex-col gap-3 mt-3">
        <input type="email" wire:model="email" placeholder="Email" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">            
        <input type="text" wire:model="fname" placeholder="Full Name" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">


        <input type="password" wire:model="pwd" placeholder="Password" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">

        <div class="w-full flex flex-row items-center gap-2">
            <label for="role">Role: </label>
            <select id="role" class="p-3 py-2 rounded-full" wire:model="role">
                <option>-- Select a role --</option>
                @if(auth() -> user() -> niche == 'real-estate')
                    <option value="real-estate-agent" @if ($role == 'real-estate-agent')
                        selected
                    @endif>Agent</option>
                    <option value="real-estate-sales" @if ($role == 'real-estate-sales')
                        selected
                    @endif>Sales</option>
                    
                @endif

                @if (auth() -> user() -> niche == 'health-care')
                    <option value="health-care-doctor">Doctor</option>
                    <option value="health-care-nurse">Nurse</option>
                    <option value="health-care-receptionist">Receptionist</option>
                @endif
            </select>                                                       
                               
        </div>  
        <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Update Employee</button>
    </form>
</div>
