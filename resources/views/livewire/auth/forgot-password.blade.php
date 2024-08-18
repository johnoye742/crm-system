<div class="lg:px-20 w-full grid lg:grid-cols-2 grid-cols-1 gap-10 h-[100dvh]">
    <div class="lg:flex hidden flex-col mt-32">
        <img src="{{ asset('images/forgot_password.svg') }}">
    </div>
    <div class="flex flex-col lg:mt-32 mt-20">
        <form class="flex flex-col gap-3" wire:submit="sendLink">
            <h1 class=" text-3xl uppercase">Send Reset Link</h1>
            <input type="email" wire:model="email" placeholder="Enter Your Email" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">

            <button type="submit" class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Submit</button>
        </form>
    </div>
</div>
