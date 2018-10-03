<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Compra extends Model implements Transformable
{
    use TransformableTrait;



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