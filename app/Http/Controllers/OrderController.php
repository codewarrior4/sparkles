<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::latest()->get();
        return view('admin.orders',compact('orders'));
    }

    public function show($id){
        $order = Order::where('refno',$id)->first();
        return view('admin.order-summary',compact('order'));
    }

    public function update(Request $request){
        $request->validate([
            'refno' => 'required',
            'order_status' => 'required'
        ]);
        $order = Order::where('refno',$request->refno)->first();
        $order->order_status = $request->order_status;
        $order->save();

        // check if status was changed
        if($order->order_status == 2){
            // add notification
            $notifications =new Notifications();
            $notifications->customer_id = $order->customer_id;
            $notifications->title = 'Your Order Has been Completed';
            $notifications->message = 'Your Order with Reference Number <b>'.$order->refno.'</b>. has been marked as completed';
            $notifications->message .= '<br/>';
            $notifications->message .= 'We would appreciate a feedback from you.';
            $notifications->message .= '<br/>';
            $notifications->message .= 'Thanks.';
            $notifications->status ='unseen';
            $notifications->save();
        }
        if($order->wasChanged('order_status')){
            // add notification
            $notifications =new Notifications();
            $notifications->customer_id = $order->customer_id;
            $notifications->title = 'Order '.$order->refno.' has been updated';
            $notifications->message = 'Your Order with Reference Number <b>'.$order->refno.'</b>. new status is'.$this->getStatus($order->order_status).'.';
            $notifications->message .= '<br/>';
            $notifications->message .= 'Thanks.';
            $notifications->message .= '<br/>';
            $notifications->message .= 'Sparkles.';
            $notifications->status ='unseen';
            $notifications->save();
        }
        return redirect()->back()->with('success','Order status updated successfully');
    }

    function getStatus($status){
        switch($status){
            case 0:
                return 'Pending';
                break;
            case 1:
                return 'In Progress';
                break;
            case 2:
                return 'Completed';
                break;
            case 3:
                return 'Ready For Delivery';
                break;
            case 4:
                return 'Cancelled';
                break;
        }
            
    }
}
