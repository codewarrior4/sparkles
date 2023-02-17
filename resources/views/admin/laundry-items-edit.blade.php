@extends('admin.layouts.base')
@section('title', 'Admin Edit Laundry Item')

@section('content')

<div class="main-content-inner">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card_title">Update Laundry Item</h4>
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
                
                <form class="needs-validation" novalidate="" method="POST" action="{{route('admin.laundry-items.update')}}">
                    <div class="form-row">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Item Name</label>
                            <input type="text" class="form-control" id="validationCustom01" value="{{$laundryItem->name}}" name="name" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$laundryItem->id}}">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Wash Price</label>
                            <input type="text" class="form-control" id="validationCustom01" value="{{$laundryItem->wash_price}}" name="wash_price"  >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Wash and Iron Price</label>
                            <input type="text" class="form-control" id="validationCustom01" value="{{$laundryItem->washiron_price}}" name="washiron_price" placeholder="" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Starch and Iron Price</label>
                            <input type="text" class="form-control" id="validationCustom01" value="{{$laundryItem->starchiron_price}}" name="starchiron_price" placeholder="" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Complete Price</label>
                            <input type="text" class="form-control" id="validationCustom01" value="{{$laundryItem->complete_price}}" name="complete_price" placeholder="" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>

 
</div>
<!--==================================*
               End Main Content
*====================================-->
@endsection