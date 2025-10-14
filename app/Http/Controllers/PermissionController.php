<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{

    public function __invoke()
    {
        // Criando um usuário e dando permissão de admin
        $user = \App\Models\User::factory()->create();
        auth()->login($user);
        $user->assignPermission('admin');

        Gate::authorize('admin');

        // verificar se o tenantIs bate e se é o admin

        return 'Você é um admin';

    }
}