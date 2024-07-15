<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased"">

    {{-- <div class=" relative w-full px-6 py-4 bg-white dark:bg-gray-800 border-b border-gray-100
    dark:border-gray-700">
    --}}
    <header class="bg-white dark:bg-gray-800 shadow ">
        <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex justify-between h-16">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <x-application-logo
                                class="inline-block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />

                            <span
                                class=" inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400">{{
                                __('AGRI PROJECT') }}</span>
                        </a>


                    </div>
                    <div class="flex">


                        {{-- @for ($i = 1; $i < 6; $i++) <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="url('/dashboard')" :active="request()->routeIs('home')"> {{
                                __('Navigation ' . $i) }}
                            </x-nav-link>
                    </div>
                    @endfor --}}


                    {{-- cart button --}}
                    {{-- <x-nav-link :href="route('login')" :active="request()->routeIs('home')"> --}}
                        <div
                            class="flex justify-end cursor-pointer text-sm font-medium leading-5 text-gray-900 dark:text-gray-400">
                            <div class="relative py-2">
                                <div class="left-3 absolute t-0">
                                    <p
                                        class="flex justify-center items-center  dark:bg-green-600 text-gray-900 dark:text-gray-200 p-3 rounded-full w-2 h-2 text-xs">
                                        3</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="file: mt-4 w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </div>
                        </div>
                        {{--
                    </x-nav-link> --}}{{-- end cart button --}}



                    {{-- <div class="flex w-full ">
                        <form class="max-w-md mx-auto">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search"
                                    class="p-3 -3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search Mockups, Logos..." required />
                                <button type="submit"
                                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                            </div>
                        </form>
                    </div> --}}

                    @if (Route::has('login'))
                    {{-- <nav class="flex justify-center flex-1 -mx-3 "> --}}
                        @auth
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="url('/home')" :active="request()->routeIs('home')"> {{
                                __('Dashboard') }}
                            </x-nav-link>
                        </div>
                        @else
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('login')" :active="request()->routeIs('home')">
                                {{ __('Log in') }}
                            </x-nav-link>
                        </div>

                        @if (Route::has('register'))
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('register')" :active="request()->routeIs('home')">
                                {{ __('Register') }}
                            </x-nav-link>
                        </div>
                        @endif
                        @endauth
                        @endif
                        {{--
                    </nav> --}}
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            @if (Route::has('login'))
            @guest
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('home')">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                </div>
            </div>
            @if (Route::has('register'))
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('home')">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            </div>
            @endif
            @endguest
            @endif
        </nav>

    </header>
    {{--
    </div> --}}
    <div
        class="min-h-screen w-full px-6 py-4  bg-gray-100 dark:bg-gray-900  text-gray-900 dark:text-gray-100 shadow-md overflow-hidden">
        {{ $slot }}
    </div>

</body>

</html>