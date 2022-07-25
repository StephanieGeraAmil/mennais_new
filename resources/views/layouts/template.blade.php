<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @yield('styles')
</head>
<body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover" style="background: rgb(21,22,112);background: linear-gradient(180deg, rgba(21,22,112,1) 0%, rgba(129,44,106,1) 100%);">
    @yield('content')
    @yield('scripts')
</body>
</html>