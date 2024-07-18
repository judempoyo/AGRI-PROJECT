<x-app-layout>

    <section class="bg-white dark:bg-gray-900 py-8 md:py-16 antialiased">
        <div class="mx-auto px-4 2xl:px-0 max-w-screen-xl">
            <div class="lg:gap-8 xl:gap-16 lg:grid lg:grid-cols-2">
                <div class="mx-auto max-w-md lg:max-w-lg shrink-0">
                    @foreach ($images as $image )
                    @if ($image->product_id == $product->id)
                    <img class="dark:hidden w-full" src="{{asset('storage/images/uploads/products/'.$image->image )}}"
                        alt="{{ $image->image }}" />
                    <img class="dark:block hidden w-full"
                        src="{{asset('storage/images/uploads/products/'.$image->image )}}" alt="{{ $image->image }}" />
                    @break
                    @endif
                    @endforeach
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="font-semibold text-gray-900 text-xl sm:text-2xl dark:text-white">
                        {{$product->name}}
                    </h1>
                    <div class="sm:flex sm:items-center sm:gap-4 mt-4">
                        <p class="font-extrabold text-2xl text-gray-900 sm:text-3xl dark:text-white">
                            {{
                            $product->price
                            }}CDF
                        </p>


                    </div>
                    @if($product->Quantity)

                    <div class="sm:flex sm:items-center sm:gap-4 mt-6 sm:mt-8">
                        <a href="#" title=""
                            class="focus:z-10 flex justify-center items-center border-gray-200 dark:border-gray-600 bg-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:bg-gray-800 px-5 py-2.5 border rounded-lg font-medium text-gray-900 text-sm focus:outline-none hover:text-green-700 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:hover:text-white dark:text-gray-400"
                            role="button">
                            <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                            </svg>
                            {{ __('Add to favorites') }}
                        </a>

                        <form method="post" action="{{route('cart.add',$product)}}">

                            @csrf
                            <x-checkout-button class="">
                                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                </svg>
                                {{ __('Add to cart') }}
                            </x-checkout-button>
                            <div class="inline-flex items-center">
                                <button type="button" id="decrement-button"
                                    data-input-counter-decrement="counter-input-{{ $product->name }}"
                                    class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <x-number-input id="counter-input-{{ $product->name }}" data-input-counter
                                    data-input-counter-min="1" data-input-counter-max="{{$product->Quantity}}"
                                    name="quantity" value="1" class="max-w-[2.5rem]" required />

                                <button type="button" id="increment-button"
                                    data-input-counter-increment="counter-input-{{ $product->name }}"
                                    class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </form>

                    </div>
                    @else
                    <p class="text-5xl center uppercase  font-extrabold leading-tight text-red-900 dark:text-red">
                        {{__('Sold out')}}</p>
                    @endif

                    <hr class="border-gray-200 dark:border-gray-800 my-6 md:my-8" />

                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        {{ $product->description }}
                    </p>

                </div>
            </div>
        </div>
    </section>




</x-app-layout>