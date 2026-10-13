<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-bold">Edit Produk</h2>
  </x-slot>

  <div class="py-8">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
      <form method="POST" action="{{ route('manage.products.update', $product) }}" class="tj-card p-6">
        @csrf
        @method('PUT')
        @include('manage.products._form')
      </form>
    </div>
  </div>
</x-app-layout>
