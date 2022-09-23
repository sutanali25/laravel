@extends('layout.admin')

@section('content')



 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->


          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-4"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pegawai</span>
                <span class="info-box-number">
                  {{$jumlahpegawai}}
                  <small>Orang</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-4"><i class="fas fa-male"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pegawai Laki-laki</span>
         
                <span class="info-box-number">{{$jumlahpegawailaki}} Orang</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up" ></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-9">
              <span class="info-box-icon bg-success elevation-4"><i class="fas fa-female"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pegawai Perempuan</span>
                <span class="info-box-number">{{$jumlahpegawaiperempuan}} Orang</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
            


        
  @endsection