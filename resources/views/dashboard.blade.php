<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @role('admin')
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Admin ' . Auth::user()->name . " Vous etes connecté!!") }}

                </div>
            </div>
            @else
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __(Auth::user()->name . " Vous etes connecté!!") }}

                </div>
            </div>
            {{-- <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="" srcset=""> --}}
            @endrole

        </div>
    </div>
</x-app-layout>