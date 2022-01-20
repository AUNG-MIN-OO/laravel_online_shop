@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Admin Dashboard</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center m-auto" style="width: 50px; height: 50px ">
                                <span class="text-white"><i class="fas fa-cube fa-2x"></i></span>
                            </div>
                            <div class="mt-3">
                                <h1 class="text-center mb-0">{{$total_order}}</h1>
                                <p class="text-capitalize font-weight-bold text-muted mb-0">total Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{route('admin.order.pending')}}">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="rounded-circle bg-warning d-flex justify-content-center align-items-center m-auto" style="width: 50px; height: 50px ">
                                    <span class="text-white"><i class="fas fa-cubes fa-2x"></i></span>
                                </div>
                                <div class="mt-3">
                                    <h1 class="text-center mb-0">{{$pending_order}}</h1>
                                    <p class="text-capitalize font-weight-bold text-muted mb-0">pending Orders</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{route('admin.order.complete')}}">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="rounded-circle bg-success d-flex justify-content-center align-items-center m-auto" style="width: 50px; height: 50px ">
                                    <span class="text-white"><i class="fas fa-shipping-fast fa-2x"></i></span>
                                </div>
                                <div class="mt-3">
                                    <h1 class="text-center mb-0">{{$complete_order}}</h1>
                                    <p class="text-capitalize font-weight-bold text-muted mb-0">complete Orders</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div>
                        <h4>Today Orders</h4>
                        <table class="table table-dark table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latest_orders as $l)
                                <tr>
                                    <td>{{$l->user->name}}</td>
                                    <td>{{$l->product->name}}</td>
                                    <td>{{$l->quantity}}</td>
                                    <td>
                                        <span class="
                                            {{$l->status == 'pending' ? 'badge-warning':'badge-success'}}
                                            badge badge-pill">
                                            {{$l->status}}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
