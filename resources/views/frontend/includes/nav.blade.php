<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html"><span>Com</span>pany</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="@if(Route::currentRouteName()=='page.home') {{ 'active' }} @endif"><a href="{{ route('page.home') }}">Home</a></li>

          <li class="drop-down"><a >Categories</a>
            <ul>
              @foreach ($categories as $cat)
              <li><a href="">{{ $cat->name; }}</a></li>
              @endforeach
              
            </ul>
          </li>
          <li class="@if(Route::currentRouteName()=='page.brand') {{ 'active' }} @endif"><a href="{{ route('page.brand') }}">Brands</a></li>


        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="{{ route('login') }}"><b>LOGIN</b></a>
      </div>

    </div>
  </header><!-- End Header -->