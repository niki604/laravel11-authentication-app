@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2>Products</h2>
        </div>
        <div class="col-6 text-end">
            @can('product-create')
                <a class="btn btn-success mb-2" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Create Product</a>
            @endcan
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
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}"><i
                                class="fa-solid fa-list"></i> Show</a>
                        @can('product-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>
                        @endcan

                        @csrf
                        @method('DELETE')

                        @can('product-delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}


@endsection
