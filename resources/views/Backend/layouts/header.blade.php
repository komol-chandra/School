<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="{{url('/admin')}}">
                <b class="logo-icon p-l-10">
                        <img style="width: 47px; margin-left: -14px;" src="{{$settings->small_logo ? '/Backend_assets/Files/Logo/small_logo/'.$settings->small_logo  : '/Backend_assets/Backend/images/sm-logo.png'}}"
                        alt="image" />
                </b>
                <span class="logo-text">
                     <img style="width:165px;"
                     src="{{$settings->regular_logo ? '/Backend_assets/Files/Logo/regular_logo/'.$settings->regular_logo  : '/Backend_assets/Backend/images/School.png'}}" alt="School" class="light-logo" />
                </span>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
            </ul>
            <div style="text-align: left; width: 82%;">
                <h3 style="color:#c0fff3; font-family: 'Big Shoulders Inline Text', cursive;     font-size:23px;margin-top: 7px;">{{$settings->system_name}}......</h3>
            </div>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                    </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                        <ul class="list-style-none">
                            <li>
                                <div class="">
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Event today</h5>
                                                <span class="mail-desc">Just a reminder that event</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Settings</h5>
                                                <span class="mail-desc">You can customize this template</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Pavan kumar</h5>
                                                <span class="mail-desc">Just see the my admin!</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Luanch Admin</h5>
                                                <span class="mail-desc">Just see the my new admin!</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('Backend_assets/Backend/images/profile.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
