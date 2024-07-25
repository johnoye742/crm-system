<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRM System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href={{ asset('css/app.css') }}>
    </head>

    <body>

        <div class="w-full grid lg:grid-cols-2 gap-5 p-10">
            <img src={{ asset('images/user-growth.svg') }}>
            <div class="flex flex-col gap-3 justify-center">
                <h1 class="text-4xl uppercase font-extrabold">We help <span class="text-[#948979]">you</span> grow <span class="text-[#153448]">customers</span></h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis maxime quas odio quo facere voluptates ex, corporis nemo eos maiores temporibus optio vitae numquam ea fuga soluta eveniet? Molestias, iusto.</p>
                <a href={{ route('register') }} class=" px-3 py-2 rounded-full text-white w-fit bg-[#3C5B6F]">Get Started</a>
            </div>
        </div>
    </body>
</html>
