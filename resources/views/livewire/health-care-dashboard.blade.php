<div class="lg:px-12 px-5 py-14 w-full">
    <div class="w-full">
        <h1 class="text-2xl">Welcome, {{ $user -> name }}</h1>

        <p class="text-xl font-bold">{{ $user -> organisation -> name }}</p>
        
        <p>{{ strtoupper(str_replace('-', ' ', $user->role)) }}</p>
        @if(strtolower($user -> role) == 'admin' || strtolower($user -> role) == 'doctor')
            <div class="flex flex-row items-center gap-3 border-t border-gray-500">
                <h1 class="py-5 text-xl">Patients</h1>
                <a href={{ route('health-care.add-patient') }} class="px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Patient</a>
            </div>
            @if (count($patients) > 0)



                <table class="bg-[#3C5B6F] mb-8 lg:table-auto table-fixed rounded-md p-10 overflow-scroll border-seperate w-full lg:overflow-hidden shadow-2xl">
                    <thead class=" bg-[#948979] px-3 py-2 table-header-group">
                        <tr class="rounded-lg">
                            <th class="px-5 py-2">Name</th>
                            <th class="px-5 py-2">Date Of Birth</th>
                            <th class="px-5 py-2 ">Gender</th>

                        </tr>
                    </thead>

                    <tbody class="rounded-lg">
                        @foreach ($patients as $patient)
                            <tr class=" text-white">
                                <td class="px-5 py-2 border  overflow-scroll lg:overflow-auto">{{ $patient -> name  }}</td>
                                <td class="px-5 border  overflow-scroll lg:overflow-auto">{{ $patient -> dob }}</td>
                                <td class="px-5 border  overflow-scroll lg:overflow-auto">{{ $patient -> gender }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <p>No Available properties</p>
            @endif
        @endif
    </div>
</div>
