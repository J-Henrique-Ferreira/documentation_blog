<tr class="hover:bg-slate-50">
    <td class="p-4">
        <div class="font-medium text-slate-900">
            {{ $post->title }}
        </div>
        <div class="text-sm text-slate-500 mt-1">
            {{ $post->description }}
        </div>
    </td>
    <td class="p-4 hidden md:table-cell">
        <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">
            <i class="{{ $post->category->icon }}"></i>
            {{ $post->category->name }}
        </span>
    </td>
    <td class="p-4 text-sm text-slate-600 hidden lg:table-cell">
    {{ $post->updated_at }}
    </td>
    <td class="p-4 hidden sm:table-cell">

        @if($post->status === 'publish')
            <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
                <i class="fa fa-check-circle"></i>
                publicado
            </span>
        @endif


        @if($post->status === 'draft')
            <span class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-200 text-yellow-700 rounded text-xs font-medium">
            <i class="fa fa-check-circle"></i>
            rascunho
            </span>
        @endif
    </td>

    <td class="p-4">
        <div class="flex items-center justify-end gap-2">
            <a 
                href="{{ route('admin.documentos.edit', $post->id) }}"
                class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors"
                title="Editar">
                <i class="fa fa-edit"></i>
            </a>
            <form 
            onsubmit="return confirm('Confirmar remover documento?')"
            action="{{ route('admin.documentos.destroy', $post->id) }}"
            method="POST">
                @csrf
                @method('DELETE')
                <button 
                    type="submit"
                    class="p-2 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded transition-colors"
                    title="Excluir">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
