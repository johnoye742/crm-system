<div class="px-10 py-12">
    <h1 class="text-2xl">Property</h1>
    <section class="mt-3 border-t border-t-gray-500 flex flex-col gap-3">
        <h2 class="text-xl">Demographics</h2>
        <div>
            <h3 class="font-bold">Property Name</h3>
            <p>{{ $property -> property_name }}</p>
        </div>
        <div>
            <h3 class="font-bold">Property Location</h3>
            <p>{{ $property -> property_location }}</p>
        </div>
        <div>
            <h3 class="font-bold">Property Price</h3>
            <p>{{ $property -> property_price }}</p>
        </div>

        <div>
            <h3 class="font-bold">More Information</h3>
            <p>{{ $property -> property_info }}</p>
        </div>
    </section>
</div>
