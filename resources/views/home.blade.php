@extends('layouts.app')

@section('content')
<div id="corousel-promos">
    <corousel-component></corousel-component>
</div>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="?busca=Eletronicos">Eletrônicos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?busca=Móveis">Móveis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?busca=Eletrodomesticos">Eletrodomésticos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?busca=Móveis">Informática</a>
                        </li>
                    </ul>
                    
                    
                </div>
            </div>
        </nav>
<div class="container py-4">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="">
                <products-component></products-component>
            </div>
        </div>
    </div>
</div>
@endsection
