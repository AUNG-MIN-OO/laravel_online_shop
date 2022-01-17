@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Edit Category</div>
        <div class="card-body">
            <a href="{{route('admin.category.index')}}" class="btn btn-primary mb-2">All Categories</a>
            <form action="{{route('admin.category.update',$category->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}" autofocus>
                    @error('name')
                    <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                    @enderror
                </div>
                <button class="btn btn-primary float-right">Update Now</button>
            </form>
        </div>
    </div>
@endsection
