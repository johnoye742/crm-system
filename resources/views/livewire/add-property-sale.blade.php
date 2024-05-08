<div class="px-8 py-12">
    <h1 class="text-2xl">Add A New Sale</h1>

    <div class="w-full flex flex-row items-center gap-2">
        <label for="property">Property: </label>
        <select id="property" class="p-3 py-2 rounded-full" wire:model="property">
            <option>-- Select a property --</option>
            @foreach ($properties as $prop)
                <option value="{{ $prop -> id }}">{{ $prop -> property_name }}</option>
            @endforeach                                        
        </select>                
    </div>  
    
    <div class="w-full flex flex-row items-center gap-2">
        <label for="client">Client: </label>
        <select id="client" class="p-3 py-2 rounded-full" wire:model="client">
            <option>-- Select a client --</option>
            @foreach ($clients as $client)
                <option value="{{ $client -> id }}">{{ $client -> client_name }}</option>
            @endforeach                                        
        </select>                
    </div>  
</div>
