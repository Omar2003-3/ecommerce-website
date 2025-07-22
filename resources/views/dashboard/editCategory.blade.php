@extends('master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 100px;">
            <div class="card">
                <div class="card-header">Edit Category</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="name" >Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                        </div>
                        
                   
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href="{{ route('category.show') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection