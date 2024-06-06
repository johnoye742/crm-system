<div>
    <div class="lg:px-12 px-5 py-14">
        <h1 class="text-2xl pl-2 text-black">Add New Record</h1>
        <form class="flex flex-col gap-4 mt-5" wire:submit="add">
            @error('patient_id')
                <p>Please select a patient</p>
            @enderror
            <div class="flex flex-row gap-3 items-center">
                <span>Patient: </span> 
                <select wire:model="patient_id" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
                    <option>-- Select a patient --</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient -> id }}">{{ $patient -> name }}</option>
                    @endforeach
                </select>
            </div>
            @error('visit_date')
                <p>{{ $message }}</p>
            @enderror
            <div>
                <label for="dob">Visit Date: </label>
                <input type="date" wire:model="visit_date"  class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
            </div>

            @error('visit_reason')
                <p>{{ $message }}</p>
            @enderror
            <textarea placeholder="Visit Reason" wire:model="visit_reason" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-xl transition-all duration-150 ease-in-out w-full lg:w-[50%]"></textarea>

            @error('diagnosis')
                <p>{{ $message }}</p>
            @enderror
            <textarea placeholder="Diagnosis" wire:model="diagnosis" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-xl transition-all duration-150 ease-in-out w-full lg:w-[50%]"></textarea>
            
            @error('treatment')
                <p>{{ $message }}</p>
            @enderror
            <textarea placeholder="Treatment" wire:model="treatment" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-xl transition-all duration-150 ease-in-out w-full lg:w-[50%]"></textarea>


            @error('prescriptions')
                <p>{{ $message }}</p>
            @enderror
            <textarea placeholder="Prescriptions" wire:model="prescriptions" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-xl transition-all duration-150 ease-in-out w-full lg:w-[50%]"></textarea>

            @error('notes')
                <p>{{ $message }}</p>
            @enderror
            <textarea placeholder="Notes" wire:model="notes" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-xl transition-all duration-150 ease-in-out w-full lg:w-[50%]"></textarea>

            @error('follow_up_date')
                <p>{{ $message }}</p>
            @enderror
            <div>
                <label for="follow_up_date">Follow Up Date: </label>
                <input type="date" wire:model="follow_up_date"  class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
            </div>
             
            <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">+ Add</button>
        </form>
    </div>
</div>
