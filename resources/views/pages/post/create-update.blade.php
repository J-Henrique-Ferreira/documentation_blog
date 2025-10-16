
<x-app-layout>
    <x-slot name="header" class="relative"> </x-slot>

    <div class="w-2/3 mx-auto">
        <div class="p-6 lg:p-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">
                    @if($method == "POST")
                        Novo documento
                    @else
                        Editar documento  -  {{ $post->name }}
                    @endif
                </h1>
                <!--  <p class="text-slate-600 mt-1">Crie uma nova categoria para sua documentação</p> -->
            </div>

            <form class="p-6 space-y-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Título</label>
                    <input type="text" placeholder="Ex: Instalação do Sistema"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Categoria</label>
                    <select
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Selecione uma categoria</option>
                        <option>Primeiros Passos</option>
                        <option>Configuração</option>
                        <option>API</option>
                        <option>Guias</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Subcategoria (opcional)</label>
                    <select
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Nenhuma</option>
                        <option>Banco de Dados</option>
                        <option>Cache</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Descrição curta</label>
                    <input type="text" placeholder="Breve descrição do documento"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Conteúdo</label>
                    <textarea rows="10" placeholder="Escreva o conteúdo da documentação aqui... (suporta Markdown)"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono text-sm"></textarea>
                    <p class="text-xs text-slate-500 mt-2">
                        <i class="fas fa-info-circle"></i>
                        Você pode usar Markdown para formatar o texto
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="draft" class="text-blue-600 focus:ring-blue-500">
                            <span class="text-sm text-slate-700">Rascunho</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="published" class="text-blue-600 focus:ring-blue-500"
                                checked>
                            <span class="text-sm text-slate-700">Publicado</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                    <button type="button" @click="showModal = false"
                        class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        <i class="fas fa-save mr-2"></i>Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
