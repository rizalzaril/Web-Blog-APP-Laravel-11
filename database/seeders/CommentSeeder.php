<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Ambil salah satu post yang ada
        $post = Post::first();

        // Menambahkan dummy komentar
        Comment::create([
            'content' => 'Komentar pertama! Ini sangat informatif, saya suka sekali!',
            'user_id' => User::first()->id, // Menggunakan user pertama
            'post_id' => $post->id,
        ]);

        Comment::create([
            'content' => 'Saya setuju dengan opini yang disampaikan, penjelasannya sangat jelas!',
            'user_id' => User::skip(1)->first()->id, // Menggunakan user kedua
            'post_id' => $post->id,
        ]);

        Comment::create([
            'content' => 'Tolong beri contoh lain untuk memperjelas pembahasan ini.',
            'user_id' => User::skip(2)->first()->id, // Menggunakan user ketiga
            'post_id' => $post->id,
        ]);

        Comment::create([
            'content' => 'Artikel ini luar biasa, terima kasih telah membagikan informasi ini!',
            'user_id' => User::skip(3)->first()->id, // Menggunakan user keempat
            'post_id' => $post->id,
        ]);
    }
}
