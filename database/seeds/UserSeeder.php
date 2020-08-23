<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "Blog.Admin",
            "role_id" => "1",
            "username" => "admin",
            "email" => "email@gmail.com",
            "password" => bcrypt("nguyen123")
        ]);

        DB::table('users')->insert([
            "name" => "Blog.Author",
            "role_id" => "2",
            "username" => "author",
            "email" => "author@gmail.com",
            "password" => bcrypt("nguyen123")
        ]);
    }
}
