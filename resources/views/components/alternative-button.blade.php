<button
	{{ $attributes->merge(['type' => 'button', 'class' => 'flex justify-between rounded-lg px-5 py-2.5 text-center text-sm font-medium hover:bg-opacity-80 focus:outline-none focus:ring-4 text-black dark:text-white']) }}>
	{{ $slot }}
</button>
