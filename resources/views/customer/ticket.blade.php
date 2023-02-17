@extends('customer.layouts.base')
@section('title', 'Customer Ticket')

@section('content')

<div class="main-content-inner">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card_title">Create New Ticket</h4>
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
                
                <form class="needs-validation" novalidate="" method="POST" action="{{route('customer.ticket.store')}}">
                    <div class="form-row">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Subject</label>
                            <input type="text" class="form-control" id="validationCustom01" name="subject" placeholder="Ticket Subject " >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Priority</label>
                            <select class="form-control" name="priority" class="custom-select">
                                <option value="Low">Low</option>
                                <option value="High">Medium</option>
                                <option value="Medium">High</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Message</label>
                            <textarea class="form-control" name="message" id="summernote" placeholder="Message" ></textarea>
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