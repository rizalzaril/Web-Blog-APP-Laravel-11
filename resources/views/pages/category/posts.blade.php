@extends('layouts.app')

{{-- Navbar --}}
@include('layouts.navbar', ['categories' => $categories])

<div class="container mx-auto px-12 py-24 md:px-24">

    <h1 class="mb-6 text-3xl font-semibold">Posts in Category: {{ $category->name }}</h1>
    <p class="text-lg text-gray-700">{{ $category->description }}</p>

    @if ($posts->isEmpty())
        <div class="mt-6 text-center text-gray-500">
            <p>No posts available in this category.</p>
        </div>
    @else
        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <div class="rounded-lg bg-white p-4 shadow transition-shadow duration-300 hover:shadow-lg">
                    <!-- Gambar pos dengan ukuran seragam -->
                    <img src="{{ $post->image }}" alt="{{ $post->title }}"
                        class="mb-4 h-48 w-full transform rounded-lg object-cover transition-transform duration-300 hover:scale-105">
                    <!-- Nama kategori -->
                    <p class="mt-1 text-xs text-sky-500">Category: {{ $post->category->name }}</p>

                    <!-- Judul pos -->
                    <h2 class="mt-2 text-xl font-bold transition-colors duration-300 hover:text-blue-500">
                        {{ $post->title }}
                    </h2>

                    <!-- Konten pos (dipangkas) -->
                    <p class="mt-2 text-gray-600 transition-all duration-300 hover:text-gray-800">
                        {{ Str::limit($post->content, 100) }}
                    </p>

                    <!-- Tautan untuk membaca lebih lanjut -->
                    <a href="{{ route('posts.show', $post->id) }}"
                        class="mt-2 inline-block text-blue-500 transition-all duration-300 hover:text-blue-700">Read
                        more</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
