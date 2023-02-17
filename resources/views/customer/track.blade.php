@extends('customer.layouts.base')
@section('title', 'Customer Profile')

@section('content')

<div class="main-content-inner">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card_title">Track Item</h4>
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
                {{-- success message --}}
                @if (session('success'))
               
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- error message --}}
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="needs-validation" novalidate="" method="POST" action="{{route('customer.laundry.trackRef')}}">
                    <div class="form-row">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Enter Refeerence Number</label>
                            <input type="text" class="form-control" id="validationCustom01" name="refno" placeholder="REFNO" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a Reference Number.
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

   
</div>
<!--==================================*
               End Main Content
*====================================-->
@endsection