@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#009944] focus:ring-[#009944] rounded-md shadow-sm']) }}>
