@extends('admin.layouts.base')
@section('title', 'Admin Create Laundry Item')

@section('content')

<div class="main-content-inner">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card_title">Add Laundry Item</h4>
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
                
                <form class="needs-validation" novalidate="" method="POST" action="{{route('admin.laundry-items.store')}}">
                    <div class="form-row">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Item Name</label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Wash Price</label>
                            <input type="text" class="form-control" id="validationCustom01" name="wash_price" placeholder="" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Wash and Iron Price</label>
                            <input type="text" class="form-control" id="validationCustom01" name="washiron_price" placeholder="" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Starch and Iron Price</label>
                            <input type="text" class="form-control" id="validationCustom01" name="starchiron_price" placeholder="" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Complete Price</label>
                            <input type="text" class="form-control" id="validationCustom01" name="complete_price" placeholder="" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

 
</div>
<!--==================================*
               End Main Content
*====================================-->
@endsection