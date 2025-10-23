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
                        Nova Categoria
                    @else
                        Editar Categoria - {{ $category->name }}
                    @endif
                </h1>
                <!--                 <p class="text-slate-600 mt-1">Crie uma nova categoria para sua documentação</p> -->
            </div>

            <form action="{{ $route }}" method="POST" class="p-6 space-y-6">

                @csrf
                @method($method ?: 'POST')


                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Nome da Categoria</label>
                    <input type="text" placeholder="Ex: Primeiros Passos" name="name"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('name', $contentPost->name ?? '') ?: $category->name ?? '' }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Ícone (Font Awesome)</label>
                    <input type="text" name="icon" placeholder="Ex: fa-rocket"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('icon', $contentPost->icon ?? '') ?: $category->icon ?? '' }}">

                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>

                    <p class="text-xs text-slate-500 mt-2">
                        <i class="fa fa-info-circle"></i>
                        Visite
                        <a href="https://fontawesome.com/v4/icons" target="_blank"
                            class="text-blue-600 hover:underline">
                            fontawesome.com
                        </a>
                        para escolher um ícone
                    </p>
                </div>

                <!-- <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Categoria Pai (opcional)</label>
                    <select
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Nenhuma (categoria principal)</option>
                        <option>Primeiros Passos</option>
                        <option>Configuração</option>
                        <option>API</option>
                        <option>Guias</option>
                    </select>
                    <p class="text-xs text-slate-500 mt-2">
                        Selecione uma categoria pai para criar uma subcategoria
                    </p>
                </div> -->


                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        <i class="fa fa-save mr-2"></i>
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>