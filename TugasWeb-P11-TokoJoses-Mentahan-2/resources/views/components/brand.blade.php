@props(['href' => '/', 'dark' => false])
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center gap-2.5']) }} aria-label="Toko Joses">
  <x-application-logo class="h-8 w-8" />
  <span class="tj-display text-lg font-extrabold leading-none" style="color: {{ $dark ? '#FAF3E3' : 'var(--tj-teal-dark)' }}">Toko Joses</span>
</a>
