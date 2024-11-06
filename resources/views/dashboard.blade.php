<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-8 lg:px-10">
        <livewire:StatsOverview />


    </div>
</x-app-layout>