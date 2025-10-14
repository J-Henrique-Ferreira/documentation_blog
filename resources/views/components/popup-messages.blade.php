@if(session('success'))
    <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 400); setTimeout(() => show = false, 9000);"
        x-show="show" x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-700" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="fixed top-20 right-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg z-50 flex items-center space-x-3"
        role="alert">
        <!-- Ícone -->
        <svg class="w-6 h-6 animate-bounce text-green-500" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>

        <!-- Texto -->
        <span class="block sm:inline">{{ session('success') }}</span>

        <!-- Botão fechar -->
        <button @click="show = false" class="ml-auto text-green-700 hover:text-green-900">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif

@if(session('error'))
    <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 500); setTimeout(() => show = false, 4000);"
        x-show="show" x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-700" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="fixed top-5 right-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg z-50 flex items-center space-x-3"
        role="alert">
        <!-- Ícone -->
        <svg class="w-6 h-6 animate-pulse text-red-500" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 5.636l-1.414 1.414M5.636 18.364l1.414-1.414M6.343 6.343l11.314 11.314M17.657 6.343L6.343 17.657" />
        </svg>

        <!-- Texto -->
        <span class="block sm:inline">{{ session('error') }}</span>

        <!-- Botão fechar -->
        <button @click="show = false" class="ml-auto text-red-700 hover:text-red-900">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif