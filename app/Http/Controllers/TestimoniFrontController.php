<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Testimoni;
use App\Order;
use Auth;
use DB;

class TestimoniFrontController extends Controller
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

    // TESTIMONI
    public function testimoni()
    {
        // dd(Auth::user());
        $list_orders = DB::table('orders')
        ->select('*')
        ->where('user_id', Auth::user()->user_id)
        ->where('status', 'Finish')
        ->get();
        // $list_orders = Order::where('user_id', Auth::user()->user_id)->where('status', 'Finish')->get();
        return view('customer.testimoni', compact('list_orders'));
    }

    public function sendTestimoni(Request $request){
        $this->validate($request, [
            'order_id' => 'required|unique:testimonis',
            'title' => 'required',
            'description' => 'required'
        ]);
        $testimoni = Testimoni::create([
            'order_id' => $request->get('order_id'),
            'user_id' => Auth::user()->user_id,
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);
        if($testimoni){
            alert()->success('Success','Saved');
            return redirect('/testimoni');
        }
    }


}
