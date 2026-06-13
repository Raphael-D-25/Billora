@extends('layouts.master')

@section('content')

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Add Product</h4>
        <a href="{{ route('product_index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card-body">

        <form action="{{ route('product_store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" placeholder="Enter price" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" min="0" placeholder="Enter stock quantity" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Save Product
            </button>

        </form>

    </div>
</div>

@endsection