@extends('layout_lte.main')

@section('subjudul')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Role Management</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Role</h3>
                        <div class="card-tools">
                            @can('role-create')
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Role
                                </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Role</th>
                                        <th>Jumlah Permissions</th>
                                        <th>Jumlah Users</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span class="badge badge-primary">{{ $role->name }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-info">{{ $role->permissions->count() }}
                                                    permissions</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">{{ $role->users->count() }} users</span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    @can('role-read')
                                                        <a href="{{ route('admin.roles.show', $role->id) }}"
                                                            class="btn btn-info btn-sm" title="Detail">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @endcan

                                                    @can('role-update')
                                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                            class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan

                                                    @can('role-delete')
                                                        <form action="{{ route('admin.roles.destroy', $role->id) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
