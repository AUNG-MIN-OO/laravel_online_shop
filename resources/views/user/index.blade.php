@extends('user.layout.master')
@section('content')
    <div class="row">
        <!-- Loop Product -->
        @if(sizeof($products) > 0)
        @foreach($products as $p)
        <div class="col-md-4">
            <a href="{{url('/product/'.$p->slug)}}">
                <div class="card">
                    <img class="card-img-top"
                         src="{{$p->image}}"
                         alt="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                    {{$p->name}}
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center col-12">
                                <a href=""
                                   class="badge badge-primary">{{$p->price}}ks</a>
                                <a href=""
                                   class="badge badge-warning">{{$p->category->name}}</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{url('product/cart/add/'.$p->slug)}}" class="btn btn-primary rounded btn-block">
                                    Add to cart <i class="fas fa-cart-arrow-down"></i>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </a>

        </div>
        @endforeach
        @else
            <p class="mb-0 text-center font-weight-bold text-danger">There is no match result</p>
        @endif

    </div>
    <div class="row">
        <div class="col-md-6 offset-3">
            {{ $products->appends(\Illuminate\Support\Facades\Request::all())->onEachSide(2)->links() }}
        </div>
    </div>
@endsection
