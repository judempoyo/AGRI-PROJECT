<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Show Product') }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        @can('view_product')
        <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
            <x-create-button class="ms-3 mb-3  mt-3" :href="route('products.index')">
                {{__('Back')}}
            </x-create-button>
        </div>
    </div>
    <section class="bg-white dark:bg-gray-900 py-8 md:py-16 antialiased">
        <div class="mx-auto px-4 2xl:px-0 max-w-screen-xl">
            <div class="lg:gap-8 xl:gap-16 lg:grid lg:grid-cols-2">
                <div class="mx-auto max-w-md lg:max-w-lg shrink-0">
                    @foreach ($images as $image )
                    @if ($image->product_id == $product->id)
                    <img class="dark:hidden w-full" src="{{asset('storage/images/uploads/products/'.$image->image )}}"
                        alt="{{ $image->image }}" />
                    <img class="dark:block hidden w-full"
                        src="{{asset('storage/images/uploads/products/'.$image->image )}}" alt="{{ $image->image }}" />
                    @break
                    @endif
                    @endforeach
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="font-semibold text-gray-900 text-xl sm:text-2xl dark:text-white">
                        {{$product->name}}
                    </h1>
                    <div class="sm:flex sm:items-center sm:gap-4 mt-4">
                        <p class="font-extrabold text-2xl text-gray-900 sm:text-3xl dark:text-white">
                            {{
                            $product->price
                            }} CDF / @foreach ($sellUnits as $sellUnit )
                            @if ($sellUnit->id == $product->sell_unit_id)
                            {{ $sellUnit->name }}
                            @break
                            @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="sm:flex sm:items-center sm:gap-4 mt-4">
                        <p class="font-extrabold text-2xl text-gray-900 sm:text-3xl dark:text-white ">
                            {{ __('Avalaible Quantity : ').$product->Quantity
                            }}
                        </p>
                    </div>
                    <div class="sm:flex sm:items-center sm:gap-4 mt-4">

                        <p class="text-sm text-gray-900 sm:text-3xl dark:text-white ">
                            @foreach ($deposits as $deposit )
                            @if ($deposit->id == $product->deposit_id)
                            {{ __('Deposit : ').$deposit->name }}
                            @break
                            @endif
                            @endforeach
                        </p>

                    </div>


                    <hr class="border-gray-200 dark:border-gray-800 my-6 md:my-8" />

                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        {{ $product->description }}
                    </p>

                </div>
            </div>
        </div>
    </section>


    <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
        <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
            <x-create-button class="ms-3 mb-3  mt-3" :href="route('productsImages.create')">
                {{__('Add image')}}
            </x-create-button>
        </div>
    </div>
    <div class="w-full flex">



        @foreach($images as $productsImage)
        <div class="m-5 w-1/4 flex justify-content-between">
            <img src="{{ asset('storage/images/uploads/products/'.$productsImage->image)}}" width="200" height="200"
                alt="{{$productsImage->image}}" class="">

            <form action="{{ route('productsImages.destroy',$productsImage->id) }}" method="POST">
                <x-edit-button class="ms-3 mb-3 " href="{{ URL::to('productsImages/'.$productsImage->id.'/edit')}}">

                    </svg>
                </x-edit-button>
                @csrf
                @method('DELETE')


                <x-delete-button class="ms-3 mb-3">

                </x-delete-button>
            </form>
        </div>


        @endforeach

        @endcan
    </div>
</x-app-layout>