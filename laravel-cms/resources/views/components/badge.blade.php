@props(['textColor', 'bgColor'])

@php
$textColor = match ($textColor) {
'blue' => 'text-blue-700',
'red' => 'text-red-700',
'orange' => 'text-orange-700',
'yellow' => 'text-yellow-700',
default => 'text-gray-800',
};

$bgColor = match ($bgColor) {
'blue' => 'bg-blue-100',
'red' => 'bg-red-100',
'orange' => 'bg-orange-100',
'yellow' => 'bg-yellow-100',
default => 'bg-gray-100',
};
@endphp

<button {{ $attributes }} class="{{ $textColor }} {{ $bgColor }} p-2 rounded">
    {{ $slot }}
</button>