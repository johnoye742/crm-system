<div class=" px-10">
    <h1 class="text-2xl">All Property Sales</h1>
    <h2 class="text-xl font-bold">{{ auth() -> user() -> organisation -> name }}</h2>


    @if (count($properties) > 0)
        <table class="bg-[#3C5B6F] mt-5 mb-8 lg:table-auto table-fixed rounded-md p-10 overflow-scroll border-seperate w-full lg:overflow-hidden shadow-2xl">
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
                        <td class="px-5 py-2 border  overflow-scroll lg:overflow-auto">{{ $property -> property_name  }}</td>
                        <td class="px-5 border  overflow-scroll lg:overflow-auto">{{ $property -> property_price }}</td>
                        <td class="px-5 border  overflow-scroll lg:overflow-auto">{{ $property -> property_location }}</td>
                        <td class="px-5 border  overflow-scroll lg:overflow-auto">
                            <span>
                                <a href="{{ route('property.edit', ['id' => $property -> id]) }}" class=" text-blue-400" wire:navigate>Edit</a>
                                <button class=" text-red-400" wire:click="deleteProperty({{ $property -> id }})">Delete</button>
                            </span>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    @else
        <p class="mt-5 text-gray-300">No Available properties</p>
    @endif

    {{ $properties -> links() }}
</div>
