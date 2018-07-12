<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Order;
use App\OrderDetail;
use App\Product;

class CartController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.cart');
    }

    public function cartRemove($rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart');
    }

    public function getNextOrderNumber()
    {
        $date = date('Ymd');
        $format = 'ORD-'.$date.'-';
        $lastOrder = Order::orderBy('created_at', 'desc')->first();
        if (!$lastOrder)
            $number = 0;
        else 
            $number = substr($lastOrder->order_id, 3);
        return $format . sprintf('%04d', intval($number) + 1);
    }

    public function saveOrder(Request $request){
        $productId = $request->get('product_id');
        $replace = str_replace(",","",$request->get('total')[0]);
        $tot_price = substr($replace,0,-3);
        
        DB::beginTransaction();
        try{
            $order = new Order;
            $order->order_id = $this->getNextOrderNumber();
            $order->user_id = $request->get('user_id')[0];
            $order->total = $tot_price;
            $order->save();

            for ($i=0; $i < count($productId); $i++) {
                $getProduct = Product::where('id', $productId[$i])->first();
                $orderDetail = new OrderDetail;
                $orderDetail->order_id = $order->order_id;
                $orderDetail->product_id = $productId[$i];
                $orderDetail->qty = 1;
                $orderDetail->subTotal = $getProduct->price;
                $orderDetail->save();
            }

            DB::commit();
            Cart::destroy();
            alert()->success('Success','Thanks for order');
            return redirect('/cart');
        }
        catch(QueryException $e){
            DB::rollback();
            alert()->error('Failed','Not Saved');
            return redirect('/cart');
        }
    }

}
