<div>
    <div class="lg:px-12 px-5 py-14">
        <h1 class="text-2xl pl-2 text-black">Add New Patient</h1>
        <form class="flex flex-col gap-4 mt-5" wire:submit="add">
            @error('pname')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" wire:model="pname" placeholder="Patient Name" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-[50%]">

            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" wire:model="email" placeholder="Patient Email" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-[50%]">


            @error('password')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" wire:model="password" placeholder="Patient Password" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-[50%]">

            @error('phone')
                <p>{{ $message }}</p>
            @enderror

            <input type="tel" placeholder="Patient Phone" wire:model="phone"  class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
            @error('state')
                <p>{{ $message }}</p>
            @enderror

            <input type="tel" placeholder="Patient State Of Origin" wire:model="state"  class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
            @error('occupation')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Patient Occupation" wire:model="occupation"  class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">

            @error('emergency_contact')
                <p>{{ $message }}</p>
            @enderror
            <input type="tel" placeholder="Patient Emergency Contact" wire:model="emergency_contact"  class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">


            @error('address')
                <p>{{ $message }}</p>
            @enderror
            <input wire:model="address" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]" placeholder="Patient Address">



            @error('dob')
                <p>{{ $message }}</p>
            @enderror
            <div>
                <label for="dob">Date Of Birth: </label>
                <input type="date" wire:model="dob" placeholder="Patient's Date Of Birth" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
            </div>

            @error('gender')
                <p>{{ $message }}</p>
            @enderror
            <div class="flex flex-row gap-2">
                <span>Gender: </span>
                <select wire:model="gender" id="">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>


            <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">+ Add</button>
        </form>
    </div>
</div>
