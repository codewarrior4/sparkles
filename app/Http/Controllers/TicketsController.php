<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\TicketSub;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
  
    public function createTicket()
    {
        return view('customer.ticket');
    }

    public function storeTicket(Request $request){
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'priority' => 'required',
        ]);

        $ticket = new Tickets();
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->priority = $request->priority;
        $ticket->status = 'Opened';
        $ticket->customer_id = session('customer')->id;
        $ticket->ticket_id = '#SPT-'.date('d').rand(100000, 999999);
        $ticket->save();

        return redirect()->route('customer.tickets')->with('success', 'Ticket created successfully');
    }

    public function tickets(){
        $tickets = Tickets::where('customer_id', session('customer')->id)->latest()->get();
        return view('customer.tickets', compact('tickets'));
    }

    public function ticket_summary($id){
        $ticket = Tickets::find($id);
        // ticket subs
        $ticketSubs = TicketSub::where('ticket_id', $id)->latest()->get();

        return view('customer.ticket-summary', compact('ticket','ticketSubs'));
    }

    public function show($id){
        $ticket = Tickets::find($id);
        // ticket subs
        $ticketSubs = TicketSub::where('ticket_id', $id)->latest()->get();

        return view('admin.ticket-summary', compact('ticket','ticketSubs'));
    }

    public function closeTicket($id){
        $ticket = Tickets::find($id);
        $ticket->status = 'Closed';
        $ticket->save();

        return back()->with('success', 'Ticket closed successfully');
    }

    public function deleteTicket($id){
        $ticket = Tickets::find($id);
        $ticket->delete();

        return redirect()->route('customer.tickets')->with('success', 'Ticket deleted successfully');
    }

    public function replyTicket(Request $request){
        $request->validate([
            'message' => 'required',

        ]);

        $ticketSub = new TicketSub();
        $ticketSub->reply = $request->message;
        $ticketSub->ticket_id = $request->ticket_id;
        $ticketSub->isadmin = $request->isadmin;
        $ticketSub->save();

        // make ticket open
        $ticket = Tickets::find($request->ticket_id);
        $ticket->status = 'open';
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket submited successfully');
    }

    public function index(){
        $tickets = Tickets::all();
        return view('admin.tickets', compact('tickets'));
    }
}
