<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Judul Blog Pertama',
            'content' => 'Ini adalah konten dari blog pertama saya.',
            'image' => 'https://via.placeholder.com/600x300', // Dummy image
        ]);

        Post::create([
            'title' => 'Judul Blog Kedua',
            'content' => 'Ini adalah konten dari blog kedua saya.',
            'image' => 'https://via.placeholder.com/600x300',
        ]);
    }
}
