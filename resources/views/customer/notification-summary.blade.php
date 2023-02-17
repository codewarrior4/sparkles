@extends('customer.layouts.base')
@section('title', 'Customer notification Details')

@section('content')

<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h3>
                        Notifications
                    </h3>
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
                            

                            <div class="col-lg-12">
                                <h5 class="pull-left mb-mob-4">
                                    {{$notification->title}}
                                    <span class="d-block recipient">From: {{env('APP_NAME')}}</span>
                                    <span class="mailbox-time recipient">{{$notification->created_at}}</span>
                                </h5>
                               
                            </div>

                            <div class="mail_message col-lg-12">
                                <div class="mt-5">
                                    <p>{!! $notification->message !!}</p>
                                    
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--==================================*
               End Main Content
*====================================-->
@endsection