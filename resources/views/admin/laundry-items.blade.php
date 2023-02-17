@extends('admin.layouts.base')
@section('title', 'Customer Laundry Items')

@section('content')

<div class="main-content-inner">
    <div class="row">
        <div class="col-xl-6 col-md-6 col-lg-12 stretched_card">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Items</h6>
                            <span class="font-weight-bold display-1 mb-0">{{count($laundryItems)}}</span>
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

        
       


    </div>
 
    <div class="row">
        <!-- Progress Table start -->
      
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Laundry Items</h4>
                    <div class="single-table">
                        <div class="table-responsive datatable-primary">
                            <table id="dataTable2" class="text-center table-hover">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Wash Price</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($laundryItems as $count => $item)
                                    <tr>
                                        <th scope="row">{{$count+1}}</th>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->wash_price}}</td>
                                        <td>
                                            <a href="/admin/laundry-items/{{$item->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="/admin/laundry-items/{{$item->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
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