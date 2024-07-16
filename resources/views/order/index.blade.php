<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @can('create_order')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex justify-end">
                <x-create-button class="ms-3 mb-3 " :href="route('orders.create')">
                    {{__('Create order')}}
                </x-create-button>
            </div>
            @endcan


            @can('view_order')
            <div class="relative shadow-md sm:rounded-lg overflow-x-auto">
                <table class="rtl:text-right w-full text-gray-500 text-left text-sm dark:text-gray-400">
                    <caption class="caption-top">
                        {{ __('List of your available order')}}
                    </caption>
                    <thead class="bg-gray-50 dark:bg-gray-700 text-gray-700 text-xs dark:text-gray-400 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N°
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Ref')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Date')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Total')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('State')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Customer')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Grower')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr
                            class="dark:border-gray-700 bg-white hover:bg-gray-600 dark:hover:bg-gray-600 dark:bg-gray-800 border-b">

                            <td class="px-6 py-4">{{ ++$i }}</td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{
                                $order->ref }}</th>
                            <td class="px-6 py-4">{{ $order->date }}</td>
                            <td class="px-6 py-4">{{ $order->total }}</td>
                            <td class="px-6 py-4">{{ $order->state }}</td>
                            <td class="px-6 py-4">{{ $order->customer_id }}</td>
                            <td class="px-6 py-4">{{ $order->grower_id }}</td>
                            <td class="text-right px-6 py-4">

                                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                                    <x-view-button class="ms-3 mb-3 " href="{{ URL::to('orders/'.$order->id) }}">

                                    </x-view-button>
                                    @can('update_order')
                                    <x-edit-button class="ms-3 mb-3 " href="{{ URL::to('orders/'.$order->id.'/edit')}}">

                                    </x-edit-button>
                                    @endcan
                                    @csrf
                                    @method('DELETE')

                                    @can('delete_order')


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
    </div>
</x-app-layout>