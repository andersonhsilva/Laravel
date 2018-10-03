<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function endereco(){
      // esta linha de codigo chama um relacionamento de endereço com a tabela cliente
      return $this->hasOne('App\Endereco');
    }
}
