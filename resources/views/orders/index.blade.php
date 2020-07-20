@extends('layouts.global')
@section('title') Jadwal | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Manage Jadwal @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Manage Jadwal</li>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <a href="{{ route('orders.create') }}"><button type="button" class="btn btn-block btn-primary"><i
                                class="fas fa-plus mr-2"></i>Tambah
                            Jadwal
                            Baru</button></a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:15%" class="text-center">Tanggal</th>
                            <th class="text-center">Nama Pemesan</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Telepon</th>
                            <th class="text-center" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr class="text-center">
                            <td>{{ Carbon\Carbon::parse($order->date)->format('d-m-Y H:i') }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->customer->address }}</td>
                            <td>{{ $order->customer->phone }}</td>
                            <td>
                                <form class="d-inline swalSuccessConfirm"
                                    action="{{ route('orders.update', [$order->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="PUT" name="_method">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-check-circle"></i>
                                        Selesai
                                    </button>
                                </form>
                                <form class="d-inline swalDeleteConfirm"
                                    action="{{ route('orders.destroy', [$order->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times-circle"></i> hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak Ada Jadwal</td>
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
            "order": [[0, "desc"]]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
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
        $('.swalSuccessConfirm').click(function () {
            var form = this;
            event.preventDefault();
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Jadwal akan ditandai sebagai sudah selesai!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, selesai!',
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