<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{


  function cliente(){
    // relacionamento inverso do hasOne
    //return $this->belongsTo('App\Cliente');
    return $this->belongsTo('App\Cliente', 'cliente_id', 'id'); // passando como parametro as chaves das tabelas quando não segue o padrao laravel
  }

}
