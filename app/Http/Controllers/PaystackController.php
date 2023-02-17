<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Laundry;
use App\Models\Notifications;
use App\Models\Order;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaystackController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        $this->validate($request,[
            "location"=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);
        // get laundry data
        $laundry = \App\Models\Laundry::where('customer_id', session('customer')->id)->get();
        $total = 0;
        foreach($laundry as $item){
            $total += $item->total;
        }
        $data = array(
            'amount' => $total * 100,
            'email' => session('customer')->email,
            "currency" => "NGN",
            'metadata' => array(
                'name' => session('customer')->firstname,
                'phone' => session('customer')->phone,
                'location' =>$request->location,
                'date' =>$request->date,
                'time' =>$request->time,

            ),
        );
        try{
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // save data to orders
        $order = new Order();
        $order->customer_id = session('customer')->id;
        $order->laundry = json_encode(Laundry::where('customer_id', session('customer')->id)->get());
        $order->pick_up_address =$paymentDetails['data']['metadata']['location'];
        $order->pick_up_date =$paymentDetails['data']['metadata']['date'];
        $order->pick_up_time =$paymentDetails['data']['metadata']['time'];
        $order->payment_method = 'Paystack';
        $order->payment_status = $paymentDetails['data']['gateway_response'];
        $order->refno = $paymentDetails['data']['reference'];
        $order->order_status = 0;
        $order->total = $paymentDetails['data']['amount'] / 100;
        $order->save();
       
        // add to customer notifications
        $notifications =new Notifications();
        $notifications->customer_id = session('customer')->id;
        $notifications->title = 'Your Order Has been placed';
        $notifications->message = 'Your was placed successfully with Reference Number <b>'.$order->refno.'</b>.';
        $notifications->message .= '<br/>';
        $notifications->message .= 'Our team will get back to you shortly.';
        $notifications->message .= '<br/>';
        $notifications->message .= 'Thanks.';
        $notifications->status ='unseen';
        $notifications->save();

        // clear laundry
        Laundry::where('customer_id', session('customer')->id)->delete();
        return redirect()->route('customer.dashboard')->with(['ordercomplete'=>'Your order has been placed successfully. You will be contacted shortly.']);
    }
}