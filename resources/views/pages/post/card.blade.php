<tr class="hover:bg-slate-50">
    <td class="p-4">
        <div class="font-medium text-slate-900">Instalação do Sistema</div>
        <div class="text-sm text-slate-500 mt-1">Como instalar e configurar...</div>
    </td>
    <td class="p-4 hidden md:table-cell">
        <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">
            <i class="fa fa-rocket"></i>
            Primeiros Passos
        </span>
    </td>
    <td class="p-4 text-sm text-slate-600 hidden lg:table-cell">Há 2 dias</td>
    <td class="p-4 hidden sm:table-cell">
        <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
            <i class="fa fa-check-circle"></i>
            Publicado
        </span>
    </td>
    <td class="p-4">
        <div class="flex items-center justify-end gap-2">
            <button @click="showModal = true; modalType = 'edit'"
                class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors"
                title="Editar">
                <i class="fa fa-edit"></i>
            </button>
            <button class="p-2 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded transition-colors"
                title="Excluir">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </td>
</tr>

<tr class="hover:bg-slate-50">
    <td class="p-4">
        <div class="font-medium text-slate-900">Configuração do Banco de Dados</div>
        <div class="text-sm text-slate-500 mt-1">Aprenda a configurar MySQL e PostgreSQL...
        </div>
    </td>
    <td class="p-4 hidden md:table-cell">
        <span class="inline-flex items-center gap-1 px-2 py-1 bg-slate-100 text-slate-700 rounded text-xs font-medium">
            <i class="fa fa-cog"></i>
            Configuração
        </span>
    </td>
    <td class="p-4 text-sm text-slate-600 hidden lg:table-cell">Há 5 dias</td>
    <td class="p-4 hidden sm:table-cell">
        <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
            <i class="fa fa-check-circle"></i>
            Publicado
        </span>
    </td>
    <td class="p-4">
        <div class="flex items-center justify-end gap-2">
            <button @click="showModal = true; modalType = 'edit'"
                class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">
                <i class="fa fa-edit"></i>
            </button>
            <button class="p-2 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded transition-colors">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </td>
</tr>

<tr class="hover:bg-slate-50">
    <td class="p-4">
        <div class="font-medium text-slate-900">API de Autenticação</div>
        <div class="text-sm text-slate-500 mt-1">Endpoints e exemplos de uso...</div>
    </td>
    <td class="p-4 hidden md:table-cell">
        <span class="inline-flex items-center gap-1 px-2 py-1 bg-slate-100 text-slate-700 rounded text-xs font-medium">
            <i class="fa fa-code"></i>
            API
        </span>
    </td>
    <td class="p-4 text-sm text-slate-600 hidden lg:table-cell">Há 1 semana</td>
    <td class="p-4 hidden sm:table-cell">
        <span class="inline-flex items-center gap-1 px-2 py-1 bg-amber-100 text-amber-700 rounded text-xs font-medium">
            <i class="fa fa-clock"></i>
            Rascunho
        </span>
    </td>
    <td class="p-4">
        <div class="flex items-center justify-end gap-2">
            <button @click="showModal = true; modalType = 'edit'"
                class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">
                <i class="fa fa-edit"></i>
            </button>
            <button class="p-2 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded transition-colors">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </td>
</tr>