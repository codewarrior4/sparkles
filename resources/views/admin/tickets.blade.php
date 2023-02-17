@extends('admin.layouts.base')
@section('title', 'Admin Tickets')

@section('content')

<div class="main-content-inner">
    <div class="row">
        <div class="col-xl-6 col-md-6 col-lg-12 stretched_card">
            <div class="card mb-mob-4">
                <!-- Card body -->
                <div class="card-body card_icon_right">
                    <div class="row">
                        <div class="col">
                            <h6 class="card_title text-uppercase text-muted mb-0">Total Tickets</h6>
                            <span class="font-weight-bold display-1 mb-0">{{count($tickets)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon_rounded mb-3 icon_primary">
                                <i class="feather ft-repeat" aria-hidden="true"></i>

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
                    <h4 class="card_title">Tickets </h4>
                    <div class="single-table">
                        <div class="table-responsive datatable-primary">
                            <table id="dataTable2" class="text-center table-hover">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Ticket ID</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach($tickets as $count => $ticket)
                                    <tr>
                                        <th scope="row">{{$count+1}}</th>
                                        <td>{{$ticket->ticket_id}}</td>
                                        <td>{{$ticket->priority}}</td>
                                        <td>{{$ticket->subject}}</td>
                                        <td>{{$ticket->status}}</td>                                       
                                        <td>
                                            <a href="/admin/ticket/{{$ticket->id}}" class="btn btn-primary btn-sm">View</a>
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