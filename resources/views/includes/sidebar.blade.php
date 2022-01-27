<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->first_name }}</a>
        </div>
        </div>

<!-- SidebarSearch Form -->


<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
          <a href="/dashboard" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
              Dashboard
          </p>
          </a>
      </li>
      <li class="nav-item">
          <a href="/dashboard/showUsers" class="nav-link">
          &nbsp;<i class="fal fa-user"></i>&nbsp;&nbsp;
          <p>
              Manage Users
          </p>
          </a>
      </li>
      <li class="nav-item">
          <a href="/dashboard/showBanners" class="nav-link">
          &nbsp;<i class="fal fa-image"></i>&nbsp;&nbsp;
              <p>
                  Manage Banners
              </p>
          </a>
      </li>
      <li class="nav-item">
          <a href="/dashboard/showCategory" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Manage Category
              </p>
          </a>
      </li>
      <li class="nav-item">
          <a href="/dashboard/showProducts" class="nav-link">
          &nbsp;<i class="fal fa-sticky-note"></i>&nbsp;&nbsp;
              <p>
                  Manage Products
              </p>
          </a>
      </li>
      <li class="nav-item">
          <a href="/dashboard/showCoupons" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
              <p>
                  Manage Coupons
              </p>
          </a>
      </li>
      <li class="nav-item">
          <a href="/dashboard/showUserAddress" class="nav-link">
          &nbsp;<i class="fal fa-id-badge"></i>&nbsp;&nbsp;
              <p>
                  Show User Address
              </p>
          </a>
          
      </li> 
      <li class="nav-item">
          <a href="/dashboard/showUserOrders" class="nav-link">
          &nbsp;<i class="fal fa-id-badge"></i>&nbsp;&nbsp;
              <p>
                  Show User Orders
              </p>
          </a>
          
      </li>
      <li class="nav-item">
          <a href="/dashboard/showConfigure" class="nav-link">
          &nbsp;<i class="fal fa-id-badge"></i>&nbsp;&nbsp;
              <p>
                  Show Configuration
              </p>
          </a> 
      </li> 
      <li class="nav-item">
          <a href="/dashboard/showQueries" class="nav-link">
          &nbsp;<i class="fal fa-id-badge"></i>&nbsp;&nbsp;
              <p>
                  Show Queries
              </p>
          </a> 
      </li>
      <li class="nav-item">
          <a href="/dashboard/showCms" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Manage CMS
              </p>
          </a>
      </li>
      <li class="nav-item">
          <a href="/dashboard/salesReport" class="nav-link">
          &nbsp;<i class="fal fa-id-badge"></i>&nbsp;&nbsp;
              <p>
                  Sales Report
              </p>
          </a> 
      </li>
      <li class="nav-item">
          <a href="/dashboard/customerReport" class="nav-link">
          &nbsp;<i class="fal fa-id-badge"></i>&nbsp;&nbsp;
              <p>
                  Customer Report
              </p>
          </a> 
      </li>
      <li class="nav-item">
          <a href="/dashboard/couponsReport" class="nav-link">
          &nbsp;<i class="fal fa-id-badge"></i>&nbsp;&nbsp;
              <p>
                  Coupons Report
              </p>
          </a> 
      </li>  
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>