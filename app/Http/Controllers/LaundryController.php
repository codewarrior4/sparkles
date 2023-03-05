<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\LaundryItem;
use App\Models\Order;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function laundry(){
        $laundry = Laundry::where('customer_id', session('customer')->id)->get();
        $laundryItems = LaundryItem::all();
        $total = 0;
        foreach($laundry as $item){
            $total += $item->total;
        }
        return view('customer.create-laundry', compact('laundry', 'laundryItems', 'total'));

    }

    public function store(Request $request){
        // add to laundry else update if exists
        // return $request->all();
        $laundry = Laundry::where('customer_id', session('customer')->id)
                            ->where('laundry_item_id', $request->item)
                            ->where('laundry_type',$request->laundrytype)
                            ->first();
        if($laundry){
            $laundry->quantity = $laundry->quantity + $request->quantity;
            $laundry->total = $laundry->total + $request->total;
            $laundry->save();
        }else{
            $laundry = Laundry::create([
                'customer_id' => session('customer')->id,
                'laundry_item_id' => $request->item,
                'laundry_item_name' => $request->name,
                'laundry_type' => $request->laundrytype,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total' => $request->total,
            ]);
        }
        $laundry = Laundry::where('customer_id', session('customer')->id)->get();
        $total = 0;
        foreach($laundry as $item){
            $total += $item->total;
        }
        return response()->json(['laundry' => $laundry, 'total' => $total]);
    }

    public function update(Request $request){
        $laundry = Laundry::find($request->id);
        $laundry->quantity = $request->quantity;
        $laundry->total = $request->total;
        $laundry->save();
        $laundry = Laundry::where('customer_id', session('customer')->id)->get();
        $total = 0;
        foreach($laundry as $item){
            $total += $item->total;
        }
        return response()->json(['laundry' => $laundry, 'total' => $total]);
    }

    public function delete($id){
        $laundry = Laundry::find($id);
        $laundry->delete();
        return redirect()->back()->with('success','Item removed from laundry');
    }

    public function laundry_summary($id){
        $laundry = Order::where('refno',$id)->first();
        return view('customer.laundry-summary', compact('laundry'));
    }

    public function laundry_history(){
        $laundry = Order::where('customer_id', session('customer')->id)->orderBy('id','desc')->get();
        return view('customer.laundry-history', compact('laundry'));
    }

    public function track(){
        return view('customer.track');
    }

    public function trackRef(Request $request){
        $this->validate($request, [
            'refno' => 'required',
        ]);
        $laundry = Order::where('refno',$request->refno)->first();
        if(!$laundry){
            return redirect()->back()->with('error','Invalid reference number');
        }
        return view('customer.laundry-summary', compact('laundry'));
    }



}
