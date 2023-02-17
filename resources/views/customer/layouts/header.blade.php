@php 
    // get customer notifications
    use App\Models\Notifications;
    $notifications = Notifications::where('customer_id',session('customer')->id)->where('status','unseen')->get();
@endphp
<div class="header-area mb-4 light-header">
    <div class="row align-items-center">
        <div class="mobile-logo d_none_lg">
            <a href="{{route('customer.dashboard')}}"><img style="max-width:120px; !important" src="{{asset('images/logo.png')}}" alt="logo"></a>
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
                <li class="dropdown">
                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown"><span></span></i>
                    <div class="dropdown-menu bell-notify-box notify-box">
                        <span class="notify-title">You have {{count($notifications)}} new notifications <a href="/customer/notifications">view all</a></span>
                        <div class="nofity-list">
                            @foreach($notifications as $notification)
                                <a href="/customer/notification/{{$notification->id}}" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-map-alt bg_blue"></i></div>
                                    <div class="notify-text">
                                        <p>{{$notification->title}}</p>
                                        
                                        <span>{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                                       
                                    </div>
                                </a>
                            @endforeach
                            {{-- clear all notification and mark all as read --}}
                            @if(count($notifications) >0)
                            <a href="/customer/notifications/clear" class="notify-item">
                                <div class="notify-thumb"><i class="ti-close bg_danger"></i></div>
                                <div class="notify-text">
                                    <h3 class="mt-3">Clear All</h3>
                                    {{-- <span>Just Now</span> --}}
                                </div>
                            </a>
                            @endif

                        </div>
                    </div>
                </li>
               

                <li class="user-dropdown">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d_none_sm">{{session('customer')->firstname}} {{ session('customer')->lastname}} <i class="feather ft-chevron-down"></i></span>
                            <img src="{{asset('images/user.jpg')}}" alt="" class="img-fluid">
                        </button>
                        <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton" >
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="user_img mb-3">
                                    <img src="{{asset('images/user.jpg')}}" alt="User Image">
                                </div>
                                <div class="user_bio text-center">
                                    <p class="name font-weight-bold mb-0">{{session('customer')->firstname }} {{ session('customer')->lastname}}</p>
                                    <p class="email text-muted mb-3">{{session('customer')->email}}</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{route('customer.profile')}}"><i class="ti-user"></i> Profile</a>
                            <span role="separator" class="divider"></span>
                            <a class="dropdown-item" href="{{route('customer.logout')}}"><i class="ti-power-off"></i>Logout</a>
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