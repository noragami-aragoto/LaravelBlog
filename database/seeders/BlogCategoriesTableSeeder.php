<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array();

        $categoryName = 'Без названия';
        $categories[] = [
            'title' => $categoryName,
            'slug' => Str::slug($categoryName),
            'parent_id' => 0,
        ];

        for ($i = 0; $i <= 10; $i++) {
            $categoryName = 'Категория #' . $i;
            $parent_id = ($i > 4) ? rand(1, 4) : 1;
            $categories[] = [
                'title' => $categoryName,
                'slug' => Str::slug($categoryName),
                'parent_id' => $parent_id,
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
