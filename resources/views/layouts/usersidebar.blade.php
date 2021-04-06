
    @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    @endphp

      
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
          <li class="nav-item {{-- {{($prefix=='/users')?'menu-open':''}} --}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{-- {{ route('users.view') }} --}}"class="nav-link {{-- {{($route=='users.view')?'active':''}} --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{-- {{ route('users.add') }} --}}"class="nav-link {{-- {{($route=='users.add')?'active':''}} --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>


     {{--     <li class="nav-item {{($prefix=='/teachers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Teacher Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('teachers.view') }}"class="nav-link {{($route=='teachers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teachers List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('teachers.add') }}"class="nav-link {{($route=='teachers.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Teacher</p>
                </a>
              </li>
            </ul>
          </li>
              
            </ul>
          </li>
 --}}

{{-- 
              <li class="nav-item {{($prefix=='/logos')?'menu-open':''}}">
            <a href="#" class="">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logo Management
                <i class=" fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
                
              </p>
            </a> --}}
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('logos.view') }}" class="nav-link {{($route=='logos.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logos.add') }}" class="nav-link {{($route=='logos.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Logo</p>
                </a>
              </li>
              
            </ul> --}}
          </li>


        </ul>
        </nav>