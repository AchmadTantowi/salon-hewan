<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\WorkOrder;
use App\User;
use App\Order;
use App\OrderDetail;
use DB;
use Auth;

class LaporanController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /* REPORT ORDER */
    public function lapOrderByDate()
    {
        return view('admin.laporan.order_bydate');
    }

    public function printByDate(Request $request){
        $from = $request->get('start_date');
        $to = $request->get('end_date');
        // $reports = Order::whereBetween('created_at', [$from, $to])->get();
        $reports = DB::table('orders')
        ->leftJoin('users', 'users.user_id', '=', 'orders.user_id')
        ->select('*')
        ->whereBetween('orders.created_at', [$from, $to])
        ->get();
        return view('admin.laporan.print_bydate', compact('reports'));
    }

    public function lapOrderByCustomer()
    {
        $customers = User::where('role','customer')->get();
        return view('admin.laporan.order_bycustomer', compact('customers'));
    }

    public function printByCustomer(Request $request){
        $customer = $request->get('customer');

    
        // $reports = Order::where('user_id', $customer)->get();
        $reports = DB::table('orders')
        ->leftJoin('users', 'users.user_id', '=', 'orders.user_id')
        ->select('*')
        ->where('orders.user_id', $customer)
        ->get();
        return view('admin.laporan.print_bycustomer', compact('reports'));
    }

    /* REPORT CONFIRM */
    public function lapConfirmByDate()
    {
        return view('admin.laporan.confirm_bydate');
    }

    public function printConfirmByDate(Request $request){
        $from = $request->get('start_date');
        $to = $request->get('end_date');
        // $reports = Order::whereBetween('created_at', [$from, $to])->get();
        $reports = DB::table('confirm_payments')
        ->leftJoin('orders', 'orders.order_id', '=', 'confirm_payments.order_id')
        ->leftJoin('users', 'users.user_id', '=', 'confirm_payments.user_id')
        ->select('users.name', 'confirm_payments.bank_account', 'confirm_payments.account_number', 'confirm_payments.amount','confirm_payments.photo', 'confirm_payments.order_id', 'orders.status', 'confirm_payments.created_at')
        ->whereBetween('confirm_payments.created_at', [$from, $to])
        ->get();
        return view('admin.laporan.print_confirm_bydate', compact('reports'));
    }

    public function lapConfirmByCustomer()
    {
        $customers = User::where('role','customer')->get();
        return view('admin.laporan.confirm_bycustomer', compact('customers'));
    }

    public function printConfirmByCustomer(Request $request){
        $customer = $request->get('customer');

    
        // $reports = Order::where('user_id', $customer)->get();
        $reports = DB::table('confirm_payments')
        ->leftJoin('orders', 'orders.order_id', '=', 'confirm_payments.order_id')
        ->leftJoin('users', 'users.user_id', '=', 'confirm_payments.user_id')
        ->select('users.name', 'confirm_payments.bank_account', 'confirm_payments.account_number', 'confirm_payments.amount','confirm_payments.photo', 'confirm_payments.order_id', 'orders.status', 'confirm_payments.created_at','confirm_payments.user_id')
        ->where('confirm_payments.user_id', $customer)
        ->get();
        return view('admin.laporan.print_confirm_bycustomer', compact('reports'));
    }


}
