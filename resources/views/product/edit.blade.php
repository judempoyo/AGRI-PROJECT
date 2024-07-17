<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    {{-- @php
    //dd($deposits);
    //dd($categories);
    //dd($sellUnits);
    @endphp --}}

    <div class="py-12">
        <div class="mx-auto max-w-7xl  sm:px-6 lg:px-8">

            @can('view_product')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex">
                <x-create-button class="ms-3 mb-3 " :href="route('products.index')">
                    {{__('Back')}}
                </x-create-button>
            </div>
            @endcan

            @can('update_product')


            <div class="w-full  md:w-1/2 m-auto flex items-center justify-items-center justify-center">
                <form method="post" action="{{ route('products.update', $product->id) }}">
                    @csrf

                    @method('put')
                    <!-- Name -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            value="{{ $product->name }}" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- description -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="description" :value="__('Description')" />

                        <x-textarea id="description" class="block mt-1" rows="4" name="description" autofocus
                            autocomplete="description">{{ $product->description }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="w-full mt-2 flex">
                        <!-- price -->
                        <div class="mr-1 mt-2 w-full">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price"
                                value="{{ $product->price }}" autofocus autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>


                        <!-- quantity  -->
                        <div class="mr-1 mt-2 w-full">
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" min="1" name="quantity"
                                value="{{ $product->Quantity }}" autocomplete="quantity" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <!-- sell_unit  -->
                        <div class="mt-2 w-full">
                            <x-input-label for="sell_unit_id" :value="__('Sell unit')" />
                            <x-select id="sell_unit_id" class="block mt-1 w-full" name="sell_unit_id"
                                autocomplete="sell_unit_id">
                                <option value="" selected disabled>{{__('-- Select a sell unit --')}}</option>
                                @foreach($sellUnits as $sellUnit)
                                <option value="{{ $sellUnit->id }}" @if ($sellUnit->id == $product->sell_unit_id
                                    ){{'selected'}} @endif
                                    >{{$sellUnit->name}}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('sell_unit_id')" class="mt-2" />
                        </div>

                    </div>

                    <div class="mt-2 w-full flex">
                        <!-- category -->
                        <div class="mr-2 mt-2 w-full">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <x-select id="category_id" class="block mt-1 w-full" name="category_id" autofocus
                                autocomplete="category_id">
                                <option value="" selected disabled>{{__('-- Select a categorie --')}}</option>
                                @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" @if ($categorie->id == $product->category_id
                                    ){{'selected'}} @endif
                                    >{{$categorie->name}}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <!-- deposit-->
                        <div class="mt-2 w-full">
                            <x-input-label for="deposit_id" :value="__('Deposit')" />
                            <x-select id="deposit_id" class="block mt-1 w-full" name="deposit_id" autofocus
                                autocomplete="deposit_id">
                                <option value="" selected disabled>{{__('-- Select a categorie --')}}</option>
                                @foreach($deposits as $deposit)
                                <option value="{{ $deposit->id }}" @if ($deposit->id == $product->deposit_id
                                    ){{'selected'}} @endif
                                    >{{$deposit->name}}</option>
                                @endforeach
                            </x-select>



                            <x-input-error :messages="$errors->get('deposit_id')" class="mt-2" />
                        </div>
                    </div>

                    @can('update_product')

                    <x-primary-button class="ms-4 mt-4">
                        {{ __('Update') }}
                    </x-primary-button>
                    @endcan

                </form>
            </div>
            @endcan

        </div>

    </div>
    </div>
</x-app-layout>