<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\BankAccount;

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
        $banks = BankAccount::get();
        return view('customer.cart', compact('banks'));
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
            $number = substr($lastOrder->order_id, 13);
            // dd($number);
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
            $order->status = "Waiting Payment Confirmation";
            $order->alamat_order = $request->get('alamat');
            $order->total = $tot_price;
            $order->notes = $request->get('notes');
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

            // if(!is_null($request->get('alamat'))){
            //     DB::table('users')
            //     ->where('id', $request->get('user_id')[0])
            //     ->update(['address' => $request->get('alamat')]);
            // }
            
            DB::commit();
            Cart::destroy();
            alert()->success('Success','Thanks for order');
            return redirect('/payment-confirmation');
        }
        catch(QueryException $e){
            DB::rollback();
            alert()->error('Failed','Not Saved');
            return redirect('/cart');
        }
    }

}
