<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionList = [
            [
                'name' => 'admin_master',
                'description' => 'desenvolvedor com acesso master e painel de gerenciemento do servidor e recursos da aplicação',
            ],
            [
                'name' => 'admin_owner',
                'description' => 'proprietário de uma instância do aplicativo, é proprietário de um estabelecimento',
            ],
            [
                'name' => 'admin_worker',
                'description' => 'funcionário de um estabelecimento que precisa fazer alterações recorrentes na instancia da aplicação, pode ser um entregador, garçom, atendendte, balconista ou recepcionista',
            ],
            [
                'name' => 'admin_basic',
                'description' => 'funcionário de um estabelecimento com recursos limitados pelo admin_owner',
            ],
            [
                'name' => 'admin_preview',
                'description' => 'tem permissiões de admin:owner, porem em uma aplicação de teste com limitações propositais para que o cliente assine o plano pago',
            ],
            [
                'name' => 'client',
                'description' => 'cliente padrão da aplicação, pode fazer pedidos, criar carrinhos etc...',
            ]
        ];

        foreach ($permissionList as $permissionName) {
            Permission::updateOrCreate(
                [
                    ...$permissionName
                ]
            );
        }
    }
}
