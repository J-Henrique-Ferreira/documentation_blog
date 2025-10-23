<x-app-layout>
    @include('layouts.navigation-admin')

    <x-slot name="header" class="relative">
        @php
            $displayFilter = true;
        @endphp

        @include('partials.header')
    </x-slot>

    <div class="w-full">
        @if (isset($post))
            <div class="p-6 lg:p-8 max-w-6xl mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-900">
                            {{ $post->title }}
                        </h1>
                        <p class="text-slate-600 mt-1">
                            {{ $post->description }}
                        </p>
                    </div>
                </div>

                <div class="prose prose-slate max-w-none">
                    {!! $post->content !!}
                </div>
            </div>
        @endif
    </div>
</x-app-layout>