  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-list"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block {{ Request::is('admin') ? 'active' : '' }}">
            <a href="/admin" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block {{ Request::is('admin/teacher*') ? 'active' : '' }}">
            <a href="/admin/teacher" class="nav-link">Teachers</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block {{ Request::is('admin/blog*') ? 'active' : '' }}">
            <a href="/admin/blog" class="nav-link">Blogs</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block {{ Request::is('admin/contact*') ? 'active' : '' }}">
            <a href="/admin/contact" class="nav-link">Messages</a>
        </li>
        @can('admin')
        <li class="nav-item d-none d-sm-inline-block {{ Request::is('admin/user*') ? 'active' : '' }}">
            <a href="/admin/user" class="nav-link">Users</a>
        </li>

        @endcan
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <form action="/logout" method="post">
            @csrf
            <button type="input" class="nav-link border-0 bg-transparent">Logout</button>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
