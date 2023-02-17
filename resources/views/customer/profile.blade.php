@extends('customer.layouts.base')
@section('title', 'Customer Profile')

@section('content')

<div class="main-content-inner">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card_title">Update profile</h4>
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
                <form class="needs-validation" novalidate="" method="POST" action="{{route('customer.profile')}}">
                    <div class="form-row">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Firstname</label>
                            <input type="text" class="form-control" id="validationCustom01" name="firstname" placeholder="First name" value="{{session('customer')->firstname}}" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Lastname</label>
                            <input type="text" class="form-control" id="validationCustom01" name="lastname" placeholder="Last name" value="{{session('customer')->lastname}}" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Email</label>
                            <input type="text" class="form-control" id="validationCustom01"  placeholder="First name" value="{{session('customer')->email}}" readonly required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Phone Number</label>
                            <input type="text" class="form-control" id="validationCustom01" name="phone" placeholder="phone" value="{{session('customer')->phone}}" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card_title">Update Password</h4>
                
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
                <form class="needs-validation" novalidate="" method="POST" action="{{route('customer.updatePassword')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Enter New Password</label>
                            <input type="password" class="form-control" id="validationCustom01" name="password">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Confirm New Password</label>
                            <input type="password" class="form-control" id="validationCustom01" name="confirm_password">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--==================================*
               End Main Content
*====================================-->
@endsection