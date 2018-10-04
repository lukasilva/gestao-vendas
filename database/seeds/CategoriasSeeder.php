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
        
        // if(!$categorias){
            $categoria = new Categoria();
            $categoria->nome = 'Eletronicos';
            $categoria->save();
            unset($categoria);

            $categoria = new Categoria();
            $categoria->nome = 'Móveis';
            $categoria->save();
            unset($categoria);

            $categoria = new Categoria();
            $categoria->nome = 'Eletrodomesticos';
            $categoria->save();
            unset($categoria);

            $categoria = new Categoria();
            $categoria->nome = 'Informatica';
            $categoria->save();
            unset($categoria);
        // }
    }
}
