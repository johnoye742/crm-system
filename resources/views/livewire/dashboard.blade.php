<div class="lg:px-12 px-5 py-14 w-full">
    <div class="w-full">
        <h1 class="text-2xl">Welcome, {{ $user -> name }}</h1>

        <p class="text-xl font-bold">{{ $user -> organisation -> name }}</p>
        <p>{{ strtoupper(str_replace('-', ' ', $user->role)) }}</p>
        @if(strtolower($user -> role) == 'admin' || strtolower($user -> role) == 'agent')
            <div class="flex flex-row items-center gap-3 border-t border-gray-500">
                <h1 class="py-5 text-xl">Properties</h1>
                <a href={{ route('add-property') }} class="px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Property</a>
            </div>
            @if (count($properties) > 0)



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
                                        <a href="" class=" text-blue-400" wire:navigate>Edit</a>
                                        <a href="" class=" text-red-400" wire:navigate>Delete</a>
                                    </span>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else 
                <p>No Available properties</p>          
            @endif
        @endif

        @if(strtolower($user -> role) == 'admin' || strtolower($user -> role) == 'real-estate-sales')
            <div class="flex flex-row items-center gap-3 border-t border-gray-500">
                <h1 class="py-5 text-xl">Property Sales</h1>
                <a href={{ route('add-property-sales') }} class="px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Sale</a>
            </div>

            @if (count($property_sales) > 0)
                <table class="bg-[#3C5B6F] mb-8 table-auto rounded-md p-10 overflow-scroll border-seperate w-full lg:overflow-hidden shadow-2xl">
                    <thead class=" bg-[#948979] px-3 py-2 table-header-group">
                        <tr class="rounded-lg">
                            <th class="px-5 py-2">Property Name</th>
                            <th class="px-5 py-2">Property Price</th>
                            <th class="px-5 py-2 ">Property Location</th>
                            <th class="px-5 py-2">Client Name</th>
                            <th class="px-5 py-2 ">Status</th>

                        </tr>
                    </thead>

                    <tbody class="rounded-lg">
                        @foreach ($property_sales as $properties)
                            <tr class=" text-white">
                                <td class="px-5 py-2 border border-slate-800">{{ $properties -> property -> property_name  }}</td>
                                <td class="px-5 border border-slate-800">{{ $properties -> property -> property_price }}</td>
                                <td class="px-5 border border-slate-800">{{ $properties -> property -> property_location }}</td>
                                <td class="px-5 border border-slate-800">{{ $properties -> client -> client_name }}</td>

                                <td class="px-5 border border-slate-800">
                                    <a href={{ route('property-sales', ['id' => $properties -> id]) }} class=" @if($properties -> status == 'opened') text-blue-400 @endif @if($properties -> status == 'ongoing') text-green-400 @endif @if($properties -> status == 'closed') text-red-400 @endif">{{ $properties -> status }}</a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else 
                <p>No property sales</p>
            @endif
        @endif
        
        @if(strtolower($user -> role) == 'admin' || strtolower($user -> role) == 'real-estate-sales')
            <div class="flex flex-row items-center gap-3 border-t border-gray-500 mt-5">
                <h1 class="py-5 text-xl">Clients</h1>
                <a href={{ route('add-client') }} class="px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Clients</a>
            </div>

            @if (count($property_sales) > 0)
                <table class="bg-[#3C5B6F] mb-8 table-auto rounded-md p-10 overflow-scroll border-seperate w-full lg:overflow-hidden shadow-2xl">
                    <thead class=" bg-[#948979] px-3 py-2 table-header-group">
                        <tr class="rounded-lg">
                            
                            <th class="px-5 py-2">Client Name</th>
                            <th class="px-5 py-2">Client Email</th>
                            <th class="px-5 py-2">Client Phone</th>

                        </tr>
                    </thead>

                    <tbody class="rounded-lg">
                        @foreach ($clients as $client)
                            <tr class=" text-white">
                                <td class="px-5 py-2 border border-slate-800">{{ $client -> clients_name  }}</td>
                                <td class="px-5 border border-slate-800">{{ $client -> email }}</td>
                                <td class="px-5 border border-slate-800">{{ $client -> phone }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else 
                <p>No clients</p>
            @endif
        @endif
        </div>
</div>
