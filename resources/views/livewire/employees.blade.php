<div class="px-10 py-12">
    <h1 class="text-2xl font-bold">{{ $organisation_name }}</h1>
    <div class="flex flex-row mt-5 items-center gap-3 border-t border-gray-500">
        <h1 class="py-5 text-xl">Employees</h1>
        <a href={{ route('employees.add') }} class="px-3 py-2 rounded-full text-black drop-shadow-lg w-fit bg-[#DFD0B8]" wire:navigate>Add Employee</a>
    </div>

    {{-- Make a grid layout for the profile cards of employees --}}
    <div class="grid lg:grid-cols-4 grid-cols-1 pt-5 gap-5">
        {{-- Loop through the employee collection --}}
        @foreach ($employees as $employee) 
            {{-- Use rounded cards to represent employee data --}}
            <div class="p-4 rounded-xl text-white bg-[#153448]">
                <p>{{ $employee -> name }}</p>
                <p class="text-[#948979]">{{ str_replace("-", " ", ucfirst($employee -> role)) }}</p>
                <p class="flex flex-row justify-between w-full mt-4"><a href={{ route('employees.edit', ['id' => $employee -> id]) }} class="text-sky-500">edit</a><button wire:click="deleteEmployee({{ $employee -> id }})" class="text-red-500">delete</button></p>
            </div>
        @endforeach
    </div>
</div>
