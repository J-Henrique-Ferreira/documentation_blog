<?php

if (!isset($routesLinksList)) {
    $routesLinksList = [
        [
            'name' => 'Documentos',
            'href' => route('admin.documentos.index'),
            'icon' => 'fa  fa-file-text',
            'route_pattern' => 'admin/documentos', // Captura todos os métodos
            'can' => null // Adicione a verificação de permissão se necessário
        ],
        [
            'name' => 'Categorias',
            'href' => route('admin.categorias.index'),
            'icon' => 'fa fa-folder-o w-4',
            'route_pattern' => 'admin/categorias' // Captura todos os métodos
            // 'route_pattern' => '' // Para futuras rotas
        ],
        [
            'name' => 'Clientes',
            'href' => route('admin.clientes.index'),
            'icon' => 'fa fa-users w-4',
            'route_pattern' => 'admin/clientes', // Captura todos os métodos
            'can' => 'admin_owner'
        ],
        [
            'name' => 'Usuários',
            'href' => route('admin.usuarios.index'),
            'icon' => 'fa fa-user-plus w-4',
            'route_pattern' => 'admin/usuarios' // Captura todos os métodos
        ],
    ];
}



?>

<div class="flex h-screen border-r border-gray-200 fixed z-10">
    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 transform bg-white border-opacity-30
        transition duration-300 ease-in-out md:relative md:translate-x-0 uppercase">

        <!-- Navigation -->
        <nav class="p-4 space-y-2 mt-3">
            <p class="px-4 pt-4 text-sm font-semibold text-gray-600 uppercase tracking-wider hidden">
                Menu Principal
            </p>

            @foreach ($routesLinksList as $link)
                @php
                    if (isset($link['route_pattern'])) {
                        $isActive = request()->is($link['route_pattern'] . '*');
                    }
                    // verificar se o post atual pertence a categoria para marcar ela como active

                    if (isset($link['id'])) {
                        $isActive = request()->category_id == $link['id'];
                    }

                    if (isset($post) && isset($link['id'])) {
                        $isActive = $post->category_id == $link['id'];
                    }

                @endphp

                @if(isset($link['can']))
                    @can($link['can'])
                        <a href="{{ $link['href'] }}"
                            class="flex items-center px-4 py-2.5 rounded-lg transition-all duration-300 border border-transparent hover:bg-blue-50 hover:text-blue-600 text- {{ $isActive ? 'bg-blue-50 text-blue-600 border-l-blue-500 border-2' : '' }}">
                            <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                            <span class="ml-3 text-sm">{{ $link['name'] }}</span>
                        </a>
                    @endcan
                @else
                    <a href="{{ $link['href'] }}"
                        class="flex items-center px-4 py-2.5 rounded-lg transition-all duration-300 border border-transparent hover:bg-blue-50 hover:text-blue-600 text- {{ $isActive ? 'bg-blue-50 text-blue-600 border-l-blue-500 border-2' : '' }}">
                        <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                        <span class="ml-3 text-sm">{{ $link['name'] }}</span>
                    </a>
                @endif
            @endforeach

        </nav>

        <div class="w-full p-4 pb-7 border-opacity-30 absolute bottom-10">

            <!-- Settings link -->
            <a href=" {{ route('profile.edit') }}"
                class="flex items-center px-4 py-2.5 rounded-lg hover:bg-[#e3f1ff71] text-black transition-all duration-300 {{ request()->routeIs('profile.*') ? 'bg-black text-white hover:text-black' : '' }}">
                <i class="fa fa-cog"></i>

                <span class="ml-3 text-sm">Configurações</span>
            </a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-2.5
                rounded-lg hover:bg-[#ebeef1c0]  text-black hover:text-red-500 transition-all duration-300 uppercase">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span class="ml-3 text-sm">Sair</span>
                </button>
            </form>
        </div>
    </div>
</div>