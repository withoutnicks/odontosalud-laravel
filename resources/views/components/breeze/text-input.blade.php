@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-zinc-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 focus:border-denim-500 dark:focus:border-denim-600 focus:ring-denim-500 dark:focus:ring-denim-600 rounded-md shadow-sm']) !!}>
