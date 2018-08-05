@extends('admin.layouts.app')
@section('css')

@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View Confirm Payment</h1>
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
                    <td>Order ID</td><td>&nbsp;:&nbsp;</td><td> {{ $confirm->order_id }}</td>
                </tr>
                <tr>
                    <td>Customer</td><td>&nbsp;:&nbsp;</td><td> {{ $confirm->user->name }}</td>
                </tr>
                <tr>
                    <td>Bank Account</td><td>&nbsp;:&nbsp;</td><td> {{ $confirm->bank_account }}</td>
                </tr>
                <tr>
                    <td>Account Number</td><td>&nbsp;:&nbsp;</td><td> {{ $confirm->account_number }}</td>
                </tr>
                <tr>
                    <td>Total</td><td>&nbsp;:&nbsp;</td><td> Rp. {{ number_format($confirm->amount,0, ',' , '.') }}</td>
                </tr>
                <tr>
                    <td>Photo</td><td>&nbsp;:&nbsp;</td><td> 
                        <img src="data:image/png;base64, {{ $confirm->photo }}" width="50%" height="auto" alt="" />
                    </td>
                </tr>
                </tbody>
            </table>
            <a href="{{ URL('/admin/confirm') }}">
                <button type="button" class="btn btn-info">Back</button>
            </a>
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
    
  @stop