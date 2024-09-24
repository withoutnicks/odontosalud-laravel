<div class="mx-auto max-w-7xl overflow-hidden px-2 sm:rounded-lg sm:px-6 lg:px-8">
	<header class="flex items-center justify-between p-4">
		<h2 class="text-black dark:text-white">List to quotes</h2>
		<x-primary-button wire:click='toggleFormQuotes'>New Quote</x-primary-button>

	</header>

	<main class="my-2">
		@if (count($quotes) != 0)
			<div class="relative overflow-auto">
				<x-tables.tbl_main :$quotes />
			</div>
		@else
			<div
				class="mb-4 rounded-lg bg-blue-50 p-4 text-sm text-blue-800 dark:bg-zinc-800 dark:text-blue-400"
				role="alert">
				<span class="font-medium">Your appointments will appear here!</span>
			</div>
		@endif

		@if ($form_quotes)
			<x-modals.createOrUpdate :$quoteId :$reason :$date :$centralId />
		@endif
	</main>

</div>
