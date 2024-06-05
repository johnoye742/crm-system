<div class="px-10 py-12">
    <h1 class="text-2xl">Edit Property Info</h1>

    <form class="flex flex-col gap-4 mt-5" wire:submit="save">
        @error('pname')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" wire:model="pname" placeholder="Property Name" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-[50%]">
        @error('price')
            <p>$message</p>
        @enderror
        <input type="text" wire:model="price" placeholder="Property Price" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
        @error('location')
            <p>$message</p>
        @enderror
        <input type="text" wire:model="location" placeholder="Property Location" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
        @error('pinfo')
            <p>{{ $message }}</p>
        @enderror
        <textarea placeholder="More Information" wire:model="pinfo" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-xl transition-all duration-150 ease-in-out w-full lg:w-[50%]"></textarea>

        <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Edit</button>
    </form>
</div>
