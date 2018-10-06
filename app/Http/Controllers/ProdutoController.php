<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->get('busca') ){
            $busca = $request->get('busca');
            $produtos = DB::table('produtos')
                ->select('produtos.id', 'produtos.nome', 'produtos.valor', 'produtos.imagem', 'categorias.nome as categoria')
                ->join('categorias', 'produtos.categoria_id', 'categorias.id')
                ->where('produtos.nome', 'like', '%'. $busca .'%')
                ->orWhere('produtos.descricao', 'like', '%'. $busca .'%')
                ->orWhere('categorias.nome', 'like', '%'. $busca .'%')
                ->get();
            return $this->jsonResponse($produtos);
        }
        $produtos = Produto::all();
        return $this->jsonResponse($produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('role:fornecedor|admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return $this->jsonResponse($produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware('role:fornecedor|admin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('role:fornecedor|admin');
    }
}
