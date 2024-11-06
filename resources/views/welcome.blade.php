<x-app-layout>
    {{-- <img src="{{asset('storage/images/bg.jpg')}}" alt=""> --}}
    @auth
    <div class="py-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @role('admin')
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __( Auth::user()->name . " Vous etes connecté!") }}

                </div>
            </div>
            @else
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __(Auth::user()->name . " Vous etes connecté!") }}

                </div>
            </div>
            {{-- <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="" srcset=""> --}}
            @endrole

        </div>
    </div>
    @endauth



    @if(isset($deposit))
    <div class="mb-3 mx-3">
        <x-create-button href="{{route('show_deposits')}}">{{__('Back')}}</x-create-button>
    </div>
    <div class="mb-4 mx-2 grid gap-4 sm:grid-cols-1 md:mb-4 lg:grid-cols-1 xl:grid-cols-1">

        <div class="rounded-lg border border-gray-100 p-6 shadow-sm dark:border-gray-700 ">
            <div class="pt-1">
                <P class="text-lg font-semibold leading-tight text-gray-900 dark:text-white">
                    {{$deposit->name}}
                </P>
                <P class="text-sm font-semibold leading-tight text-gray-900 dark:text-white">
                    {{$deposit->adress.' / '.$deposit->country}}
                </P>
                <P class="text-sm font-semibold leading-tight text-gray-900 dark:text-white">
                    {{$deposit->area.' m'}}<sup>2</sup>
                </P>
                <P class="text-sm font-semibold leading-tight text-gray-900 dark:text-white">
                    {{$deposit->description}}
                </P>

            </div>
        </div>


    </div>
    @endif
    <section class="bg-gray-50 py-4 antialiased dark:bg-gray-900 md:py-6">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($products as $product)
                <div
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="h-56 w-full">
                        @foreach ($images as $image )
                        @if ($image->product_id == $product->id)

                        <a href="{{ URL::to('/product.show/'.$product->id) }}">
                            <img class="mx-auto h-full dark:hidden"
                                src="{{asset('storage/images/uploads/products/'.$image->image )}}"
                                alt="{{ $image->image }}" />
                            <img class="mx-auto hidden h-full dark:block"
                                src="{{asset('storage/images/uploads/products/'.$image->image )}}"
                                alt="{{ $image->image }}" />

                        </a>
                        @break
                        @endif
                        @endforeach
                    </div>


                    <div class="pt-6">
                        <div class="mb-4 flex items-center justify-between gap-4">

                            <div class="flex items-center justify-end gap-1">
                                <button type="button" data-tooltip-target="tooltip-quick-look"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only"> Quick look </span>
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                                <div id="tooltip-quick-look" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                    data-popper-placement="top">
                                    Quick look
                                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                                </div>

                                <button type="button" data-tooltip-target="tooltip-add-to-favorites"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only"> Add to Favorites </span>
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                                    </svg>
                                </button>
                                <div id="tooltip-add-to-favorites" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                    data-popper-placement="top">
                                    Add to favorites
                                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                                </div>
                            </div>
                        </div>



                        <a href="{{ URL::to('/product.show/'.$product->id) }}"
                            class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{$product->name}}
                            @foreach ($sellUnits as $sellUnit )
                            @if ($sellUnit->id == $product->sell_unit_id)
                            {{ '['.$sellUnit->name.']' }}
                            @break
                            @endif
                            @endforeach
                        </a>




                        <ul class="mt-2 flex items-center gap-4">
                            <li class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                </svg>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    @foreach ($categories as $categorie )
                                    @if ($categorie->id == $product->categorie_id)
                                    {{ $categorie->name }}
                                    @break
                                    @endif
                                    @endforeach
                                </p>
                            </li>

                            <li class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    @foreach ($deposits as $deposit )
                                    @if ($deposit->id == $product->deposit_id)
                                    {{ $deposit->name }}
                                    @break
                                    @endif
                                    @endforeach
                                </p>
                            </li>
                        </ul>
                        @if($product->Quantity)
                        <div class="mt-4 flex items-center justify-between gap-4">
                            <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white"> {{
                                $product->price
                                }}CDF</p>


                        </div>
                        <div class="mt-3">

                            <form method="post" action="{{route('cart.add',$product)}}">

                                @csrf
                                <x-checkout-button class="">
                                    <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
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
                        <div class="mt-4 flex items-center justify-between gap-4">
                            <p
                                class="text-5xl center uppercase  font-extrabold leading-tight text-red-900 dark:text-red">
                                {{__('tock epuisé')}}</p>



                        </div>

                        @endif


                    </div>
                </div>
                @endforeach



            </div>
            <div>
                {{ $products }}
            </div>
            {{-- <div class="w-full text-center">
                <button type="button"
                    class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">{{
                    __('Show
                    more') }}</button>
            </div> --}}
        </div>

    </section>


    {{-- @for ($i = 1; $i < 6; $i++) <div class="row justify-content-center align-items-center g-2">
        <img src="{{asset('storage/images/bg.jpg')}}" class="m-5 rounded-full" width="200" alt="{{ __('') }}">
        </div>


        @endfor --}}

        <section class="bg-gray-50 dark:bg-gray-900 py-8 md:py-16 antialiased">
            <div class="mx-auto px-4 2xl:px-0 max-w-screen-xl">
                <div class="flex justify-between items-center gap-4 mb-4 md:mb-8">
                    <h2 class="font-semibold text-gray-900 text-xl sm:text-2xl dark:text-white">{{ __('Produit par
                        catégorie') }}</h2>


                </div>

                <div class="gap-4 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                    <a href="{{ URL::to('/') }}"
                        class="flex items-center border-gray-200 dark:border-gray-700 bg-white hover:bg-gray-50 dark:hover:bg-gray-700 dark:bg-gray-800 px-4 py-2 border rounded-lg">
                        <svg class="w-4 h-4 text-gray-900 dark:text-white me-2 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z">
                            </path>
                        </svg>
                        <span class="font-medium text-gray-900 text-sm dark:text-white">{{ __('Tout')}}</span>
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ URL::to('/product.category/'.$category->id) }}"
                        class="flex items-center border-gray-200 dark:border-gray-700 bg-white hover:bg-gray-50 dark:hover:bg-gray-700 dark:bg-gray-800 px-4 py-2 border rounded-lg">
                        <svg class="w-4 h-4 text-gray-900 dark:text-white me-2 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z">
                            </path>
                        </svg>
                        <span class="font-medium text-gray-900 text-sm dark:text-white">{{ $category->name}}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>

</x-app-layout>