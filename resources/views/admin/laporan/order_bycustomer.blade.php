@extends('admin.layouts.app')
@section('css')

@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Laporan Order By Customer</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
        <form method="POST" action="{{ url('/admin/laporan-order-bycustomer/print') }}" target="_blank">
              {{ csrf_field() }}
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>Customer
                    <select class="form-control" name="customer">
                        @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option> 
                        @endforeach
                    </select>
                </div>
              </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Print</button>
            </div>
          </div>
          </form>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  @stop
  @section('script')
   
  @stop