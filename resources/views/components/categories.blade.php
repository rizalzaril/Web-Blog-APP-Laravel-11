<ul class="w-120 absolute left-0 mt-0 hidden space-y-2 rounded-md bg-white text-gray-900 shadow-lg">
    @foreach ($categories as $category)
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">{{ $category->name }}</a>
        </li>
    @endforeach
</ul>
