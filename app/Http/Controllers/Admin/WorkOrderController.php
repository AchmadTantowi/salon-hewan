<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WorkOrder;
use App\User;
use App\Order;
use App\OrderDetail;
use DB;
use Auth;

class WorkOrderController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // $workOrders = WorkOrder::get();
        $workOrders = DB::table('work_orders')
        ->leftJoin('orders', 'orders.order_id', '=', 'work_orders.order_id')
        ->leftJoin('users', 'users.user_id', '=', 'work_orders.instruction_to')
        ->select('work_orders.wo_number', 'work_orders.order_id','users.name','work_orders.notes','orders.status', 'work_orders.work_order_id')
        ->get();
        // dd($workOrders);
        return view('admin.work_order.index', compact('workOrders'));
    }

    public function add()
    {
        $froms = User::where('position', 'Pemilik')->get();
        $tos = User::where('position', 'Staff Grooming')->get();
        // $orders = Order::where('status', 'Verified Payment')->get();
        $orders = DB::table('orders')
        ->where('status', 'Verified Payment')
        ->select('*')
        ->get();
        $wo_number = $this->getNextWorkOrderNumber();
        $tanggal = date('Y-m-d');
        return view('admin.work_order.add', compact('froms','tos','orders', 'wo_number', 'tanggal'));
    }
    
    public function getNextWorkOrderNumber()
    {
        $date = date('Ymd');
        $format = 'SPK-'.$date.'-';
        $lastOrder = WorkOrder::orderBy('created_at', 'desc')->first();
        if (!$lastOrder)
            $number = 0;
        else 
            $number = substr($lastOrder->wo_number, 13);
            // dd($number);
        return $format . sprintf('%04d', intval($number) + 1);
    }

    public function saveWorkOrder(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|unique:work_orders',
        ]);
        DB::beginTransaction();
        try{
            $workOrder = WorkOrder::create([
                'wo_number' => $request->get('wo_number'),
                'instruction_from' => Auth::user()->user_id,
                'instruction_to' => $request->get('instruction_to'),
                'order_id' => $request->get('order_id'),
                'notes' => $request->get('notes')
              ]);

            $order = Order::where('order_id', $request->get('order_id'))->first();
            $order->status = "Work Order";
            $order->save();

            DB::commit();

            alert()->success('Success','Saved');
            return redirect('/admin/work-order');
        }
        catch(QueryException $e){
            DB::rollback();
            alert()->error('Failed','Not Saved');
            return redirect('/admin/work-order');
        }
    }

    public function selectCustomerAjax(Request $request){
        if($request->ajax()){
    		$order = DB::table('orders')->where('order_id',$request->order_id)->first();
    		$user = DB::table('users')->where('user_id',$order->user_id)->first();
    		return response()->json(['options'=>$user]);
    	}
    }

    public function print($id){
        // $workOrders = WorkOrder::where('work_order_id','=',$id)->first();
        $workOrders = DB::table('work_orders')
        ->leftJoin('users', 'users.user_id', '=', 'work_orders.instruction_to')
        ->select('*')
        ->where('work_orders.work_order_id', $id)
        ->first();
        $workOrders2 = DB::table('work_orders')
        ->leftJoin('users', 'users.user_id', '=', 'work_orders.instruction_from')
        ->select('*')
        ->where('work_orders.work_order_id', $id)
        // ->union($workOrders)
        ->first();
        // dd($workOrders2);
        $order = DB::table('orders')
        ->leftJoin('users', 'users.user_id', '=', 'orders.user_id')
        ->select('*')
        ->where('orders.order_id', $workOrders->order_id)
        ->first();
        // $order = Order::where('order_id', $workOrders->order_id)->first();
        $orderDetails = OrderDetail::where('order_id', $workOrders->order_id)->get();
        // dd($order);
        return view('admin.work_order.print', compact('workOrders','workOrders2','order','orderDetails'));
    }

    public function edit($id){
        $froms = User::where('position', 'Pemilik')->get();
        $tos = User::where('position', 'Staff Grooming')->get();
        $orders = Order::where('status','!=', 'Finish')->get();
        $work_order = WorkOrder::where('work_order_id', $id)->first();
        return view('admin.work_order.edit', compact('work_order','froms','tos','orders'));
    }

    public function update($id, Request $request){
     
        $wo = WorkOrder::find($id);
        $wo->instruction_to = $request->get('instruction_to');
        $wo->notes = $request->get('notes');
      
        $wo->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/work-order');
    }

}
