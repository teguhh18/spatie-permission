@extends('layout_lte.main')

@section('subjudul')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Permission Management</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Permissions</li>
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
                        <h3 class="card-title">Daftar Permission</h3>
                        <div class="card-tools">
                            @can('permission-create')
                                <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Permission
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

                        <div class="row">
                            @foreach ($permissions->groupBy(function ($item) {
            return explode('-', $item->name)[0];
        }) as $group => $groupPermissions)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h5 class="card-title mb-0">{{ ucfirst($group) }} Permissions</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table table-sm">
                                                <tbody>
                                                    @foreach ($groupPermissions as $permission)
                                                        <tr>
                                                            <td>
                                                                <span
                                                                    class="badge badge-success">{{ $permission->name }}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                @can('permission-update')
                                                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                                        class="btn btn-warning btn-xs" title="Edit">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                @endcan

                                                                @can('permission-delete')
                                                                    <form
                                                                        action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                                        method="POST" style="display:inline;"
                                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus permission ini?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-xs"
                                                                            title="Hapus">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
