<x-app-layout>
    @include('layouts.navigation-admin')

    <x-slot name="header" class="relative">
        @php
            $displayFilter = true;
        @endphp

        @include('partials.header')
    </x-slot>

    <div class="w-full">
        @if (count($postsList) > 0)
            <div class="p-6 lg:p-8">
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="text-left p-4 font-semibold text-sm text-slate-700">Título</th>
                                <th class="text-left p-4 font-semibold text-sm text-slate-700 hidden lg:table-cell">
                                    Atualizado</th>
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
        @endif

        @if (count($postsList) <= 0)
            <div class="p-6 lg:p-8 mt-[30vh]">
                <div class=" h-full w-full text-center my-auto text-gray-500 text-xl">
                    Opss! Ainda stamos criando os documentos desta categoria...
                </div>
            </div>
        @endif
    </div>
</x-app-layout>