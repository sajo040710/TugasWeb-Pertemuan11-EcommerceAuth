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
  <div class="grid min-h-screen lg:grid-cols-[5fr_6fr]">
    <aside class="relative hidden overflow-hidden p-12 lg:flex lg:flex-col lg:justify-between" style="background: var(--tj-teal)">
      <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full" style="background: var(--tj-orange)"></div>
      <div class="absolute -bottom-10 right-40 h-32 w-32 rounded-full" style="background: var(--tj-cream); opacity: .9"></div>
      <x-brand :href="route('shop.index')" :dark="true" class="relative" />
      <div class="relative">
        <p class="tj-display max-w-sm text-4xl font-bold leading-tight" style="color: var(--tj-cream)">Satu akun, semua pesanan rapi di tempatnya.</p>
        <p class="mt-4 max-w-sm text-sm" style="color: rgba(250,243,227,.8)">Masuk untuk memantau pesanan, atau daftar gratis untuk mulai belanja di Toko Joses.</p>
      </div>
      <p class="relative text-xs" style="color: rgba(250,243,227,.7)">&copy; {{ date('Y') }} Toko Joses</p>
    </aside>

    <div class="flex flex-col items-center justify-center px-6 py-10">
      <x-brand :href="route('shop.index')" class="mb-8 lg:hidden" />
      <div class="tj-card w-full max-w-md px-7 py-7 shadow-sm">
        {{ $slot }}
      </div>
    </div>
  </div>
</body>
</html>
