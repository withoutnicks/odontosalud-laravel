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
			<form class="p-4 md:p-5" wire:submit.prevent='saveQuote'>
				<div class="mb-4 grid grid-cols-2 gap-4">
					<div class="col-span-2">
						<label for="description"
							class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">Quote
							Description
							<textarea rows="4" wire:model='reason'
							 class="block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-900 focus:border-denim-500 focus:ring-denim-500 dark:border-zinc-500 dark:bg-zinc-600 dark:text-white dark:placeholder-zinc-400 dark:focus:border-denim-500 dark:focus:ring-denim-500"
							 placeholder="Write your query here"></textarea>
						</label>
						<div>
							@error('reason') <span class="text-red-500">{{ $message }}</span> @enderror 
						</div>
					</div>
					<div class="col-span-2 sm:col-span-1">
						<label for="price"
							class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">
							Date Quote
							<input type="date" min="{{ date('Y-m-d') }}" wire:model='date'
								class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-900 dark:border-zinc-500 dark:bg-zinc-600 dark:text-white dark:placeholder-zinc-400 dark:[color-scheme:dark]">
						</label>
						<div>
							@error('date') <span class="text-red-500">{{ $message }}</span> @enderror 
						</div>
					</div>
					<div class="col-span-2 sm:col-span-1">
						<label class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">
							Place Quote
							<select wire:model='centralId'
								class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-900 dark:border-zinc-500 dark:bg-zinc-600 dark:text-white dark:placeholder-zinc-400">
								<option selected="0">Select central</option>
								<option value="1">🏔️ Norte</option>
								<option value="2">⛱️ Sur</option>
								<option value="3">👑 Lima</option>
								<option value="4">🌿 Miraflores</option>
								<option value="5">🎭 Callao</option>
								<option value="6">💶 Cajamarca</option>
							</select>
						</label>
						<div>
							@error('centralId') <span class="text-red-500">{{ $message }}</span> @enderror 
						</div>
					</div>
				</div>

				<hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-600">

				<!-- Actions -->
				<div class="flex gap-4 justify-end">
					<x-alternative-button type="submit" class="w-1/2 bg-denim-300 dark:bg-denim-600">
						{{ $quoteId ? 'Update' : 'Create' }} quote
						<x-svg.arrow-right />
					</x-alternative-button>
				</div>
			</form>
		</div>
	</div>
</div>
