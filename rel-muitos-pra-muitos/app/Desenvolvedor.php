<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
  // estou informando ao laravel o termo correto no plural desta palavra nao é adicionando um s no final
  protected $table = 'desenvolvedores';


  public function projetos(){
    return $this->belongsToMany('App\Projeto', 'alocacoes');
  }
}
