<div class="rounded-lg bg-white p-4 shadow transition-shadow duration-300 hover:shadow-lg">
    <!-- Gambar pos dengan ukuran seragam -->
    <img loading="lazy" src="{{ $post->image }}" alt="{{ $post->title }}"
        class="mb-4 h-48 w-full transform rounded-lg object-cover transition-transform duration-300 hover:scale-105">
    <!-- Nama kategori -->
    <p class="mt-1 text-sm text-gray-500">Category: {{ $post->category->name }}</p>

    <!-- Judul pos -->
    <h2 class="text-xl font-bold transition-colors duration-300 hover:text-blue-500">{{ $post->title }}</h2>


    <!-- Konten pos (dipangkas) -->
    <p class="mt-2 text-gray-600 transition-all duration-300 hover:text-gray-800">
        {!! Str::limit(strip_tags($post->content), 100) !!}
    </p>

    <!-- Tautan untuk membaca lebih lanjut -->
    <a href="{{ route('posts.show', $post->id) }}"
        class="mt-2 inline-block text-blue-500 transition-all duration-300 hover:text-blue-700">Read more</a>
</div>
