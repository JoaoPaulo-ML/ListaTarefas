<div>
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'text-sm font-medium text-gray-400 hover:text-white mr-4']) }}>
        {{ $slot }}
    </a>
</div>
