<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('title')
  @stack('before-style')
  @include('includes.style')
  @stack('after-style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <div class="navbar-bg"></div>
      @stack('before-navbar')
      @include('includes.navbar')
      @stack('after-navbar')

      @stack('before-sidebar')
      @include('includes.sidebar')
      @stack('after-sidebar')

      @yield('content')

      @stack('before-footer')
      @include('includes.footer')
      @stack('after-footer')

      @stack('before-script')
      @include('includes.script')
      @stack('after-script')

    </div>
  </div>






</body>

</html>