@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => '
        w-full 
        bg-gray-800         
        border-transparent 
        focus:border-blue-500 
        focus:ring-blue-500
        rounded-md 
        shadow-sm
        text-gray-300
        placeholder-gray-500
    '
]) !!}>