<div
	class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50">
	<div class="relative max-h-full w-full max-w-md p-4">
		<!-- Modal content -->
		<div class="relative rounded-lg bg-white shadow dark:bg-zinc-700">
			<!-- Modal header -->
			<div class="flex items-center justify-between rounded-t border-b p-4 dark:border-zinc-600 md:p-5">
				<h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
					Create New Quote
				</h3>
				<button type="button"
					class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-600 dark:hover:text-white"
					wire:click='toggleFormQuotes'>
					<x-svg.close />
					<span class="sr-only">Close modal</span>
				</button>
			</div>
			<!-- Modal body -->
			<form class="p-4 md:p-5">
				<div class="mb-4 grid grid-cols-2 gap-4">
					<div class="col-span-2">
						<label for="description"
							class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">Quote
							Description</label>
						<textarea id="description" rows="4"
						 class="block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-900 focus:border-denim-500 focus:ring-denim-500 dark:border-zinc-500 dark:bg-zinc-600 dark:text-white dark:placeholder-zinc-400 dark:focus:border-denim-500 dark:focus:ring-denim-500"
						 placeholder="Write your query here"></textarea>
					</div>
					<div class="col-span-2 sm:col-span-1">
						<label for="price"
							class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">Date Quote</label>
						<input type="date" name="price" id="price"
							class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-900 dark:border-zinc-500 dark:bg-zinc-600 dark:text-white dark:placeholder-zinc-400"
							placeholder="$2999" required="">
					</div>
					<div class="col-span-2 sm:col-span-1">
						<label for="category"
							class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">Place Quote</label>
						<select id="category"
							class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-900 dark:border-zinc-500 dark:bg-zinc-600 dark:text-white dark:placeholder-zinc-400">
							<option selected="">Select central</option>
							<option value="c-norte">🏔️ Norte</option>
							<option value="c-sur">⛱️ Sur</option>
							<option value="c-lima">👑 Lima</option>
							<option value="c-miraflores">🌿 Miraflores</option>
							<option value="c-callao">🎭 Callao</option>
							<option value="c-cajamarca">💶 Cajamarca</option>
						</select>
					</div>
				</div>
				<!-- Actions -->
				<div class="flex gap-4">
					<x-alternative-button class="w-1/2 bg-denim-300 dark:bg-denim-600">
						Send quote
						<x-svg.arrow-right />
					</x-alternative-button>
					<x-alternative-button class="w-1/2 bg-zinc-300 dark:bg-zinc-800">
						Cancel
						<x-svg.close />
					</x-alternative-button>
				</div>
			</form>
		</div>
	</div>
</div>
