@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Confirmation Payment</h1>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Customer</th>
                  <th>Bank Account</th>
                  <th>Account Number</th>
                  <th>Amount</th>
                  <th>Photo</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($confirms as $confirm)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $confirm->user->name }}</td>
                <td>{{ $confirm->bank_account }}</td>
                <td>{{ $confirm->account_number }}</td>
                <td>{{ $confirm->amount }}</td>
                <td></td>
                <td>

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