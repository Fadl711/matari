<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"  rel="stylesheet" />


    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
@vite('resources/css/app.css')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>@yield('title')</title>
</head>
<body >
    @include('includes.nav')
    <br>
    <div class="text-center mb-10">
        <h1 class="text-bro  text-3xl">رواق العلوم الشرعية </h1>
        <p class="">د. محمد بن علي بن جميل المطري</p>
    </div>

    <div class=" md:container md:mx-10 mx-0 ">
        @yield('content')
    </div>
    <div class="md:container mx-10 ">

    </div>
    <script src="https://kit.fontawesome.com/d5ffc6806c.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>



    @include('includes.footer')
</body>
</html>
