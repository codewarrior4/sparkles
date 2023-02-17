<div class="sidebar-menu light-sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('customer.dashboard')}}"><img src="{{asset('images/logo.png')}}" style="max-width:120px; !important" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner" id="sidebar_menu">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Request::routeIs('customer.dashboard') ? 'active' : '' }}">
                        <a href="/customer/dashboard">
                            <i class="feather ft-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{Request::routeIs('customer.laundry') ? 'active' : ''}}">
                        <a href="/customer/laundry">
                            <i class="feather ft-shopping-cart"></i>
                            <span>Create New Laundry</span>
                        </a>
                    </li>

                    <li class="{{Request::routeIs('customer.packages') ? 'active' : ''}}">
                        <a href="/customer/packages">
                            <i class="feather ft-package"></i>
                            <span>Packages <span class="badge badge-pill mb-3 badge-info">Coming Soon</span></span>
                        </a>
                    </li>

                    <li class="{{Request::routeIs('customer.laundry.history') ? 'active' : ''}}">
                        <a href="/customer/laundry/history">
                            <i class="feather ft-activity"></i>
                            <span>Laundry History</span>
                        </a>
                    </li>

                    <li class="{{Request::routeIs('customer.laundry.track') ? 'active' : ''}}">
                        <a href="/customer/laundry/track">
                            <i class="feather ft-corner-up-right"></i>
                            <span>Track</span>
                        </a>
                    </li>

                    <li class="{{Request::routeIs('customer.ticket.create') ? 'active' : ''}} {{Request::routeIs('customer.tickets') ? 'active' : ''}}" >
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="feather ft-repeat"></i>
                            <span>Ticket</span>
                        </a>
                        <ul class="collapse">
                            <li  class="{{Request::routeIs('customer.ticket.create') ? 'active' : ''}}"><a href="{{route('customer.ticket.create')}}"><i class="ti-plus"></i><span>Create New Ticket </span></a></li>
                            <li  class="{{Request::routeIs('customer.tickets') ? 'active' : ''}}"><a href="{{route('customer.tickets')}}"><i class="feather ft-menu"></i><span> All Tickets</span></a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::routeIs('customer.profile') ? 'active' : '' }}">
                        <a href="/customer/profile">
                            <i class="feather ft-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li class="{{ Request::routeIs('customer.logout') ? 'active' : '' }}">
                        <a href="/customer/logout">
                            <i class="feather ft-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>


                   
                </ul>
            </nav>
        </div>
    </div>
</div>