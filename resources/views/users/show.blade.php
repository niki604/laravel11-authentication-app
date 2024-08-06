@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2>Users Management</h2>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-success mb-2" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if (!@empty($user->getRoleNames()))
                    @foreach ($user->getRoleNames() as $role)
                        <label class="badge bg-info ms-2">{{ $role }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
