@extends('layout_lte.main')

@section('subjudul')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Detail Role</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Role</h3>
                        <div class="card-tools">
                            @can('role-update')
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            @endcan
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="200">Nama Role</th>
                                <td><span class="badge badge-primary">{{ $role->name }}</span></td>
                            </tr>
                            <tr>
                                <th>Jumlah Users</th>
                                <td><span class="badge badge-success">{{ $role->users->count() }} users</span></td>
                            </tr>
                            <tr>
                                <th>Permissions</th>
                                <td>
                                    @if ($role->permissions->count() > 0)
                                        <div class="row">
                                            @foreach ($role->permissions->groupBy(function ($item) {
            return explode('-', $item->name)[0];
        }) as $group => $groupPermissions)
                                                <div class="col-md-4">
                                                    <strong>{{ ucfirst($group) }}:</strong>
                                                    <ul>
                                                        @foreach ($groupPermissions as $permission)
                                                            <li>
                                                                <span
                                                                    class="badge badge-success">{{ $permission->name }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-muted">Tidak ada permission</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ $role->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td>{{ $role->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
