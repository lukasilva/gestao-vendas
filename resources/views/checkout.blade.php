@extends('layouts.admin')

@section('content')
<form class="container" action="{{ route('checkout') }}">
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
                <div class="card-header card-footer">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h5><span class="fa fa-map-marker-alt"></span> Endereço</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="EnderecoCheckout">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-form-label-sm d-block">
                                CEP
                                <input type="text" name="cep" class="form-control form-control-sm"/>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label-sm d-block">
                                Cidade
                                <input type="text" name="cidade" class="form-control form-control-sm"/>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label-sm d-block">
                                UF
                                <input type="text" name="estado" class="form-control form-control-sm"/>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label-sm d-block">
                                Bairro
                                <input type="text" name="bairro" class="form-control form-control-sm"/>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-form-label-sm d-block">
                                Logradouro
                                <input type="text" name="logradouro" class="form-control form-control-sm"/>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label-sm d-block">
                                Número
                                <input type="number" name="numero" class="form-control form-control-sm"/>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label-sm d-block">
                                Complemento
                                <input type="text" name="complemento" class="form-control form-control-sm"/>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-header card-footer">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h5><span class="fa dollar-sign"></span> Forma de Pagamento</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-form-label-sm d-block">
                                Forma de Pagamento
                                <select name="forma_pagamento" class="form-control">
                                    <option value="Dinheiro">Dinheiro</option>
                                    <option value="Cartão"  >Cartão  </option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row text-center">
                        <div class="col-md-9 col-xs-9">
                            <h4 class="text-right">Total <strong>R$ <span id="TotalCarrinho">0.00</span></strong></h4>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <input type="submit" class="btn btn-success btn-block" value="Finalizar Compra"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
