@php
    
    $colorClasses = match ($color) {
        'blue' => 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500',
        default => 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500',
    };

    $baseClasses = 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150';
@endphp
<button {{ $attributes->merge(['type' => 'submit', 'class' => $baseClasses . ' ' . $colorClasses]) }}>
    {{ $slot }}
</button>
</div>