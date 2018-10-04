<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'pessoa_id',
        'produtos',
        'endereco_entrega',
        'forma_pagamento',
        'valor_compra',
        'valor_desconto',
        'valor_total',
    ];

}