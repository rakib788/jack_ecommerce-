        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basi" aria-expanded="false" aria-controls="ui-basi">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basi">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('view.category') }}">Main Category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('sub_index') }}">Sub Category</a></li>
                </ul>
              </div>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('index_customer') }}">
                <span class="icon-bg"><i class="mdi mdi-account-circle menu-icon"></i></span>
                <span class="menu-title">Customer</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="icon-bg"><i class="mdi mdi-account-circle menu-icon"></i></span>
                <span class="menu-title">Employee</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="icon-bg"><i class="mdi mdi-account-circle menu-icon"></i></span>
                <span class="menu-title">Supplier</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="icon-bg"><i class="mdi mdi-account-circle menu-icon"></i></span>
                <span class="menu-title">Attendence</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basics">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basics">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">Add Product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Product List</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Import product</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item documentation-link">
              <a class="nav-link" href="http://www.bootstrapdash.com/demo/connect-plus-free/jquery/documentation/documentation.html" target="_blank">
                <span class="icon-bg">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                </span>
                <span class="menu-title">Documentation</span>
              </a>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      <div class="sidebar-profile-img">
                        <img src="{{asset('/'.auth()->user()->photo)}}"  style="height:30px; width:30px; border-radius:50%;" alt="image">
                      </div>
                      <div class="sidebar-profile-text">
                        <p class="mb-1">{{auth()->user()->name}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="badge badge-danger text-dark">{{auth()->user()->id}}</div>
                </div>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
                  <span class="menu-title">Settings</span>
                </a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
                  <span class="menu-title">Take Tour</span></a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="{{ route('logout') }}" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>