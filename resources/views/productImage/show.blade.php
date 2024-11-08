<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Voir l\'image du produit') }} </h2>
    </x-slot>

    {{-- @php
    //dd($images)
    @endphp --}}
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        @can('view_product')
        <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
            <x-create-button class="ms-3 mb-3  mt-3" :href="route('products.index')">
                {{__('Retour')}}
            </x-create-button>
        </div>
    </div>
    <div class="w-full flex">
        <div class="w-1/2  md:w-1/3  m-auto mx-3 items-center justify-items-center justify-center">

            <div class="row">
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Nom : ') }}{{ $product->name }}</h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('description : ') }}{{ $product->description
                    }}</h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Prix : ') }}{{ $product->price }}</h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Auqntité : ') }}{{ $product->Quantity }}
                </h1>
                <h1 class=" text-gray-800 dark:text-gray-200 text-lg">{{ __('Depot : ') }}{{ $product->deposit_id
                    }}
                </h1>
            </div>
            @endcan
        </div>

        <div class="w-1/2  md:w-2/3 m-auto mx-3 items-center justify-items-center justify-center">
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
                <x-create-button class="ms-3 mb-3  mt-3" :href="route('productImages.create')">
                    {{__('Ajouter l\'image')}}
                </x-create-button>
            </div>
            @foreach($images as $image)

            <img src="{{$image->image}}" alt="{{$image->image}}" class="">

            @endforeach
        </div>
    </div>
</x-app-layout>