@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Add Product</div>
        <div class="card-body">
            <a href="{{route('admin.product.index')}}" class="btn btn-primary mb-2">All Products</a>
            <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                    @error('name')
                        <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" class="form-control"></textarea>
                    @error('description')
                    <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Category</label>
                    <select name="category" class="form-control custom-select">
                        <option value="">select category</option>
                    @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    @error('name')
                    <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" class="form-control">
                    @error('price')
                    <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div>
                        <img id="preview_image" alt="" width="100" class="my-2">
                    </div>
                    <input type="file" id="image" name="image" class="form-control"
                        oninput="preview_image.src = window.URL.createObjectURL(this.files[0])"
                        accept="image/jpg, image/jpeg, image/png"
                    >
                    @error('image')
                    <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                    @enderror
                </div>
                <button class="btn btn-primary float-right">Create Now</button>
            </form>
        </div>
    </div>
@endsection
