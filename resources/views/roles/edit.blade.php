@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2>Roles Management</h2>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-success mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" placeholder="Name" class="form-control"
                        value="{{ $role->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    @foreach ($permission as $value)
                        <label><input type="checkbox" name="permission[{{ $value->id }}]" value="{{ $value->id }}"
                                class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                            {{ $value->name }}</label>
                        <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i>
                    Submit</button>
            </div>
        </div>
    </form>

@endsection
