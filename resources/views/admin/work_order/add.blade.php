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
            {{-- <form role="form" method="POST" action="/salon-hewan/public/admin/work-order/save-workorder"> --}}
              <form role="form" method="POST" action="/admin/work-order/save-workorder">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Work Order ID</label>
                  <input class="form-control" type="text" name="wo_number" value="{{$wo_number}}" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input class="form-control" type="text" name="tanggal" value="{{date("d-m-Y", strtotime($tanggal))}}" readonly>
                </div>
                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Instruction from</label>
                  <select class="form-control" name="instruction_from">
                    @foreach($froms as $from)
                        <option value="{{ $from->id }}">{{ $from->name }}</option>
                    @endforeach
                  </select>
                </div> --}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Instruction to</label>
                  <select class="form-control" name="instruction_to">
                    @foreach($tos as $to)
                        <option value="{{ $to->id }}">{{ $to->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Order ID</label>
                  <select class="form-control" name="order_id" id="order_id">
                      <option value="">-- ORDER ID --</option>
                    @foreach($orders as $order)
                        <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer</label>
                  <input class="form-control" type="text" name="customer" id="customer" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea class="form-control" type="text" name="alamat" id="alamat" readonly></textarea>
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
  <script type="text/javascript">
    $("select[name='order_id']").change(function(){
        var order_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('select-customer') }}",
            method: 'POST',
            data: {order_id:order_id, _token:token},
            success: function(data) {
              $("#customer").val(data.options.name);
              $("#alamat").val(data.options.address);
            }
        });
    });
  </script>
  @stop