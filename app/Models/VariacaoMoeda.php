<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariacaoMoeda extends Model
{
    protected $table = 'variacoes_moedas';

    protected $fillable = [
        'par_moeda',
        'valor', 
    ];

    public $timestamps = true;
}
