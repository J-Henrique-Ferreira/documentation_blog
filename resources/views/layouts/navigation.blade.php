<aside x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
    class="fixed left-0 top-[59px] bottom-0 w-72 bg-white border-r border-slate-200 overflow-y-auto z-30" x-data="{
            openCategories: ['getting-started', 'config'],
            toggleCategory(id) {
                if (this.openCategories.includes(id)) {
                    this.openCategories = this.openCategories.filter(cat => cat !== id)
                } else {
                    this.openCategories.push(id)
                }
            }
        }">
    <nav class="p-4">
        <div class="mb-2">
            <button @click="toggleCategory('getting-started')"
                class="w-full flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg text-left font-medium">
                <span class="flex items-center gap-2">
                    <i class="fa fa-rocket text-blue-600 text-sm"></i>
                    Primeiros Passos
                </span>
                <i class="fa fa-chevron-down text-xs transition-transform"
                    :class="openCategories.includes('getting-started') ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="openCategories.includes('getting-started')" x-collapse class="ml-4 mt-1 space-y-1">
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Introdução
                </a>
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg bg-blue-50 text-blue-600 border-l-2 border-blue-600">
                    Instalação
                </a>
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Configuração Inicial
                </a>
            </div>
        </div>

        <div class="mb-2">
            <button @click="toggleCategory('config')"
                class="w-full flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg text-left font-medium">
                <span class="flex items-center gap-2">
                    <i class="fa fa-cog text-slate-600 text-sm"></i>
                    Configuração
                </span>
                <i class="fa fa-chevron-down text-xs transition-transform"
                    :class="openCategories.includes('config') ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="openCategories.includes('config')" x-collapse class="ml-4 mt-1">
                Subcategoria
                <div x-data="{ openSub: false }">
                    <button @click="openSub = !openSub"
                        class="w-full flex items-center justify-between p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-left text-slate-700">
                        <span>Banco de Dados</span>
                        <i class="fa fa-chevron-down text-xs transition-transform"
                            :class="openSub ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="openSub" x-collapse class="ml-4 mt-1 space-y-1">
                        <a href="#"
                            class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-600 hover:text-blue-600">
                            MySQL
                        </a>
                        <a href="#"
                            class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-600 hover:text-blue-600">
                            PostgreSQL
                        </a>
                    </div>
                </div>

                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Variáveis de Ambiente
                </a>
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Cache
                </a>
            </div>
        </div>

        <div class="mb-2">
            <button @click="toggleCategory('api')"
                class="w-full flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg text-left font-medium">
                <span class="flex items-center gap-2">
                    <i class="fa fa-code text-slate-600 text-sm"></i>
                    API
                </span>
                <i class="fa fa-chevron-down text-xs transition-transform"
                    :class="openCategories.includes('api') ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="openCategories.includes('api')" x-collapse class="ml-4 mt-1 space-y-1">
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Autenticação
                </a>
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Endpoints
                </a>
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Rate Limiting
                </a>
            </div>
        </div>

        <div class="mb-2">
            <button @click="toggleCategory('guides')"
                class="w-full flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg text-left font-medium">
                <span class="flex items-center gap-2">
                    <i class="fa fa-book-open text-slate-600 text-sm"></i>
                    Guias
                </span>
                <i class="fa fa-chevron-down text-xs transition-transform"
                    :class="openCategories.includes('guides') ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="openCategories.includes('guides')" x-collapse class="ml-4 mt-1 space-y-1">
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Deploy em Produção
                </a>
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Segurança
                </a>
                <a href="#"
                    class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600">
                    Performance
                </a>
            </div>
        </div>
    </nav>
</aside>