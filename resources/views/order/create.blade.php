<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Créer une commande') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl  sm:px-6 lg:px-8">

            @can('view_deposit')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
                <x-create-button class="ms-3 mb-3 " :href="route('deposits.index')">
                    {{__('Retour')}}
                </x-create-button>
            </div>
            @endcan

            @can('create_deposit')

            <div class="w-full  md:w-1/2 m-auto flex items-center justify-items-center justify-center">
                <form method="post" action="{{ route('deposits.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <!-- Name -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="name" :value="__('Nom')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- adress -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="adress" :value="__('Adresse')" />
                        <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress"
                            :value="old('adress')" autofocus autocomplete="adress" />
                        <x-input-error :messages="$errors->get('adress')" class="mt-2" />
                    </div>


                    <!-- country  -->
                    <div class="mt-2">
                        <x-input-label for="country" :value="__('Province')" />
                        <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                            :value="old('country')" autocomplete="country" />
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>

                    <div class="mt-2 md:flex md:flex-row">
                        <!-- area -->
                        <div class="m-0 mt-2 w-full md:w-1/2">
                            <x-input-label for="area" :value="__('Surface')" />
                            <x-text-input id="area" class="block mt-1 w-full" type="text" name="area"
                                :value="old('area')" autofocus autocomplete="area" />
                            <x-input-error :messages="$errors->get('area')" class="mt-2" />
                        </div>

                        <!-- maxCapacity -->
                        <div class="m-0 mt-2 w-full md:w-1/2">
                            <x-input-label for="maxCapacity" :value="__('Capacité maximale')" />

                            <x-text-input id="maxCapacity" class="block mt-1 w-full" type="number" name="maxCapacity"
                                :value="old('maxCapacity')" required autocomplete="new-maxCapacity" />

                            <x-input-error :messages="$errors->get('maxCapacity')" class="mt-2" />
                        </div>
                    </div>

                    @can('create_deposit')

                    <x-primary-button class="ms-4 mt-4">
                        {{ __('Créer') }}
                    </x-primary-button>
                    @endcan

                </form>
            </div>

        </div>
        @endcan

    </div>
    </div>
</x-app-layout>