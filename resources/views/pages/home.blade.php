@extends('layouts.app')

@section('title', 'Home')


{{-- Navbar --}}
@include('layouts.navbar', ['categories' => $categories])

{{-- Hero components (only show on non-detail pages) --}}
@unless (Route::is('posts.show'))
    <!-- Check if not on the post detail page -->
    <div class="lg:mx-29 md:mx-29 sm:mx-auto">
        @include('layouts.hero', ['hero' => $hero])
    </div>
@endunless
@section('content')

    <h1 class="animate-fadeInUp text-3xl font-bold">Welcome to My Blog</h1>
    <p class="animate-fadeInUp mt-4">Tempat berbagi informasi menarik.</p>

    {{-- Daftar postingan terbaru --}}
    <h4 class="animate-fadeInUp mt-5 text-lg font-semibold">Latest Post</h4>
    <div class="animate-fadeInUp mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            @include('components.card', ['post' => $post])
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        <div class="flex items-center justify-between">
            {{-- Previous Page --}}
            @if ($posts->onFirstPage())
                <span class="text-gray-500">Previous</span>
            @else
                <a href="{{ $posts->previousPageUrl() }}" class="text-blue-500 hover:underline">Previous</a>
            @endif

            {{-- Page Numbers --}}
            <div class="flex items-center">
                <span class="mr-2 text-gray-600">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</span>
                <div class="flex space-x-1">
                    {{-- Display Page Numbers --}}
                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                        <a href="{{ $posts->url($i) }}"
                            class="{{ $i == $posts->currentPage() ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-gray-200' }} rounded border border-gray-300 px-3 py-1 text-sm">
                            {{ $i }}
                        </a>
                    @endfor
                </div>
            </div>

            {{-- Next Page --}}
            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}" class="text-blue-500 hover:underline">Next</a>
            @else
                <span class="text-gray-500">Next</span>
            @endif
        </div>
    </div>
@endsection
