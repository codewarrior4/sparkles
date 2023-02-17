<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    
    public function index(){
        $customers = Customers::latest()->get();
        return view('admin.customers',compact('customers'));
    }


    public function show($id){
        $customer = Customers::find($id);
        $orders = $customer->orders;
        return view('admin.customer-summary',compact('customer','orders'));
    }

    public function update(Request $request){
        $customer = Customers::find($request->id);
        $customer->status = $request->status;
        $customer->save();
        return redirect()->back()->with('success','Customer status updated successfully');
    }
}
