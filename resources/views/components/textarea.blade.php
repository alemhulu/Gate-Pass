@php
$name = $attributes->get('name');
$value = old($name) ?? '';
@endphp
<textarea @error($name) {!!
  $attributes->merge(['class' =>'shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-red-300 rounded-md bg-red-50/50'])  !!}
@enderror
{!!  
  $attributes->merge(['class' => 'shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md']) !!}>{{ $value }} {{ $slot }}</textarea>
{{-- <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p> --}}