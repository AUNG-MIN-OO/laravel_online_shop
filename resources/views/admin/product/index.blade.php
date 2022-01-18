@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Product</div>
        <div class="card-body">
            <a href="{{route('admin.product.create')}}" class="btn btn-primary mb-2">Create New</a>
            <table class="table table-striped table-hover table-dark mb-3">
                <thead>
                <tr>
                    <th>image</th>
                    <th>name</th>
                    <th>category</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td class="text-capitalize">
                            <img src="{{asset($p->image)}}" alt="" width="50" class="rounded">
                        </td>
                        <td class="text-capitalize">{{$p->name}}</td>
                        <td class="text-capitalize">{{$p->category->name}}</td>
                        <td>
                            <a href="{{route('admin.product.show',$p->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                            <a href="{{route('admin.product.edit',$p->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{route('admin.product.destroy',$p->id)}}" id="delelteCategory" class="d-inline" method="POST">
                                @csrf
                                @method('delete')
                                <button id="delCatBtn" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span class="float-right">
                {{$products->onEachSide(2)->links()}}
            </span>
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
