<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariacaoMoeda extends Model
{
    protected $table = 'variacoes_moedas';

    protected $fillable = [
        'moeda_origem',
        'moeda_destino',
        'valor',
        'convertido'
    ];

    public $timestamps = true;
}
