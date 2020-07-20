@extends('layouts.global')
@section('title') Pengaturan | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Pengaturan @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Pengaturan</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <!-- form start -->
            <form class="form-horizontal" role="form" method="POST"
                action="{{ route('settings.update', [$settings->id]) }}" id="quickForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" required maxlength="20"
                                placeholder="Masukan Nama" name="name" value="{{ $settings->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputEmail3" required placeholder="Masukan Nama"
                                maxlength="100" name="description">{{ $settings->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                        @if ($settings->image)
                        <img src="{{ asset('storage/' . $settings->image) }}" width="100px" height="100px"
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
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tema</label>
                        <div class="col-sm-10">
                            <!-- radio -->
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tema" value="light"
                                        {{ $settings->tema == 'light' ? 'checked' : '' }}>
                                    <label class="form-check-label">Light</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tema" value="dark"
                                        {{ $settings->tema == 'dark' ? 'checked' : '' }}>
                                    <label class="form-check-label">Dark</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-3">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
@endsection
@section('script')
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection