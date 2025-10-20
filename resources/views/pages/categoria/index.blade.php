<x-app-layout>
    @include('layouts.navigation-admin')

    <x-slot name="header" class="relative"></x-slot>

    <div class="w-full">
        <div class="p-6 lg:p-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Categorias</h1>
                    <p class="text-slate-600 mt-1">Organize a estrutura da documentação</p>
                </div>
                <a href="{{ route('admin.categorias.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    <i class="fa fa-plus mr-2"></i>Nova Categoria
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    @include('pages/categoria/card', ['category' => $category])
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>