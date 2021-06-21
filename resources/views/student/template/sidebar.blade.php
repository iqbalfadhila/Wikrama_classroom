<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('storage/photos/student/'.getProfile()) }}" alt="User-Profile-Image"
                        style="width: 47px; height: 47px; object-fit: contain">
                    <div class="user-details">
                        <div id="more-details">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Home</label>
                </li>
                <li class="nav-item">
                    <a href="home" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Data</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Class</span></a>
                    <ul class="pcoded-submenu">
                        @foreach(getAuthRombel() as $rombel)
                        <li>
                            <a href="{{ route('student.collect.index') }}">
                                {{ $rombel->rombel->rombel }}
                            </a>
                        </li>
                            
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>