@extends('customer.layouts.base')
@section('title', 'Customer Add Laundry')

@section('content')
{{-- if error --}}

<div class="main-content-inner">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Add Item To Cart</h4>
                    <form id="addToCart">
                        <div class="form-row align-items-center">
                            <div class="col-sm-12 col-md-6 col-lg-3 my-1">
                                <label class="sr-only" for="inlineFormInputName">Item Name</label>
                                <select name="item" id="laundryitems" class="form-control">
                                    <option value="">Select Item</option>
                                    @foreach ($laundryItems as $item)
                                        <option value="{{ $item->id }}" 
                                            data-name={{$item->name}}
                                            data-wash_price={{$item->wash_price ? $item->wash_price : 0}}
                                            data-washiron_price = {{$item->washiron_price ? $item->washiron_price : 0}}
                                            data-starchiron_price = {{$item->starchiron_price ? $item->starchiron_price : 0}}
                                            data-complete_price ={{$item->complete_price ? $item->complete_price : 0}}
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe"> --}}
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 my-1">
                                {{-- <label class="sr-only" id for="inlineFormInputGroupUsername">Laundry Type</label> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Laundry Type</div>
                                    </div>
                                    <select name="laundry_type" id="laundryType" class="form-control">
                                        <option value="">Select Laundry Type</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-2 my-1">
                                <label class="sr-only" id for="inlineFormInputGroupUsername">Quantity</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" >Unit Price :<span id="price"></span></div>
                                    </div>
                                    <input type="number" id="quantity" class="form-control" id="inlineFormInputGroupUsername" min="1">
                                </div>
                            </div>
                            {{-- <div style="display: none"> --}}

                                {{-- <input type="text" id="price"> --}}
                            {{-- </div> --}}
                            <div class="col-sm-12 col-md-6 col-lg-2 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Total</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Total</div>
                                    </div>
                                    {{-- update total value onchange of quantity --}}
                                    <input type="text" readonly class="form-control" id="total" >
                                </div>
                            </div>
                            @csrf
                          
                            <div class="col-sm-12 col-md-6 col-lg-1 my-1">
                                <button type="submit" disabled  id="addToCartBtn" class="btn btn-primary">  <i class="feather ft-shopping-cart"></i> Add to Cart</button>
                                
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-1 my-1">
                                <div id="btn-loader" style="display: none" class="roller_loader primary_roller_loader">
                                    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

    {{-- cart table --}}
    <div class="row">
        <!-- Progress Table start -->
      
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Cart</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Laundry Type</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody id="cartTable">
                                    @foreach ($laundry as $count => $laund )
                                        <tr>
                                            <td>{{$count +1}}</td>
                                            <td id="cart-item-name">{{$laund->laundry_item_name}}</td>
                                            <td id="cart-item-name">{{$laund->laundry_type}}</td>
                                            @csrf
                                            <td>
                                                <input class="form-control cart-quantity" type="number" value="{{$laund->quantity}}" data-total="{{$laund->total}}" data-id="{{$laund->id}}" data-price="{{$laund->price}}" min="1" id="cart-item-quantity" style="width: 100%">
                                            <td id="cart-item-price">{{$laund->price}}</td>
                                            <td id="cart-item-total">{{$laund->total}}</td>
                                            <td>
                                                <a href="{{route('customer.delete-laundry', $laund->id)}}" class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    {{-- @if (count($laundry) >0) --}}
                                      
                                    {{-- @endif --}}
                                </tbody>
                                <tfoot>
                                    <tr> 
                                        <td colspan="4" style="font-size: 30px" align="right">Total Payment Due</td>
                                        <td  style="font-size: 30px" >&#8358; <span id="cart-total"> {{number_format($total,2)}}  </span></td>
                                        <td><button class="btn btn-primary" id="btn-proceed">Proceed To Pay</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Progress Table end -->
    </div>



    <div class="row mt-5" style="display: none" id="pickupinfo">
        {{-- pickup form --}}
        <div class="col-12">
            <div class="card">
                <form action="{{route('customer.pay')}}" method="post">
                    {{-- if errore --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @csrf
                        <h4 class="card_title">Pick Up Information</h4>
                        <div class="col-md-12 mb-3">
                            <label for="example-text-input" class="col-form-label">Pickup Location</label>
                            <textarea class="form-control" name="location" id="" cols="30" rows="4"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="example-text-input" class="col-form-label">Select Pickup Date</label>
                            <input class="form-control" type="date" name="date" id="example-text-input">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="example-text-input" class="col-form-label">Select Pickup Time</label>
                            <input class="form-control" type="time" name="time"  id="example-text-input">
                        </div>
                        {{-- show amount to pay --}}
                        <button class="btn btn-primary" type="submit">Make Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

