@extends('layouts.master')

@section('header','Tambah Data Peminjam')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('peminjam.store') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Petugas') }}</label>

                <div class="col-md-6">
                    <input id="nama_petugas" type="text" class="form-control{{ $errors->has('nama_petugas') ? ' is-invalid' : '' }}" name="nama_petugas" value="{{ old('nama_petugas') }}" required autofocus>

                    @if ($errors->has('nama_petugas'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nama_petugas') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                <div class="col-md-6">
                    <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Tambah') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection