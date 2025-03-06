<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;


class PostController extends Controller
{
    // Menampilkan daftar postingan
    public function index()
    {
        $posts = Post::latest()->paginate(6); // Ambil semua post terbaru, dengan pagination 6 per halaman
        $categories = Category::all();

        return view('pages.home', compact('posts', 'categories'));
    }


    // Menampilkan detail postingan
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('pages.post', compact('post'))
            ->with('categories', $categories);
    }

    public function showByCategory(Category $category)
    {
        // Mengambil postingan berdasarkan kategori yang dipilih
        $posts = $category->posts; // pastikan relasi antara Category dan Post sudah didefinisikan
        $categories = Category::all();

        // Mengembalikan tampilan dengan data postingan yang sesuai kategori
        return view('pages.category.posts', compact('posts', 'category', 'categories'));
    }



    // Menyimpan komentar
    public function comments(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Menyimpan komentar
        $post->comments()->create([
            'content' => $request->comment,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.show', $post->id);
    }
}
