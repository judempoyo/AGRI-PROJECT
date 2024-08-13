<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modiier une image du produit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl  sm:px-6 lg:px-8">


            <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
                <x-create-button class="ms-3 mb-3 " :href="route('products.index')">
                    {{__('Liste des produits')}}
                </x-create-button>
            </div>


            <div class="w-full  md:w-1/2 m-auto flex  border">
                <form method="post" action="{{ route('productsImages.update', $productsImage->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    @method('put')

                    <div class="m-5 w-1/4 flex justify-content-between">
                        <img src="{{ asset('storage/images/uploads/products/'.$productsImage->image)}}" width="500"
                            height="500" alt="{{$productsImage->image}}" class="">
                    </div>
                    <!-- image -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="image" :value="__('image')" />
                        <input
                            class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="large_size" type="file" accept="images/*" name="image" autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <x-primary-button class="ms-4 mt-4">
                        {{ __('Modifier') }}
                    </x-primary-button>


                </form>
            </div>


        </div>


    </div>
    </div>
</x-app-layout>