@extends('layouts.shop')

@section('title', $product->name)

@section('content')
  <a href="{{ route('shop.index') }}" class="tj-muted text-sm hover:underline">&larr; Kembali ke katalog</a>

  <div class="mt-4 grid gap-8 lg:grid-cols-[1fr_22rem]">
    <div>
      <x-product-tile :product="$product" :tall="true" />

      <p class="tj-muted mt-6 text-sm font-medium">{{ $product->category->name }}</p>
      <h1 class="mt-1 text-3xl font-extrabold">{{ $product->name }}</h1>
      <p class="mt-4 max-w-prose leading-relaxed">{{ $product->description }}</p>

      <h2 class="mb-3 mt-10 text-xl font-bold">
        Ulasan
        @if ($product->reviews_avg_rating)
          <span class="tj-muted ms-2 text-sm font-normal" style="font-family: var(--tj-body)">★ {{ number_format($product->reviews_avg_rating, 1) }} dari {{ $product->reviews->count() }} ulasan</span>
        @endif
      </h2>

      <div class="space-y-3">
        @forelse ($product->reviews as $review)
          <div class="tj-card p-4 text-sm">
            <p class="font-semibold">{{ $review->user->name }} <span style="color: var(--tj-orange-dark)">{{ str_repeat('★', $review->rating) }}</span></p>
            <p class="tj-muted mt-1">{{ $review->comment }}</p>
          </div>
        @empty
          <p class="tj-muted text-sm">Belum ada ulasan.</p>
        @endforelse
      </div>
    </div>

    <aside class="tj-card h-fit p-6 lg:sticky lg:top-24">
      <span class="tj-price text-2xl">{{ $product->price_formatted }}</span>
      <p class="tj-muted mt-4 text-sm">Stok tersedia: {{ $product->stock }}</p>
      <p class="tj-muted mt-1 text-sm">Dijual oleh {{ $product->owner?->name ?? 'Toko Joses' }}</p>
    </aside>
  </div>
@endsection
