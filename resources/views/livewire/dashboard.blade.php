<div class="lg:px-12 px-5 py-14 w-full">
    <div class="w-full">
        <h1 class="text-2xl">Welcome, {{ $user -> name }}</h1>

        <p>{{ $user -> organisation -> name }}</p>
        <div class="flex flex-row items-center gap-3">
            <h1 class="py-5 text-xl">Properties</h1>
            <a href={{ route('add-property') }} class="px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Property</a>
        </div>
        
       
        <table class="bg-[#3C5B6F] mb-8 table-auto rounded-md p-10 overflow-scroll border-seperate w-full lg:overflow-hidden shadow-2xl">
            <thead class=" bg-[#948979] px-3 py-2 table-header-group">
                <tr class="rounded-lg">
                    <th class="px-5 py-2">Property Name</th>
                    <th class="px-5 py-2">Property Price</th>
                    <th class="px-5 py-2 ">Property Location</th>
                    <th class="px-5 py-2 ">Action</th>
                    
                </tr>
            </thead>

            <tbody class="rounded-lg">
                @foreach ($properties as $property)
                    <tr class=" text-white">
                        <td class="px-5 py-2 border border-slate-800">{{ $property -> property_name  }}</td>
                        <td class="px-5 border border-slate-800">{{ $property -> property_price }}</td>
                        <td class="px-5 border border-slate-800">{{ $property -> property_location }}</td>
                        <td class="px-5 border border-slate-800">
                            <span>
                                <a href="" class=" text-blue-400">Edit</a>
                                <a href="" class=" text-red-400">Delete</a>
                            </span>
                        </td>
                        
                    </tr>
                @endforeach
            
            </tbody>
        </table>

       

    </div>
</div>
