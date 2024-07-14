<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Add Product image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl  sm:px-6 lg:px-8">

            <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
                <x-create-button class="ms-3 mb-3 " :href="route('products.index')">
                    {{__('Back')}}
                </x-create-button>
            </div>


            <div class="w-full  md:w-1/2 m-auto flex  border">
                <form method="post" action="{{ route('products.store') }}">
                    @csrf

                    <!-- image -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="image" :value="__('image')" />
                        <x-input-file id="image" type="file" accept="image/*" name="image" autofocus
                            autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <x-primary-button class="ms-4 mt-4">
                        {{ __('Create') }}
                    </x-primary-button>


                </form>
            </div>


        </div>


    </div>
    </div>
</x-app-layout>