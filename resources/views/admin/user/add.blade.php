@extends('admin.layouts.app')
@section('css')
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
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
            <form role="form" method="POST" enctype="multipart/form-data" action="/salon-hewan/public/admin/user/save-user">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter address">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter phone">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Position</label>
                  <select class="form-control" name="position">
                    <option value="admin">Admin</option>
                    <option value="staff">Staff Grooming</option>
                    <option value="pemilik">Pemilik</option>
                  </select>
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