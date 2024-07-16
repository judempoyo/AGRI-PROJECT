<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Show Deposit') }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        @can('view_deposit')
        <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
            <x-create-button class="ms-3 mb-3  mt-3" :href="route('deposits.index')">
                {{__('Back')}}
            </x-create-button>
        </div>


        <div class="w-1/2  md:w-1/2  relative items-center justify-items-center justify-center">

            <div class="row">
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Name : ') }}{{ $deposit->name }}</h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Adress : ') }}{{ $deposit->adress }}</h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Country : ') }}{{ $deposit->country }}</h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Area : ') }}{{ $deposit->area }}</h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Capacity : ') }}{{ $deposit->maxCapacity }}
                </h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Owner : ') }}{{ Auth::user()->name }}</h1>
            </div>

        </div>
        @endcan
</x-app-layout>