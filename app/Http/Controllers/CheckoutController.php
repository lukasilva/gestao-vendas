<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Compra;
use Illuminate\Support\Facades\Auth; 

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }
    
    public function checkout( Request $request ){
        
        $post = $request->all();
        
        $Produtos   = array();
        $ValorTotal = 0.00;
        
        if( sizeof( $post[ "produto" ] ) > 0 ){
            
            foreach( $post[ "produto" ] as $index => $value ){
                
                $qtde  = intval( $post[ "quantidade" ][ $index ] );
                $value = intval( $value );
                
                if( $qtde > 0 && $value > 0 ){
                    
                    $Produto = Produto::find( $value );
                    
                    if( $qtde > $Produto->quantidade ){
                        
                        $qtde = $Produto->quantidade;
                        
                    }
                    if( $qtde > 0 ){
                        
                        $Produto->quantidade -= $qtde;
                        $Produto->qtde        = $qtde;
                        $Produto->subtotal    = number_format( ( $Produto->valor * $qtde ) , 2 , "." , "" );
                        
                        $ValorTotal = number_format( $ValorTotal + $Produto->subtotal , 2 , "." , "" );
                        
                        $Produtos[] = $Produto;
                        
                    }
                    
                }
                
            }
            
        }
        
        $ProdutosJson = json_encode( $Produtos , true );
        
        $endereco  = $post['logradouro'].", ".$post['numero'].( $post['complemento'] == "" ? "" : " {$post['complemento']}" );
        $endereco .= $post['bairro'] == "" ? "" : " - {$post['bairro']}";
        $endereco .= $post['cep'] == "" ? "" : " - CEP: {$post['cep']}";
        $endereco .= $post['cidade'] == "" ? "" : " - {$post['cidade']}";
        $endereco .= $post['estado'] == "" ? "" : " - {$post['estado']}";
        
        $compra = new Compra();
        
        $compra->pessoa_id        = Auth::user()->pessoa->id;
        $compra->produtos         = $ProdutosJson;
        $compra->endereco_entrega = $endereco;
        $compra->forma_pagamento  = $post[ "forma_pagamento" ];
        $compra->valor_compra     = $ValorTotal;
        $compra->valor_desconto   = 0.00;
        $compra->valor_total      = $ValorTotal;
        
        $compra->save();
        
        foreach( $Produtos as $Index => $Produto ){
            
            $qtde     = $Produto->qtde;
            $subtotal = $Produto->subtotal;
            
            unset( $Produto->qtde     );
            unset( $Produto->subtotal );
            
            $Produto->save();
            
            $Produtos[ $Index ]->imagem   = json_decode( $Produtos[ $Index ]->imagem );
            $Produtos[ $Index ]->qtde     = $qtde;
            $Produtos[ $Index ]->subtotal = $subtotal;
            $Produtos[ $Index ]->imagem   = $Produtos[ $Index ]->imagem ? ( "/storage/images/{$Produtos[ $Index ]->imagem}" ) : "http://placehold.it/100x70";
            
        }
        
        return view( 'checkout' )->with( [ "Produtos" => $Produtos , "Compra" => $compra ] );
        
    }
    
}
