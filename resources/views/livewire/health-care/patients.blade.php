<div class="lg:px-12 px-5 py-5 w-full">
    <h1 class="text-2xl mb-8">All Patients</h1>
    <p class="text-2xl font-bold mb-2">{{ request() -> user() -> organisation -> name }}</p>


    <table
        class="bg-[#3C5B6F] mb-8
                lg:table-auto table-fixed
                rounded-md overflow-scroll
                border-seperate w-full
                lg:overflow-hidden shadow-2xl">

        <thead class=" bg-[#948979] rounded-md px-3 py-2 table-header-group">
            <tr class="rounded-lg">
                <th class="px-5 py-2">Name</th>
                <th class="px-5 py-2 lg:overflow-auto overflow-scroll">Date Of Birth</th>
                <th class="px-5 py-2 ">Gender</th>
                <th class="px-5 py-2 ">State</th>
                <th class="px-5 py-2 lg:overflow-auto overflow-scroll">Occupation</th>
                <th class="px-5 py-2">Action</th>
            </tr>
        </thead>

        <tbody class="rounded-lg w-full">
            @foreach ($patients as $patient)
                <tr class=" text-white">
                    <td
                        class="px-5 py-2 border  overflow-scroll lg:overflow-auto">
                            {{ $patient -> name  }}
                    </td>
                    <td class="px-5 border  overflow-scroll lg:overflow-auto">{{ $patient -> dob }}</td>
                    <td class="px-5 border capitalize overflow-scroll lg:overflow-auto">{{ $patient -> gender }}</td>
                    <td class="px-5 border  overflow-scroll lg:overflow-auto">{{ $patient -> state_of_origin }}</td>
                    <td class="px-5 border  overflow-scroll lg:overflow-auto">{{ $patient -> occupation }}</td>

                    <td class="px-5 border  overflow-scroll lg:overflow-auto">
                        <span>
                            <a href="{{ route('health-care.view-patient', ['patient' => $patient -> id]) }}" class=" text-blue-400" wire:navigate>View</a>
                        </span>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $patients -> links() }}
</div>
