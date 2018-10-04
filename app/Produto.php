<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'valor',
        'imagem',
        'quantidade'
    ];

    public function pessoa()
    {
        return $this->belongsTo('App\Categoria');
    }

}