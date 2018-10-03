<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function endereco(){
      // esta linha de codigo chama um relacionamento de endereço com a tabela cliente -> seguindo os padores de nomeclatura do Laravel
      //return $this->hasOne('App\Endereco');

      // desta forma informamos ao laravel que modificamos os nomes dos campos que faz o relacionamento das tabelas
      return $this->hasOne('App\Endereco', 'cliente_id', 'id');
    }
}
