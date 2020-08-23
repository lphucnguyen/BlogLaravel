<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'tagName' => 'laravel',
        ]);
        DB::table('tags')->insert([
            'tagName' => 'laravel teachnical',
        ]);
        DB::table('tags')->insert([
            'tagName' => 'wordpress teachnical',
        ]);
        DB::table('tags')->insert([
            'tagName' => 'wordpress',
        ]);
    }
}
