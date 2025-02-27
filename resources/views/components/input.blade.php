@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-white text-black border-gray-300 focus:border-indigo-300 focus:ring-3 focus:ring-indigo-200 focus:ring-indigo-200/5 rounded-md shadow-xs']) !!}>
