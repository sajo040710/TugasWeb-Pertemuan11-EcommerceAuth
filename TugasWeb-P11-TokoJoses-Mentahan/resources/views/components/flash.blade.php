{{-- Pesan flash sukses / gagal. Dipakai di semua halaman. --}}
@if (session('success'))
  <div role="alert" class="mb-6 rounded-2xl border px-4 py-3 text-sm font-medium" style="border-color: #9CCFC7; background: var(--tj-teal-soft); color: var(--tj-teal-dark)">
    {{ session('success') }}
  </div>
@endif
@if (session('error'))
  <div role="alert" class="mb-6 rounded-2xl border border-red-300 bg-red-50 px-4 py-3 text-sm font-medium text-red-800">
    {{ session('error') }}
  </div>
@endif
