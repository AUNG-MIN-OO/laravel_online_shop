@extends('user.layout.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-start align-items-center mb-4">
                                <img src="{{asset($user->image)}}" alt="" style="width: 80px;height: 80px;border-radius: 50%">
                                <div class="ml-3">
                                    <h4>{{$user->name}}</h4>
                                    <p class="mb-0">{{$user->email}}</p>
                                </div>
                            </div>
                            <form action="{{url('/profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" value="{{$user->name}}" name="name" class="form-control">
                                            @error('name')
                                            <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input type="text" value="{{$user->email}}" name="email" class="form-control">
                                            @error('email')
                                            <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label for="image">Choose New Image</label>
                                        <input type="file" name="image" class="form-control mt-2">
                                        @error('image')
                                        <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control mt-2">
                                        @error('password')
                                        <small class="text-danger font-weight-bold">{{'*'.$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
