@extends('admin.layouts.base')
@section('title', 'Admin Order Summary')

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
                                    <span>#{{$order->id}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>Invoiced to</h3>
                                    <h3>Reference Number - {{$order->refno}}</h3>
                                    <p> <span class="font-weight-bold">Address</span>
                                        {{-- get pick_up_address from json encoded order data --}}
                                        {{$order->pick_up_address}}

                                        {{-- {{$order->}} --}}

                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Pick Up Date : {{$order->pick_up_date}}</li>
                                    <li>Pick Up Time : {{$order->pick_up_time}}</li>
                                    <li>Order Status : 
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
                                    <th class="text-left">Laundry Type</th>

                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                {{-- {{$order->order}} --}}
                                <tbody>
                                   
                                    @foreach (json_decode($order->laundry)  as $count => $item) 
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
                                    <td>&#8358; {{$order->total}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5">Payement Method</td>
                                    <td> {{$order->payment_method}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5">Payement Status</td>
                                    <td> {{$order->payment_status}}</td>
                                </tr>


                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    {{-- form to update status --}}
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Update Order Status</h4>
                    <form class="needs-validation" novalidate="" method="POST" action="{{route('admin.update-order')}}">
                        <div class="form-row">
                            @csrf
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Order Status</label>
                                <select name="order_status" id="" class="custom-select">
                                    <option value="0" {{$order->order_status == 0 ? 'selected' : ''}}>Pending</option>
                                    <option {{$order->order_status == 1 ? 'selected' : ''}} value="1">In Progress</option>
                                    <option {{$order->order_status == 2 ? 'selected' : ''}} value="2">Completed</option>
                                    <option {{$order->order_status == 3 ? 'selected' : ''}} value="3">Ready For Delivery</option>
                                    <option {{$order->order_status == 4 ? 'selected' : ''}} value="4">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="refno" value="{{$order->refno}}">
                        
                        
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection