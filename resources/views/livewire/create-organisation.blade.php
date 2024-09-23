<div class="lg:px-12 px-5 lg:w-[70%]">
    <form class="flex flex-col gap-4" wire:submit="create">

        <input type="text" wire:model="name" placeholder="Organisation Name" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">
        <div class="w-full flex flex-row items-center gap-2">
            <label for="niche">Business Type: </label>
            <select id="niche" class="p-3 py-2 rounded-full" wire:model="niche">
                <option>-- Select a niche --</option>
                <option value="real-estate">Real Estate</option>
                <option value="health-care">Health Care</option>
            </select>

        </div>

        <button type="submit" class="px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Create</button>
</form>

</div>
