@props([
  'title',
  'number',
  'icon'
])

<div
	class="w-full max-w-sm rounded-lg border border-zinc-200 bg-white p-4 shadow dark:border-zinc-700 dark:bg-zinc-800 sm:p-8">
	<h5 class="mb-4 text-xl font-medium text-zinc-500 dark:text-zinc-400">{{ $title }}</h5>
	<div class="flex items-baseline justify-between">
		<span class="text-5xl font-extrabold tracking-tight text-zinc-900 dark:text-white">{{ $number }}</span>
    <span class="text-zinc-500 dark:text-zinc-400">{{ $slot }}</span>
	</div>
  
</div>
