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
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 26; $j++) {
                Post::updateOrCreate(
                    ['title' => 'Post ' . $j + 1, 'tenant_id' => $i + 1],
                    [
                        'title' => 'Post ' . $j + 1,
                        'description' => 'Description ' . $j + 1,
                        'content' => 'Content ' . $j + 1,
                        'author_id' => 1,
                        'category_id' => 1,
                        'tenant_id' => $i + 1,
                        'slug' => 'post-' . $j + 1
                    ],
                );
            }
        }
    }
}
