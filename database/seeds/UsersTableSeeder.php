<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      =>  'Administrador del sistema',
            'email'     =>  'admin@gmail.com',
            'tipo'       =>  'admin',
            'password'  =>  bcrypt('123456abc'),
        ]);

        
    }
}
