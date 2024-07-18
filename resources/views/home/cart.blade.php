<x-app-layout>


    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        @if(session()->has('cart'))
        @if(!empty(session('cart')))

        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ __('Shopping Cart') }}</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                @php
                $total = 0
                @endphp

                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">

                    <div class="space-y-6">
                        @foreach(session('cart') as $key => $value)
                        @php
                        $total += $value['unitPrice'] * $value['quantity'];
                        @endphp
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-2 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-3">
                            <div class="space-y-2 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">

                                <div class="flex items-center justify-between md:order-3 md:justify-end">

                                    <div class="text-end md:order-4 md:w-32">
                                        <p class="text-base font-bold text-gray-900 dark:text-white">{{
                                            $value['quantity'] }}</p>
                                    </div>
                                    <div class="text-end md:order-4 md:w-32">
                                        <p class="text-base font-bold text-gray-900 dark:text-white">{{
                                            $value['unitPrice'].' CDF' }}</p>
                                    </div>
                                    <div class="text-end md:order-4 md:w-32">
                                        <p class="text-base font-bold text-gray-900 dark:text-white">{{
                                            $value['unitPrice'] * $value['quantity'] .' CDF' }}</p>
                                    </div>
                                </div>

                                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                    <a href="{{ URL::to('/show_product/'.$value['id']) }}"
                                        class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{
                                        $value['name'] }}</a>

                                    <div class="flex items-center gap-4">


                                        <a href="{{ URL::to('/cart/remove/'.$value['id']) }}"
                                            class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                            {{ __('Remove') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    </div>
                </div>

                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">{{__('Order summary')}}</p>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{__('Total')}}
                                    </dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">{{$total.' CDF'}}
                                    </dd>
                                </dl>
                                @php
                                $tax = $total * 0.05;
                                $totalTTC = $total * 1.05
                                @endphp
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{__('Tax')}}
                                    </dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">{{$tax .' CDF'}}
                                    </dd>
                                </dl>
                            </div>

                            <dl
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">{{ __('Total') }}</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">{{$totalTTC.' CDF'}}</dd>
                            </dl>
                        </div>

                        <a href="{{route('checkout')}}"
                            class="flex w-full items-center justify-center rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{__('Proceed
                            to Checkout')}}</a>

                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                            <a href="{{ route('home') }}" title=""
                                class="inline-flex items-center gap-2 text-sm font-medium text-green-700 underline hover:no-underline dark:text-green-500">
                                {{ __('Continue Shopping') }}
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @else
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ __('you dont have anything in
                your cart') }}</h2>
            <div class="my-4">
                <x-create-button href="{{route('home')}}">
                    {{ __('Go to home') }}
                </x-create-button>
            </div>
        </div>
        @endif
        @endif
    </section>
</x-app-layout>