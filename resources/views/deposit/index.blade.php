<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Deposit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @can('create_deposit')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex justify-end">
                <x-create-button class="ms-3 mb-3 " :href="route('deposits.create')">
                    {{__('Create deposit')}}
                </x-create-button>
            </div>
            @endcan


            @can('view_deposit')
            <div class="relative shadow-md sm:rounded-lg overflow-x-auto">
                <table class="rtl:text-right w-full text-gray-500 text-left text-sm dark:text-gray-400">
                    <caption class="caption-top">
                        {{ __('List of your available Deposit')}}
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
                                {{ __('Adress')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Country')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Description')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('area')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Capacity')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deposits as $deposit)
                        <tr
                            class="dark:border-gray-700 bg-white hover:bg-gray-600 dark:hover:bg-gray-600 dark:bg-gray-800 border-b">

                            <td class="px-6 py-4">{{ ++$i }}</td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{
                                $deposit->name }}</th>
                            <td class="px-6 py-4">{{ $deposit->adress }}</td>
                            <td class="px-6 py-4">{{ $deposit->country }}</td>
                            <td class="px-6 py-4">{{ $deposit->description }}</td>
                            <td class="px-6 py-4">{{ $deposit->area }}</td>
                            <td class="px-6 py-4">{{ $deposit->maxCapacity }}</td>
                            <td class="text-right px-6 py-4">

                                <form action="{{ route('deposits.destroy',$deposit->id) }}" method="POST">
                                    <x-view-button class="ms-3 mb-3 " href="{{ URL::to('deposits/'.$deposit->id) }}">

                                    </x-view-button>
                                    @can('update_deposit')
                                    <x-edit-button class="ms-3 mb-3 " href="{{ URL::to('deposits/'.$deposit->id.'/edit')}}">

                                    </x-edit-button>
                                    @endcan
                                    @csrf
                                    @method('DELETE')

                                    @can('delete_deposit')


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
