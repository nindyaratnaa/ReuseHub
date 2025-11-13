<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'Judul Default')</title>
        @vite('resources/css/app.css')
    </head>
    <body class ="mt-16">
        {{-- Header --}}
        @include('partials.headerB')

        {{-- Konten halaman --}}
        <main>
        @yield('content')
        </main>

        {{-- Footer --}}
        @include('partials.footer')
    </body>
</html>
