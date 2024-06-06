<div>
    <div class="lg:px-12 px-5 py-14">
        <h1 class="text-2xl pl-2 text-black">Add New Record</h1>
        <form class="flex flex-col gap-4 mt-5" wire:submit="add">
            @error('visit_date')
                <p>{{ $message }}</p>
            @enderror
            <div>
                <label for="dob">Visit Date: </label>
                <input type="date" wire:model="visit_date"  class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
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
