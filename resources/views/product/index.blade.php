<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Product') }}
        </h2>
    </x-slot>

    @can('view_product')
    @livewire('listProducts')
    @endcan

    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @can('create_product')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex justify-end">
                <x-create-button class="ms-3 mb-3 " :href="route('products.create')">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    {{__('Create product')}}
                </x-create-button>
            </div>
            @endcan


            @can('view_product')
            <div class="relative shadow-md sm:rounded-lg overflow-x-auto">
                <table class="rtl:text-right w-full text-gray-500 text-left text-sm dark:text-gray-400">
                    <caption class="caption-top">
                        {{ __('List of your available product')}}
                    </caption>
                    <thead class="bg-gray-50 dark:bg-gray-700 text-gray-700 text-xs dark:text-gray-400 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N°
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Name')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Description')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('price')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Quantity')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Deposit')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Category')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Sell unit')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr
                            class="dark:border-gray-700 bg-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:bg-gray-800 border-b">

                            <td class="px-6 py-4">{{ ++$i }}</td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{
                                $product->name }}</th>
                            <td class="px-6 py-4">{{ $product->description }}</td>
                            <td class="px-6 py-4">{{ $product->price }}</td>
                            <td class="px-6 py-4">{{ $product->Quantity }}</td>
                            <td class="px-6 py-4">
                                @foreach($deposits as $deposit)
                                @if($deposit->id == $product->deposit_id)
                                {{ $deposit->name }}
                                @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach($categories as $categorie)
                                @if($categorie->id == $product->categorie_id)
                                {{ $categorie->name }}
                                @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach($sellUnits as $sellUnit)
                                @if($sellUnit->id == $product->sell_unit_id)
                                {{ $sellUnit->name }}
                                @endif
                                @endforeach
                            </td>
                            <td class="text-right px-6 py-4">

                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    <x-view-button class="ms-3 mb-3 " href="{{ URL::to('products/'.$product->id) }}">

                                    </x-view-button>
                                    @can('update_product')
                                    <x-edit-button class="ms-3 mb-3 "
                                        href="{{ URL::to('products/'.$product->id.'/edit')}}">

                                    </x-edit-button>
                                    @endcan
                                    @csrf
                                    @method('DELETE')

                                    @can('delete_product')


                                    <x-delete-button class="ms-3 mb-3">

                                    </x-delete-button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>
            @endcan

        </div>
    </div> --}}
</x-app-layout>