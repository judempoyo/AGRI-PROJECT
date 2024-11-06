<x-app-layout>

    <section class="bg-white dark:bg-gray-900 py-4 md:py-4 antialiased">

        <form method="post" action="{{ route('orders.store') }}" class="mx-auto px-4 2xl:px-0 max-w-screen-xl">
            @csrf

            @php
            $total = 0
            @endphp
            @foreach(session('cart') as $key => $value)
            @php
            $total += $value['unitPrice'] * $value['quantity'];
            @endphp
            @endforeach
            @php
            $tax = $total * 0.05;
            $totalTTC = $total * 1.05
            @endphp

            <input type="hidden" name="total" value="{{ $totalTTC }}">
            <div class="lg:flex lg:items-start lg:gap-12 xl:gap-16 mt-4 sm:mt-4">
                <div class="flex-1 space-y-8 min-w-0">
                    <div class="space-y-4">
                        <h2 class="font-semibold text-gray-900 text-xl dark:text-white">{{__('Détails de la
                            livraison')}}</h2>

                        <div class="gap-4 grid grid-cols-1 sm:grid-cols-2">
                            <div>
                                <label for="your_name"
                                    class="block mb-2 font-medium text-gray-900 text-sm dark:text-white"> {{__('Votre
                                    nom')}}
                                </label>
                                <input type="text" id="your_name" name="name"
                                    class="block border-gray-300 focus:border-green-500 dark:focus:border-green-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-green-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-green-500"
                                    placeholder="Jude Mpoyo" value="{{ old('name') }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <label for="your_email"
                                    class="block mb-2 font-medium text-gray-900 text-sm dark:text-white"> {{ __('Votre
                                    email') }}*
                                </label>
                                <input type="email" id="your_email" name="email"
                                    class="block border-gray-300 focus:border-green-500 dark:focus:border-green-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-green-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-green-500"
                                    placeholder="jude@gmail.com" value="{{ old('email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <label for="phone-input-3"
                                    class="block mb-2 font-medium text-gray-900 text-sm dark:text-white"> Numéro de
                                    telephone*
                                </label>
                                <div class="flex items-center">

                                    <div class="relative w-full">
                                        <input type="text" id="phone-input" name="phone"
                                            class="block z-20 border-gray-300 border-s-0 focus:border-green-500 dark:focus:border-green-500 dark:border-gray-600 dark:border-s-gray-700 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-e-lg w-full text-gray-900 text-sm focus:ring-green-500 dark:text-white dark:placeholder:text-gray-400"
                                            pattern="[0-9]{10}" placeholder="0975889135" value="{{ old('phone') }}" />
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <form method="post" action="{{ route('adresses.store') }}" id="saveAdress">


                                <div>
                                    <label for="delivery_adress"
                                        class="block mb-2 font-medium text-gray-900 text-sm dark:text-white">
                                        {{__('Adresse')}}* </label>
                                    <input type="text" id="delivery_adress" name="delivery_adress"
                                        class="block border-gray-300 focus:border-green-500 dark:focus:border-green-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-green-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-green-500"
                                        placeholder="Av rashidi N°20/Q. Kasapa/C. Annexe"
                                        value="{{ old('delivery_adress') }}" />
                                    <x-input-error :messages="$errors->get('delivery_adress')" class="mt-2" />
                                </div>

                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <label for="select-state-input-3"
                                            class="block font-medium text-gray-900 text-sm dark:text-white">
                                            {{__('province')}}* </label>
                                    </div>
                                    <select id="select-state-input-3" name="state"
                                        class="block border-gray-300 focus:border-green-500 dark:focus:border-green-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-green-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-green-500">
                                        <option selected value="Haut-katanga">Haut-katanga</option>
                                        <option value="Lualaba">Lualaba</option>
                                        <option value="haut-lomami">Haut-lomami</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                </div>

                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <label for="select-city-input-3"
                                            class="block font-medium text-gray-900 text-sm dark:text-white">
                                            {{__('Ville')}}*
                                        </label>
                                    </div>
                                    <select id="select-city-input-3" name="city"
                                        class="block border-gray-300 focus:border-green-500 dark:focus:border-green-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-green-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-green-500">
                                        <option selected value="Lubumbashi">Lubumbashi</option>
                                        <option value="Kolwezi">Kolwezi</option>
                                        <option value="Likasi">Likasi</option>
                                        <option value="kamina">kamina</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                </div>





                                {{-- <div class="sm:col-span-2">
                                    <button type="submit"
                                        class="focus:z-10 flex justify-center items-center gap-2 border-gray-200 dark:border-gray-600 bg-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:bg-gray-800 px-5 py-2.5 border rounded-lg w-full font-medium text-gray-900 text-sm hover:text-green-700 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:hover:text-white dark:text-gray-400 dark:focus:ring-gray-700">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14m-7 7V5" />
                                        </svg>
                                        {{__('Save address')}}
                                    </button>
                                </div> --}}
                            </form>

                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-semibold text-gray-900 text-xl dark:text-white">{{__('Paiement')}}</h3>

                        <div class="gap-4 grid grid-cols-1 md:grid-cols-3">

                            <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio"
                                            name="payment_method" value="pay on delivery" checked
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-green-600 focus:ring-2 focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-green-600" />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="pay-on-delivery"
                                            class="font-medium text-gray-900 dark:text-white leading-none">
                                            {{__('Paiement lors de la livraison')}} </label>
                                        <p id="pay-on-delivery-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">+$15
                                            {{ __('Frais de traitements des paiements') }}</p>
                                    </div>
                                </div>


                            </div>

                            <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="paypal-2" aria-describedby="paypal-text" type="radio"
                                            name="payment_method" value="mobile money" disabled
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-green-600 focus:ring-2 focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-green-600" />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="mobile-money-2"
                                            class="font-medium text-gray-900 dark:text-white leading-none">
                                            {{__('Mobile-money')}}
                                        </label>
                                        <p id="mobile-money-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">
                                            {{__('Fonctionnalité à venir')}}</p>
                                    </div>
                                </div>


                            </div>
                            <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-semibold text-gray-900 text-xl dark:text-white">{{__('Mode de livraisoon')}}
                        </h3>

                        <div class="gap-4 grid grid-cols-1 md:grid-cols-3">
                            <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery_method"
                                            value="standard Delivery"
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-green-600 focus:ring-2 focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-green-600"
                                            checked />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="dhl" class="font-medium text-gray-900 dark:text-white leading-none">
                                            {{__('Livraison standard')}} </label>
                                        <p id="dhl-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">$2 {{__('(
                                            3-5 Jours )')}}</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="fedex" aria-describedby="fedex-text" type="radio"
                                            name="delivery_method" value="express delivery"
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-green-600 focus:ring-2 focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-green-600" />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="fedex"
                                            class="font-medium text-gray-900 dark:text-white leading-none">
                                            {{__('Livraison express')}}</label>
                                        <p id="fedex-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">$8 {{__('(
                                            1-2 Jours )')}}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="express" aria-describedby="express-text" type="radio"
                                            name="delivery-method" value=""
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-green-600 focus:ring-2 focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-green-600" />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="express"
                                            class="font-medium text-gray-900 dark:text-white leading-none"> $49 -
                                            Express Delivery </label>
                                        <p id="express-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">Get it
                                            today</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <x-input-error :messages="$errors->get('delivery_method')" class="mt-2" />
                    </div>

                </div>

                <div class="space-y-6 mt-6 sm:mt-8 lg:mt-0 w-full xl:max-w-md lg:max-w-xs">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex items-center justify-between gap-4 py-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{__('Total')}}
                                </dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">{{$total.' CDF'}}
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{__('Taxe')}}
                                </dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">{{$tax .' CDF'}}
                                </dd>
                            </dl>

                            <dl
                                class="flex items-center justify-between gap-4 py-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">{{ __('Total') }}</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">{{$totalTTC.' CDF'}}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button type="submit"
                            class="flex justify-center items-center bg-green-700 hover:bg-green-800 dark:hover:bg-green-700 dark:bg-green-600 px-5 py-2.5 rounded-lg w-full font-medium text-sm text-white focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">{{__('Proceder
                            au paiement')}}</button>


                    </div>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>