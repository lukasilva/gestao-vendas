<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Pessoa;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role = Role::where('name', 'cliente')->first();

        $pessoa = Pessoa::create([
            'nome' => 'cliente1', 
            'nome_social' => 'cliente1',
            'tipo' => 'FISICA', 
            'endereco' => json_encode('Rua teste'), 
            'contato' => json_encode('33222419')
        ]);

        $user =  User::create([
            'pessoa_id' => $pessoa->id,
            'login' => 'cliente1',
            'name' => $pessoa->nome,
            'email' => 'cliente1@gmail.com',
            'password' => bcrypt('admin1234'),
        ]);
        $user->attachRole($role);

        
    }
}
