<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('produtos')->insert(['nome' => 'Camiseta Polo', 'preco' => 50.00, 'qtd' => 10, 'categoria_id' => 1]);
      DB::table('produtos')->insert(['nome' => 'Calça Jeans', 'preco' => 70.00, 'qtd' => 3, 'categoria_id' => 1]);
      DB::table('produtos')->insert(['nome' => 'Camisa manga Longa', 'preco' => 130.00, 'qtd' => 30, 'categoria_id' => 1]);
      DB::table('produtos')->insert(['nome' => 'PC Games', 'preco' => 4500.00, 'qtd' => 3, 'categoria_id' => 7]);
      DB::table('produtos')->insert(['nome' => 'Mouse', 'preco' => 10.00, 'qtd' => 20, 'categoria_id' => 7]);
      DB::table('produtos')->insert(['nome' => 'Guarda Roupa', 'preco' => 350.00, 'qtd' => 2, 'categoria_id' => 4]);
      DB::table('produtos')->insert(['nome' => 'Pistola 9mm PT92', 'preco' => 5230.00, 'qtd' => 1, 'categoria_id' => 5]);
    }
}
