@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Product</div>
        <div class="card-body">
            <a href="{{route('admin.product.index')}}" class="btn btn-primary mb-2">All Products</a>
            <table class="table table-striped table-hover table-dark mb-3">
                <thead>
                <tr>
                    <th>image</th>
                    <th>name</th>
                    <th>category</th>
                    <th>price</th>
                    <th>viewers</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-capitalize">
                            <img src="{{asset($product->image)}}" alt="" width="50" class="rounded">
                        </td>
                        <td class="text-capitalize">{{$product->name}}</td>
                        <td class="text-capitalize">{{$product->category->name}}</td>
                        <td class="text-capitalize">{{$product->price}}</td>
                        <td class="text-capitalize">{{$product->view_count}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3">
                <p class="font-weight-bold text-uppercase">Description</p>
                <span>{{$product->description}}</span>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('delCatBtn').addEventListener('click',function (e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result=>{
                if (result.isConfirmed){
                    document.getElementById('delelteCategory').submit();
                }
            })
        })
    </script>
@endsection
