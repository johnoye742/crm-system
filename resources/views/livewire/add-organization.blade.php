<div class="lg:px-12 px-5 lg:py-14 w-full">
    <h1>Add New Organization</h1>

    <form class="w-full flex flex-col gap-5">
        <input type="text" wire:model="name" placeholder="Organization Name" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-1/2">
        <select type="text" wire:model="niche" placeholder="Organization Category" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-1/2">
            <option value="real-estate-management">Real Estate Management</option>
        </select>
    </form>
</div>
