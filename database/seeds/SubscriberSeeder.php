<?php

use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers')->insert([
            'name' => 'John',
            'email' => 'nhoxzznhox16@gmail.com'
        ]);
        DB::table('subscribers')->insert([
            'name' => 'John',
            'email' => 'nhoxzznhox17@gmail.com'
        ]);
    }
}
