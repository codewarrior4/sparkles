<?php

namespace App\Http\Controllers;

use App\Models\LaundryItem;
use Illuminate\Http\Request;

class LaundryItemController extends Controller
{

    public function index(){
        $laundryItems = LaundryItem::latest()->get();
        return view('admin.laundry-items',compact('laundryItems'));
    }

    public function create(){
        return view('admin.laundry-items-create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        
        $laundryItem = new LaundryItem();
        $laundryItem->name = $request->name;
        $laundryItem->wash_price = $request->wash_price;
        $laundryItem->washiron_price = $request->washiron_price;
        $laundryItem->starchiron_price = $request->starchiron_price;
        $laundryItem->complete_price = $request->complete_price;
        $laundryItem->save();

        return redirect()->route('admin.laundry-items')->with('success','Laundry Item created successfully');
    }

    public function edit($id){
        $laundryItem = LaundryItem::find($id);
        return view('admin.laundry-items-edit',compact('laundryItem'));

    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);

        $laundryItem = LaundryItem::find($request->id);
        $laundryItem->name = $request->name;
        $laundryItem->wash_price = $request->wash_price;
        $laundryItem->washiron_price = $request->washiron_price;
        $laundryItem->starchiron_price = $request->starchiron_price;
        $laundryItem->complete_price = $request->complete_price;
        $laundryItem->save();

        return redirect()->route('admin.laundry-items')->with('success','Laundry Item updated successfully');

    }

    public function delete($id){
        $laundryItem = LaundryItem::find($id);
        $laundryItem->delete();
        return redirect()->route('admin.laundry-items')->with('success','Laundry Item deleted successfully');
    }
}
