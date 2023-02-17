<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\CustomerVerification;
use App\Models\LaundryItem;
use App\Models\Notifications;
use App\Models\Order;
use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Traits\AuthTrait;
use Carbon\Carbon;

class AuthController extends Controller
{
    //
    use AuthTrait;

    public function adminLogin(){
        return view('admin.auth.login');
    }

    public function adminAuthenticate(Request $request){
        return $this->loginAdmin($request);
    }

    public function adminLogout(){
        return $this->logoutAdmin();
    }

    public function adminDashboard(){
       
        
        
        $orders = Order::all();
        $pending = Order::where('order_status',0)->get();
        $inprogress = Order::where('order_status',1)->get();
        $completed = Order::where('order_status',2)->get();
        $delivery = Order::where('order_status',3)->get();
        $cancelled = Order::where('order_status',4)->get();
        $lastfive = Order::orderBy('id','desc')->take(5)->get();
        $customers = Customers::all();
        $laundryItems = LaundryItem::all();
        $tickets = Tickets::all();

        $total = 0;
        foreach($orders as $order){
            $total += $order->total;
        }

        // return admin dashboard compact data
        return view('admin.dashboard',compact('orders','pending','inprogress','completed','delivery','cancelled','lastfive','total','customers','laundryItems','tickets'));

    }

    public function register(Request $request){
        return view('customer.auth.register');

    }

    public function store(Request $request){
        return $this->saveCustomer($request);
    }

    public function login(){
        return view('customer.auth.login');
    }

    public function authenticate(Request $request){
        return $this->loginCustomer($request);
    }

    public function verify($token)
    {
        return $this->verifyCustomer($token);
    }

    public function resetPassword()
    {
        return view('customer.auth.forget');
    }

    public function sendResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    public function updatePassword($token)
    {
        $customer = CustomerVerification::where('token',$token)->first();
            // check time if not more than 1 hour
            
            if($customer){
                $generatedAt = Carbon::parse($customer->created_at);
                $now = Carbon::now();
                $diff = $generatedAt->diffInMinutes($now);
                
                if($diff > 60){
                    $customer->delete();
                    return redirect()->route('customer.login')->with('error','Reset link has expired, please request for another link');
                }

                return view('customer.auth.updatepassword')->with('token',$token);
            } else{
                return redirect()->route('customer.login')->with('error','Invalid reset link');
            }
    }

    public function savePassword(Request $request)
    {
        return $this->savePass($request);
    }

    public function logout(){
        return $this->logoutCustomer();
    }

    public function dashboard(){
        // return orders and total amount spent and notifications
        $customer = session('customer');
        $orders_count = Order::where('customer_id',$customer->id)->get()->count();
        $orders = Order::where('customer_id',$customer->id)->orderBy('id','desc')->take(5)->get();
        $total = Order::where('customer_id',$customer->id)->sum('total');
        $notifications = Notifications::where('customer_id',$customer->id)->where('status','unseen')->get();
        return view('customer.dashboard',compact('orders','total','notifications','orders_count'));
    }

    public function profile(){
        return view('customer.profile');
    }

    public function updateProfile(Request $request){
        return $this->updateCustomer($request);
    }

    public function changePassword(Request $request){
        return $this->changeCustomerPassword($request);
    }
}

