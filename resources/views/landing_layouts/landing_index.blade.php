<!doctype html>
<html lang="en">
  <head>
    @include('landing_includes.landing_header')
    <title>@yield('title')</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
    @include('landing_includes.landing_nav')
      <div class=" flex-grow-1 d-flex align-items-center justify-content-center">
          <div class="col-md-6 col-lg-4">
              @yield('content')
          </div>
      </div>

    @include('landing_includes.landing_footer')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  </body>
</html>
