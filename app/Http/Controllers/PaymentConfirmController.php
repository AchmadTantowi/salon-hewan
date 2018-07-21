<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\ConfirmPayment;
use App\Order;
use Auth;

class PaymentConfirmController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // PAYMENT CONFIRMATION
    public function paymentConfirmation()
    {
        $list_orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 'Finish')->get();
        return view('customer.payment_confirmation', compact('list_orders'));
    }

    public function sendPaymentConfirmation(Request $request){
        $this->validate($request, [
            'order_id' => 'required|unique:confirm_payments',
            'bank_account' => 'required',
            'account_number' => 'required',
            'amount' => 'required',
            'filename' => 'max:10000'
        ]);
        $file = $request->file('file');
        $imagedata = file_get_contents($file);
        $base64 = base64_encode($imagedata);
        // dd($base64);
        $confirm = ConfirmPayment::create([
            'order_id' => $request->get('order_id'),
            'user_id' => Auth::user()->id,
            'bank_account' => $request->get('bank_account'),
            'account_number' => $request->get('account_number'),
            'amount' => $request->get('amount'),
            'photo' => $base64
        ]);
        if($confirm){
            alert()->success('Success','Saved');
            return redirect('/payment-confirmation');
        }
    }


}
