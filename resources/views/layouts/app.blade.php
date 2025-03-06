<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>

    @vite('resources/css/app.css')

    {{-- font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-linear-to-r/decreasing from-sky-950 to-teal-500">


    {{-- Content of your blogs --}}
    <div class="flex justify-center">
        <div
            class="md:mx-29 container mx-auto flex w-auto flex-col items-center justify-center bg-gray-50 bg-opacity-50 px-12 py-24">
            @yield('content')
        </div>
    </div>

    {{-- Footer components --}}
    @include('layouts.footer')
</body>

</html>
