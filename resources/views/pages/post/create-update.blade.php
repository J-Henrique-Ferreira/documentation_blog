<x-app-layout>
    @include('layouts.navigation-admin')

    <x-slot name="header" class="relative">
        @include('partials.header')
    </x-slot>

    <div class="w-2/3 mx-auto">
        <div class="p-6 lg:p-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">
                    @if($method == "POST")
                        Novo documento
                    @else
                        Editar documento - {{ $post->title }}
                    @endif
                </h1>
                <!--  <p class="text-slate-600 mt-1">Crie uma nova categoria para sua documentação</p> -->
            </div>

            <form action="{{ $action }}" method="POST" class="p-6 space-y-6">

                @csrf
                @method($method ?: 'POST')

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Título</label>
                    <input type="text" name="title" id="title" placeholder="Ex: Instalação do Sistema"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('title', $contentPost->title ?? '') ?: $post->title ?? '' }}">

                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Descrição curta</label>
                    <input type="text" placeholder="Breve descrição do documento" name="description"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('description', $contentPost->description ?? '') ?: $post->description ?? '' }}">

                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>


                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Slug <span class="text-[12px]">unico*</span>
                    </label>

                    <input type="text" placeholder="Ex: instalacao-do-sistema" id="slug" name="slug"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('slug', $contentPost->slug ?? '') ?: $post->slug ?? '' }}">

                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Categoria</label>
                    <select name="category_id"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Selecione uma categoria</option>
                        
                        @foreach ($categoriesList as $category)
                            <option value="{{ $category->id }}" 
                                @if( old('category_id', $contentPost->category_id ?? '') == $category->id)
                                    selected 
                                @elseif(isset($post->category_id))
                                    @if($post->category_id == $category->id)
                                        selected
                                    @endif
                                @endif
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Conteúdo</label>
                    <textarea rows="10" name="content" id="markdown-editor"
                        placeholder="Escreva o conteúdo da documentação aqui... (suporta Markdown)"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono text-sm">{{ old('content', $contentPost->content ?? '') ?: $post->content ?? '' }}</textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>

                    <p class="text-xs text-slate-500 mt-2">
                        <i class="fa fa-info-circle"></i>
                        Você pode usar Markdown para formatar o texto
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="draft" class="text-blue-600 focus:ring-blue-500">
                            <span class="text-sm text-slate-700">
                                Rascunho
                            </span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="publish" class="text-blue-600 focus:ring-blue-500"
                                checked>
                            <span class="text-sm text-slate-700">
                                Publicado
                            </span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                    <button class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        <i class="fa fa-save mr-2"></i>Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        // Função para converter título em slug
        function gerarSlug(texto) {
            return texto
                .toLowerCase() // tudo minúsculo
                .normalize('NFD') // separa acentos das letras
                .replace(/[\u0300-\u036f]/g, '') // remove acentos
                .replace(/[^a-z0-9\s-]/g, '') // remove caracteres especiais
                .trim() // remove espaços extras nas pontas
                .replace(/\s+/g, '-') // troca espaços por hífens
                .replace(/-+/g, '-'); // evita hífens duplos
        }

        // Observa mudanças no título
        titleInput.addEventListener('input', () => {
            const slug = gerarSlug(titleInput.value);
            slugInput.value = slug;
        });
    </script>

    <!-- EasyMDE via CDN -->
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

    <script>
        const easyMDE = new EasyMDE({
            element: document.getElementById('markdown-editor'),
            spellChecker: false,
            placeholder: "Escreva sua documentação em Markdown..."
        });
    </script>
</x-app-layout>