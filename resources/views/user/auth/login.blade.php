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
                            <h2 class="text-uppercase text-center mb-3">User Login</h2>
                            <form action="{{url('/login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control text-center" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control text-center" placeholder="password">
                                </div>
                                <button class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
