<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Adresses') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-8 lg:px-10">
        <livewire:listAdress />
    </div>
    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @can('create_adress')
            <div class="row text-gray-800 dark:text-gray-200 w-ful flex justify-end">
                <x-create-button class="ms-3 mb-3 " :href="route('adresses.create')">
                    {{__('Create adress')}}
                </x-create-button>
            </div>
            @endcan


            @can('view_adress')
            <div class="relative shadow-md sm:rounded-lg overflow-x-auto">
                <table class="rtl:text-right w-full text-gray-500 text-left text-sm dark:text-gray-400">
                    <caption class="caption-top">
                        {{ __('List of your delivery adress')}}
                    </caption>
                    <thead class="bg-gray-50 dark:bg-gray-700 text-gray-700 text-xs dark:text-gray-400 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N°
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Adress')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('City')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('State')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=0
                        @endphp
                        @foreach ($adresses as $adress)
                        <tr
                            class="dark:border-gray-700 bg-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:bg-gray-800 border-b">

                            <td class="px-6 py-4">{{ ++$i }}</td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{
                                $adress->adress }}</th>
                            <td class="px-6 py-4">{{ $adress->city }}</td>
                            <td class="px-6 py-4">{{ $adress->state }}</td>
                            <td class="text-right px-6 py-4">

                                <form action="{{ route('adresses.destroy',$adress->id) }}" method="POST">

                                    @can('update_adress')
                                    <x-edit-button class="ms-3 mb-3 "
                                        href="{{ URL::to('adresses/'.$adress->id.'/edit')}}">

                                    </x-edit-button>
                                    @endcan
                                    @csrf
                                    @method('DELETE')

                                    @can('delete_adress')
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