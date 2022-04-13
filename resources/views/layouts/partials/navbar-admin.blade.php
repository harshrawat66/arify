@auth
@php
  $route = Route::current()->getName();
  $arr = explode('.', $route);
  $path = $arr[count($arr)-1];
@endphp
<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar" class="active bg-dark">
	  <h5>
      <a href="/home" class="logo">Arifyin</a>
</h5>
<div class="text-uppercase d-flex d-row justify-content-center align-items-center text-white">
<i class="fa fa-user"></i><div class="ml-2"> {{auth()->user()->name}}</div>
</div>
    <ul class="list-unstyled components mb-5 p-2">
      <li class={{ $path === 'index' ? "active-li" : null }}>
        <a href="/home"><span class="fa fa-home"></span> Dashboard</a>
      </li>
      <li class={{ $path === 'keym' ? "active-li" : null }}>
          <a href="/key-management"><span class="fa fa-user"></span> Key Management</a>
      </li>
      <li class={{ $path === 'formView' ? "active-li" : null }}>
          <a href="/single-keygen"><span class="fa fa-key"></span> Single Key Generation</a>
      </li>
      <li class={{ $path === 'batchGen' ? "active-li" : null }}>
          <a href="/batch-keygen"><span class="fa fa-key"></span> Batch Key Generation</a>
      </li>
      <li class={{ $path === 'search' ? "active-li" : null }}>
          <a href="/search"><span class="fa fa-search"></span> Search</a>
      </li>
      <li class="nav-item mt-5">
        <a href="{{ route('logout.perform') }}" style="text-decoration: none" class="me-2">Logout</a>
      </li>
    </ul>
  </nav>
@endauth

@guest
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <!-- <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a> -->

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li>Arifyin</li>
      </ul>
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
        </div>
    </div>
  </div>
</header>
@endguest