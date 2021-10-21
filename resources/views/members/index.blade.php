@extends('layouts.global')
@section('title') Members | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Manage Members @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Members</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Tambah Member Baru</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <form role="form" method="POST" action="{{ route('members.store') }}" id="quickForm">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Tim</label>
                                    <select name="cust" class="form-control select2" style="width: 100%;" required>
                                        <option selected="selected" disabled="disabled">Pilih Tim</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label>Berlaku s/d Tanggal</label>
                                    @php
                                        $now = date('Y-m-d H:i:s');
                                    @endphp
                                    <div class="input-group">
                                        <input type="date" class="form-control"
                                            value="{{ Carbon\Carbon::parse($now)->format('Y-m-d') }}" name="date" required
                                            autoclose="true">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 p-3">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="desc" class="form-control" required placeholder="Masukan Keterangan"
                                    autocomplete="off">{{ old('desc') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-3" name="status"
                                value="schedule">Submit</button>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <div class="card">
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Telepon</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Bermain</th>
                                <th class="text-center">Berlaku s/d</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $member)
                                <tr class="text-center">
                                    <td>{{ $member->customer->name }}</td>
                                    <td>{{ $member->customer->phone }}</td>
                                    <td>{{ $member->customer->status }}</td>
                                    @php
                                        $countMain = \App\MemberMain::where('member_id', $member->id)->count();
                                    @endphp
                                    <td><i class="fas fa-futbol"></i> {{ $countMain }} x</td>
                                    <td>{{ Carbon\Carbon::parse($member->available_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm mb-1"
                                            href="{{ route('members.show', [$member->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Lihat
                                        </a>
                                        <a class="btn btn-info btn-sm mb-1"
                                            href="{{ route('members.edit', [$member->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form class="d-inline swalDeleteConfirm"
                                            action="{{ route('members.destroy', [$member->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-1">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak Ada Member</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "order": [
                    [0, "desc"]
                ]
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
