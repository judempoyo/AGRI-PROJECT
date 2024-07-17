<nav class="bg-white dark:bg-gray-800 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-8">
                <div class="shrink-0">
                    <a href="{{ route('home') }}">
                        <x-application-logo
                            class="inline-block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />

                        <span
                            class=" inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400">{{
                            __('AGRI PROJECT') }}</span>
                    </a>
                </div>

                <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center">
                    <li>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-nav-link>
                        </div>
                    </li>
                    @role('customer')
                    <li class="shrink-0">
                        <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                            <x-nav-link :href="url('/home')" :active="request()->routeIs('becomeGrower')"> {{
                                __('Become a
                                grower') }}
                            </x-nav-link>
                        </div>
                    </li>
                    @endrole
                    @role('grower')
                    <li class="shrink-0">
                        <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                            <x-nav-link :href="route('products.create')"
                                :active="request()->routeIs('products.create')"> {{
                                __('Add
                                a product')
                                }}
                            </x-nav-link>
                        </div>
                    </li>
                    <li class="shrink-0">
                        <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                            <x-nav-link :href="url('deposits')" :active="request()->routeIs('deposits.index')"> {{
                                __('My
                                Space')
                                }}
                            </x-nav-link>
                        </div>
                    <li class="shrink-0">
                        <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                            <x-nav-link :href="url('products')" :active="request()->routeIs('products.index')"> {{
                                __('My
                                Products')
                                }}
                            </x-nav-link>
                        </div>
                    </li>

                    @endrole
                    <li class="shrink-0">
                        <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                            <x-nav-link :href="url('/show_deposits')" :active="request()->routeIs('show_deposits')"> {{ __('Deposits')
                                }}
                            </x-nav-link>
                        </div>
                    </li>

                    <li class="shrink-0">
                        <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                            <x-nav-link :href="url('/home')" :active="request()->routeIs('grower')"> {{ __('Grower
                                space')
                                }}
                            </x-nav-link>
                        </div>
                    </li>

                    <li class="shrink-0">
                        <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                            <x-nav-link :href="url('/')" :active="request()->routeIs('grower')"> {{ __('Today\'s Deals')
                                }}
                            </x-nav-link>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="flex items-center lg:space-x-2">

                <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                    class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    <span class="sr-only">
                        Cart
                    </span>
                    <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <span class="hidden sm:flex">My Cart</span>
                    <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>

                <div id="myCartDropdown1"
                    class="hidden z-10 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">


                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                iPhone 15</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$599</p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                            <button data-tooltip-target="tooltipRemoveItem1a" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem1a" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                iPad Air</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$499</p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                            <button data-tooltip-target="tooltipRemoveItem2a" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem2a" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                Watch SE</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$598</p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 2</p>

                            <button data-tooltip-target="tooltipRemoveItem3b" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem3b" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Sony
                                Playstation 5</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$799</p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                            <button data-tooltip-target="tooltipRemoveItem4b" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem4b" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                iMac 20"</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$8,997</p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 3</p>

                            <button data-tooltip-target="tooltipRemoveItem5b" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem5b" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('show_cart')}}" title=""
                        class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        role="button"> Proceed to Checkout </a>
                </div>

                @if (Route::has('login'))
                {{-- <nav class="flex justify-center flex-1 -mx-3 "> --}}
                    @auth
                    <button id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button"
                        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                        <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="userDropdown1"
                        class="hidden z-10 w-56 divide-y divide-gray-100 overflow-hidden overflow-y-auto rounded-lg bg-white antialiased shadow dark:divide-gray-600 dark:bg-gray-700">
                        <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                            <li>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            </li>
                            <li>
                                <x-dropdown-link :href="route('orders.index')">
                                    {{ __('My orders') }}
                                </x-dropdown-link>
                            </li>
                            <li>
                                <x-dropdown-link :href="route('home')">
                                    {{ __('Settings') }}
                                </x-dropdown-link>
                            </li>
                            <li>
                                <x-dropdown-link :href="route('home')">
                                    {{ __('Delivery Adresses') }}
                                </x-dropdown-link>
                            </li>
                        </ul>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                    @else
                    <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Log in') }}
                        </x-nav-link>
                    </div>

                    @if (Route::has('register'))
                    <div class="hidden sm:-my-px sm:ms-2 sm:flex">
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    </div>
                    @endif
                    @endauth
                    @endif



                    <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1"
                        aria-controls="ecommerce-navbar-menu-1" aria-expanded="false"
                        class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md dark:hover:bg-gray-700 p-2 text-gray-900 dark:text-white">
                        <span class="sr-only">
                            Open Menu
                        </span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M5 7h14M5 12h14M5 17h14" />
                        </svg>
                    </button>
            </div>
        </div>

        <div id="ecommerce-navbar-menu-1"
            class="bg-gray-50 dark:bg-gray-700 dark:border-gray-600 border border-gray-200 rounded-lg py-3 hidden px-4 mt-4">
            <ul class="text-gray-900 dark:text-white text-sm font-mediumspace-y-3">
                <li>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-responsive-nav-link>
                    </div>
                </li>
                @role('customer')
                <li>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('becomeGrower')">
                            {{ __('Become Grower') }}
                        </x-responsive-nav-link>
                    </div>
                </li>
                @endrole
                @role('grower')
                <li>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('products.create')"
                            :active="request()->routeIs('products.create')">
                            {{ __('Add product') }}
                        </x-responsive-nav-link>
                    </div>
                </li>
                <li>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('deposits.index')"
                            :active="request()->routeIs('deposits.index')">
                            {{ __('My space') }}
                        </x-responsive-nav-link>
                    </div>
                </li>
                <li>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('deposits.index')"
                            :active="request()->routeIs('deposits.index')">
                            {{ __('My Products') }}
                        </x-responsive-nav-link>
                    </div>
                </li>
                @endrole
                <li>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('show_deposits')" :active="request()->routeIs('show_deposits')">
                            {{ __('Deposits') }}
                        </x-responsive-nav-link>
                    </div>
                </li>
                <li>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('becomeGrower')">
                            {{ __('Grower space') }}
                        </x-responsive-nav-link>
                    </div>
                </li>
                <li>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('becomeGrower')">
                            {{ __('Today\'s Deals') }}
                        </x-responsive-nav-link>
                    </div>
                </li>


            </ul>
        </div>
    </div>
</nav>