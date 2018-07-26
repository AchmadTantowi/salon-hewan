<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConfirmPayment;
use App\Order;
use App\User;
use Mail;

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

}
