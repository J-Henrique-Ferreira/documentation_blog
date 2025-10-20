{{-- Linha "Mostrando X-Y de Z documentos" + paginação --}}
<div class="mt-6 flex items-center justify-between">
    {{-- Range --}}
    <div class="text-sm text-slate-600">
        {{-- firstItem() pode ser null se não houver itens, então tratamos --}}
        @if ($paginateDatas->total() > 0)
            Mostrando
            <span>{{ $paginateDatas->firstItem() }}</span> -
            <span>{{ $paginateDatas->lastItem() }}</span>
            de <span>{{ $paginateDatas->total() }}</span> documentos
        @else
            Mostrando 0 de 0 documentos
        @endif
    </div>

    {{-- Paginação personalizada simples --}}
    <nav aria-label="Paginação" class="flex items-center gap-2">
        {{-- Anterior --}}
        @if ($paginateDatas->onFirstPage())
            <span class="px-3 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50 opacity-50">
                Anterior
            </span>
        @else
            <a href="{{ $paginateDatas->previousPageUrl() }}"
                class="px-3 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50 disabled:opacity-50">
                Anterior
            </a>
        @endif

        {{-- Números de página (pequeno loop) --}}
        @php
            // range simples: 1 .. lastPage()
            $last = $paginateDatas->lastPage();
            $current = $paginateDatas->currentPage();
            // opcional: limitar quantidade de botões visíveis (ex.: mostrar 1..5 se muitas páginas)
            $start = 1;
            $end = $last;
            // Se quiser limitar à janela de 5 páginas centralizada no current, descomente as linhas abaixo:
            // $window = 5;
            // $start = max(1, $current - floor($window/2));
            // $end = min($last, $start + $window - 1);
        @endphp

        @for ($i = $start; $i <= $end; $i++)
            @if ($i == $current)
                <span class="px-3 py-2 text-sm bg-blue-600 text-white border-l border-r rounded-md">{{ $i }}</span>
            @else
                {{-- usamos appends(request()->query()) para preservar outros parâmetros de query --}}
                <a href="{{ $paginateDatas->appends(request()->query())->url($i) }}"
                    class="px-3 py-2 text-sm text-slate-600 hover:bg-gray-50 border rounded-md">{{ $i }}</a>
            @endif
        @endfor

        {{-- Próximo --}}
        @if ($paginateDatas->hasMorePages())
            <a href="{{ $paginateDatas->nextPageUrl() }}"
                class="px-3 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50 disabled:opacity-50">
                Próximo
            </a>
        @else
            <span class="px-3 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50 opacity-50">
                Próximo
            </span>
        @endif
    </nav>
</div>