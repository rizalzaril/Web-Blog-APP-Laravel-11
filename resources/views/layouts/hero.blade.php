<div class="mx-auto flex">

    @foreach ($hero as $item)
        <section class="md:h-150 h-120 relative bg-cover bg-center px-6 py-20 sm:w-auto md:w-full md:px-16"
            style="background-image: url('{{ $item->image }}');">

            <!-- Overlay Gelap -->
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <div
                class="md:w-120 mt-25 container relative -bottom-10 mx-auto flex-col items-center justify-between rounded-lg bg-white p-6 shadow-md md:absolute md:flex-row">
                <!-- Category Buttons -->
                <div class="animate-fadeInUp flex flex-wrap gap-3 delay-200">
                    <button
                        class="rounded-lg bg-blue-500 px-4 py-2 font-semibold text-white shadow-md transition hover:bg-blue-600">
                        {{ $item->category->name }}
                    </button>
                </div>
                <!-- Left Content -->
                <div class="py-2 text-center md:text-left">
                    <h1 class="animate-fadeInUp mb-4 text-2xl font-bold leading-tight text-gray-900 md:text-3xl">
                        {!! $item->title !!}
                    </h1>
                    <p class="animate-fadeInUp mb-6 text-sm text-gray-300 delay-100 md:text-lg">
                        {!! Str::limit(strip_tags($item->content), 100) !!}
                    </p>
                </div>
            </div>
        </section>
    @endforeach

</div>




<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .delay-100 {
        animation-delay: 0.1s;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }
</style>
