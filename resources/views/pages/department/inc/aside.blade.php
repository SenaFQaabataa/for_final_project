<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Department Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()?->email ?? 'Name Here' }}</a>
            </div>
        </div>

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
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('cbe.home') }}" class="nav-link {{ (request()->is('samplelink')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('department/student*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('department/student*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Student
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('department.student.index') }}" class="nav-link {{ (request()->is('department/student/list*')) ? 'active' : '' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Student List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('department.student.add') }}" class="nav-link {{ (request()->is('department/student/add*') || request()->is('department/student/upload*') || request()->is('school/department/edit*')) ? 'active' : '' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Upload Students</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
