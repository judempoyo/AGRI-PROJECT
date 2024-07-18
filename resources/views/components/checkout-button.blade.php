<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-lg bg-green-700 px-5
    py-2.5 text-sm font-medium text-white dark:text-white hover:bg-green-800 focus:outline-none focus:ring-4
    focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mx-1']) }}>
    {{ $slot }}
</button>