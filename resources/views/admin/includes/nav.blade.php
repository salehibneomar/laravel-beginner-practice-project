<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block">
        <div class="input-group">
          <button type="button" name="search" id="search-btn" class="btn btn-flat">
            <i class="mdi mdi-magnify"></i>
          </button>
          <input type="text" name="query" id="search-input" class="form-control" placeholder="Search"
            autofocus autocomplete="off" />
        </div>
        <div id="search-results-container">
          <ul id="search-results"></ul>
        </div>
      </div>

      <div class="navbar-right ">
        <ul class="nav navbar-nav">

          <!--
          <li class="dropdown notifications-menu">
            <button class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-header">You have 5 notifications</li>
              <li>
                <a href="#">
                  <i class="mdi mdi-account-plus"></i> New user registered
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-account-remove"></i> User deleted
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-account-supervisor"></i> New client
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-server-network-off"></i> Server overloaded
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                </a>
              </li>
              <li class="dropdown-footer">
                <a class="text-center" href="#"> View All </a>
              </li>
            </ul>
          </li> -->
          <!-- User Account -->
          <li class="dropdown user-menu" style="border-left: 1px solid rgba(0, 0, 0, 0.1);"> 
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
              <img src="{{ asset(Auth::user()->profile_photo_url) }}" class="user-image" alt="User Image" />
              @endif
              <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">

              <li>
                <a href="{{ route('admin.editprofile') }}">
                  <i class="fas fa-user"></i> Profile Update
                </a>
              </li>

              <li>
                <a href="{{ route('admin.editpass') }}">
                  <i class="fas fa-key"></i> Password Update
                </a>
              </li>


              <li class="dropdown-footer">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                    <a class="py-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                       this.closest('form').submit();"> 
                       <i class="mdi mdi-logout"></i> Log Out 
                    </a>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>


  </header>