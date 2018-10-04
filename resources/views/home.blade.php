@extends('layouts.app')

@section('content')
<div id="corousel-promos">
    <corousel-component></corousel-component>
</div>
<div class="container py-4">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div id="products">
                <products-component></products-component>
            </div>
        </div>
    </div>
</div>
@endsection
