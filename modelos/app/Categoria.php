<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    // se o nome da tabela no banco estiver no singular, tem que definir o nome dela na variavel a baixo
    // protected $table_name = "categoria";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
