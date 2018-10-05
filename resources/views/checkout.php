@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h5><span class="fa fa-shopping-cart"></span> Compra Realizada com Sucesso.</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="EnderecoCheckout">
                    <div class="row">
                        <div class="col-md-12">
                            Código da Compra: <strong>{{$Compra->id}}</strong>
                            Endereço de Entrega: <strong>{{$Compra->endereco_entrega}}</strong>
                            Forma de pagamento: <strong>{{$Compra->forma_pagamento}}</strong>
                        </div>
                    </div>
                </div>
                <div class="card-header card-footer">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h5><span class="fa fa-map-marker-alt"></span> Produtos</h5>
                        </div>
                    </div>
                </div>
                <div>
                    @foreach ($Produtos as $Produto)
                    <div class='row'>
                        <div class='col-md-2 col-xs-2'>
                            <img style='width:100px;' class='img-responsive' src=''>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <h4 class="product-name"><strong>{{$Produto->nome}}</strong></h4>
                            <h4><small>{{$Produto->descricao}}</small></h4>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="row">
                                <div class="col-md-6 col-xs-6 text-right">
                                    <h6><strong>R$ {{$Produto->valor}}<span class="text-muted">x</span> {{$Produto->qtde}}</strong></h6>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <h4><strong>R$ {{$Produto->subtotal}}</strong></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row text-center">
                        <div class="col-md-9 col-xs-9">
                            <h4 class="text-right">Total <strong>R$ {{$Compra->forma_pagamento}}</strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    jQuery( document ).ready( function(){
        
        clearCookie();//Limpar os cookies
        
    } );
    
</script>
@endsection
