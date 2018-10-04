@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro lista') }}</div>

                <div class="card-body">
                    <cadastro-lista-component></cadastro-lista-component>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
