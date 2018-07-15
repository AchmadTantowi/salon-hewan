@extends('admin.layouts.app')
@section('css')
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Work Order
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
            <form role="form" method="POST" action="/salon-hewan/public/admin/work-order/save-workorder">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Instruction from</label>
                  <select class="form-control" name="instruction_from">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Instruction to</label>
                  <select class="form-control" name="instruction_to">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Order ID</label>
                  <select class="form-control" name="order_id">
                    @foreach($orders as $order)
                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Notes</label>
                  <textarea class="form-control" rows="3" placeholder="Enter notes" name="notes"></textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button> 
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
  @stop