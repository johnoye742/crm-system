<div class="lg:px-12 px-5 py-14 w-full">
    <div class="w-full">
        <h1 class="text-2xl">Dashboard</h1>

        <h1 class="py-5 text-xl">Properties</h1>
       
        <table class="bg-[#3C5B6F] mb-8 table gap-3 rounded-md p-10 overflow-scroll lg:w-[50%] w-full lg:overflow-hidden shadow-2xl">
            <thead class=" bg-[#948979] px-3 py-2 table-header-group">
                <tr class="rounded-lg divide-x divide-yellow-400">
                    <th class="px-5 py-2">Property Name</th>
                    <th class="px-5 py-2">Property Price</th>
                    <th class="px-5 py-2 ">Property Location</th>
                </tr>
            </thead>

            <tbody class="rounded-lg ">
                <tr class="divide-x divide-yellow-400 p-5 text-white">
                    <td class="px-5 py-2">3 bedroom Duplex in the ends</td>
                    <td class="px-5">$58.00</td>
                    <td class="px-5">Abuja, Nigeria</td>
                </tr>
            </tbody>
        </table>

        <a href={{ route('add-property') }} class="mt-5 px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Property</a>

        <h1 class="py-5 text-xl">Clients</h1>
       
        <table class="mb-8 bg-[#3C5B6F] table gap-3 rounded-md lg:overflow-hidden overflow-scroll shadow-xl lg:w-[50%] w-full">
            <thead class=" bg-[#948979] px-3 py-2 table-header-group">
                <tr class="rounded-lg divide-x divide-yellow-400">
                    <th class="px-5 py-2">Client Name</th>
                    <th class="px-5 py-2">Client Email</th>
                    <th class="px-5 py-2">Interested Property</th>
                </tr>
            </thead>

            <tbody class="rounded-lg">
                <tr class="divide-x divide-yellow-400 p-5 text-white">
                    <td class="px-5 py-2">John Oye</td>
                    <td class="px-5 py-2">olugbengajohnoye@gmail.com</td>
                    <td class="px-5">5 Bedroom Duplex Out The Ends</td>
                    
                </tr>
            </tbody>
        </table>
        <a href={{ route('add-property') }} class="mt-5 px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Clients</a>
    </div>
</div>
