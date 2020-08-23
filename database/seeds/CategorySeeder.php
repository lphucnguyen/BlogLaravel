<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Laravel',
            'slug' => Str::slug('Laravel')
        ]);
        DB::table('categories')->insert([
            'name' => 'Wordpress',
            'slug' => Str::slug('Wordpress')
        ]);
        DB::table('categories')->insert([
            'name' => 'Sympho',
            'slug' => Str::slug('Sympho')
        ]);
    }
}
