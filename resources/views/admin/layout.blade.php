<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('admin.includes.head')
  </head>
  
  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
    <!--Left side bar-->
    @include('admin.includes.left-sidebar')

      <div class="page-wrapper">
        <!-- Nav -->
        @include('admin.includes.nav')

        <div class="content-wrapper">
          <div class="content">						 

            @yield('content')

          </div>
        </div>
        <!-- Footer -->
         @include('admin.includes.footer') 

      </div>

    </div>

    <!-- Scripts -->
    @include('admin.includes.scripts')
  </body>
</html>