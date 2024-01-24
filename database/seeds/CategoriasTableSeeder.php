<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            ['nombreCat'      =>  'JAVASCRIPT'],
            ['nombreCat'      =>  'HTML'],
            ['nombreCat'      =>  'CSS'],
            ['nombreCat'      =>  'PHP'],
            ['nombreCat'      =>  'Sistemas operativos'],
        ]);
    }
}
