<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }} - CrmStar</title>

        <link rel="stylesheet" href={{ asset('css/app.css') }}>
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    </head>
    <body class="w-full flex flex-row">
        @auth

        <livewire:header></livewire:header>
        <div class="lg:ml-[25%] ml-[10%] w-full">
            <div class="w-full flex flex-row justify-between">
                <div class="p-5 lg:px-12 flex flex-row items-center">
                    <h1 class="text-2xl">Welcome, {{ request() -> user() -> name }}</h1>
                </div>

                <div class="flex flex-row p-5 items-center gap-2">
                    <img class="w-[2em] h-[2em]" src="https://avatar.iran.liara.run/public/job/doctor/male?username=johnoye742">
                    <div class="flex flex-col">
                        <p>{{ request() -> user() -> name }}</p>
                        <p>{{ request() -> user() -> email }}</p>
                    </div>
                </div>
        </div>
        @endauth

            {{ $slot }}
        </div>
    </body>
</html>
