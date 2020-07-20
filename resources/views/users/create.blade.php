@extends('layouts.global')
@section('title') Tambah User | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Tambah User Baru @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Manage Users</a></li>
<li class="breadcrumb-item active">Tambah User</li>
@endsection
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-7 col-sm-12">
        <!-- jquery validation -->
        <div class="card">
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('users.store') }}" id="quickForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="Masukan Nama"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"  class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Masukan email"
                            autocomplete="off">
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Masukan Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="cfmpassword">Password Confirmasi</label>
                        <input type="password" name="cfmpassword" class="form-control" id="cfmpassword"
                            placeholder="Masukan Ulang Password" autocomplete="off">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-3">Submit</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->
@endsection
@section('script')
<!-- jquery-validation -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#quickForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 6,
                    maxlength: 30
                },
                email: {
                    required: true,
                    email: true,
                },
                role: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 10
                },
                cfmpassword: {
                    required: true,
                    minlength: 6,
                    maxlength: 10,
                    equalTo: '#password'
                }
            },
            messages: {
                name: {
                    required: "Silahkan masukan nama",
                    minlength: "Masukan nama minimal 6 karakter"

                },
                email: {
                    required: "Silahkan masukan email",
                    email: "Silahkan masukan email yang valid"
                },
                role: {
                    required: "Silahkan pilih role",
                },
                password: {
                    required: "Silahkan masukan password",
                    minlength: "Masukan password minimal 6 karakter",
                    mixlength: "Password maxsimal 10 karakter"
                },
                cfmpassword: {
                    required: "Silahkan masukan password confirmasi",
                    minlength: "Masukan password confirmasi minimal 6 karakter",
                    maxlength: "Password confirmasi maxsimal 10 karakter",
                    equalTo: "Password confirmasi harus sama dengan password"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection