@extends('layouts.app')

@section('title', $post->title)

{{-- Navbar --}}
@include('layouts.navbar', ['categories' => $categories])

@section('content')
    <h1 class="text-4xl font-bold">{{ $post->title }}</h1>
    <p class="mt-2 text-gray-600">{{ $post->created_at->format('d M Y') }}</p>

    @if ($post->image)
        <div class="mt-4">
            <img loading="lazy" src="{{ $post->image }}" alt="{{ $post->title }}" class="mx-auto h-auto w-full max-w-lg">
        </div>
    @endif

    <div class="rich-content mt-4 max-w-none">
        {!! $post->content !!}
    </div>



    <a href="{{ route('posts') }}" class="mt-6 block text-blue-500">Kembali ke Blog</a>

    <!-- Komentar Section -->
    <div class="mt-8">
        <h2 class="mb-4 text-2xl font-semibold">Komentar</h2>

        <!-- Form untuk menambah komentar -->
        @auth
            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-6">
                @csrf
                <textarea name="comment" rows="4" class="w-full rounded-lg border border-gray-300 p-3"
                    placeholder="Tulis komentar..." required></textarea>
                <button type="submit" class="mt-3 rounded-lg bg-blue-500 p-2 text-white">Kirim Komentar</button>
            </form>
        @endauth

        <!-- Daftar Komentar -->
        <div class="space-y-4">
            @foreach ($post->comments as $comment)
                <div class="flex items-start space-x-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-200 text-xl text-white">
                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-semibold">{{ $comment->user->name }}</div>
                        <div class="mt-1 text-gray-600">{{ $comment->content }}</div>
                        <div class="mt-2 text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
