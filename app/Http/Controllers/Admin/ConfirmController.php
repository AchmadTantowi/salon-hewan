<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConfirmPayment;
use App\Order;

class ConfirmController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $confirms = ConfirmPayment::get();
        return view('admin.confirm.index', compact('confirms'));
    }

    public function verifiedPayment($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        $order->status = "Verified Payment";
        $order->save();

        if($order){
            alert()->success('Success','Confirm');
            return redirect('/admin/confirm');
        }
    }

}
