<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\ConfirmPayment;
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
        return view('customer.payment_confirmation');
    }

    public function sendPaymentConfirmation(Request $request){
        $file = $request->file('file');
        $imagedata = file_get_contents($file);
        $base64 = base64_encode($imagedata);
        // dd($base64);
        $confirm = ConfirmPayment::create([
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
