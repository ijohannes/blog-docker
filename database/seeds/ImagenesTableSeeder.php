<?php

use Illuminate\Database\Seeder;

class ImagenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imagenes')->insert([
            ['nombreImg' => '16189729431200px-Ubuntu_19.10_Eoan_Ermine.png', 'articulo_id' => '1'],
            ['nombreImg' => '1579921233ins_windows_7_virtualbox.jpg', 'articulo_id' => '2'],
        ]);
    }
}
