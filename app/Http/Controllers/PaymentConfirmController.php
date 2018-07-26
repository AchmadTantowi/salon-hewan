<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\ConfirmPayment;
use App\Order;
use Auth;
use DB;

class PaymentConfirmController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // PAYMENT CONFIRMATION
    public function paymentConfirmation()
    {
        $list_orders = Order::where('user_id', Auth::user()->id)->where('status', '=', 'Waiting Payment Confirmation')->get();
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
        
        // if($confirm){
        //     alert()->success('Success','Saved');
        //     return redirect('/payment-confirmation');
        // }

        DB::beginTransaction();
        try{
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

            $order = Order::where('order_id', $request->get('order_id'))->first();
            $order->status = "Waiting Verified Payment";
            $order->save();

            DB::commit();

            alert()->success('Success','Saved');
            return redirect('/payment-confirmation');
        }
        catch(QueryException $e){
            DB::rollback();
            alert()->error('Failed','Not Saved');
            return redirect('/payment-confirmation');
        }

    }

    public function selectAmountAjax(Request $request){
        if($request->ajax()){
    		$order = DB::table('orders')->where('order_id',$request->order_id)->first();
    		return response()->json(['options'=>$order]);
    	}
    }


}
