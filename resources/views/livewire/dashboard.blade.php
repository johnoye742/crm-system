<div class="px-12">
    @if (request() -> user() -> organisations == null)
        <section class="flex-col flex gap-3">
            <h1 class="text-4xl">No organisations</h1>
            <p>You belong to no organisations, consider requesting the admin of an organisation to add you to one, or creating a new one.</p>
            <a href={{ route('organisations.new') }} class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">+ Create</a>
        </section>
    @endif
</div>
