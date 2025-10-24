<x-app-layout>
    @include('layouts.navigation-admin')

    <x-slot name="header" class="relative">
        @php
            $displayFilter = false;
        @endphp

        @include('partials.header')
    </x-slot>

    <div class="w-full">
        <div class="p-6 lg:p-8 max-w-6xl mx-auto">
            <div class="">
                <h1 class="text-3xl font-bold text-slate-900">
                    {{ $user->name}}
                </h1>
                <div class="mt-5">
                    {{ $user->email }}
                </div>
                <div class="mt-5">
                    {{ $user->tenant->name }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>