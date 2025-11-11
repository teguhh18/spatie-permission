@extends('layout_lte/main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Selamat Datang {{ auth()->user()->name }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box p-2 pl-3">
                                <i class="fas fa-users fa-4x text-info"></i>

                                <div class="info-box-content m">
                                    <h4 class="info-box-number mb-0">Jumlah User</h4>
                                    <h5 class="info-box-text font-weight-light">{{ $count_user }} User</h5>
                                </div>
                                <div class="info-box-button pt-2 pr-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
