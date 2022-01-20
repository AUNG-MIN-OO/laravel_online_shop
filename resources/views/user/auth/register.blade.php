@extends('user.layout.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="text-center">
                                <img src="{{asset('image/login.svg')}}" alt="" width="250">
                            </div>
                        </div>
                        <div class="col-6">
                            <h2 class="text-uppercase text-center mb-3">User Register</h2>
                            <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="name" name="name" id="name" class="form-control text-center" placeholder="name" value="{{old('name')}}">
                                    @error('name')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control text-center" placeholder="email" value="{{old('email')}}">
                                    @error('email')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control text-center" placeholder="password" value="{{old('password')}}">
                                    @error('password')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" id="image" class="form-control text-center" placeholder="image" value="{{old('image')}}">
                                    @error('image')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-block">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
