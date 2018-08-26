@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $verifikasiCustomer }} Customers</h3>
    
                  <p>Menunggu Verifikasi Akun</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ url('/admin/customer') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3>{{ $confirms }} Customers</h3>
    
                  <p>Menunggu Verifikasi Pembayaran</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ url('/admin/confirm') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
      <!-- Small boxes (Stat box) -->
      <div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3>Happy Pets</h3>
          </div>
          <div class="panel-body">
            <div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Jasa Kami</h4>
                </div>
                <div class="panel-body">
                  <h5>Happy Pets Mobil Grooming adalah salon anjing dan kucing pertama di Indonesia yang menyediakan jasa grooming & hair spa di rumah pelanggan. Service kami sangat diminati oleh mereka yang menginginkan privasi & kenyamanan salon exclusive tanpa harus meninggalkan rumah. Kualitas kerja dan service kami terjamin dengan harga terjangkau.</h5>
                  <h5>
                    Kami Menawarkan Jasa : 
                    <ol>
                      <li>Bathing Dog and Cat (Memandikan Anjing dan Kucing)</li>
                      <li>Skin & Coat Conditioning (Perawatan Kulit dan Bulu)</li>
                      <li>Hair Spa and Message</li>
                      <li>Cukur Model</li>
                      <li>Blow Dry</li>
                      <li>Gunting Kuku</li>
                      <li>Membersihkan Kuping</li>
                      <li>Basmi Kutu</li>
                    </ol>
                  </h5>
                </div>
              </div>
            </div>       
          </div>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @stop