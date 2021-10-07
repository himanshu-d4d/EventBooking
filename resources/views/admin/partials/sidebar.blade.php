

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
      <img src="{{url('admins/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Event Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class=" {{ (request()->is('admin/users*') || request()->is('admin/users-create*')) ? 'nav-item menu-is-opening menu-open' : 'nav-item' }} ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{url('admin/users')}}" class="nav-link {{ (request()->is('admin/users')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/users-create')}}" class="nav-link {{ (request()->is('admin/users-create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ (request()->is('admin/profile*') || request()->is('admin/image*') || request()->is('admin/reset-password*')) ? 'nav-item menu-is-opening menu-open' : 'nav-item' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item ">
                <a href="{{url('admin/profile')}}" class="nav-link {{ (request()->is('admin/profile*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/image')}}" class="nav-link {{ (request()->is('admin/image*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Picture</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/reset-password')}}" class="nav-link {{ (request()->is('admin/reset-password*')) ? 'active' : '' }}">
                <i class="nav-icon far fa-circle "></i>
              <p>
                Password Reset
              </p>
            </a>
          </li>
            </ul>
          </li>
          <li class="nav-item {{ (request()->is('admin/Events-List*') || request()->is('admin/Events-create*') || request()->is('admin/expired-events-list*')) ? 'nav-item menu-is-opening menu-open' : 'nav-item'}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Event
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('admin/Events-List')}}" class="nav-link {{ (request()->is('admin/Events-List*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/Events-create')}}" class="nav-link {{ (request()->is('admin/Events-create*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
              <li class="nav-item " >
                <a href="{{url('admin/expired-events-list')}}" class="nav-link {{ (request()->is('admin/expired-events-list*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Expired Event</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>