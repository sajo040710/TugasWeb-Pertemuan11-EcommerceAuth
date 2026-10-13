@props(['active'])
@php
  $classes = ($active ?? false)
    ? 'inline-flex items-center border-b-[3px] border-[#F07F1F] px-1 pt-1 text-sm font-semibold text-[#143A36]'
    : 'inline-flex items-center border-b-[3px] border-transparent px-1 pt-1 text-sm font-medium text-[#5B716D] hover:text-[#143A36]';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
