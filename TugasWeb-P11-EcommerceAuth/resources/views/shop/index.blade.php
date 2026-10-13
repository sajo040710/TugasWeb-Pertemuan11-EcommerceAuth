@extends('layouts.shop')

@section('title', 'Katalog')

@section('content')
  {{-- Banner pembuka + pencarian --}}
  <section class="relative mb-8 overflow-hidden rounded-[28px] px-6 py-10 sm:px-12 sm:py-14" style="background: var(--tj-teal)">
    <div class="absolute -right-16 -top-16 h-56 w-56 rounded-full" style="background: var(--tj-orange)"></div>
    <div class="absolute -bottom-12 right-32 hidden h-28 w-28 rounded-full sm:block" style="background: var(--tj-cream); opacity: .9"></div>

    <div class="relative max-w-xl">
      <h1 class="text-3xl font-extrabold leading-tight sm:text-4xl" style="color: var(--tj-cream)">Belanja santai, harga jelas dari awal.</h1>
      <p class="mt-3 text-sm sm:text-base" style="color: rgba(250,243,227,.85)">{{ $products->total() }} produk siap kirim, mulai dari elektronik sampai alat tulis.</p>

      <form method="GET" action="{{ route('shop.index') }}" class="mt-6 flex gap-2">
        @if (request('kategori'))
          <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif
        <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari produk…" aria-label="Cari produk"
               class="w-full rounded-full border-0 bg-white px-5 py-2.5 text-sm focus:ring-2 focus:ring-[#F07F1F]">
        <button class="tj-btn tj-btn-orange shrink-0">Cari</button>
      </form>
    </div>
  </section>

  {{-- Kategori sebagai pil horizontal --}}
  <nav class="mb-8 flex flex-wrap gap-2" aria-label="Kategori">
    <a href="{{ route('shop.index') }}" class="tj-pill" @unless (request('kategori')) aria-current="true" @endunless>Semua</a>
    @foreach ($categories as $category)
      <a href="{{ route('shop.index', ['kategori' => $category->slug]) }}" class="tj-pill"
         @if (request('kategori') === $category->slug) aria-current="true" @endif>
        {{ $category->name }}
        <span class="text-xs opacity-70">{{ $category->products_count }}</span>
      </a>
    @endforeach
  </nav>

  <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @forelse ($products as $product)
      <a href="{{ route('shop.show', $product) }}" class="tj-card flex flex-col transition hover:-translate-y-0.5 hover:shadow-md">
        <x-product-tile :product="$product" />
        <div class="flex flex-1 flex-col px-4 pb-4 pt-1">
          <p class="tj-muted text-xs font-medium">{{ $product->category->name }}</p>
          <h2 class="mt-1 flex-1 text-[15px] font-semibold leading-snug">{{ $product->name }}</h2>
          <div class="mt-4 flex items-center justify-between gap-2">
            <span class="tj-price text-sm">{{ $product->price_formatted }}</span>
            <span class="tj-muted text-xs">
              Stok {{ $product->stock }}
              @if ($product->reviews_avg_rating) &middot; ★ {{ number_format($product->reviews_avg_rating, 1) }} @endif
            </span>
          </div>
        </div>
      </a>
    @empty
      <p class="tj-card col-span-full border-dashed p-10 text-center tj-muted">
        Tidak ada produk yang cocok. <a href="{{ route('shop.index') }}" class="tj-link">Lihat semua produk</a>.
      </p>
    @endforelse
  </div>

  <div class="mt-10">{{ $products->links() }}</div>
@endsection
