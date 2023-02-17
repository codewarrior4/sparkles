@extends('admin.layouts.base')
@section('title', 'Admin Customer Info')

@section('content')

<div class="main-content-inner">
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card_title">Admin Customer Info</h4>
                    @csrf
                    {{-- error message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form class="needs-validation" novalidate="" method="POST" action="{{route('admin.update-customer')}}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Firstname</label>
                                <input type="text" class="form-control" id="validationCustom01" readonly value="{{$customer->firstname}}" name="firstname" placeholder="First name" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Lastname</label>
                                <input type="text" class="form-control" id="validationCustom01" readonly value="{{$customer->lastname}}" name="lastname" placeholder="First name" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Email</label>
                                <input type="text" class="form-control" id="validationCustom01" readonly value="{{$customer->email}}" name="email" placeholder="First name" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Phone</label>
                                <input type="text" class="form-control" id="validationCustom01" readonly value="{{$customer->phone}}" name="phone" placeholder="First name" required="">
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{$customer->id}}">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <select name="status" class="custom-select ">
                                    <option @if($customer->status == 'Active') selected @endif>Active</option>
                                    <option  @if($customer->status == 'Suspended') selected @endif>Suspended</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <!-- Progress Table start -->
          
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title"> Laundry Orders</h4>
                        <div class="single-table">
                            <div class="table-responsive datatable-primary">
                                <table id="dataTable2" class="text-center table-hover">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">Order Ref</th>
                                        <th scope="col">Date Scheduled</th>
                                        <th scope="col">status</th>
                                        <th scope="col">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($orders as $count => $order)
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
            <
    </div>


    {{-- orders --}}

 
</div>
<!--==================================*
               End Main Content
*====================================-->
@endsection