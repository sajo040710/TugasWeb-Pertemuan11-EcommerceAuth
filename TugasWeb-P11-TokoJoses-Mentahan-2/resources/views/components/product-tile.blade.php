{{-- Gambar produk: public/images/products/{id produk}.webp. Jika file belum ada, tampil blok warna + inisial. --}}
@props(['product', 'tall' => false])
@php
  $tints = [
    'elektronik' => '#D3E7E4', 'fashion-pria' => '#E9E0CB', 'fashion-wanita' => '#F8DDCB',
    'rumah-tangga' => '#E3EBC8', 'olahraga' => '#CBE5DC', 'buku-alat-tulis' => '#F6E3B6',
  ];
  $bg = $tints[$product->category->slug ?? ''] ?? '#E6DBC0';
  $words = preg_split('/\s+/', trim($product->name));
  $initials = mb_strtoupper(mb_substr($words[0] ?? '', 0, 1).mb_substr($words[1] ?? '', 0, 1));
  $imagePath = 'images/products/'.$product->id.'.webp';
  $hasImage = file_exists(public_path($imagePath));
@endphp
<div {{ $attributes->merge(['class' => 'flex items-center justify-center overflow-hidden '.($tall ? 'h-80 rounded-3xl' : 'm-2 h-48 rounded-[14px]')]) }}
     style="background: {{ $hasImage ? '#fff' : $bg }}">
  @if ($hasImage)
    <img src="{{ asset($imagePath) }}" alt="{{ $product->name }}" loading="lazy" class="h-full w-full object-contain p-2">
  @else
    <span class="tj-display text-5xl font-extrabold" style="color: rgba(10,79,73,.3)">{{ $initials }}</span>
  @endif
</div>
