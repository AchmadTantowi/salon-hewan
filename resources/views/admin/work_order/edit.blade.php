@extends('admin.layouts.app')
@section('css')
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Work Order
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/admin/work-order/update-workorder') }}/{{$work_order->work_order_id}}">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Work Order ID</label>
                  <input class="form-control" type="text" name="wo_number" value="{{$work_order->wo_number}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Order ID</label>
                    <input class="form-control" type="text" name="order_id" value="{{$work_order->order_id}}" readonly>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Instruction to</label>
                <select class="form-control" name="instruction_to">
                    @foreach($tos as $to)
                        <option value="{{ $to->user_id }}" {{ $to->user_id == $work_order->instruction_to ? 'selected':'' }}>{{ $to->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Notes</label>
                <textarea class="form-control" rows="3" placeholder="Enter notes" name="notes">{{$work_order->notes}}</textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button> 
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @stop
  @section('script')
  <script type="text/javascript">
   
  </script>
  @stop