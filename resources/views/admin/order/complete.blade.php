@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Pending Order</div>
        <div class="card-body">
            <div class="">
                <form action="{{route('admin.order.complete')}}" method="get">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="end_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control" id="start_date">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control" id="end_date">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="mb-2">  </label>
                                <input type="submit" class="form-control mt-2 btn btn-primary" value="Filter" id="">
                            </div>
                        </div>
                    </div>
                </form>
                @if(isset(request()->start_date))
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-success font-weight-bold">Between {{request()->start_date}} and {{request()->end_date}}</small>
                        <a href="{{route('admin.order.complete')}}" class="btn btn-sm btn-danger">Clear Filter</a>
                    </div>
                @endif
            </div>
            <table class="table table-striped table-hover table-dark mb-3">
                <thead>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $o)
                    <tr>
                        <td>{{$o->user->name}}</td>
                        <td>{{$o->product->name}}</td>
                        <td>{{$o->quantity}}</td>
                        <td>{{$o->quantity * $o->product->price}}</td>
                        <td><span class="badge badge-pill badge-success small">{{$o->status}}</span></td>
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
