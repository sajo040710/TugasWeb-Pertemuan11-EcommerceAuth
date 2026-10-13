<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="text-2xl font-bold">
        {{ auth()->user()->isAdmin() ? 'Semua Produk' : 'Produk Saya' }}
      </h2>
      @can('create', App\Models\Product::class)
        <a href="{{ route('manage.products.create') }}"
           class="tj-btn">Tambah produk</a>
      @endcan
    </div>
  </x-slot>

  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <x-flash />

      <form method="GET" class="mb-4 flex gap-2">
        <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari nama produk…"
               class="tj-field w-64 text-sm shadow-sm" aria-label="Cari produk">
        <button class="tj-btn">Cari</button>
      </form>

      <div class="tj-card overflow-x-auto">
        <table class="tj-table min-w-full divide-y text-sm">
          <thead class="text-left">
            <tr>
              <th class="px-4 py-3 ">Produk</th>
              <th class="px-4 py-3 ">Kategori</th>
              <th class="px-4 py-3 ">Harga</th>
              <th class="px-4 py-3 ">Stok</th>
              <th class="px-4 py-3 ">Pemilik</th>
              <th class="px-4 py-3 ">Status</th>
              <th class="px-4 py-3"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @forelse ($products as $product)
              <tr>
                <td class="px-4 py-3 font-medium">{{ $product->name }}</td>
                <td class="px-4 py-3 tj-muted">{{ $product->category->name }}</td>
                <td class="px-4 py-3">{{ $product->price_formatted }}</td>
                <td class="px-4 py-3">{{ $product->stock }}</td>
                <td class="px-4 py-3 tj-muted">{{ $product->owner?->name ?? '—' }}</td>
                <td class="px-4 py-3">{{ $product->is_active ? 'Tampil' : 'Disembunyikan' }}</td>
                <td class="whitespace-nowrap px-4 py-3 text-right">
                  {{-- Tombol hanya muncul jika ProductPolicy mengizinkan --}}
                  @can('update', $product)
                    <a href="{{ route('manage.products.edit', $product) }}" class="tj-link">Edit</a>
                  @endcan
                  @can('delete', $product)
                    <form method="POST" action="{{ route('manage.products.destroy', $product) }}" class="ms-3 inline"
                          onsubmit="return confirm('Hapus produk ini?')">
                      @csrf
                      @method('DELETE')
                      <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                  @endcan
                </td>
              </tr>
            @empty
              <tr><td colspan="7" class="px-4 py-10 text-center tj-muted">Belum ada produk.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-6">{{ $products->links() }}</div>
    </div>
  </div>
</x-app-layout>
