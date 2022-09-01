<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Pica's Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }} " href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->segment(1) == 'about' ? 'active' : '' }} " href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->segment(1) == 'posts' ? 'active' : '' }}" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->segment(1) == 'categories' ? 'active' : '' }}"
            href="/categories">Categories</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My
                  Dashboard</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                </form>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ request()->segment(1) == 'login' ? 'active' : '' }}"><i
                class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
        @endauth
      </ul>

    </div>
  </div>
</nav>
