@php($editing = isset($product))

<div class="grid gap-5 sm:grid-cols-2">
  <div class="sm:col-span-2">
    <x-input-label for="name" value="Nama produk" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name ?? '')" required />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
  </div>

  <div>
    <x-input-label for="category_id" value="Kategori" />
    <select id="category_id" name="category_id" class="tj-field mt-1 block w-full text-sm shadow-sm" required>
      <option value="">Pilih kategori</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? null) == $category->id)>{{ $category->name }}</option>
      @endforeach
    </select>
    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
  </div>

  <div>
    <x-input-label for="price" value="Harga (Rp)" />
    <x-text-input id="price" name="price" type="number" step="1" min="0" class="mt-1 block w-full" :value="old('price', isset($product) ? (int) $product->price : '')" required />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
  </div>

  <div>
    <x-input-label for="stock" value="Stok" />
    <x-text-input id="stock" name="stock" type="number" min="0" class="mt-1 block w-full" :value="old('stock', $product->stock ?? 0)" required />
    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
  </div>

  <div class="flex items-end">
    <label class="inline-flex items-center gap-2 text-sm">
      {{-- hidden input memastikan nilai 0 terkirim saat checkbox tidak dicentang --}}
      <input type="hidden" name="is_active" value="0">
      <input type="checkbox" name="is_active" value="1" class="rounded border-gray-300"
             @checked(old('is_active', $product->is_active ?? true))>
      Tampilkan di katalog
    </label>
  </div>

  <div class="sm:col-span-2">
    <x-input-label for="description" value="Deskripsi" />
    <textarea id="description" name="description" rows="4" class="tj-field mt-1 block w-full text-sm shadow-sm">{{ old('description', $product->description ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
  </div>
</div>

<div class="mt-6 flex items-center gap-3">
  <x-primary-button>{{ $editing ? 'Simpan perubahan' : 'Tambah produk' }}</x-primary-button>
  <a href="{{ route('manage.products.index') }}" class="tj-link text-sm">Batal</a>
</div>
