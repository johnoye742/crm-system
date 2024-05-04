<div class="w-full flex flex-row justify-between lg:px-10 px-3 py-5 bg-[#153448] shadow-md text-white">
    <div>
        <h1 class=" font-mono"><a href="{{ route('homepage') }}">CRMStar</a></h1>
    </div>

    <ul>
        <li><a href="{{ route('homepage') }}" class="hover:text-[#1E0342] hover:font-bold transition-all ease-linear duration-200">Home</a></li>
        @auth
            <li><a href="#">Data</a></li>    
        @endauth
    </ul>
</div>
