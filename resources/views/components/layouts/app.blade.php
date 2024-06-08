<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }} - CrmStar</title>

        <link rel="stylesheet" href={{ asset('css/app.css') }}>
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    </head>
    <body>
        <livewire:header></livewire:header>
        {{ $slot }}
    </body>
</html>
