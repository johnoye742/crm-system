<div class=" px-10 py-12">
    <section>
        <h1 class="text-2xl">{{ $property -> property -> property_name }}</h1>
        <p>{{ $property -> property -> property_info }}</p>
        <form wire:submit="save">
            <select wire:change="selectionChanged" wire:model="value">
                <option value="opened" @if($property -> status == 'opened') selected @endif>opened</option>
                <option value="closed" @if($property -> status == 'closed') selected @endif>closed</option>
                <option value="ongoing" @if($property -> status == 'ongoing') selected @endif>ongoing</option>
            </select>
            @if($change) <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Save</button> @endif
        </form>
    </section>
</div>
