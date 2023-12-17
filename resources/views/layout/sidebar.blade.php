<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item @yield('dashboard')">
            <a href="{{route('dashboard') }}" class="nav-link @yield('dashboard')">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <a href="#" class="nav-link @yield('master_data')">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('employee.index') }}" class="nav-link @yield('employee')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Salary</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Department</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Position</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Job History</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @yield('profile')">
            <a href="{{ route('profile.edit') }}" class="nav-link @yield('profile')">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  My Profile
                </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" onclick="return logout(event);" title="Keluar Aplikasi ?"  class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>Keluar Aplikasi
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
          </a>
        </li>

    </ul>
</nav>
