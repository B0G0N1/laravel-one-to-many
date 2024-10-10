<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Boolfolio') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite per caricare il file app.js -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('partials.header') <!-- Includo l'header -->

        <main class="d-flex">
            @include('partials.sidebar') <!-- Includo la sidebar -->
            <div id="content" class="flex-grow-1 p-3">
                @yield('content') <!-- Sezione per il contenuto della pagina -->
            </div>
        </main>
    </div>
</body>

</html>
