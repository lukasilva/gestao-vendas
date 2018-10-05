@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <h5><span class="fa fa-shopping-cart"></span> Meu Carrinho</h5>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <a href="{{ url('/') }}" class="btn btn-primary btn-sm btn-block">
                                <span class="fa fa-share"></span> Continue comprando
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="ProdutosCheckout">
                </div>
                <div class="card-footer">
                    <div class="row text-center">
                        <div class="col-md-9 col-xs-9">
                            <h4 class="text-right">Total <strong>R$ <span id="TotalCarrinho">0.00</span></strong></h4>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            @role(['cliente', 'vendedor'])
                            <button type="button" class="btn btn-success btn-block">
                                Finalizar Compra
                            </button>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block">
                                Login
                            </a>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
