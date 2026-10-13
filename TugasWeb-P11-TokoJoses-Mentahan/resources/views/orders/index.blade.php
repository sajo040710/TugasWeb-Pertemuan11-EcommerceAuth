<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-bold">Pesanan Saya</h2>
  </x-slot>

  <div class="py-8">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
      <x-flash />

      <div class="space-y-3">
        @forelse ($orders as $order)
          <a href="{{ route('orders.show', $order) }}" class="tj-card block p-4 transition hover:border-[#0C7C74]">
            <div class="flex flex-wrap items-center justify-between gap-2">
              <p class="tj-display font-semibold">{{ $order->order_number }}</p>
              <span class="tj-chip">{{ $order->status }}</span>
            </div>
            <p class="tj-muted mt-1 text-sm">
              {{ $order->items->count() }} item &middot; {{ $order->total_formatted }} &middot; {{ $order->created_at->translatedFormat('d M Y') }}
            </p>
          </a>
        @empty
          <p class="tj-card border-dashed p-10 text-center tj-muted">
            Belum ada pesanan. <a href="{{ route('shop.index') }}" class="tj-link">Lihat katalog</a>.
          </p>
        @endforelse
      </div>

      <div class="mt-6">{{ $orders->links() }}</div>
    </div>
  </div>
</x-app-layout>
