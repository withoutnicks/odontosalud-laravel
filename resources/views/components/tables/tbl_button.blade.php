<button {{ $attributes->merge(['type'=>'button', 'class'=> 'focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2 hover:bg-opacity-90 w-full sm:w-auto'])}}>{{ $slot }}</button>