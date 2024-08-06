@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2>Users Management</h2>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create User</a>
        </div>
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
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!@empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $role)
                            <label class="badge bg-info">{{ $role }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}"><i
                            class="fa-solid fa-list"></i> Show</a>
                    <a class="btn btn-primary btn-sm ms-1" href="{{ route('users.edit', $user->id) }}"><i
                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                            Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $users->links('pagination::bootstrap-5') !!}

@endsection
