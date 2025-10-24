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
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">
                        {{ $tenant->name}}
                    </h1>
                </div>
            </div>

            <div class="prose prose-slate max-w-none">
                {!! $tenant->content !!}
            </div>
        </div>
    </div>
</x-app-layout>