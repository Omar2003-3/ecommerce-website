@extends('master')
@section('content')
<div class="page-wrapper py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-7">
        <div class="card shadow-sm border-0 rounded">
          <div class="card-header bg-warning text-dark text-center fs-4 fw-semibold">
            Edit Product
          </div>
          <div class="card-body">
            <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Product Name</label>
                <input
                  type="text"
                  name="name"
                  class="form-control form-control-lg"
                  value="{{ old('name', $product->name) }}"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="price" class="form-label fw-semibold">Price</label>
                <input
                  type="number"
                  name="price"
                  step="0.01"
                  class="form-control form-control-lg"
                  value="{{ old('price', $product->price) }}"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="quantity" class="form-label fw-semibold">Quantity</label>
                <input
                  type="number"
                  name="quantity"
                  class="form-control form-control-lg"
                  value="{{ old('quantity', $product->quantity) }}"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="category_id" class="form-label fw-semibold">Category</label>
                <select name="category_id" class="form-control form-control-lg" required>
                  <option value="">-- Select Category --</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Product Image</label>
                <input
                  type="file"
                  name="image"
                  class="form-control form-control-lg"
                >
                @if($product->image)
                  <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="img-thumbnail" width="100">
                  </div>
                @endif
              </div>

              <div class="mb-4">
                <label for="description" class="form-label fw-semibold">Description</label>
                <textarea
                  name="description"
                  rows="3"
                  class="form-control form-control-lg"
                  placeholder="Enter product description"
                >{{ old('description', $product->description) }}</textarea>
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-warning fw-semibold">
                  Update Product
                </button>
                <a href="{{ route('product.show') }}" class="btn btn-secondary fw-semibold">
                  Cancel
                </a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection