<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{route('admin.dashboard')}}" class="app-brand-link no-underline">
      <span class="app-brand-logo demo">

      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">ADMIN GUA</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item ">
      <a href="" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>


    <li class="menu-item  {{ set_active(['product.index','product.create', 'product.edit']) }} {{ set_open(['product.index','product.create', 'product.edit']) }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-carousel"></i>
        <div data-i18n="Layouts">Product</div>
      </a>
      <ul class="menu-sub {{ set_active('product.index') }}">
        <li class="menu-item {{ set_active('product.index') }}">
          <a href="{{route('product.index')}}" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item {{ set_active('product.create') }}">
          <a href="{{route('product.create')}}" class="menu-link">
            <div data-i18n="Without navbar">Create</div>
          </a>
        </li>
      </ul>
    </li>
    @canany(['create role', 'edit role', 'delete role'])
     <li class="menu-item  {{ set_active(['roles.index','roles.create', 'roles.edit']) }} {{ set_open(['roles.index','roles.create', 'roles.edit']) }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-carousel"></i>
        <div data-i18n="Layouts">Roles</div>
      </a>
      <ul class="menu-sub {{ set_active(['roles.index','roles.create', 'roles.edit']) }}">
        <li class="menu-item {{ set_active('roles.index') }}">
          <a href="{{route('roles.index')}}" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item {{ set_active('roles.create') }}">
          <a href="{{route('roles.create')}}" class="menu-link">
            <div data-i18n="Without navbar">Create</div>
          </a>
        </li>
      </ul>
    </li>

     <li class="menu-item  {{ set_active(['users.index','users.create', 'users.edit']) }} {{ set_open(['users.index','users.create', 'users.edit']) }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-carousel"></i>
        <div data-i18n="Layouts">Users</div>
      </a>
      <ul class="menu-sub {{ set_active(['users.index','users.create', 'users.edit']) }}">
        <li class="menu-item {{ set_active('users.index') }}">
          <a href="{{route('users.index')}}" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item {{ set_active('users.create') }}">
          <a href="{{route('users.create')}}" class="menu-link">
            <div data-i18n="Without navbar">Create</div>
          </a>
        </li>
      </ul>
    </li> 
    @endcanany

    @can('edit settings')
    <li class="menu-item  {{ set_active(['settings.index']) }} {{ set_open(['settings.index']) }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-carousel"></i>
        <div data-i18n="Layouts">Settings</div>
      </a>
      <ul class="menu-sub {{ set_active('settings.index') }}">
        <li class="menu-item {{ set_active('settings.index') }}">
          <a href="{{route('settings.index')}}" class="menu-link">
            <div data-i18n="Without menu">Edit</div>
          </a>
        </li>
      </ul>
    </li>
    @endcan

    {{--
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Konten</span>
      </li>
      --}}
    @can('delete-blog-posts')
    <li class="menu-item   ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-carousel"></i>
        <div data-i18n="Layouts">Slider</div>
      </a>
      <ul class="menu-sub ">
        <li class="menu-item ">
          <a href="" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item ">
          <a href="" class="menu-link">
            <div data-i18n="Without navbar">Create</div>
          </a>
        </li>
      </ul>
    </li>
    @endcan
  


  {{--

          <li class="menu-header small text-uppercase"><span class="menu-header-text">Email</span></li>
          --}}

  {{--
    <li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-news"></i>
        <div data-i18n="Layouts">Template</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Without navbar">Create</div>
          </a>
        </li>
      </ul>
    </li>
    --}}

  {{--
        <li class="menu-item {{ set_active('choose-hidden-gem.index') }}">
  <a href="{{ route('choose-hidden-gem.index') }}" class="menu-link">
    <i class="menu-icon bx bx-envelope"></i>
    <div data-i18n="Tables">Choose Hidden Gem </div>
  </a>
  </li>
  <li class="menu-item  {{ set_active('contact') }}">
    <a href="{{ route('contact') }}" class="menu-link">
      <i class="menu-icon bx bx-envelope"></i>
      <div data-i18n="Tables">Contact</div>
    </a>
  </li>
  <li class="menu-item ">
    <a href="{{ route('contact.email') }}" class="menu-link">
      <i class="menu-icon bx bx-envelope"></i>
      <div data-i18n="Tables">Create Email </div>
    </a>
  </li>

  --}}
  </ul>
</aside>
<!-- / Menu -->
<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>