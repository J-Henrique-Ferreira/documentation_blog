<x-app-layout>
    @include('layouts.navigation-admin')

    <x-slot name="header" class="relative">
        @php
            $displayFilter = true;
        @endphp

        @include('partials.header')
    </x-slot>

    <div class="w-full">
        <div class="p-6 lg:p-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Clientes</h1>
                    <p class="text-slate-600 mt-1">Gerencie todos os clientes do sistema</p>
                </div>
                <a href="{{ route('admin.clientes.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    <i class="fa fa-plus mr-2"></i>
                    Novo cliente
                </a>
            </div>

            <br>
            <br>

            <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="text-left p-4 font-semibold text-sm text-slate-700">Nome</th>

                            <th class="text-left p-4 font-semibold text-sm text-slate-700 hidden lg:table-cell">
                                Atualizado</th>
                            <th class="text-right p-4 font-semibold text-sm text-slate-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($tenantsList as $tenant)
                            @include('pages.tenant.card')
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($tenantsList->total() > $tenantsList->perpage())
                <x-paginate-itens :paginateDatas="$tenantsList" />
            @endif
        </div>
    </div>
</x-app-layout>