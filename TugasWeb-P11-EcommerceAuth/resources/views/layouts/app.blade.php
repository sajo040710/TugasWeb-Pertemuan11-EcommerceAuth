<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Toko Joses') }}</title>
  @include('partials.theme')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
  <div class="min-h-screen">
    @include('layouts.navigation')

    @isset($header)
      <header>
        <div class="mx-auto max-w-7xl px-4 pb-2 pt-8 sm:px-6 lg:px-8">{{ $header }}</div>
      </header>
    @endisset

    <main>{{ $slot }}</main>
  </div>
</body>
</html>
