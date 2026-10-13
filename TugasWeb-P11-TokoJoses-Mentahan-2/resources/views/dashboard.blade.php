<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-bold">Dashboard</h2>
  </x-slot>

  <div class="py-8">
    <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
      <x-flash />

      <div class="tj-card p-6">
        <p>Halo, <strong>{{ auth()->user()->name }}</strong>. Anda masuk sebagai
          <span class="tj-chip">{{ auth()->user()->role }}</span></p>

        <p class="tj-muted mt-2 text-sm">
          @if (auth()->user()->isAdmin())
            Admin dapat mengelola semua produk dan mengatur role pengguna.
          @elseif (auth()->user()->isEditor())
            Editor dapat menambah produk dan hanya mengubah atau menghapus produk miliknya sendiri.
          @else
            Anda dapat menelusuri katalog dan melihat riwayat pesanan.
          @endif
        </p>
      </div>

      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($stats as $label => $value)
          <div class="tj-card p-5">
            <p class="tj-muted text-sm">{{ $label }}</p>
            <p class="tj-display mt-1 text-3xl font-bold">{{ $value }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
