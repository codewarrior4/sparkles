@extends('admin.layouts.base')
@section('title', 'Admin Dashboard')

@section('content')

<div class="main-content-inner">
    <div class="row">
        <div class="col-xl-4 col-md-4 col-lg-12 stretched_card">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Orders</h6>
                            <span class="font-weight-bold display-3 mb-0">{{count($orders)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-shopping-cart" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-lg-12 stretched_card">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Completed Orders</h6>
                            <span class="font-weight-bold display-3 mb-0">{{count($completed)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-shopping-cart" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-lg-12 stretched_card">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Cancelled Orders</h6>
                            <span class="font-weight-bold display-3 mb-0">{{count($cancelled)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-shopping-cart" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-lg-12 stretched_card mt-3">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Orders In Progress </h6>
                            <span class="font-weight-bold display-3 mb-0">{{count($inprogress)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-shopping-cart" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-lg-12 stretched_card mt-3">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Pending Order </h6>
                            <span class="font-weight-bold display-3 mb-0">{{count($pending)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-shopping-cart" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-lg-12 stretched_card mt-3">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Customers </h6>
                            <span class="font-weight-bold display-3 mb-0">{{count($customers)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-shopping-cart" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-4 col-lg-12 stretched_card mt-3">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Laundry Items </h6>
                            <span class="font-weight-bold display-3 mb-0">{{count($laundryItems)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-shopping-cart" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-lg-12 stretched_card mt-3">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Tickets </h6>
                            <span class="font-weight-bold display-3 mb-0">{{count($tickets)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-shopping-cart" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>


        <div class="col-xl-6 col-md-6 col-lg-12 stretched_card mt-3">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Money Earned</h6>
                            <span class="font-weight-bold display-3 mb-0">&#8358; {{number_format($total,2)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-dollar-sign" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
       


    </div>
 
    <div class="row">
        <!-- Progress Table start -->
      
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Recent Laundry Orders</h4>
                    <div class="single-table">
                        <div class="table-responsive datatable-primary">
                            <table id="dataTable2" class="text-center table-hover">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Date Scheduled</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach($lastfive as $count => $order)
                                    <tr>
                                        <th scope="row">{{$count+1}}</th>
                                        <td>{{$order->refno}}</td>
                                        <td>{{$order->pick_up_date}}</td>
                                        <td>
                                            @if($order->order_status == 0)
                                                <span class="badge badge-pill mb-3 badge-warning">Pending</span>
                                            @elseif($order->order_status == 1)
                                                <span class="badge badge-pill mb-3 badge-info">In Progress</span>
                                            @elseif($order->order_status == 2)
                                                <span class="badge badge-pill mb-3 badge-success">Completed</span>
                                            @elseif($order->order_status == 3)
                                                <span class="badge badge-pill mb-3 badge-primary">Ready For Delivery</span>
                                            @elseif($order->order_status == 4)

                                                <span class="badge badge-pill mb-3 badge-danger">Cancelled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/order/{{$order->refno}}" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Progress Table end -->
    </div>
</div>
<!--==================================*
               End Main Content
*====================================-->
@endsection