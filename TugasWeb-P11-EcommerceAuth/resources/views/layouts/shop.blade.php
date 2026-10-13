<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- Layout katalog publik (bisa diakses tanpa login). Halaman terautentikasi memakai <x-app-layout>. --}}
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Katalog') · Toko Joses</title>
  @include('partials.theme')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased">
  <header class="sticky top-0 z-20 border-b backdrop-blur" style="background: rgba(250,243,227,.92); border-color: var(--tj-line)">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
      <x-brand :href="route('shop.index')" />

      <nav class="flex items-center gap-2 text-sm">
        @auth
          <a href="{{ route('dashboard') }}" class="tj-btn tj-btn-quiet !py-1.5">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-3 py-1.5 font-medium tj-muted hover:underline">Keluar</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="px-3 py-1.5 font-medium hover:underline">Masuk</a>
          <a href="{{ route('register') }}" class="tj-btn tj-btn-orange !py-1.5">Daftar</a>
        @endauth
      </nav>
    </div>
  </header>

  <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <x-flash />
    @yield('content')
  </main>

  <footer class="mt-12" style="background: var(--tj-teal-dark)">
    <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-8 text-sm sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8" style="color: rgba(250,243,227,.85)">
      <x-brand :href="route('shop.index')" :dark="true" />
      <p>Pengiriman ke seluruh Indonesia &middot; garansi toko 7 hari.</p>
    </div>
  </footer>
</body>
</html>
