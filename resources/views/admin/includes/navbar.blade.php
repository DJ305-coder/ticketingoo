<div class="nav-header">
  <div class="brand-logo mt-2">
    <a href="">
      <b class="logo-abbr">
        <i class="fa fa-user" aria-hidden="true">Admin Panel</i>
      </b>
      <span class="brand-title"><i class="fa fa-user" aria-hidden="true">Admin Panel</i></span>
    </a>
  </div>
</div>
<!--  -->
<div class="header">
  <div class="header-content clearfix">
    <div class="nav-control">
      <div class="hamburger">
        <span class="toggle-icon">
          <i class="icon-menu"></i>
        </span>
      </div>
    </div>
    <div class="header-right">
      <ul class="clearfix">
        <li class="icons dropdown">
          <div class="user-img c-pointer position-relative" data-toggle="dropdown">
            <span class="activity active"></span>
            <img src="{{asset('admin_panel/commonarea/dist/img/user/1.png')}}" height="40" width="40" alt="" />
          </div>
          <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
            <div class="dropdown-content-body">
              <ul>
                <hr class="my-2" />
                <li>
                  <a href="#"><i class="icon-user"></i> <span>{{auth()->guard('admin')->user()->name}}</span></a>
                </li>
                <li>
                  <a href="{{url('admin/logout')}}"><i class="icon-key"></i> <span>Logout</span></a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>