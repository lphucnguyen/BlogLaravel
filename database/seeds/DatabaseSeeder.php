<?php

use App\Subscriber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(TagSeeder::class);
        // $this->call(SliderSeeder::class);
        // $this->call(SubscriberSeeder::class);
        // $this->call(CommentSeeder::class);
        $this->call(MenuSeeder::class);
        // $this->call(ContactSeeder::class);
    }
}
