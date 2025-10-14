<x-app-layout>
    <x-slot name="header" class="relative">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight relative">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>

    @include('partials.ideia-de-layout-dash')
</x-app-layout>
