<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConfirmPayment;
use App\Order;
use App\User;
use Mail;
use DB;

class ConfirmController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // $confirms = ConfirmPayment::get();
        $confirms = DB::table('confirm_payments')
        ->leftJoin('orders', 'orders.order_id', '=', 'confirm_payments.order_id')
        ->leftJoin('users', 'users.id', '=', 'confirm_payments.user_id')
        ->select('users.name', 'confirm_payments.bank_account', 'confirm_payments.account_number', 'confirm_payments.amount','confirm_payments.photo', 'confirm_payments.order_id', 'orders.status')
        ->get();
        return view('admin.confirm.index', compact('confirms'));
    }

    public function verifiedPayment($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        $order->status = "Verified Payment";
        $getUser = User::where('id', $order->user_id)->first();
        $order->save();

        if($order){
            // Send email
            $send_data['title'] = "Pembayaran Anda telah diterima dengan Nomor Order ".$order_id;
            Mail::send('emails.confirm_payment', ['getUser' => $getUser, 'send_data' => $send_data], function($message) use($getUser) {
                $message->to($getUser->email, $getUser->name)->subject('Confirm Payment');
            });
            alert()->success('Success','Confirm');
            return redirect('/admin/confirm');
        }
    }

    public function view($order_id){
        $confirm = ConfirmPayment::where('order_id', $order_id)->first();
        return view('admin.confirm.view', compact('confirm'));
    }

}
