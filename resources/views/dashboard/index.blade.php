  @extends('layouts.master')

  @section('title', 'Dashboard ')

  @section('breadcrumb')
      <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
  @endsection

  @section('content')
  @if(Auth::user()->role == 'admin')
  <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $totalBarang }}</h3>

            <p>Total Barang</p>
          </div>
          <div class="icon">
            <i class="bi bi-box "></i>
          </div>
          <a href="{{ route('barang.index') }}" class="small-box-footer">lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $totalPembayaran }}</h3>
    
              <p>Total Pembayaran</p>
            </div>
            <div class="icon">
              <i class="bi bi-credit-card"></i>
            </div>
            <a href="{{ route('pembayaran.index') }}" class="small-box-footer">lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $totalkasir }}</h3>
    
              <p>Total Kasir</p>
            </div>
            <div class="icon">
              <i class="bi bi-people-fill""></i>
            </div>
            <a href="{{ route('kasir.index') }}" class="small-box-footer">lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endif
        @if(Auth::user()->role == 'kasir')
        <h1 class="text-center" >selamat Datang {{  Auth::user()->name }}</h1>
        @endif
  @endsection
