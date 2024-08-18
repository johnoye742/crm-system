<div class=" py-12 px-8">
    <h1 class="text-2xl">Add Employee</h1>
    <form wire:submit="add" class="flex flex-col gap-3 mt-5">
        <input type="email" wire:model="email" placeholder="Email" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">
        <input type="text" wire:model="fname" placeholder="Full Name" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">

                <div class="w-full flex flex-row gap-2 items-center">
                    <label for="dob" class="">Date Of Birth:</label>
                    <input type="date" id="dob" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-fit" name="dob" wire:model="dob">
                </div>

                <div class="w-full flex flex-row items-center gap-2">
                    <label for="gender">Gender: </label>
                    <select id="gender" class="p-3 py-2 rounded-full" wire:model="gender">
                        <option>-- Select a gender --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="custom">Custom</option>
                    </select>

                </div>

        <input type="password" wire:model="pwd" placeholder="Password" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">

        <div class="w-full flex flex-row items-center gap-2">
            <label for="role">Role: </label>
            <select id="role" class="p-3 py-2 rounded-full" wire:model="role">
                <option>-- Select a role --</option>
                @if(auth() -> user() -> niche == 'real-estate')
                    <option value="real-estate-agent">Agent</option>
                    <option value="real-estate-sales">Sales</option>

                @endif

                @if (auth() -> user() -> niche == 'health-care')
                    <option value="health-care-doctor">Doctor</option>
                    <option value="health-care-nurse">Nurse</option>
                    <option value="health-care-receptionist">Receptionist</option>
                @endif
            </select>

        </div>
        <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Add Employee</button>
    </form>
</div>
