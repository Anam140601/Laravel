<ul class="sidebar navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{route('admin.home')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  @if(Auth::user()-> akses == 'Admin')
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-users"></i>
      <span>User</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{route('admin.user')}}" >List</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('admin.user.add')}}" >New User</a>
    </div>
  </li>

  

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-list"></i>
      <span>Categori</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{route('admin.kategori')}}" >List</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('admin.kategori.add')}}" >New Category</a>
    </div>
  </li>

  @endif

</ul>