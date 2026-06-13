@extends('layouts.master')

@section('content')

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Product</h4>

        <a href="{{ route('product_index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product_update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" min="0" value="{{ old('stock', $product->stock) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                Update Product
            </button>
        </form>
    </div>
</div>

@endsection