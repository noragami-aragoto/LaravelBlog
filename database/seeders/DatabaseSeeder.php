<?php

namespace Database\Seeders;

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
        $this->call(BlogCategoriesTableSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\BlogPost::factory(100)->create();
    }
}
