<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <link rel="stylesheet" href="{{ URL::asset('storage/css/app.css') }}">

</head>

<body>
  <div id="app">
    @include('layouts.partials.navbar')

    <main class="py-4">
      @yield('content')
    </main>

    @include('layouts.partials.footer')
  </div>
</body>

<script src="https://kit.fontawesome.com/d7be5f7ff2.js" crossorigin="anonymous"></script>

</html>
