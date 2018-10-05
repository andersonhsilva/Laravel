<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alocacao extends Model
{
    // estou informando ao laravel o termo correto no plural desta palavra nao é adicionando um s no final
    protected $table = 'alocacoes';
}
