<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Product') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @can('create_product')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex justify-end">
                <x-create-button class="ms-3 mb-3 " :href="route('products.create')">
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
                            class="dark:border-gray-700 bg-white hover:bg-gray-600 dark:hover:bg-gray-600 dark:bg-gray-800 border-b">

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
                                    @if($categorie->id == $product->category_id)
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
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </x-view-button>
                                    @can('update_product')
                                    <x-edit-button class="ms-3 mb-3 "
                                        href="{{ URL::to('products/'.$product->id.'/edit')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </x-edit-button>
                                    @endcan
                                    @csrf
                                    @method('DELETE')

                                    @can('delete_product')


                                    <x-delete-button class="ms-3 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
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
    </div>
</x-app-layout>