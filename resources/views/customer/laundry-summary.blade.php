@extends('customer.layouts.base')
@section('title', 'Customer Laundry Summary')

@section('content')

<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-area">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="iv-left col-lg-6">
                                    <span>INVOICE</span>
                                </div>
                                <div class="iv-right col-lg-6 text-md-right">
                                    {{-- {{$laundry}} --}}
                                    <span>#{{$laundry->id}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>Invoiced to</h3>
                                    <h5>{{session('customer')->firstname}} {{session('customer')->lastname}}</h5>
                                    <h3>Reference Number - {{$laundry->refno}}</h3>
                                    <p> <span class="font-weight-bold">Address</span>
                                        {{-- get pick_up_address from json encoded laundry data --}}
                                        {{$laundry->pick_up_address}}

                                        {{-- {{$laundry->}} --}}

                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Pick Up Date : {{$laundry->pick_up_date}}</li>
                                    <li>Pick Up Time : {{$laundry->pick_up_time}}</li>
                                    <li>Order Status : 
                                        @if($laundry->order_status == 0)
                                        <span class="badge badge-pill mb-3 badge-warning">Pending</span>
                                    @elseif($laundry->order_status == 1)
                                        <span class="badge badge-pill mb-3 badge-info">In Progress</span>
                                    @elseif($laundry->order_status == 2)
                                        <span class="badge badge-pill mb-3 badge-success">Completed</span>
                                    @elseif($laundry->order_status == 3)
                                        <span class="badge badge-pill mb-3 badge-primary">Ready For Delivery</span>
                                    @elseif($laundry->order_status == 4)

                                        <span class="badge badge-pill mb-3 badge-danger">Cancelled</span>
                                    @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-table table-responsive mt-5">
                            <table class="table table-bordered table-hover text-right">
                                <thead>
                                <tr class="text-capitalize">
                                    <th class="text-center">SN</th>
                                    <th class="text-left">Name</th>
                                    <th scope="col">Laundry Type</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                {{-- {{$laundry->laundry}} --}}
                                <tbody>
                                   
                                    @foreach (json_decode($laundry->laundry)  as $count => $item) 
                                    <tr>
                                        <td class="text-center">{{$count +1}}</td>
                                        <td class="text-left">{{$item->laundry_item_name}}</td>
                                        <td class="text-left">{{$item->laundry_type}}</td>

                                        <td>{{$item->quantity}}</td>
                                        <td>&#8358; {{$item->price}}</td>
                                        <td>&#8358; {{$item->total}}</td>
                                    </tr>
                                    @endforeach
                                <tr>
                                    <td colspan="5">Total Paid :</td>
                                    <td>&#8358; {{$laundry->total}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5">Payement Method</td>
                                    <td> {{$laundry->payment_method}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5">Payement Status</td>
                                    <td> {{$laundry->payment_status}}</td>
                                </tr>


                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-buttons text-right">
                        <button onclick="printInvoice()" class="btn btn-primary d-block-mob">Print Invoice</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection