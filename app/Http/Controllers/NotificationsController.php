<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(){
        $notifications = Notifications::where('customer_id',session('customer')->id)->orderBy('created_at','desc')->paginate(10);
        return view('customer.notifications',compact('notifications'));
    }

    public function markAsRead(){
        $notifications = Notifications::where('customer_id',session('customer')->id)->update(['status'=>'seen']);
        return redirect()->back()->with('success','Notifications cleared');
    }

    public function show($id){
        $notification = Notifications::find($id);
        $notification->status = 'seen';
        $notification->save();
        return view('customer.notification-summary',compact('notification'));
    }
}
