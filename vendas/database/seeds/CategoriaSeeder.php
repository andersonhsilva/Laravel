<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table('categorias')->insert(['nome'=>'Roupas']);
      DB::table('categorias')->insert(['nome'=>'Eletronicos']);
      DB::table('categorias')->insert(['nome'=>'Perfumes']);
      DB::table('categorias')->insert(['nome'=>'Móveis']);
      DB::table('categorias')->insert(['nome'=>'Comidas']);

    }

}
