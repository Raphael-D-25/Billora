@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Products</h2>

    <a href="{{ route('product_add') }}" class="btn btn-primary">
        Add Product
    </a>
</div>

<!-- Search Form -->
<div class="card mb-3">
    <div class="card-body">
        <form action="{{ route('product_index') }}" method="GET" class="row g-2">
            <div class="col-md-10">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search product..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Search
                </button>

                <a href="{{ route('product_index') }}"
                   class="btn btn-secondary">
                    Reset
                </a>
            </div>
        </form>
    </div>
</div>

<table class="table table-striped table-hover shadow-sm bg-white">
    <thead class="table-dark">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Description</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>₹{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{ route('product_edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('product_delete', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection