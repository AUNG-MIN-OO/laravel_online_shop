@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Add Category</div>
        <div class="card-body">
            <a href="{{route('admin.category.index')}}" class="btn btn-primary mb-2">All Categories</a>
            <form action="{{route('admin.category.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                    @error('name')
                        <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                    @enderror
                </div>
                <button class="btn btn-primary float-right">Create Now</button>
            </form>
        </div>
    </div>
@endsection
