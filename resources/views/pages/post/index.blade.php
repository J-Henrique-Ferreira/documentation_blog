<x-app-layout>
@include('layouts.navigation-admin')

    <x-slot name="header" class="relative">
    </x-slot>

    <div class="w-full">
        <div class="p-6 lg:p-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Documentos</h1>
                    <p class="text-slate-600 mt-1">Gerencie toda a documentação do sistema</p>
                </div>
                <a 
                    href="{{ route('admin.documentos.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    <i class="fa fa-plus mr-2"></i>
                    Novo Documento
                </a>
            </div>

            <div class="bg-white rounded-lg border border-slate-200 p-4 mb-6">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="fa fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input 
                                type="text" 
                                placeholder="Buscar documentos..."
                                class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <select
                        class="px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Todas as categorias</option>

                        @foreach ($categoriesList as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <br>
            <br>

            <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="text-left p-4 font-semibold text-sm text-slate-700">Título</th>
                            <th class="text-left p-4 font-semibold text-sm text-slate-700 hidden md:table-cell">
                                Categoria</th>
                            <th class="text-left p-4 font-semibold text-sm text-slate-700 hidden lg:table-cell">
                                Atualizado</th>
                            <th class="text-left p-4 font-semibold text-sm text-slate-700 hidden sm:table-cell">
                                Status
                            </th>
                            <th class="text-right p-4 font-semibold text-sm text-slate-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($postsList as $post)
                            @include('pages.post.card')
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($postsList->total() > $postsList->perpage())
                <x-paginate-itens :paginateDatas="$postsList" />
            @endif
        </div>
    </div>
</x-app-layout>