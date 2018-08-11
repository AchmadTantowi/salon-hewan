@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Bank Account</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <a href="{{ url('/admin/bank/add') }}">
              <button type="button" class="btn btn-info">Add</button>
            </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Bank Name</th>
                  <th>Account Number</th>
                  <th>Account Name</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($bankAccounts as $bankAccount)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $bankAccount->bank_name }}</td>
                <td>{{ $bankAccount->account_number }}</td>
                <td>{{ $bankAccount->account_name }}</td>
                <td>
                    <a href="{{ url('/admin/bank/edit/') }}/{{ $bankAccount->id }}">
                    Edit
                    </a> |
                    <a href="{{ url('/admin/bank/delete/') }}/{{ $bankAccount->id }}">
                    Delete
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