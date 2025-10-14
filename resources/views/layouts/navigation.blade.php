<?php
$linksList = [
    [
        'name' => 'Painel De Controle',
        'href' => 'dashboard',
        'icon' => 'fa fa-bar-chart',
        // 'route_pattern' => '/' // Adicione o padrão da rota
        'route_pattern' => 'dashboard', // Captura todos os métodos
        'can' => null // Adicione a verificação de permissão se necessário
    ],
    [
        'name' => 'Link de Exemplo',
        'href' => '#',
        'icon' => 'fa fa-cubes w-4',
        'route_pattern' => '/' // Captura todos os métodos
        // 'route_pattern' => '' // Para futuras rotas
    ],
    [
        'name' => 'Link de Exemplo',
        'href' => '#',
        'icon' => 'fa fa-cubes w-4',
        'route_pattern' => '/' // Captura todos os métodos
        // 'route_pattern' => '' // Para futuras rotas
    ],
    [
        'name' => 'Link de Exemplo',
        'href' => '#',
        'icon' => 'fa fa-cubes w-4',
        'route_pattern' => '/' // Captura todos os métodos
        // 'route_pattern' => '' // Para futuras rotas
    ],
    [
        'name' => 'Link de Exemplo',
        'href' => '#',
        'icon' => 'fa fa-cubes w-4',
        'route_pattern' => '/' // Captura todos os métodos
        // 'route_pattern' => '' // Para futuras rotas
    ],
    [
        'name' => 'Link de Exemplo',
        'href' => '#',
        'icon' => 'fa fa-cubes w-4',
        'route_pattern' => '/' // Captura todos os métodos
        // 'route_pattern' => '' // Para futuras rotas
    ],
    [
        'name' => 'Link de Exemplo',
        'href' => '#',
        'icon' => 'fa fa-cubes w-4',
        'route_pattern' => '/' // Captura todos os métodos
        // 'route_pattern' => '' // Para futuras rotas
    ],
    [
        'name' => 'Usuários',
        'href' => '#',
        'icon' => 'fa fa-users w-4',
        'route_pattern' => '/', // Captura todos os métodos
        // 'route_pattern' => '' // Para futuras rotas
        'can' => 'admin_owner'
    ],
];
?>

<div x-data="{ sidebarOpen: true }" class="flex h-screen border-r border-gray-200 fixed z-10">
    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 transform
        bg-white border-opacity-30 transition duration-300 ease-in-out md:relative md:translate-x-0 uppercase">

        <!-- Navigation -->
        <nav class="p-4 space-y-2 mt-20">
            <p class="px-4 pt-4 text-sm font-semibold text-gray-600 uppercase tracking-wider hidden">
                Menu Principal
            </p>

            @foreach ($linksList as $link)
                @php
                    $isActive = request()->routeIs($link['route_pattern']);
                @endphp

                @if(isset($link['can']))
                    @can($link['can'])
                        <a href="{{ $link['href'] }}"
                            class="flex items-center px-4 py-2.5 rounded-lg transition-all duration-300 hover:bg-[#ebeef1c0]
                            text- {{ $isActive ? 'bg-black text-white hover:text-black' : '' }}">
                            <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                            <span class="ml-3 text-sm">{{ $link['name'] }}</span>
                        </a>
                    @endcan
                @else
                    <a href="{{ $link['href'] }}"
                        class="flex items-center px-4 py-2.5 rounded-lg transition-all duration-300 hover:bg-[#ebeef1c0]
                         text- {{ $isActive ? 'bg-black text-white hover:text-black' : '' }}">
                        <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                        <span class="ml-3 text-sm">{{ $link['name'] }}</span>
                    </a>
                @endif
            @endforeach


            <!-- Users link -->
            <p class="px-4 pt-8 text-sm font-semibold text-gray-600 uppercase tracking-wider hidden">
                Configurações
            </p>

            <br>
            <br>

        </nav>

        <div class="w-full p-4 pb-7 border-opacity-30 absolute bottom-0">

            <!-- Settings link -->
            <a href="{{ route('profile.edit') }}"
                class="flex items-center px-4 py-2.5 rounded-lg hover:bg-[#ebeef1c0] text-black transition-all
                duration-300 {{ request()->routeIs('profile.*') ? 'bg-black text-white hover:text-black' : '' }}">
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
