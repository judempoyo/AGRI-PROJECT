@props(['disabled' => false])

<textarea{{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block p-2.5 w-full text-sm rounded-lg
    border border-gray-300
    dark:border-gray-700 dark:placeholder-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
    dark:focus:border-indigo-600
    focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!} >{{ $slot }}</textarea>