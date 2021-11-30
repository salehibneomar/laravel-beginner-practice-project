<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>

  <!-- ======= Nav ======= -->
  @include('frontend.includes.nav')

  @if (\Route::currentRouteName()=='page.home')
    @include('frontend.includes.banner')
  @endif

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('frontend.includes.footer')
<!-- ======= Scripts ======= -->
@include('frontend.includes.scripts')

</body>

</html>