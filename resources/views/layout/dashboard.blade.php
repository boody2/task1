@extends('layout.page-app')
@section('body')
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/" target="_blank">
        <img src="{{Auth()->user()->photo?"../storage/app/".Auth()->user()->photo:"https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fcdn.pixabay.com%2Fphoto%2F2015%2F10%2F05%2F22%2F37%2Fblank-profile-picture-973460_960_720.png&sp=1728642929Tae31c922f832ac4b634432bca996a9b9aeea4b7eb7f5bc5d5fe6dc58f06ebb05"}}"
        class="avatar avatar-sm rounded-circle me-2" alt="invision">
                <span class="ms-1 font-weight-bold text-white">{{Auth()->user()->name}}</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white {{request()->routeIs('*invoice.index') ?'active bg-gradient-primary':""}} " href="{{route('invoice.index')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
              </div>
              <span class="nav-link-text ms-1">Invoices</span>
            </a>
          </li>
       @if (Auth()->user()->type =="Admin")
       <li class="nav-item">
        <a class="nav-link text-white {{request()->routeIs('*invoice.create') ? 'active bg-gradient-primary':""}}" href="{{route('invoice.create')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">add</i>
          </div>
          <span class="nav-link-text ms-1">Add Invoice</span>
        </a>
      </li>
       @endif

        <li class="nav-item">
          <a class="nav-link text-white {{request()->routeIs('*client.index') ? 'active bg-gradient-primary':""}}" href="{{route('client.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group</i>
            </div>
            <span class="nav-link-text ms-1">Clients</span>
          </a>
        </li>
       @if (Auth()->user()->type =="Admin")

        <li class="nav-item">
          <a class="nav-link text-white {{request()->routeIs('*employee.index') ? 'active bg-gradient-primary':""}}" href="{{route('employee.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Employee</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{request()->routeIs('*history.index') ? 'active bg-gradient-primary':""}}" href="{{route('history.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">history</i>
            </div>
            <span class="nav-link-text ms-1">History</span>
          </a>
        </li>
       @endif

        <li class="nav-item">
          <a class="nav-link text-white {{request()->routeIs('*profile') ? 'active bg-gradient-primary':""}}" href="{{route('profile')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          <a class="nav-link text-white "onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Sign out</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="copyright text-center text-sm text-white text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    made with <i class="fa fa-heart" aria-hidden="true"></i> by
                    <a href="https://www.linkedin.com/in/abdelrahman-talaat2019" class="font-weight-bold text-white"
                        target="_blank">Eng. Abdelrahman Talaat.</a>
                </div>

            </div>
        </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @yield('main')
  </main>

@endsection




