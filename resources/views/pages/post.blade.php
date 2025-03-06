@extends('layouts.app')

@section('title', $post->title)

{{-- Navbar --}}
@include('layouts.navbar', ['categories' => $categories])

@section('content')
    <h1 class="text-4xl font-bold">{{ $post->title }}</h1>
    <p class="mt-2 text-gray-600">{{ $post->created_at->format('d M Y') }}</p>

    @if ($post->image)
        <div class="mt-4">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="mx-auto h-auto w-full max-w-lg">
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

<style>
    /* Mengatur font, ukuran dan line-height pada konten */
    .rich-content {
        font-family: 'Inter', sans-serif;
        line-height: 1.7;
        font-size: 1rem;
        color: #333;
        margin-top: 1rem;
    }

    /* Heading (h1, h2, h3) */
    .rich-content h1,
    .rich-content h2,
    .rich-content h3 {
        font-weight: bold;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }

    /* Heading 1 (h1) */
    .rich-content h1 {
        font-size: 2rem;
        margin-top: 2rem;
    }

    /* Heading 2 (h2) */
    .rich-content h2 {
        font-size: 1.5rem;
    }

    /* Heading 3 (h3) */
    .rich-content h3 {
        font-size: 1.25rem;
    }

    /* Paragraf */
    .rich-content p {
        margin-bottom: 1rem;
    }

    /* Links */
    .rich-content a {
        color: #007bff;
        text-decoration: none;
    }

    .rich-content a:hover {
        text-decoration: underline;
    }

    /* List (ul, ol) */
    .rich-content ul,
    .rich-content ol {
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }

    /* List item */
    .rich-content li {
        margin-bottom: 0.5rem;
    }

    /* Gambar */
    .rich-content img {
        max-width: 100%;
        border-radius: 0.375rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
</style>
