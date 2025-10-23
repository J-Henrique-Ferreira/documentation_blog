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
                        Novo cliente
                    @else
                        Editar cliente - {{ $tenant->name }}
                    @endif
                </h1>
                <!--  <p class="text-slate-600 mt-1">Crie uma nova categoria para sua documentação</p> -->
            </div>

            <form action="{{ $action }}" method="POST" class="p-6 space-y-6">

                @csrf
                @method($method ?: 'POST')

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Título</label>
                    <input type="text" name="name" id="name" placeholder="Ex: Instalação do Sistema"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('name', $contentPost->name ?? '') ?: $tenant->name ?? '' }}">

                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Conteúdo</label>
                    <textarea rows="10" name="content" id="markdown-editor"
                        placeholder="Escreva o conteúdo da documentação aqui... (suporta Markdown)"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono text-sm">{{ old('content', $contentPost->content ?? '') ?: $tenant->content ?? '' }}</textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>

                    <p class="text-xs text-slate-500 mt-2">
                        <i class="fa fa-info-circle"></i>
                        Você pode usar Markdown para formatar o texto
                    </p>
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

    <!-- EasyMDE via CDN -->
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

    <script>
        const easyMDE = new EasyMDE({
            element: document.getElementById('markdown-editor'),
            spellChecker: false,
            autosave: {
                enabled: true,
                uniqueId: "post_markdown_autosave",
                delay: 1000,
            },
            placeholder: "Escreva sua documentação em Markdown..."
        });
    </script>
</x-app-layout>