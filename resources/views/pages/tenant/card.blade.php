<tr class="hover:bg-slate-50 w-full">
    <td class="p-4 w-[800px]">
        <div
            class="font-medium text-slate-900 text-ellipsis overflow-hidden [display:-webkit-box] [-webkit-line-clamp:1] [-webkit-box-orient:vertical]">
            {{ $tenant->name }}
        </div>
    </td>
    <td class="p-4 text-sm text-slate-600 hidden lg:table-cell">
        {{ $tenant->updated_at }}
    </td>

    <td class="p-4">
        <div class="flex items-center justify-end gap-1">
            <a href="{{ route('admin.clientes.show', $tenant->id) }}"
                class="p-1 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors" title="ver">
                <i class="fa fa-external-link"></i>
            </a>
            <a href="{{ route('admin.clientes.edit', $tenant->id) }}"
                class="p-1 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors"
                title="Editar">
                <i class="fa fa-edit"></i>
            </a>
            <form onsubmit="return confirm('Confirmar remover documento?')"
                action="{{ route('admin.clientes.destroy', $tenant->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="p-1 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded transition-colors"
                    title="Excluir">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </div>
    </td>
</tr>