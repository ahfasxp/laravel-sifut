@extends('layouts.global')
@section('title') Tim | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Manage Tim @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Tim</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Telepon</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $customer)
                                <tr class="text-center">
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->status }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('customers.edit', [$customer->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form class="d-inline swalDeleteConfirm"
                                            action="{{ route('customers.destroy', [$customer->id]) }}" method="POST">
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
                                    <td colspan="6" class="text-center">Tidak Ada Data Customers</td>
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
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Tambah Tim Baru</h4>
                    </div>
                </div>
                <div class="card-body p-3">
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('customers.store') }}" id="quickForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" required
                                placeholder="Masukan Nama" autocomplete="off">
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="from" value="customers.index">Submit</button>
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
        $(function() {
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
        $(function() {
            $('.swalDeleteConfirm').click(function() {
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
