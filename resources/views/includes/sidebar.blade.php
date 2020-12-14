<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">Man 3 Sukabumi</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">MAN</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main Menu</li>

      <li class="{{ setActive('admin/dashboard') }}"><a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i>
          <span>Dashboard</span></a></li>

      @can('posts.index')
      <li class="{{setActive('admin/post')}}"><a class="nav-link" href="#"><i class="fas fa-book"></i>
          <span>Berita</span></span></a></li>
      @endcan

      @can('tags.index')
      <li class="{{setActive('admin/tag')}}"><a class="nav-link" href="#"><i class="fas fa-tags"></i>
          <span>Tags</span></a></li>
      @endcan

      @can('categories.index')
      <li class="{{setActive('admin/category')}}"><a class="nav-link" href="#"><i class="fas fa-folder"></i>
          <span>Kategori</span></a></li>
      @endcan

      @can('events.index')
      <li class="{{setActive('admin/event')}}"><a class="nav-link" href="#"><i
            class="fas fa-bell"></i><span>Agenda</span></a></li>

      @endcan



      @if(auth()->user()->can('photos.index') || auth()->user()->can('videos.index'))
      <li class="menu-header">Galeri</li>
      @endif

      @can('photos.index')
      <li class="{{setActive('admin/photo')}}"><a class="nav-link" href="#"><i
            class="fas fa-image"></i><span>Foto</span></a></li>
      @endcan

      @can('videos.index')
      <li class="{{setActive('admin/video')}}"><a class="nav-link" href="#"><i
            class="fas fa-video"></i><span>Video</span></a></li>

      @endcan

      @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') ||
      auth()->user()->can('users.index'))
      <li class="menu-header">Pengaturan</li>
      @endif

      @can('sliders.index')
      <li class="{{setActive('admin/slider')}}"><a class="nav-link" href="#"><i
            class="fas fa-laptop"></i><span>Slider</span></a></li>
      @endcan

      <li class="nav-item dropdown {{setActive('admin/role').setActive('admin/permission').setActive('admin/user') }}">
        @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') ||
        auth()->user()->can('users.index'))
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>User Management</span></a>
        @endif
        <ul class="dropdown-menu">

          @can('roles.index')
          <li class="{{setActive('admin/role')}}"><a class="nav-link" href="{{ route('admin.role.index') }}"><i
                class="fas fa-unlock"></i> Roles</a>
          </li>
          @endcan

          @can('permissions.index')
          <li class="{{setActive('admin/permission')}}"><a class="nav-link"
              href="{{ route('admin.permission.index') }}"><i class="fas fa-key"></i> Permission</a></li>
          @endcan

          @can('users.index')
          <li class="{{setActive('admin/user')}}"><a class="nav-link" href="{{route('admin.user.index')}}"><i class="fas fa-users"></i> Users</a>
          </li>
          @endcan
        </ul>
      </li>

    </ul>
  </aside>
</div>