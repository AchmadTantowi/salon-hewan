@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Orders</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table>
                <tr>
                    <td>Order ID</td><td>&nbsp;:&nbsp;</td><td> {{ $order->order_id }}</td>
                </tr>
                <tr>
                    <td>Customer</td><td>&nbsp;:&nbsp;</td><td> {{ $order->name }}</td>
                </tr>
                <tr>
                    <td>Total</td><td>&nbsp;:&nbsp;</td><td> Rp. {{ number_format($order->total,0, ',' , '.') }}</td>
                </tr>
                <tr>
                    <td>Status</td><td>&nbsp;:&nbsp;</td><td> {{ $order->status }}</td>
                </tr>
                
                {{-- <form method="POST" action="/admin/order/update/{{$order->id}}">
                {{ csrf_field() }}
                <tr>
                    <td>Status Order</td><td>&nbsp;:&nbsp;</td><td>
                    <select class="form-control" name="status">
                        <option {{ $order->status == 'Waiting Payment Confirmation' ? 'selected':'' }}>Waiting Payment Confirmation</option>
                        <option {{ $order->status == 'Waiting Verified Payment' ? 'selected':'' }}>Waiting Verified Payment</option>
                        <option {{ $order->status == 'Verified Payment' ? 'selected':'' }}>Verified Payment</option>
                        <option {{ $order->status == 'Work Order' ? 'selected':'' }}>Work Order</option>
                        <option {{ $order->status == 'Finish' ? 'selected':'' }}>Finish</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </td>
                </tr>
                </form> --}}
                </tbody>
            </table>
            <br>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($order_details as $order_detail)
                <tr>
                    
                    <td>{{ $order_detail->product->name }}</td>
                    <td>{{ $order_detail->qty }}</td>
                    <td align="right">Rp. {{ number_format($order_detail->subtotal,0, ',' , '.') }}</td>
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