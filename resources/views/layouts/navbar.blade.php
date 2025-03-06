<nav class="sticky top-0 z-10 bg-gray-50 p-6 shadow-md">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="rounded bg-gray-200 p-2 text-lg font-bold">My Blog</a>

        <!-- Hamburger Button (Mobile) -->
        <button id="menu-toggle" class="text-gray-900 focus:outline-none md:hidden">
            <i class="fa fa-bars text-2xl"></i>
        </button>

        <!-- Menu -->
        <ul id="menu" class="hidden gap-6 text-gray-900 md:flex">
            <li><a href="{{ route('home') }}" class="hover:text-gray-600">Home</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-gray-600">About</a></li>
            <li><a href="{{ route('posts') }}" class="hover:text-gray-600">Blog</a></li>

            <!-- Categories Dropdown -->
            <li class="relative">
                <a href="{{ route('posts') }}" class="hover:text-gray-600">Categories</a>
                <ul class="w-120 absolute left-0 mt-0 hidden space-y-2 rounded-md bg-white text-gray-900 shadow-lg">


                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('category.posts', $category) }}"
                                class="block px-4 py-2 hover:bg-gray-100">{{ $category->name }}
                            </a>
                        </li>
                    @endforeach


                </ul>

            </li>

            <li><a href="{{ route('posts') }}" class="hover:text-gray-600">Contact</a></li>
        </ul>

        <!-- Search -->
        <div class="hidden items-center md:flex">
            <form action="" method="get" class="relative">
                <input type="search" name="search" placeholder="Search"
                    class="w-48 rounded-md border-0 bg-gray-200 p-2 pl-10 text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300">
                <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 transform text-gray-500">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mt-4 flex hidden flex-col items-center gap-4 text-gray-900 md:hidden">
        <a href="{{ route('home') }}" class="hover:text-gray-600">Home</a>
        <a href="{{ route('about') }}" class="hover:text-gray-600">About</a>
        <a href="{{ route('posts') }}" class="hover:text-gray-600">Blog</a>

        <!-- Categories Dropdown (Mobile) -->
        <div class="relative">
            <button id="categories-toggle" class="hover:text-gray-600">Categories</button>
            <ul id="categories-dropdown"
                class="absolute left-0 z-10 mt-2 hidden space-y-2 rounded-md bg-white text-gray-900 shadow-lg">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('category.posts', $category) }}"
                            class="block px-4 py-2 hover:bg-gray-100">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route('posts') }}" class="hover:text-gray-600">Contact</a>

        <!-- Search (Mobile) -->
        <form action="" method="get" class="relative w-full max-w-xs">
            <input type="search" name="search" placeholder="Search"
                class="w-full rounded-md border-0 bg-gray-200 p-2 pl-10 text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300">
            <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 transform text-gray-500">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</nav>

<!-- JavaScript for Mobile Menu -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Dropdown for Categories on hover (desktop)
    document.querySelector('.relative').addEventListener('mouseenter', function() {
        this.querySelector('ul').classList.remove('hidden');
    });
    document.querySelector('.relative').addEventListener('mouseleave', function() {
        this.querySelector('ul').classList.add('hidden');
    });

    // Dropdown for Categories on click (mobile)
    document.querySelector('.relative button').addEventListener('click', function() {
        const dropdown = this.nextElementSibling;
        dropdown.classList.toggle('hidden');
    });
</script>
