<tr class="hover:bg-slate-50">
    <td class="p-4 w-[60%]">
        <div
            class="font-medium text-slate-900 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:1] [-webkit-box-orient:vertical]">
            {{ $post->title }}
        </div>
        <div
            class="text-sm text-slate-500 mt-1 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:2] [-webkit-box-orient:vertical]">
            {{ $post->description }}
        </div>
    </td>

    <td class="p-4 text-sm text-slate-600 hidden lg:table-cell">
        {{ $post->updated_at }}
    </td>

    <td class="p-4">
        <div class="flex items-center justify-end gap-2">
            <a 
            href="{{ route('documento.show', $post->slug) }}"
            class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors" 
            title="ver">
                <i class="fa fa-external-link"></i>
            </a>
        </div>
    </td>
</tr>