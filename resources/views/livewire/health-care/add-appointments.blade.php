<div class="lg:px-12 px-5 py-14">
    <h1 class="text-2xl mb-2">Add Medical Appointment</h1>
    <form wire:submit="add" class="flex flex-col gap-5">
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

        @error('scheduled_for')
            <p>{{ $message }}</p>
        @enderror
        
        <div>
            <label for="scheduled_for">Scheduled Date: </label>
            <input type="date" wire:model="scheduled_for" id="scheduled_for"  class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full lg:w-[50%]">
        </div>


        @error('notes')
            <p>{{ $message }}</p>
        @enderror
        <textarea placeholder="Notes" wire:model="notes" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-xl transition-all duration-150 ease-in-out w-full lg:w-[50%]"></textarea>
        <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">+ Add</button>
    </form>
</div>
