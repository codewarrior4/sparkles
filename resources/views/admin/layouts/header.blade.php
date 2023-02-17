
<div class="header-area mb-4 light-header">
    <div class="row align-items-center">
        <div class="mobile-logo d_none_lg">
            <a href="{{route('admin.dashboard')}}"><img style="max-width:120px; !important" src="{{asset('images/logo.png')}}" alt="logo"></a>
        </div>

        <!--==================================*
                 Navigation and Search
        *====================================-->
        <div class="col-lg-7 col-md-12 d_none_sm d-flex align-items-center">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="search-box pull-left">
                <form action="#">
                    <i class="ti-search"></i>
                    <input type="text" name="search" placeholder="Search..." required>
                </form>
            </div>
          
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
            <ul class="notification-area pull-right">
                <li>
                    <span class="nav-btn pull-left d_none_lg">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </li>
                <li id="full-view" class="d_none_sm"><i class="feather ft-maximize"></i></li>
                <li id="full-view-exit" class="d_none_sm"><i class="feather ft-minimize"></i></li>
               

                <li class="user-dropdown">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d_none_sm">Sparkles Admin <i class="feather ft-chevron-down"></i></span>
                            <img src="{{asset('images/user.jpg')}}" alt="" class="img-fluid">
                        </button>
                        <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton" >
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="user_img mb-3">
                                    <img src="{{asset('images/user.jpg')}}" alt="User Image">
                                </div>
                                <div class="user_bio text-center">
                                    <p class="name font-weight-bold mb-0">Sparkles Admin</p>
                                    
                                    <p class="email text-muted mb-3">{{session('admin')['email']}}/p>
                                </div>
                            </div>
                            <span role="separator" class="divider"></span>
                            <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="ti-power-off"></i>Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!--==================================*
                 End Notification Section
        *====================================-->

    </div>
</div>