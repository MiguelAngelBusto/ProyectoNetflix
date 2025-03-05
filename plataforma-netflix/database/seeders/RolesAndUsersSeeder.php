<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;  // Asegúrate de agregar esta línea

class RolesAndUsersSeeder extends Seeder
{
    public function run()
    {
        // Insertamos los roles predeterminados
        DB::table('roles')->insert([
            ['name' => 'comun'],
            ['name' => 'administrador'],
            ['name' => 'super_usuario'],
        ]);

        // Crear usuarios con roles
        $comun = Role::where('name', 'comun')->first();
        $administrador = Role::where('name', 'administrador')->first();
        $superUsuario = Role::where('name', 'super_usuario')->first();

        User::create([
            'name' => 'Usuario Comun',
            'email' => 'usuario@comun.com',
            'password' => Hash::make('password'),
            'role_id' => $comun->id,
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => $administrador->id,
        ]);

        User::create([
            'name' => 'Super Usuario',
            'email' => 'super@admin.com',
            'password' => Hash::make('password'),
            'role_id' => $superUsuario->id,
        ]);
    }
}
