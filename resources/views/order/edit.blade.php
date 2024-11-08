<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Update Deposit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl  sm:px-6 lg:px-8">

            @can('view_deposit')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
                <x-create-button class="ms-3 mb-3 " :href="route('deposits.index')">
                    {{__('Back')}}
                </x-create-button>
            </div>
            @endcan

            @can('update_deposit')

            <div class="w-full  md:w-1/2 m-auto flex items-center justify-items-center justify-center">
                <form method="post" action="{{ route('deposits.update', $deposit->id) }}">
                    @csrf
                    @method('put')
                    <!-- Name -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            value="{{ $deposit->name }}" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- adress -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="adress" :value="__('Adress')" />
                        <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress"
                            value="{{ $deposit->adress }}" autofocus autocomplete="adress" />
                        <x-input-error :messages="$errors->get('adress')" class="mt-2" />
                    </div>


                    <!-- country  -->
                    <div class="mt-2">
                        <x-input-label for="country" :value="__('Country')" />
                        <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                            value="{{ $deposit->country }}" autocomplete="country" />
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>

                    <div class="mt-2 md:flex md:flex-row">
                        <!-- area -->
                        <div class="m-0 mt-2 w-full md:w-1/2">
                            <x-input-label for="area" :value="__('Area')" />
                            <x-text-input id="area" class="block mt-1 w-full" type="text" name="area"
                                value="{{ $deposit->area }}" autofocus autocomplete="area" />
                            <x-input-error :messages="$errors->get('area')" class="mt-2" />
                        </div>

                        <!-- maxCapacity -->
                        <div class="m-0 mt-2 w-full md:w-1/2">
                            <x-input-label for="maxCapacity" :value="__('Max Capacity')" />

                            <x-text-input id="maxCapacity" class="block mt-1 w-full" type="number" name="maxCapacity"
                                value="{{ $deposit->maxCapacity }}" required autocomplete="new-maxCapacity" />

                            <x-input-error :messages="$errors->get('maxCapacity')" class="mt-2" />
                        </div>
                    </div>

                    @can('create_deposit')
                    <x-primary-button class="ms-4 mt-4">
                        {{ __('Update') }}
                    </x-primary-button>
                    @endcan

                </form>
            </div>

        </div>
        @endcan

    </div>
    </div>
</x-app-layout>