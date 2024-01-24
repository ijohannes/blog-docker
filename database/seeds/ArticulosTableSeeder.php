<?php

use Illuminate\Database\Seeder;

class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->insert([
            [
                'titulo'      =>  'Instalación Ubuntu',
                'contenido'     =>  'En el siguiente video instalaremos ubuntu en una máquina virtual...',
                'slug'       =>  'Instalación-Ubuntu',
                'video'  =>  '<iframe width="560" height="315" src="https://www.youtube.com/embed/_Ifb4EtlZgE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'descripcion'   => 'Instalación ubuntu 17.04',
                'user_id'   => '1',
                'categoria_id'   => '5',
                'created_at'   => '2021-04-20 22:31:40.000000',
                'updated_at'   => '2021-04-20 22:31:40.000000'
            ],
            [
                'titulo'      =>  'Instalación Windows 7',
                'contenido'     =>  'En el siguiente video instalaremos Windows 7 en una máquina virtual...',
                'slug'       =>  'Instalación-Windows7',
                'video'  =>  '<iframe width="560" height="315" src="https://www.youtube.com/embed/LY5KYYkDoMY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'descripcion'   => 'Instalación ubuntu 17.04',
                'user_id'   => '1',
                'categoria_id'   => '5',
                'created_at'   => '2021-04-20 22:31:40.000000',
                'updated_at'   => '2021-04-20 22:31:40.000000'
                
            ],
        ]);
    }
}
