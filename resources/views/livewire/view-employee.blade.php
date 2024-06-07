<div class="px-10 py-12">
    <h1 class="text-2xl">Employee</h1>
    <section class="mt-3 border-t border-t-gray-500 flex flex-col gap-3">
        <h2 class="text-xl">Demographics</h2>
        <div>
            <h3 class="font-bold">Employee Name</h3>
            <p>{{ $employee -> name }}</p>
        </div>
        <div>
            <h3 class="font-bold">Employee Email</h3>
            <p>{{ $employee -> email }}</p>
        </div>
        <div>
            <h3 class="font-bold">Employee Role</h3>
            <p>{{ $employee -> role }}</p>
        </div>
    </section>
</div>
