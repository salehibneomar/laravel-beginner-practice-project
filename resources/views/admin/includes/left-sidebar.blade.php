<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{ route('dashboard') }}">
          <svg
            class="brand-icon"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid"
            width="30"
            height="33"
            viewBox="0 0 30 33"
          >
            <g fill="none" fill-rule="evenodd">
              <path
                class="logo-fill-blue"
                fill="#7DBCFF"
                d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
              />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg>
          <span class="brand-name">Sleek Dashboard</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">

        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">

          <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#features"
              aria-expanded="false" aria-controls="dashboard">
              <i class="fas fa-sliders-h"></i>
              <span class="nav-text">Features</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="features"
              data-parent="#sidebar-menu">
              <div class="sub-menu">

                    <li >
                      <a class="sidenav-item-link" href="{{ route('all.slider') }}">
                        <span class="nav-text">Slider</span>
                      </a>
                    </li>
                    <li >
                      <a class="sidenav-item-link" href="{{ route('about.home') }}">
                        <span class="nav-text">About</span>
                      </a>
                    </li>
              </div>
            </ul>
          </li>

            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#category"
                aria-expanded="false" aria-controls="dashboard">
                <i class="fab fa-elementor"></i>
                <span class="nav-text">Category</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="category"
                data-parent="#sidebar-menu">
                <div class="sub-menu">

                      <li >
                        <a class="sidenav-item-link" href="{{ route('all.cat') }}">
                          <span class="nav-text">Manage</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>

            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#brand"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">BRAND</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="brand"
                data-parent="#sidebar-menu">
                <div class="sub-menu">

                      <li >
                        <a class="sidenav-item-link" href="{{ route('all.brand') }}">
                          <span class="nav-text">Manage</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>

        </ul>

      </div>

    </div>
  </aside>