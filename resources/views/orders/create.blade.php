@extends('layouts.global')
@section('title') Tambah Jadwal | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Tambah Jadwal Baru @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Manage Jadwal</a></li>
<li class="breadcrumb-item active">Tambah Jadwal</li>
@endsection
@section('content')
<div class="card">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 p-3">
                <form role="form" method="POST" action="{{ route('orders.store') }}" id="quickForm">
                    @csrf
                    <div class="form-group">
                        <label>Nama Tim</label>
                        <select name="cust" class="form-control select2" style="width: 100%;" required>
                            <option selected="selected" disabled="disabled">Pilih Nama</option>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label>Pilih Tanggal</label>
                        @php
                        $now= date('Y-m-d H:i:s');
                        @endphp
                        <div class="input-group">
                            <input type="datetime-local" class="form-control"
                                value="{{ Carbon\Carbon::parse($now)->format('Y-m-d') }}T01:00" name="date" required
                                autoclose="true">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Kategori Harga</label>
                        <select class="form-control select2" required name="category">
                            <option selected="selected" disabled="disabled">Pilih Kategori</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }} | Rp.
                                {{ number_format($category->price) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="desc" class="form-control" required placeholder="Masukan Alamat"
                            autocomplete="off">{{ old('desc') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-3"  name="status" value="schedule">Submit</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
            <!-- /.col -->
            <div class="col-md-6 p-3">
                <form role="form" method="POST" action="{{ route('customers.store') }}" id="quickForm">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Tim Baru</label>
                        <input type="text" name="name" class="form-control" id="name" required
                            placeholder="Masukan Nama" autocomplete="off">
                        <p class="text-primary">* Buat baru jika nama pemesan / tim tidak ada</p>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" class="form-control" id="address" required
                            placeholder="Masukan Alamat" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="number" name="phone" class="form-control" id="phone" required
                            placeholder="Masukan Telepon" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="UMUM">Umum</option>
                            <option value="SMA">Pelajar SMA</option>
                            <option value="SMP">Pelajar SMP</option>
                            <option value="SD">Pelajar SD</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="from" value="orders.create">Submit</button>
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection
@section('script')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    //Initialize Select2 Elements
    $('.select2').select2({})
</script>
@endsection
