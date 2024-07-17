<x-app-layout>

    <section class="bg-white dark:bg-gray-900 py-8 md:py-16 antialiased">
        <form action="#" class="mx-auto px-4 2xl:px-0 max-w-screen-xl">


            <div class="lg:flex lg:items-start lg:gap-12 xl:gap-16 mt-6 sm:mt-8">
                <div class="flex-1 space-y-8 min-w-0">
                    <div class="space-y-4">
                        <h2 class="font-semibold text-gray-900 text-xl dark:text-white">{{__('Delivery Details')}}</h2>

                        <div class="gap-4 grid grid-cols-1 sm:grid-cols-2">
                            <div>
                                <label for="your_name"
                                    class="block mb-2 font-medium text-gray-900 text-sm dark:text-white"> {{__('Your
                                    name')}}
                                </label>
                                <input type="text" id="your_name" name="name"
                                    class="block border-gray-300 focus:border-primary-500 dark:focus:border-primary-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-primary-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-primary-500"
                                    placeholder="Jude Mpoyo" required />
                            </div>

                            <div>
                                <label for="your_email"
                                    class="block mb-2 font-medium text-gray-900 text-sm dark:text-white"> {{ __('Your
                                    email') }}*
                                </label>
                                <input type="email" id="your_email" name="email"
                                    class="block border-gray-300 focus:border-primary-500 dark:focus:border-primary-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-primary-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-primary-500"
                                    placeholder="jude@gmail.com" required />
                            </div>

                            <div>
                                <label for="phone-input-3"
                                    class="block mb-2 font-medium text-gray-900 text-sm dark:text-white"> Phone Number*
                                </label>
                                <div class="flex items-center">

                                    <div class="relative w-full">
                                        <input type="text" id="phone-input" name="phone"
                                            class="block z-20 border-gray-300 border-s-0 focus:border-primary-500 dark:focus:border-primary-500 dark:border-gray-600 dark:border-s-gray-700 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-e-lg w-full text-gray-900 text-sm focus:ring-primary-500 dark:text-white dark:placeholder:text-gray-400"
                                            pattern="[0-9]{10}" placeholder="0975889135" required />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="adress"
                                    class="block mb-2 font-medium text-gray-900 text-sm dark:text-white">
                                    {{__('Adress')}}* </label>
                                <input type="text" id="adress" name="adress"
                                    class="block border-gray-300 focus:border-primary-500 dark:focus:border-primary-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-primary-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-primary-500"
                                    placeholder="Av rashidi N°20/Q. Kasapa/C. Annexe" required />
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label for="select-state-input-3"
                                        class="block font-medium text-gray-900 text-sm dark:text-white">
                                        {{__('State')}}* </label>
                                </div>
                                <select id="select-state-input-3" name="state"
                                    class="block border-gray-300 focus:border-primary-500 dark:focus:border-primary-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-primary-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-primary-500">
                                    <option selected value="Haut-katanga">Haut-katanga</option>
                                    <option value="Lualaba">Lualaba</option>
                                    <option value="haut-lomami">Haut-lomami</option>
                                </select>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label for="select-city-input-3"
                                        class="block font-medium text-gray-900 text-sm dark:text-white">
                                        {{__('City')}}*
                                    </label>
                                </div>
                                <select id="select-city-input-3" name="city"
                                    class="block border-gray-300 focus:border-primary-500 dark:focus:border-primary-500 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 border rounded-lg w-full text-gray-900 text-sm focus:ring-primary-500 dark:text-white dark:placeholder:text-gray-400 dark:focus:ring-primary-500">
                                    <option selected value="Lubumbashi">Lubumbashi</option>
                                    <option value="Kolwezi">Kolwezi</option>
                                    <option value="Likasi">Likasi</option>
                                    <option value="kamina">kamina</option>
                                </select>
                            </div>





                            <div class="sm:col-span-2">
                                <button type="submit"
                                    class="focus:z-10 flex justify-center items-center gap-2 border-gray-200 dark:border-gray-600 bg-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:bg-gray-800 px-5 py-2.5 border rounded-lg w-full font-medium text-gray-900 text-sm hover:text-primary-700 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:hover:text-white dark:text-gray-400 dark:focus:ring-gray-700">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                    {{__('Save address')}}
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-semibold text-gray-900 text-xl dark:text-white">{{__('Payment')}}</h3>

                        <div class="gap-4 grid grid-cols-1 md:grid-cols-3">

                            <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio"
                                            name="payment-method" value="" checked
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-primary-600 focus:ring-2 focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="pay-on-delivery"
                                            class="font-medium text-gray-900 dark:text-white leading-none">
                                            {{__('Payment on
                                            delivery')}} </label>
                                        <p id="pay-on-delivery-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">+$15
                                            {{ __('payment processing fee') }}</p>
                                    </div>
                                </div>


                            </div>

                            <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="paypal-2" aria-describedby="paypal-text" type="radio"
                                            name="payment-method" value="" disabled
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-primary-600 focus:ring-2 focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="mobile-money-2"
                                            class="font-medium text-gray-900 dark:text-white leading-none">
                                            {{__('Mobile-money')}}
                                        </label>
                                        <p id="mobile-money-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">
                                            {{__('Coming soon')}}</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-semibold text-gray-900 text-xl dark:text-white">{{__('Delivery Methods')}}</h3>

                        <div class="gap-4 grid grid-cols-1 md:grid-cols-3">
                            <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery-method"
                                            value=""
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-primary-600 focus:ring-2 focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                            checked />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="dhl" class="font-medium text-gray-900 dark:text-white leading-none">
                                            {{__('Standard Delivery')}} </label>
                                        <p id="dhl-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">$2 (
                                            3-5{{__(' days )')}}</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="fedex" aria-describedby="fedex-text" type="radio"
                                            name="delivery-method" value=""
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-primary-600 focus:ring-2 focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="fedex"
                                            class="font-medium text-gray-900 dark:text-white leading-none">
                                            {{__('Express delivery')}}</label>
                                        <p id="fedex-text"
                                            class="mt-1 font-normal text-gray-500 text-xs dark:text-gray-400">$8 (
                                            1-2{{__(' days )')}}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- <div
                                class="border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4 border rounded-lg ps-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="express" aria-describedby="express-text" type="radio"
                                            name="delivery-method" value=""
                                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 w-4 h-4 text-primary-600 focus:ring-2 focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
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
                    </div>

                </div>

                <div class="space-y-6 mt-6 sm:mt-8 lg:mt-0 w-full xl:max-w-md lg:max-w-xs">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex justify-between items-center gap-4 py-3">
                                <dt class="font-normal text-base text-gray-500 dark:text-gray-400">Subtotal</dt>
                                <dd class="font-medium text-base text-gray-900 dark:text-white">$8,094.00</dd>
                            </dl>

                            <dl class="flex justify-between items-center gap-4 py-3">
                                <dt class="font-normal text-base text-gray-500 dark:text-gray-400">Savings</dt>
                                <dd class="font-medium text-base text-green-500">0</dd>
                            </dl>

                            <dl class="flex justify-between items-center gap-4 py-3">
                                <dt class="font-normal text-base text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                <dd class="font-medium text-base text-gray-900 dark:text-white">$99</dd>
                            </dl>

                            <dl class="flex justify-between items-center gap-4 py-3">
                                <dt class="font-normal text-base text-gray-500 dark:text-gray-400">Tax</dt>
                                <dd class="font-medium text-base text-gray-900 dark:text-white">$199</dd>
                            </dl>

                            <dl class="flex justify-between items-center gap-4 py-3">
                                <dt class="font-bold text-base text-gray-900 dark:text-white">Total</dt>
                                <dd class="font-bold text-base text-gray-900 dark:text-white">$8,392.00</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button type="submit"
                            class="flex justify-center items-center bg-primary-700 hover:bg-primary-800 dark:hover:bg-primary-700 dark:bg-primary-600 px-5 py-2.5 rounded-lg w-full font-medium text-sm text-white focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">{{__('Proceed
                            to Payment')}}</button>

                        
                    </div>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>