<div class="px-10 py-12">
   <h1 class=" text-2xl">Add Client</h1>
   <form class="flex flex-col gap-3" wire:submit="save">
        <input type="text" wire:model="cname" placeholder="Client Name" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-[50%]">
        <input type="email" wire:model="email" placeholder="Client Email" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-[50%]">
        <input type="number" wire:model="phone" placeholder="Client Phone" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-[50%]">
        
        <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">+ Add</button>
   </form>
</div>
