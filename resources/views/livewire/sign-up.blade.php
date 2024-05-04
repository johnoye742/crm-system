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
            
            <!-- Select Role -->
            @error('form.role')
                <p>Please select a Role</p>
            @enderror
            <div class="w-full flex flex-row items-center gap-2">
                <label for="role">Role: </label>
                <select id="role" class="p-3 py-2 rounded-full" wire:model="form.role">
                    <option>-- Select a role --</option>
                    <option value="agent">Agent</option>
                </select>
            </div>
            <!-- Select Role -->
            @error('form.role')
                <p>Please select a Role</p>
            @enderror
            <div class="w-full flex flex-row items-center gap-2">
                <label for="niche">Business Type: </label>
                <select id="niche" class="p-3 py-2 rounded-full" wire:model="form.niche">
                    <option>-- Select a niche --</option>
                    <option value="real-estate">Real Estate</option>                                           @error('form.pwd') <p>Problem with password</p> @enderror
                </select>                                                                          @error('form.pwd2') <p>Problem with password</p> @enderror
            </div>                                                                                 <input type="password" wire:model="form.pwd" placeholder="Password" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">
                                                                                                   <input type="password" wire:model="form.pwd2" placeholder="Confirm Password" class="bg-gray-200 focus:border-[#3C5B6F] border-gray-200 border-2 outline-none px-3 py-2 rounded-full transition-all duration-150 ease-in-out w-full">
            
            <button type="submit" href={{ route('register') }} class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Sign Up</button>
            <p>Already have an account? <a href="{{ route('login') }}" class="text-[#DFD0B8]" wire:navigate>Login</a></p>
        </form>    
    </div>
</div>   