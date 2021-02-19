@extends('layouts.global')
@section('title') Edit User | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Edit User @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Manage Users</a></li>
<li class="breadcrumb-item active">Edit User</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-7 col-sm-12">
        <!-- jquery validation -->
        <div class="card">
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('users.update', [$user->id]) }}" id="quickForm"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name"
                            placeholder="Masukan Nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required
                            placeholder="Masukan email" autocomplete="off">
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>
                                Staff
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Photo">Photo</label>
                        <br>
                        @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" width="100px" height="100px"
                            class="img-circle elevation-2" alt="User Image" style="object-fit: cover">
                        @else
                        <p>Tidak ada Foto</p>
                        @endif
                        <div class="input-group mt-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo" name="photo">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
                        </div>
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
                role: {
                    required: true
                },
                password: {
                    minlength: 6,
                    maxlength: 10
                },
                cfmpassword: {
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
                role: {
                    required: "Silahkan pilih role",
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
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection