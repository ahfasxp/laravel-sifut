@extends('layouts.global')
@section('title') Pertandingan | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Manage Pertandingan @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Manage Pertandingan</li>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <div class="row mb-2">
                    <div class="col-md-6 col-sm-6 col-12">
                        <!-- form start -->
                        <form class="mb-3" role="form" action="{{ route('orders.success') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Dari</label>
                                <input type="date" id="start_date"
                                    class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                    name="start_date" placeholder="Enter date" required
                                    value="{{ request()->get('start_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Sampai</label>
                                <input type="date" id="end_date"
                                    class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" required
                                    name="end_date" placeholder="End date" value="{{ request()->get('end_date') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('orders.success') }}" class="btn btn-primary">Reset</a>
                        </form>
                        <!-- /.form group -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-text">Total Penghasilan</span>
                                <span class="info-box-number">Rp. {{ number_format($total) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        @if(request()->get('start_date') && request()->get('end_date') )
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-text">Penghasilan
                                    ({{ Carbon\Carbon::parse(request()->get('start_date'))->format('d/m/Y') }} -
                                    {{ Carbon\Carbon::parse(request()->get('end_date'))->format('d/m/Y') }})</span>
                                <span class="info-box-number">Rp. {{ number_format($totalfilter) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        @else

                        @endif
                    </div>
                    <!-- /.col -->
                </div>
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Invoice</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr class="text-center">
                            <td>{{ $order->invoice }}</td>
                            <td>{{ Carbon\Carbon::parse($order->date)->format('Y/m/d H:i') }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->category->name }}</td>
                            <td>Rp. {{ number_format($order->total) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak Ada Pertandingan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
@section('script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[1, "desc"]]
        });
    });
</script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!--SweetAlert2 Delete Confirm-->
<script type="text/javascript">
    $(function () {
        $('.swalDeleteConfirm').click(function () {
            var form = this;
            event.preventDefault();
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    return form.submit();
                }
            })
        });
    })
</script>
@endsection