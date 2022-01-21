@extends('user.layout.master')
@section('content')
    <h2 class="text-center">Your Orders List</h2>
    <hr>
    @if(sizeof($orders) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @php $totalPrice = 0; @endphp
            @foreach($orders as $o)
                <tr>
                    <td>
                        <img src="{{asset($o->product->image)}}"
                             style="width:50px;border-radius:30%"
                             alt="">
                    </td>
                    <td>{{$o->product->name}}</td>
                    <td>{{$o->quantity}}</td>
                    <td>
                        {{$o->product->price * $o->quantity}}
                    </td>
                    <td>
                        <span class="badge badge-pill small {{$o->status == 'complete' ? 'badge-success' : 'badge-error'}}">{{$o->status}}</span>
                    </td>
                </tr>
                @php $totalPrice += $o->product->price * $o->quantity; @endphp
            @endforeach
            <tr>
                <td><span class="font-weight-bold text-primary">Total Price</span></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <p class=" font-weight-bolder">{{$totalPrice}} MMK</p>
                </td>
            </tr>
            <hr>
            </tbody>
        </table>
{{--        <a href="{{url('/make/order')}}" class="btn btn-primary btn-block">Order Now</a>--}}
    @else
        <p class="text-center font-weight-bold">There is no item in your cart.</p>
    @endif

@endsection
