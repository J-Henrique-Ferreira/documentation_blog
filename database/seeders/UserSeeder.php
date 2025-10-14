<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['name' => 'joao', 'email' => 'j@email.com', 'tenant_id' => 1], // critérios de busca
            [
                'name' => 'joao',
                'email' => 'j@email.com',
                'password' => 'SenhaForte123',
                'tenant_id' => 1,
            ] // dados a serem atualizados
        );

        User::updateOrCreate(
            ['name' => 'joao', 'email' => 'j@email.com', 'tenant_id' => 2], // critérios de busca
            [
                'name' => 'joao',
                'email' => 'j@email.com',
                'password' => 'SenhaForte123',
                'tenant_id' => 2,
            ] // dados a serem atualizados
        );

        User::updateOrCreate(
            ['name' => 'joao', 'email' => 'j@email.com', 'tenant_id' => 3], // critérios de busca
            [
                'name' => 'joao',
                'email' => 'j@email.com',
                'password' => 'SenhaForte123',
                'tenant_id' => 3,
            ] // dados a serem atualizados
        );

        User::factory()->count(40)->create();
    }
}
