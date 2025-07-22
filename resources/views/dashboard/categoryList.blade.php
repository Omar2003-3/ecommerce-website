@extends('master')
@section('content')

<div class="page-wrapper py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Categories</h2>
    <a href="{{ route('category.view') }}" class="btn btn-primary shadow-sm">
      Add New Category
    </a>
  </div>

  <div class="table-responsive shadow-sm rounded">
    <table class="table table-bordered table-hover align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th scope="col" style="width: 5%;">#</th>
          <th scope="col">Category Name</th>
          <th scope="col" style="width: 20%;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
              <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-warning me-2">
                Edit
              </a>
              <form action="{{route('category.destroy',$category->id)}}" method="POST" class="d-inline">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                  Delete
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center text-muted fst-italic">
              No categories available
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>


</div>

</div>

</div>




@endsection