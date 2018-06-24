<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Order;
use App\OrderDetail;
use Auth;

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
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('customer.order', compact('orders'));
    }

    public function orderDetail($orderId){
        $orders = Order::where('id', $orderId)->first();
        $orderDetails = OrderDetail::where('order_id', $orderId)->get();
        return view('customer.order_detail', compact('orders','orderDetails'));
    }


}
