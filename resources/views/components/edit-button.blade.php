<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 text-yellow-400 hover:text-white border
    border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg
    text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white
    dark:hover:bg-yellow-400 dark:focus:ring-yellow-900 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>