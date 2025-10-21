<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postsList = [
            [
                'title' => 'Post 1',
                'description' => 'Description 1',
                'content' => 'Content 1',
                'author_id' => 1,
                'category_id' => 1,
                'tenant_id' => 1,
                'slug' => 'post-1'
            ],
            [
                'title' => 'Post 2',
                'description' => 'Description 2',
                'content' => 'Content 2',
                'author_id' => 1,
                'category_id' => 1,
                'tenant_id' => 1,
                'slug' => 'post-2'
            ],
            [
                'title' => 'Post 3',
                'description' => 'Description 3',
                'content' => 'Content 3',
                'author_id' => 1,
                'category_id' => 1,
                'tenant_id' => 1,
                'slug' => 'post-3'
            ],
        ];

        for ($i = 0; $i < 50; $i++) {
            Post::updateOrCreate(
                ['id' => $i + 1],
                [
                    'title' => 'Post ' . $i + 1,
                    'description' => 'Description ' . $i + 1,
                    'content' => 'Content ' . $i + 1,
                    'author_id' => 1,
                    'category_id' => 1,
                    'tenant_id' => 1,
                    'slug' => 'post-' . $i + 1
                ],
            );
        }
    }
}
