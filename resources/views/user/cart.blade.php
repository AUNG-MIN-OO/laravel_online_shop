@extends('user.layout.master')
@section('content')
    <h2>Your Cart List</h2>
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
                    <?php $totalPrice=0; ?>
                    {{$price = $c->product->price * $c->quantity}}
                    <?php $totalPrice += $price; ?>
                </td>
            </tr>
        @endforeach
        <hr>
        </tbody>
    </table>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <p class=" font-weight-bolder">Total Price</p>
        <p class=" font-weight-bolder"> MMK</p>
    </div>
@endsection
