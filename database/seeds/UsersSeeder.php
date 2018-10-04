<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = DB::table('users')->where('login', 'admin')->first();

        if (!$result) {
            $user =  User::create([
                'login' => 'admin',
                'name' => 'Lucas Silva',
                'email' => 'lucasrafael7070@gmail.com',
                'password' => bcrypt('admin1234'),
            ]);
            $roleAdmin = Role::where('name', 'admin')->first();
            $user->attachRole($roleAdmin);
        }

        $result = DB::table('users')->where('login', '%', 'fornecedor')->first();

        if (!$result) {
            
            $roleFornecedor = Role::where('name', 'fornecedor')->first();

            $user =  User::create([
                'login' => 'fornecedor1',
                'name' => 'Lucas Silva',
                'email' => 'fornecedor1@gmail.com',
                'password' => bcrypt('admin1234'),
            ]);
            $user->attachRole($roleFornecedor);
            
            

            $user =  User::create([
                'login' => 'fornecedor2',
                'name' => 'Lucas Silva',
                'email' => 'fornecedor2@gmail.com',
                'password' => bcrypt('admin1234'),
            ]);
            $user->attachRole($roleFornecedor);
        }

    }
}
