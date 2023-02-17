@extends('customer.layouts.base')
@section('title', 'Customer Notifications')

@section('content')

<div class="main-content-inner">
    
    <div class="row">
      
        <div class="col-lg-12 col-sm-12 mt-mob-4">
            <div class="card">
                <div class="card-body">
                    <div class="mail_content">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="mail_head">Inbox <span class="inbox_numb bg-primary">{{count($notifications)}}</span></h3>
                            </div>
                          
                            <div class="col-lg-12">
                                <div class="pull-right all_mails_btn">
                                    <div class="btn-group btn-split mail_more_btn mt-0">
                                        <button type="button" class="btn btn-primary" onclick="location.assign('/customer/notifications/clear')">Mark All As Read</button>
                                       
                                    </div>
                                </div>

                            <div class="mail_list col-lg-12 table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        @foreach ($notifications as $notification)
                                        
                                        <tr class="unread" id="mail_msg_1" onclick="location.assign('/customer/notification/{{$notification->id}}')">
                                            <td class="">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1"></label>
                                                </div>
                                            </td>
                                           
                                            <td class="open-view">{{session('customer')->firstname}}</td>
                                            <td class="open-view">
                                                {{-- check if  notification is read --}}
                                                @if ($notification->status == 'unseen')
                                                <span class="label label-warning mr-2">{{$notification->status}}</span>&nbsp;
                                                
                                                <span class="msgtext">{{$notification->title}}.</span>
                                                @else
                                                <span class="label label-success mr-2">{{$notification->status}}</span>&nbsp;
                                                <span class="msgtext">{{$notification->title}}.</span>

                                                @endif
                                            </td>
                                            <td class="open-view">
                                                <span class="msg_time">
                                                    {{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                               {{-- pagination links --}}
                                <center> {{$notifications->links()}}</center>
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