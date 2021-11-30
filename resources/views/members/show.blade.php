@extends('layouts.global')
@section('title') Members | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Manage Members @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Members</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Detail Member</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <p><strong>Nama : {{ $member->customer->name }}</strong> </p>
                            <p><strong>Alamat : {{ $member->customer->address }}</strong> </p>
                            <p><strong>Telepon : {{ $member->customer->phone }}</strong> </p>
                            <p><strong>Status : {{ $member->customer->status }}</strong> </p>
                            <p><strong>Berlaku s/d :
                                    {{ Carbon\Carbon::parse($member->available_at)->format('d-m-Y') }}</strong> </p>
                            <p><strong>Harga Free : Rp. {{ $member->price_free }}</strong> </p>
                            <p><strong>Keterangan : {{ $member->description }}</strong> </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-8">
                            @php
                                $countMain = \App\MemberMain::where('member_id', $member->id)->count();
                            @endphp
                            @if ($member->status == 'finished')
                                <h3>Member Sudah Selesai</h3>

                            @elseif ($countMain >= 5)
                                <p>Tim Mendapatkan Free 1x Main</p>
                                <a href="{{ url('members/finished', [$member->id]) }}"
                                    class="btn btn-info mr-3">Selesaikan Member</a>
                            @else
                                <h3>Tambah Main</h3>
                                <form role="form" method="POST" action="{{ url('members/addMain') }}" id="quickForm">
                                    @csrf
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <input type="hidden" name="memberId" value="{{ $member->id }}">
                                        <label>Tanggal Bermain</label>
                                        @php
                                            $now = date('Y-m-d H:i:s');
                                        @endphp
                                        <div class="input-group">
                                            <input type="date" class="form-control"
                                                value="{{ Carbon\Carbon::parse($now)->format('Y-m-d') }}" name="date"
                                                required autoclose="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <textarea name="desc" class="form-control" required
                                                placeholder="Masukan Keterangan"
                                                autocomplete="off">{{ old('desc') }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                </form>
                            @endif
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Keterangan</th>
                                        @if ($member->status != 'finished')
                                            <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($memberMains as $memberMain)
                                        <tr class="text-center">
                                            <td>{{ $memberMain->member->customer->name }}</td>
                                            <td>{{ Carbon\Carbon::parse($memberMain->date)->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $memberMain->description }}</td>
                                            @if ($member->status != 'finished')
                                                <td>
                                                    <form class="d-inline swalDeleteConfirm"
                                                        action="{{ url('members/deleteMain', [$memberMain->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mb-1">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak Ada data main</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
