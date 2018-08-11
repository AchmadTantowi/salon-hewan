<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $verifikasiCustomer = User::where('role','customer')
        ->where('verified',0)->count();
        $confirms = DB::table('confirm_payments')
        ->leftJoin('orders', 'orders.order_id', '=', 'confirm_payments.order_id')
        ->select('confirm_payments.bank_account', 'confirm_payments.account_number', 'confirm_payments.amount','confirm_payments.photo', 'confirm_payments.order_id', 'orders.status')
        ->where('orders.status','Waiting Verified Payment')
        ->count();
        return view('admin.dashboard.index', compact('verifikasiCustomer','confirms'));
    }

}
