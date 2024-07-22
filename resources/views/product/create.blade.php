<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Product') }}
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
        </div>
        @can('create_product')

        <div class="w-full flex">

            <div class="w-full  md:w-1/2 m-auto flex items-center justify-items-center justify-center">
                <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <!-- Name -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- description -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="description" :value="__('Description')" />

                        <x-textarea id="description" class="block mt-1" rows="4" name="description" autofocus
                            autocomplete="description">{{ old('description') }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="w-full mt-2 flex">
                        <!-- price -->
                        <div class="mr-1 mt-2 w-full">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price"
                                :value="old('price')" autofocus autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>


                        <!-- quantity  -->
                        <div class="mr-1 mt-2 w-full">
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" min="1" name="quantity"
                                :value="old('quantity')" autocomplete="quantity" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <!-- sell_unit  -->
                        <div class="mt-2 w-full">
                            <x-input-label for="sell_unit_id" :value="__('Sell unit')" />
                            <x-select id="sell_unit_id" class="block mt-1 w-full" name="sell_unit_id"
                                autocomplete="sell_unit_id">
                                <option value="" selected disabled>{{__('-- Select a sell unit --')}}</option>
                                @foreach($sellUnits as $sellUnit)
                                <option value="{{ $sellUnit->id }}" @if ($sellUnit->id == old('sell_unit_id')
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
                            <x-input-label for="categorie_id" :value="__('Category')" />
                            <x-select id="categorie_id" class="block mt-1 w-full" name="categorie_id" autofocus
                                autocomplete="categorie_id">
                                <option value="" selected disabled>{{__('-- Select a categorie --')}}</option>
                                @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" @if ($categorie->id == old('categorie_id')
                                    ){{'selected'}} @endif
                                    >{{$categorie->name}}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('categorie_id')" class="mt-2" />
                        </div>

                        <!-- deposit-->
                        <div class="mt-2 w-full">
                            <x-input-label for="deposit_id" :value="__('Deposit')" />

                            <x-select id="deposit_id" class="block mt-1 w-full" name="deposit_id"
                                autocomplete="new-deposit_id">
                                <option value="" selected disabled>{{__('-- Select a deposit --')}}</option>
                                @foreach($deposits as $deposit)
                                <option value="{{ $deposit->id }}" @if ($deposit->id == old('deposit_id')
                                    ){{'selected'}} @endif
                                    >{{$deposit->name}}</option>
                                @endforeach
                            </x-select>

                            <x-input-error :messages="$errors->get('deposit_id')" class="mt-2" />
                        </div>
                    </div>

                    <!-- images -->
                    <div class="m-0 mt-2 w-full">
                        <x-input-label for="images" :value="__('images')" />
                        <input
                            class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="large_size" type="file" accept="images/*" name="images[]" multiple autofocus
                            autocomplete="images" />

                        <x-input-error :messages="$errors->get('images')" class="mt-2" />
                    </div>

                    @can('create_product')

                    <x-primary-button class="ms-4 mt-4">
                        {{ __('Create') }}
                    </x-primary-button>
                    @endcan
                </form>

            </div>




        </div>




        @endcan

    </div>
</x-app-layout>