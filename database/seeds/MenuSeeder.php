<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'title' => 'Category',
            'link' => 'http://localhost/blog-laravel/caegory',
            'slug' => Str::slug('Category')
        ]);
        DB::table('menus')->insert([
            'title' => 'Tag',
            'link' => 'http://localhost/blog-laravel/tag',
            'slug' => Str::slug('Tag')
        ]);
        DB::table('menus')->insert([
            'title' => 'Home',
            'link' => 'http://localhost/blog-laravel/',
            'slug' => Str::slug('Home')
        ]);
    }
}
