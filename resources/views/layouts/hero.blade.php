<section class="md:h-150 h-120 relative bg-cover bg-center px-6 py-20 md:rounded-lg md:px-16"
    style="background-image: url('https://i.pinimg.com/736x/2d/00/54/2d005496398074d4e03c2e26d703697d.jpg');">

    <div
        class="md:w-120 mt-25 container -bottom-10 mx-auto flex-col items-center justify-between rounded-lg bg-white p-6 shadow-md md:absolute md:flex-row">
        <!-- Category Buttons -->
        <div class="animate-fadeInUp flex flex-wrap gap-3 delay-200">
            <button
                class="rounded-lg bg-blue-500 px-4 py-2 font-semibold text-white shadow-md transition hover:bg-blue-600">
                Technology
            </button>
        </div>
        <!-- Left Content -->
        <div class="py-2 text-center md:text-left">
            <h1 class="animate-fadeInUp mb-4 text-2xl font-bold leading-tight text-gray-900 md:text-3xl">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, deserunt.
            </h1>
            <p class="animate-fadeInUp mb-6 text-sm text-gray-300 delay-100 md:text-lg">
                Discover the latest articles and trends in the world of technology, design, and lifestyle.
            </p>
        </div>
    </div>
</section>




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
