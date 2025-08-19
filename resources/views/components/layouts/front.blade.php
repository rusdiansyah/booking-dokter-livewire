<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    @include('components.layouts.front.style')
    @include('components.layouts.front.script')
    @livewireStyles
</head>

<body class="index-page">

    @livewire('front.beranda.header')

    <main class="main">

        {{ $slot }}


    </main>

    @livewire('front.beranda.footer')

    @livewireScripts
</body>

</html>
