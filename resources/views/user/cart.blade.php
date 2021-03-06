@extends('user.layout.master')
@section('content')
    <h2 class="text-center">Your Cart List</h2>
    <hr>
    @if(sizeof($cart) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Add or Reduce</th>
        </tr>
        </thead>
        <tbody>
        @php $totalPrice = 0; @endphp
        @foreach($cart as $c)
            <tr>
                <td>
                    <img src="{{asset($c->product->image)}}"
                         style="width:50px;border-radius:30%"
                         alt="">
                </td>
                <td>{{$c->product->name}}</td>
                <td>{{$c->quantity}}</td>
                <td>
                    {{$c->product->price * $c->quantity}}
                </td>
            </tr>
            @php $totalPrice += $c->product->price * $c->quantity; @endphp
        @endforeach
        <tr>
            <td><span class="font-weight-bold text-primary">Total Price</span></td>
            <td></td>
            <td></td>
            <td>
                <p class=" font-weight-bolder">{{$totalPrice}} MMK</p>
            </td>
        </tr>
        <hr>
        </tbody>
    </table>
    <a href="{{url('/make/order')}}" class="btn btn-primary btn-block">Order Now</a>
    @else
        <p class="text-center font-weight-bold">There is no item in your cart.</p>
    @endif

@endsection
