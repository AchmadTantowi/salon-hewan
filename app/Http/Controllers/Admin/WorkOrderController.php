<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WorkOrder;
use App\User;
use App\Order;
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
        $workOrders = WorkOrder::get();
        // $workOrders = DB::table('work_orders as wo')
        //     ->leftJoin('users as u', 'wo.instruction_to', '=', 'u.id')
        //     ->select('*')
        //     ->get();
        // dd($workOrders);
        return view('admin.work_order.index', compact('workOrders'));
    }

    public function add()
    {
        $froms = User::where('position', 'Pemilik')->get();
        $tos = User::where('position', 'Staff Grooming')->get();
        $orders = Order::where('status', 'Verified Payment')->get();
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
                'instruction_from' => Auth::user()->id,
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
    		$user = DB::table('users')->where('id',$order->user_id)->first();
    		return response()->json(['options'=>$user]);
    	}
    }

    public function print($id){
        // dd($id);
        // $workOrders = DB::table('work_orders as wo')
        //     ->leftJoin('users as u', 'wo.instruction_to', '=', 'u.id')
        //     ->select('*')
        //     ->where('wo.id','=',$id)
        //     ->first();
            ;
        $workOrders = WorkOrder::where('id','=',$id)->first();
        // dd($workOrders);
        return view('admin.work_order.print', compact('workOrders'));
    }


}
