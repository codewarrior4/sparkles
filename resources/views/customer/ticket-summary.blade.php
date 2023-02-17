@extends('customer.layouts.base')
@section('title', 'Customer Ticket Summary')

@section('content')

<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h3>
                        Ticket Summary - {{$ticket->status}}
                    </h3>
                    {{-- mark as read button --}}
                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"class="btn btn-primary btn-sm ml-5 pull-right">Add Reply</a>
                    <a href="{{route('customer.ticket.delete', $ticket->id)}}" class="btn btn-danger btn-sm ml-5 pull-right">Delete Ticket</a>
                    <a href="{{route('customer.ticket.close', $ticket->id)}}" class="btn btn-warning btn-sm pull-right">Close Ticket</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="mail_content">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <h3 class="mail_head pull-left">{{$ticket->ticket_id}}</h3>
                            </div>

                            <div class="col-lg-12">
                                <h5 class="pull-left mb-mob-4">
                                    {{$ticket->subject}}
                                    <span class="d-block recipient">From: {{session('customer')->firstname}} {{session('customer')->lastname}}</span>
                                    <span class="mailbox-time recipient">{{$ticket->created_at}}</span>
                                </h5>
                                
                            </div>

                            <div class="mail_message col-lg-12">
                                <div class="mt-5">
                                    <p>{!! $ticket->message !!}</p>
                                </div>
                                
                              
                              
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>
                                Ticket Replies
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ticket Replies --}}
            @foreach($ticketSubs as $reply)
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mail_content">
                                <div class="row">
                                    

                                    <div class="col-lg-12">
                                        <h5 class="pull-left mb-mob-4">
                                            {!! $reply->reply !!}
                                            <span class="d-block recipient mt-4">
                                                @if ($reply->isadmin == 1)
                                                Customer Care Support
                                                @else
                                                {{session('customer')->firstname}} {{session('customer')->lastname}}
                                                @endif</span>
                                            <span class="mailbox-time recipient">{{$reply->created_at}}</span>
                                        </h5>
                                        
                                    </div>

                                    <div class="mail_message col-lg-12">
                                        <div class="mt-5">
                                            <p>{!! $reply->message !!}</p>
                                        </div>
                                        
                                      
                                      
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Reply To Ticket</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" method="POST" action="{{route('customer.ticket.reply')}}">
                   
                        @csrf
                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                        <input type="hidden" name="isadmin" value="0">
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