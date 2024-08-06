@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2>Roles Management</h2>
        </div>
        @can('role-create')
            <div class="col-6 text-end">
                <a class="btn btn-success mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create Role</a>
            </div>
        @endcan
    </div>

    @session('success')
        <div class="alert alert-info alert-dismissible fade show mt-3 d-flex justify-content-between align-items-center"
            role="alert">
            {{ $value }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    <table class="table table-bordered">
        <tr>
            <th width="100px">No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}"><i
                            class="fa-solid fa-list"></i> Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary btn-sm ms-1" href="{{ route('roles.edit', $role->id) }}"><i
                                class="fa-solid fa-pen-to-square"></i> Edit</a>
                    @endcan

                    @can('role-delete')
                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                Delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {!! $roles->links('pagination::bootstrap-5') !!}

@endsection
