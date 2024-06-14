<div class="px-10 py-12">
    <div class="flex flex-row gap-3 items-center">
        <h1 class="text-2xl">Patient</h1>

        <a href={{ route('health-care.add-medical-records') }} class="px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Record</a>
    </div>
    <section class="mt-3 border-t border-t-gray-500 flex flex-col gap-3 pt-3">
        <h2 class="text-xl">Demographics</h2>
        <div>
            <h3 class="font-bold">Patient Name</h3>
            <p>{{ $patient -> name }}</p>
        </div>
        <div>
            <h3 class="font-bold">Patient Phone Number</h3>
            <p>{{ $patient -> phone }}</p>
        </div>
        <div>
            <h3 class="font-bold">Emergency Contact</h3>
            <p>{{ $emergency_contact }}</p>
        </div>
    </section>
    @can('viewAny', \App\Models\MedicalRecord::class)

        <section class="mt-3 border-t border-t-gray-500 flex flex-col gap-3">
            <h2 class="text-xl">Medical Record</h2>

            @foreach ($medical_record as $record)
                <section class="border-b border-b-gray-300 flex flex-col gap-3">
                    <div>
                        <h3 class="font-bold">Visit Date</h3>
                        <p>{{ $record -> visit_date }}</p>
                    </div>
                    
                    <div>
                        <h3 class="font-bold">Doctor Name</h3>
                        <p>{{ $record -> doctor -> name }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold">Visit Reason</h3>
                        <p>{{ $record -> visit_reason }}</p>
                    </div>

                    <div>
                        <h3 class="font-bold">Diagnosis</h3>
                        <p>{{ $record -> diagnosis }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold">Treatment</h3>
                        <p>{{ $record -> treatment }}</p>
                    </div>

                    <div>
                        <h3 class="font-bold">Prescription</h3>
                        <p>{{ $record -> prescription }}</p>
                    </div>

                    <div>
                        <h3 class="font-bold">Notes</h3>
                        <p>{{ $record -> notes }}</p>
                    </div>
                    
                    <div>
                        <h3 class="font-bold">Follow Up Date</h3>
                        <p>{{ $record -> follow_up_date }}</p>
                    </div>
                </section>
            @endforeach
        </section>        
    @endcan
</div>
