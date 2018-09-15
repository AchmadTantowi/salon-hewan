<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Order;
use App\OrderDetail;
use Auth;
use DB;

class OrderFrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $orders = Order::where('user_id', Auth::user()->user_id)->get();
        $orders = DB::table('orders')
        ->select('*')
        ->where('orders.user_id', Auth::user()->user_id)
        ->get();
        return view('customer.order', compact('orders'));
    }

    public function orderDetail($orderId){
        // $orders = Order::where('order_id', $orderId)->first();
        $orders = DB::table('orders')
        ->select('*')
        ->where('order_id', $orderId)
        ->first();
        $orderDetails = OrderDetail::where('order_id', $orderId)->get();
        return view('customer.order_detail', compact('orders','orderDetails'));
    }


}
