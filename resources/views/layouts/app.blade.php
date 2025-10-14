<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#f9fafb]">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation-admin')

        <!-- Page Heading -->
        @isset($header)
            <header class="flex justify-between bg-white border-b border-gray-200 py-2 pr-4 fixed top-0 w-full z-20">
                <div class="flex">
                    <div class="flex w-[255px] h-auto">
                        <x-application-logo class="w-auto my-auto ml-4" />
                    </div>
                    <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </div>

                <div class="flex items-center w-auto h-auto">
                    <x-alertas-toltip />
                    <div class="border-l px-4 border-gray-200">|</div>
                    <div class="flex space-x-3 items-center">
                        <div
                            class="uppercase p-1 bg-slate-300 rounded-full text-gray-500 h-10 w-10 font-semibold text-xl flex items-center justify-center">
                            {{ auth()->user()->name[0] ?? 'G' }}
                        </div>
                        <div>
                            <p class="font-medium">
                                {{ auth()->user()->name ?? 'Guest' }}
                            </p>
                            <p class="text-sm text-gray-500 mt-[-3px]">
                                {{ auth()->user()->email ?? 'guest@example.com' }}
                            </p>
                        </div>
                    </div>
                </div>
            </header>
            <div class="h-20"></div>
        @endisset

        <!-- Page Content -->
        <main class="flex w-full px-2">
            <div class="w-[300px] opacity-0">espaço horizontal para preencher logo a baixo do menu lateral</div>
            {{ $slot }}
        </main>
    </div>

    <x-popup-messages />
    <x-loading-spinner />
</body>

</html>