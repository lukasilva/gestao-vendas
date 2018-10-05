@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista de Cadastros') }}</div>

                <div class="card-body">
                    <cadastro-lista-component></cadastro-lista-component>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
