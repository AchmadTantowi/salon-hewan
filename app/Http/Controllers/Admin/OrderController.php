<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;

class OrderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::get();
        return view('admin.order.index', compact('orders'));
    }

    public function edit($orderId)
    {
        $order = Order::where('order_id', $orderId)->first();
        $order_details = OrderDetail::where('order_id', $orderId)->get();
        return view('admin.order.edit', compact('order', 'order_details'));
    }

    public function update($id, Request $request){
      
        $order = Order::find($id);
        $order->status = $request->get('status');
    
        $order->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/order');
    }

    public function complete($order_id){
        $order = Order::where('order_id', $order_id)->first();
        $order->status = "Finish";
        $order->save();
        alert()->success('Success','Completed');
        return redirect('/admin/order');
    }

}
