<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav
      class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
    >
      <a
        href=""
        class="navbar-brand font-weight-bold text-secondary"
        style="font-size: 50px"
      >
      <i class="bi bi-book-half"></i>
        <span class="text-primary">Tadika Mesra</span>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="d-flex collapse navbar-collapse justify-content-between"
        id="navbarCollapse"
      >
        <div class="navbar-nav font-weight-bold mx-auto py-0">
          <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
          <a href="/classes" class="nav-item nav-link {{ Request::is('classes') ? 'active' : '' }}">Classes</a>
          <a href="/teachers" class="nav-item nav-link {{ Request::is('teachers') ? 'active' : '' }}">Teachers</a>
          <a href="/gallery" class="nav-item nav-link {{ Request::is('gallery*') ? 'active' : '' }}">Gallery</a>
          <a href="/blog" class="nav-item nav-link {{ Request::is('blog*') ? 'active' : '' }}">Blog</a>
          <a href="/contact" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
          @auth
          @can('staff')
          <a href="/admin" class="nav-item nav-link {{ Request::is('admin') ? 'active' : '' }}">Admin</a>
          @endcan
          <a href="/" class="nav-item nav-link active disabled">{{ auth()->user()->name }}</a>
          @endauth
        </div>
        @auth
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary px-4">Logout</button>
        </form>
        @else
        <a href="/login" class="btn btn-primary px-4">Login</a>
        @endauth
      </div>
    </nav>
</div>
  <!-- Navbar End -->
