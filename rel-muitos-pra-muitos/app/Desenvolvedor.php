<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
  // estou informando ao laravel o termo correto no plural desta palavra nao é adicionando um s no final
  protected $table = 'desenvolvedores';


  public function projetos(){
    // a função a baixo retorna um relacionamento muitos para muitos com o parametro withPivot -> campos alem das tuplas pivot que relaciona os ids
    return $this->belongsToMany('App\Projeto', 'alocacoes')->withPivot(['horas_semanais']);
  }
}
