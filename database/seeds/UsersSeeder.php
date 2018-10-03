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

    }
}
