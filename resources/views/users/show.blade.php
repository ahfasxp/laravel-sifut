@extends('layouts.global')
@section('title') Detail User | {{ $title ?? 'Si - Futsal' }} @endsection
@section('page-title') Detail User @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Manage Users</a></li>
<li class="breadcrumb-item active">Detail User</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-7 col-sm-12">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    @if ($user->avatar)
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $user->avatar) }}"
                        alt="User profile picture">
                    @else
                    <p>Tidak ada Foto</p>
                    @endif
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Role</b> <a class="float-right">{{ $user->role }}</a>
                    </li>
                </ul>

                <a href="{{ route('users.index') }}" class="btn btn-primary btn-block"><b>Kembai</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->
@endsection