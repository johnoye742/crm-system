<div>

    <div class=" lg:px-20 px-5 w-full grid lg:grid-cols-2 grid-cols-1 lg:gap-10 gap-3 h-[100dvh]">

        <div class="flex flex-col lg:mt-32">
            <img class="hidden lg:block" src="{{ asset('images/signup.svg') }}">
        </div>
        <div class="flex flex-col lg:mt-32 mt-5 pb-10">
            <form class="flex flex-col gap-3" wire:submit="signUp">
                <h1 class=" text-3xl uppercase">Sign Up</h1>
                @error('form.email')
                    <p>Please provide a valid email</p>
                @enderror
                <input type="email" wire:model="form.email" placeholder="Email" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">
                <input type="text" wire:model="form.fname" placeholder="Full Name" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">

                <div class="w-full flex flex-row gap-2 items-center">
                    <label for="dob" class="">Date Of Birth:</label>
                    <input type="date" id="dob" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-fit" name="dob" wire:model="form.dob">
                </div>

                <div class="w-full flex flex-row items-center gap-2">
                    <label for="gender">Gender: </label>
                    <select id="gender" class="p-3 py-2 rounded-full" wire:model="form.gender">
                        <option>-- Select a gender --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="custom">Custom</option>
                    </select>

                </div>


                <input type="password" wire:model="form.pwd" placeholder="Password" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">

                @error('form.pwd2') <p>Passwords do not match</p> @enderror
                <input type="password" wire:model="form.pwd2" placeholder="Confirm Password" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">

                <button type="submit" href={{ route('register') }} class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Sign Up</button>
                <p>Already have an account? <a href="{{ route('login') }}" class="text-[#DFD0B8]" wire:navigate>Login</a></p>
            </form>
        </div>
    </div>
</div>
