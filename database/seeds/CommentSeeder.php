<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'post_id' => '1',
            'name' => 'John Carter',
            'email' => 'testmail1@gmail.com',
            'message' => 'This is very good'
        ]);
        DB::table('comments')->insert([
            'post_id' => '1',
            'name' => 'Smith',
            'email' => 'testmail2@gmail.com',
            'message' => 'This is very good'
        ]);
        DB::table('comments')->insert([
            'post_id' => '1',
            'name' => 'Maria',
            'email' => 'testmail3@gmail.com',
            'message' => 'This is very good'
        ]);
    }
}
