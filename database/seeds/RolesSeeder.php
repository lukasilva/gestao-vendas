<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = DB::table('roles')->where('name', 'admin')->first();
        if (!$role) {
            $admin = new Role();
            $admin->name = 'admin';
            $admin->display_name = 'Administrador'; // optional
            $admin->description = 'Administrador interno do projeto'; // optional
            $admin->save();
        }

        $role = DB::table('roles')->where('name', 'sac')->first();
        if (!$role) {
            $gestor = new Role();
            $gestor->name = 'sac';
            $gestor->display_name = 'Sac'; // optional
            $gestor->description = ''; // optional
            $gestor->save();
        }

        $role = DB::table('roles')->where('name', 'vendedor')->first();
        if (!$role) {
            $colaborador = new Role();
            $colaborador->name = 'vendedor';
            $colaborador->display_name = 'Vendedor'; // optional
            $colaborador->description = ''; // optional
            $colaborador->save();
        }

        $role = DB::table('roles')->where('name', 'fornecedor')->first();
        if (!$role) {
            $colaborador = new Role();
            $colaborador->name = 'fornecedor';
            $colaborador->display_name = 'Fornecedor'; // optional
            $colaborador->description = ''; // optional
            $colaborador->save();
        }
    }
}
