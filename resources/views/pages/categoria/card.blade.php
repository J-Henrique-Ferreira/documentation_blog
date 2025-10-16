<div class="bg-white rounded-lg border border-slate-200 p-6 hover:shadow-lg transition-shadow">
    <div class="flex items-start justify-between items-center">
        <i class="{{ $category->icon }} text-[28px]"></i>
        <div class="flex items-center gap-2">
            <a
                href="{{ route('admin.categorias.edit', $category->id) }}"
                class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">
                <i class="fa fa-pencil-square-o"></i>
            </a>
            <form
                onsubmit="return confirm('Corfirmar remover categoria {{ $category->name }}')"
                action="{{ route('admin.categorias.destroy', $category->id) }}"
                method="POST"
                >
                @csrf
                @method('DELETE')
                <button class="p-2 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded transition-colors">
                    <i class="fa fa-trash-o"></i>
                </button>
            </form>
        </div>
    </div>

    <h3 class="text-lg font-semibold text-slate-900 mb-2">
        {{ $category->name }}
    </h3>

    <p class="text-sm text-slate-600 mb-4">
        {{ $category->description }}
    </p>

    <div class="flex items-center justify-between text-sm">
        <span class="text-slate-500">
            <i class="fas fa-file-alt mr-1"></i>
            0 documentos
        </span>
        <span class="text-slate-500">
            <i class="fas fa-layer-group mr-1"></i>
            0 subcategorias
        </span>
    </div>
</div>
