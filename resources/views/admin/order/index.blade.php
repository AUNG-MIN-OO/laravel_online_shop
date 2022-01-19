@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Pending Order</div>
        <div class="card-body">
            <table class="table table-striped table-hover table-dark mb-3">
                <thead>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $o)
                    <tr>
                        <td>{{$o->user->name}}</td>
                        <td>{{$o->product->name}}</td>
                        <td>{{$o->quantity}}</td>
                        <td>{{$o->quantity * $o->product->price}}</td>
                        <td><span class="badge badge-pill badge-danger small">{{$o->status}}</span></td>
                        <td>
                            <a href="{{url('/admin/order/make/complete',$o->id)}}" class="btn btn-sm btn-success text-uppercase"><i class="fas fa-check"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span class="float-right">
                {{$order->onEachSide(2)->links()}}
            </span>
        </div>
    </div>
@endsection
@section('script')

@endsection
