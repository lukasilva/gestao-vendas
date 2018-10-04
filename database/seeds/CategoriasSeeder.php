<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = Categoria::all();
        
        if(!$categorias){
            $categoria = new Categoria();
            $categoria->descricao = 'Eletronicos';
            $categoria->save();
            unset($categoria);

            $categoria = new Categoria();
            $categoria->descricao = 'Móveis';
            $categoria->save();
            unset($categoria);

            $categoria = new Categoria();
            $categoria->descricao = 'Eletrodomesticos';
            $categoria->save();
            unset($categoria);

            $categoria = new Categoria();
            $categoria->descricao = 'Informatica';
            $categoria->save();
            unset($categoria);
        }
    }
}
