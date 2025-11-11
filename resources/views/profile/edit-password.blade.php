@extends('layout_lte/main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header">Perbarui Password</div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert {{ session('class') }}">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="current_password" class="col-md-4 control-label">Password Lama</label>
                            <div class="col-md-6">
                                <input id="current_password" type="password"
                                    class="form-control form-control-sm @error('current_password') is-invalid @enderror"
                                    name="current_password" placeholder="Password Lama">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 control-label">Password Baru</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control form-control-sm @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password Baru">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 control-label">Konfirmasi Password
                                Baru</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password"
                                    class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Konfirmasi Password Baru">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="/" class="btn btn-xs btn-default"><i class="fa fa-arrow-left"></i>
                                    Kembali</a>
                                <button type="submit" class="btn btn-xs btn-primary">
                                    <i class="fa fa-edit"></i> Perbarui Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
