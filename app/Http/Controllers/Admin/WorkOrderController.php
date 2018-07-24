<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WorkOrder;
use App\User;
use App\Order;
use DB;

class WorkOrderController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $workOrders = WorkOrder::get();
        return view('admin.work_order.index', compact('workOrders'));
    }

    public function add()
    {
        $froms = User::where('position', 'Pemilik')->get();
        $tos = User::where('position', 'Staff Grooming')->get();
        $orders = Order::get();
        return view('admin.work_order.add', compact('froms','tos','orders'));
    }

    public function saveWorkOrder(Request $request)
    {
        DB::beginTransaction();
        try{
            $workOrder = WorkOrder::create([
                'instruction_from' => $request->get('instruction_from'),
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

    public function print(){
        return view('admin.work_order.print');
    }


}
