<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'image' => 'default.png',
            'link' => 'http://google.com',
            'title' => 'Slider Title Test 1'
        ]);
        DB::table('sliders')->insert([
            'image' => 'default.png',
            'link' => 'http://youtube.com',
            'title' => 'Slider Title Test 2',
        ]);
        DB::table('sliders')->insert([
            'image' => 'default.png',
            'link' => 'http://facebook.com',
            'title' => 'Slider Title Test 3',
        ]);
    }
}
