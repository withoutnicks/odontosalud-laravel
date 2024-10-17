<div class="mx-auto max-w-7xl overflow-hidden px-2 sm:rounded-lg sm:px-6 lg:px-8">

	@if (auth()->user()->permissions)
		<x-search-input :$searches :$selectedUserId />
	@endif

	<main class="my-2">
		<header class="flex items-center justify-between py-4 px-1">
			<h2 class="text-black dark:text-white">List to quotes</h2>
			<x-primary-button wire:click='toggleFormQuotes'>New Quote</x-primary-button>
		</header>
		
		@if ($quotes && count($quotes) > 0)
			<div class="relative overflow-auto">
				<x-tables.tbl_main :$quotes />
			</div>
		@else
			<div class="rounded-lg bg-blue-50 p-4 text-sm text-blue-800 dark:bg-zinc-800 dark:text-blue-400 my-4">
				@if (auth()->user()->permissions)
				  <span class="font-medium">🚀 - Search quotes for view</span>
				@else
					<span class="font-medium">🛠️ - Your appointments will appear here!</span>
				@endif
			</div>
		@endif

		@if ($form_quotes)
			<x-modals.createOrUpdate :$quoteId :$reason :$date :$centralId />
		@endif
	</main>

</div>
