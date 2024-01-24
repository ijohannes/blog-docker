<?php

use Illuminate\Database\Seeder;

class Articulo_TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulo_tag')->insert([
            ['articulo_id' => '1', 'tag_id' => '1'],
            ['articulo_id' => '2', 'tag_id' => '2'],
        ]);
    }
}
