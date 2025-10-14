<div x-data="{ open: false }" class="relative ">
    <!-- Div que ativa o tooltip -->
    <div @click="open = !open"
        class="flex items-center gap-3 px-3 py-1 boder rounded-md border border-gray-500 cursor-pointer">
        <i class="fa fa-bell-o mr-2" aria-hidden="true"></i>
        Alertas (3)
    </div>
    <!-- Tooltip / Popover -->
    <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="absolute top-full left-3/3 -translate-x-1/2 mt-5 w-[444px] bg-white border border-t-0 rounded-lg rounded-t-none p-4 z-50">

        <!-- Card: Info -->
        <div
            class="flex items-start gap-3 bg-blue-50 text-blue-800 border-l-4 border-blue-500 p-4 rounded mb-3 cursor-pointer">
            <!-- Ícone Info -->
            <svg class="w-6 h-6 mt-1 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
            </svg>
            <!-- Conteúdo -->
            <div>
                <h4 class="font-bold">Informação Importante</h4>
                <p class="text-sm">Este é um aviso informativo com detalhes sobre algo útil.</p>
                <span class="text-xs text-blue-400">23/07/2025</span>
            </div>
        </div>

        <!-- Card: Warning -->
        <div
            class="flex items-start gap-3 bg-yellow-50 text-yellow-800 border-l-4 border-yellow-500 p-4 rounded mb-3 cursor-pointer">
            <!-- Ícone Warning -->
            <svg class="w-6 h-6 mt-1 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01m-.01-10a9 9 0 110 18 9 9 0 010-18z" />
            </svg>
            <!-- Conteúdo -->
            <div>
                <h4 class="font-bold">Aviso de Atenção</h4>
                <p class="text-sm">Este alerta avisa sobre algo que pode exigir cuidado.</p>
                <span class="text-xs text-yellow-500">23/07/2025</span>
            </div>
        </div>

        <!-- Card: Danger -->
        <div class="flex items-start gap-3 bg-red-50 text-red-800 border-l-4 border-red-500 p-4 rounded cursor-pointer">
            <!-- Ícone Danger -->
            <svg class="w-6 h-6 mt-1 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8v4m0 4h.01m-.01-14a10 10 0 110 20 10 10 0 010-20z" />
            </svg>
            <!-- Conteúdo -->
            <div>
                <h4 class="font-bold">Erro Crítico</h4>
                <p class="text-sm">Este alerta indica um erro grave ou algo perigoso.</p>
                <span class="text-xs text-red-400">23/07/2025</span>
            </div>
        </div>

    </div>
</div>