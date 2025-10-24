<x-app-layout>
    @include('layouts.navigation-admin')

    <x-slot name="header" class="relative">
        @include('partials.header')
    </x-slot>

    <div class="w-2/3 mx-auto">
        <div class="p-6 lg:p-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">
                    @if($method == "POST")
                        Novo usuário
                    @else
                        Editar usuário - {{ $user->name }}
                    @endif
                </h1>
                <!--                 <p class="text-slate-600 mt-1">Crie uma nova categoria para sua documentação</p> -->
            </div>

            <form action="{{ $action }}" method="POST" class="p-6 space-y-6">

                @csrf
                @method($method ?: 'POST')


                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Nome do usuário</label>
                    <input type="text" placeholder="Ex: Jhon Doe" name="name"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('name', $contentPost->name ?? '') ?: $user->name ?? '' }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">E-mail</label>
                    <input type="text" name="email" placeholder="Ex: fa-rocket"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('email', $contentPost->email ?? '') ?: $user->email ?? '' }}">

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Senha</label>
                    <input type="text" name="password" placeholder="Ex: H%Ta*#s!#18"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('password', $contentPost->password ?? '') ?: $user->password ?? '' }}">

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>
                

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Confirmar senha</label>
                    <input type="text" name="password_confirmation"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('password', $contentPost->password_confirmation ?? '') }}">

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Cliente</label>
                    <select name="category_id"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Selecione um cliente</option>
                        
                        @foreach ($tenantsList as $tenant)
                            <option value="{{ $tenant->id }}" 
                                @if( old('tenant_id', $contentPost->tenant_id ?? '') == $tenant->id)
                                    selected 
                                @elseif(isset($post->tenant_id))
                                    @if($post->tenant_id == $tenant->id)
                                        selected
                                    @endif
                                @endif
                            >
                                {{ $tenant->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        <i class="fa fa-save mr-2"></i>
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>