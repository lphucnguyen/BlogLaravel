<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => 'Phong',
            'email' => 'contact1@gmail.com',
            'message' => 'Hello Test1'
        ]);
        DB::table('contacts')->insert([
            'name' => 'Long',
            'email' => 'contact2@gmail.com',
            'message' => 'Hello Test2'
        ]);
        DB::table('contacts')->insert([
            'name' => 'Qui',
            'email' => 'contact2@gmail.com',
            'message' => 'Hello Test3'
        ]);
    }
}
