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

       <div x-data="postsAccordion()">
            @foreach ($categoriesList as $key => $category)
                <div class="mb-2">
                    <button
                        @click="loadCategory('{{ $category->id }}', '{{ $category->name }}')"
                        class="w-full flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg text-left font-medium"
                    >
                        <span class="flex items-center gap-2">
                            <i class="fa fa-rocket text-blue-600 text-sm"></i>
                            {{ $category->name }}
                        </span>
                        <i class="fa fa-chevron-down text-xs transition-transform"
                        :class="openCategories.includes('{{ $category->name }}') ? 'rotate-180' : ''"></i>
                    </button>

                    <div
                        x-show="openCategories.includes('{{ $category->name }}')"
                        x-collapse
                        class="ml-4 mt-1 space-y-1"
                    >
                        <template x-for="post in categories['{{ $category->id }}']" :key="post.slug">
                            <a
                                :href="'/documentos/' + post.slug"
                                class="block p-2 pl-6 text-sm hover:bg-slate-50 rounded-lg text-slate-700 hover:text-blue-600"
                                x-text="post.title"
                            ></a>
                        </template>

                        <!-- Loader -->
                        <template x-if="loadingCategory === '{{ $category->id }}'">
                            <p class="text-sm text-slate-500 pl-6">Carregando...</p>
                        </template>
                    </div>

                    <form action="{{ route('documentos.getByCategory', $category->id) }}" method="GET" class="hidden" id="form-{{ $category->id }}">
                        @csrf
                    </form>
                </div>
            @endforeach
        </div>

        <!-- <div class="mb-2">
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
        </div> -->
    </nav>
</aside>

<script>
    function postsAccordion() {
        return {
            openCategories: [],
            categories: {}, // Armazena os posts por categoria
            loadingCategory: null,

            toggleCategory(name) {
                if (this.openCategories.includes(name)) {
                    this.openCategories = this.openCategories.filter(c => c !== name);
                } else {
                    this.openCategories.push(name); 
                }
            },

            async loadCategory(categoryId, categoryName) {
                // Abre ou fecha o accordion
                this.toggleCategory(categoryName);

                // Evita recarregar se já carregado
                if (this.categories[categoryId]) return;

                this.loadingCategory = categoryId;

                try {
                    const response = await fetch(`{{ url('documentosbycategory') }}/${categoryId}`, {
                        headers: { 'Accept': 'application/json' },
                    });

                    if (!response.ok) throw new Error('Erro ao carregar os posts.');

                    const data = await response.json();
                    this.categories[categoryId] = data.posts ?? [];

                } catch (error) {
                    console.error(error);
                    this.categories[categoryId] = [];
                } finally {
                    this.loadingCategory = null;
                }
            }
        }
    }
</script>
