<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['nombreTag'      =>  'Tag 1'],
            ['nombreTag'      =>  'Tag 2'],
            ['nombreTag'      =>  'Tag 3'],
            ['nombreTag'      =>  'Tag 4'],
        ]
    );
    }
}
