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
            $sac = new Role();
            $sac->name = 'sac';
            $sac->display_name = 'Sac'; // optional
            $sac->description = ''; // optional
            $sac->save();
        }

        $role = DB::table('roles')->where('name', 'vendedor')->first();
        if (!$role) {
            $vendedor = new Role();
            $vendedor->name = 'vendedor';
            $vendedor->display_name = 'Vendedor'; // optional
            $vendedor->description = ''; // optional
            $vendedor->save();
        }

        $role = DB::table('roles')->where('name', 'fornecedor')->first();
        if (!$role) {
            $fornecedor = new Role();
            $fornecedor->name = 'fornecedor';
            $fornecedor->display_name = 'Fornecedor'; // optional
            $fornecedor->description = ''; // optional
            $fornecedor->save();
        }

        $role = DB::table('roles')->where('name', 'cliente')->first();
        if (!$role) {
            $cliente = new Role();
            $cliente->name = 'cliente';
            $cliente->display_name = 'Cliente'; // optional
            $cliente->description = ''; // optional
            $cliente->save();
        }
    }
}
