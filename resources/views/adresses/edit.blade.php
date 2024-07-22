<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Update adress') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl  sm:px-6 lg:px-8">

            @can('view_adress')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
                <x-create-button class="ms-3 mb-3 " :href="route('adresses.index')">
                    {{__('Back')}}
                </x-create-button>
            </div>
            @endcan

            @can('update_adress')

            <div class="w-full  md:w-1/2 m-auto flex items-center justify-items-center justify-center">
                <form method="post" action="{{ route('adresses.update', $adress->id) }}">
                    @csrf
                    @method('put')
                    <!-- Adress -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="adress" :value="__('Adress')" />
                        <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress"
                            value="{{ $adress->name }}" autofocus autocomplete="adress" />
                        <x-input-error :messages="$errors->get('adress')" class="mt-2" />
                    </div>
                    <!-- city -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="city" :value="__('City')" />
                        <x-select id="select-city-input-3" name="city">
                            <option selected value="Lubumbashi">Lubumbashi</option>
                            <option value="Kolwezi">Kolwezi</option>
                            <option value="Likasi">Likasi</option>
                            <option value="kamina">kamina</option>
                        </x-select>
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>
                    <!-- state -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="state" :value="__('State')" />
                        <x-select id="select-state-input-3" name="state" / />
                        <option selected value="Haut-katanga">Haut-katanga</option>
                        <option value="Lualaba">Lualaba</option>
                        <option value="haut-lomami">Haut-lomami</option>
                        </x-select>
                        <x-input-error :messages="$errors->get('state')" class="mt-2" />
                    </div>



                    @can('create_adress')
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