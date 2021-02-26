@extends('layouts.global')
@section('title') Harga | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Manage Harga @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Manage Harga</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-7 col-sm-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr class="text-center">
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>Rp. {{ number_format($category->price) }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('categories.edit', [$category->id]) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form class="d-inline swalDeleteConfirm"
                                    action="{{ route('categories.destroy', [$category->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Data Categories</td>
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
    <div class="col-md-5 com-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4>Tambah Harga Baru</h4>
                </div>
            </div>
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('categories.store') }}" id="quickForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" required
                            placeholder="Masukan Nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="desc">Keterangan</label>
                        <input type="text" name="desc" class="form-control" id="desc" required
                            placeholder="Masukan Keterangan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" class="form-control" id="price" required
                            placeholder="Masukan Harga" autocomplete="off">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
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