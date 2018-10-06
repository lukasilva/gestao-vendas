<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Pessoa;

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
            $user->createToken('Admin')->accessToken;
            $roleAdmin = Role::where('name', 'admin')->first();
            $user->attachRole($roleAdmin);
        }

        $result = DB::table('users')->where('login', '%', 'fornecedor')->first();

        if (!$result) {
            
            $roleFornecedor = Role::where('name', 'fornecedor')->first();

            $pessoa = Pessoa::create([
                'nome' => 'fornecedor1', 
                'nome_social' => 'fornecedor1',
                'tipo' => 'JURIDICA', 
                'endereco' => json_encode('Rua teste'), 
                'contato' => json_encode('33222419')
            ]);

            $user =  User::create([
                'pessoa_id' => $pessoa->id,
                'login' => 'fornecedor1',
                'name' => $pessoa->nome,
                'email' => 'fornecedor1@gmail.com',
                'password' => bcrypt('admin1234'),
            ]);
            $user->attachRole($roleFornecedor);

            $pessoa = Pessoa::create([
                'nome' => 'fornecedor2', 
                'nome_social' => 'fornecedor2',
                'tipo' => 'JURIDICA', 
                'endereco' => json_encode('Rua teste'), 
                'contato' => json_encode('33222419')
            ]);            

            $user =  User::create([
                'pessoa_id' => $pessoa->id,
                'login' => 'fornecedor2',
                'name' => $pessoa->nome,
                'email' => 'fornecedor2@gmail.com',
                'password' => bcrypt('admin1234'),
            ]);
            $user->attachRole($roleFornecedor);
        }

        $result = DB::table('users')->where('login', '%', 'cliente')->first();

        if (!$result) {
            
            $roleFornecedor = Role::where('name', 'cliente')->first();

            $pessoa = Pessoa::create([
                'nome' => 'Cliente1', 
                'nome_social' => 'Cliente1',
                'tipo' => 'JURIDICA', 
                'endereco' => json_encode('Rua teste'), 
                'contato' => json_encode('33222419')
            ]);

            $user =  User::create([
                'pessoa_id' => $pessoa->id,
                'login' => 'Cliente1',
                'name' => $pessoa->nome,
                'email' => 'cliente1@gmail.com',
                'password' => bcrypt('admin1234'),
            ]);
            $user->attachRole($roleFornecedor);

        
        }

    }
}
