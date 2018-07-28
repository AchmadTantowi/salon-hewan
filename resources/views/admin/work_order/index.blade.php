@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Work Order</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{ url('/admin/work-order/add') }}">
                <button type="button" class="btn btn-info">Add</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Work Order Number</th>
                  <th>Order</th>
                  {{-- <th>Customer</th> --}}
                  {{-- <th>Instruction from</th> --}}
                  <th>Instruction to</th>
                  <th>Notes</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($workOrders as $workOrder)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $workOrder->wo_number }}</td>
                <td>{{ $workOrder->order_id }}</td>
                {{-- <td>{{ $workOrder->name }}</td> --}}
                {{-- <td>{{ $workOrder->from->name }}</td> --}}
                <td>{{ $workOrder->to->name }}</td>
                <td>{{ $workOrder->notes }}</td>
                <td>
                    <a href="{{ url('/admin/work-order/print/') }}/{{$workOrder->id}}" target="_blank">
                        <i class="fa fa-print"></i> Print 
                    </a>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @stop
  @section('script')
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
        });
    });
    </script>
  @stop