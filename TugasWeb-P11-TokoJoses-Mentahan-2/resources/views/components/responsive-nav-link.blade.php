@props(['active'])
@php
  $classes = ($active ?? false)
    ? 'block w-full border-l-4 border-[#F07F1F] bg-[#F1E6CB] py-2 ps-3 pe-4 text-start text-base font-semibold text-[#143A36]'
    : 'block w-full border-l-4 border-transparent py-2 ps-3 pe-4 text-start text-base font-medium text-[#5B716D] hover:bg-[#F1E6CB] hover:text-[#143A36]';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
