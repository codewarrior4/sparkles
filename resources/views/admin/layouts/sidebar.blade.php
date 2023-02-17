<div class="sidebar-menu light-sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('admin.dashboard')}}"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner" id="sidebar_menu">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="/admin/dashboard">
                            <i class="feather ft-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{Request::routeIs('admin.laundry-create') ? 'active' : ''}} {{Request::routeIs('admin.laundry-items') ? 'active' : ''}}" >
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ion-tshirt"></i>
                            <span>Laundry Items</span>
                        </a>
                        <ul class="collapse">
                            <li  class="{{Request::routeIs('admin.laundry-create') ? 'active' : ''}}"><a href="{{route('admin.laundry-create')}}"><i class="ti-plus"></i><span>Add new </span></a></li>
                            <li  class="{{Request::routeIs('admin.laundry-items') ? 'active' : ''}}"><a href="{{route('admin.laundry-items')}}"><i class="feather ft-menu"></i><span> All Items</span></a></li>
                        </ul>
                    </li>
                  
                    <li class="{{ Request::routeIs('admin.orders') ? 'active' : '' }}">
                        <a href="/admin/orders">
                            <i class="feather ft-shopping-cart"></i>
                            <span>Orders</span>
                        </a>
                    </li>

                    <li class="{{ Request::routeIs('admin.customers') ? 'active' : '' }}">
                        <a href="/admin/customers">
                            <i class="feather ft-user"></i>
                            <span>Customers</span>
                        </a>
                    </li>

                    <li class="{{ Request::routeIs('admin.feedback') ? 'active' : '' }}">
                        <a href="#/admin/feedback">
                            <i class="feather ft-message-square"></i>
                            <span>Feedbacks</span>
                        </a>
                    </li>

                    <li class="{{ Request::routeIs('admin.tickets') ? 'active' : '' }}">
                        <a href="/admin/tickets">
                            <i class="feather ft-repeat"></i>
                            <span>Tickets</span>
                        </a>
                    </li>


                    <li class="{{ Request::routeIs('admin.logout') ? 'active' : '' }}">
                        <a href="/admin/logout">
                            <i class="feather ft-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>


                   
                </ul>
            </nav>
        </div>
    </div>
</div>