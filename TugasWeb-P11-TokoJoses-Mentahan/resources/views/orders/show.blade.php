<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-bold">Pesanan {{ $order->order_number }}</h2>
  </x-slot>

  <div class="py-8">
    <div class="mx-auto max-w-4xl space-y-6 px-4 sm:px-6 lg:px-8">
      <div class="tj-card p-6 text-sm">
        <p>Status: <span class="tj-chip">{{ $order->status }}</span></p>
        <p class="mt-2">Pembayaran:
          @if ($order->payment)
            {{ str_replace('_', ' ', $order->payment->method) }} &mdash; {{ $order->payment->status }}
          @else
            &mdash;
          @endif
        </p>
        @if ($order->address)
          <p class="tj-muted mt-1">Dikirim ke {{ $order->address->recipient }}, {{ $order->address->street }}, {{ $order->address->city }}</p>
        @endif
      </div>

      <div class="tj-card overflow-x-auto">
        <table class="tj-table min-w-full divide-y text-sm" style="--tw-divide-opacity: 1">
          <thead class="text-left">
            <tr><th class="px-4 py-3">Produk</th><th class="px-4 py-3">Harga</th><th class="px-4 py-3">Qty</th><th class="px-4 py-3 text-right">Subtotal</th></tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @foreach ($order->items as $item)
              <tr>
                <td class="px-4 py-3">{{ $item->product->name }}</td>
                <td class="px-4 py-3">Rp {{ number_format((float) $item->price, 0, ',', '.') }}</td>
                <td class="px-4 py-3">{{ $item->quantity }}</td>
                <td class="px-4 py-3 text-right">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr><td colspan="3" class="px-4 py-3 text-right font-semibold">Total</td><td class="tj-display px-4 py-3 text-right text-base font-bold">{{ $order->total_formatted }}</td></tr>
          </tfoot>
        </table>
      </div>

      <a href="{{ route('orders.index') }}" class="tj-link text-sm">&larr; Semua pesanan</a>
    </div>
  </div>
</x-app-layout>
