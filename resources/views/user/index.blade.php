@extends('user.layout.master')
@section('content')
    <div class="row">
        <!-- Loop Product -->
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

    </div>
    <div class="row">
        <div class="col-md-6 offset-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link"
                            href="#">
                            <
                        </a>
                    </li>
                    <li class="page-item">
                        <a
                            class="page-link"
                            href="#">1</a>
                    </li>
                    <li class="page-item"><a
                            class="page-link"
                            href="#">2</a></li>
                    <li class="page-item"><a
                            class="page-link"
                            href="#">3</a></li>
                    <li class="page-item"><a
                            class="page-link"
                            href="#">></a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
