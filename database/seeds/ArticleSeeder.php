<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'user_id' => 2,
                'category_id' => 1,
                'description' => 'article1 description',
                'title' => 'article1',
                'image' => 'article1.jpg'
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'description' => 'article2 description',
                'title' => 'article2',
                'image' => 'article2.jpg'
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
                'description' => 'article3 description',
                'title' => 'article3',
                'image' => 'article3.jpg'
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'description' => 'article4 description',
                'title' => 'article4',
                'image' => 'article4.jpg'
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
                'description' => 'article5 description',
                'title' => 'article5',
                'image' => 'article5.jpg'
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'description' => 'article6 description',
                'title' => 'article6',
                'image' => 'article6.jpg'
            ]
        ]);
    }
}
