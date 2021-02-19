@extends('layouts.global')
@section('title') Dashboard | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Dashboard @endsection
@section('breadcrumb')
<li class="breadcrumb-item active">Home</li>
@endsection
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $harga }}</h3>

                <p>Kategori Harga</p>
            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $tim }}</sup></h3>

                <p>Tim</p>
            </div>
            <div class="icon">
                <i class="fas fa-futbol"></i>
            </div>
            <a href="{{ route('customers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $jadwal }}</h3>

                <p>Jadwal</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $selesai }}</h3>

                <p>Pertandingan</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-calendar-check"></i>
            </div>
            <a href="{{ route('orders.success') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    
    <div class="col-12 p-4">
        <div class="callout callout-info">
            <h3>Halo! {{ Auth::user()->name }}</h3>
            <h4>Selamat Datang di Sistem Informasi Futsal</h4>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection