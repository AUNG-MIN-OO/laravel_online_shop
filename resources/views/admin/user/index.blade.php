@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">User List</div>
        <div class="card-body">
            <a href="{{route('admin.category.create')}}" class="btn btn-primary mb-2">Create New</a>
            <table class="table table-striped table-hover table-dark">
                <thead>
                <tr>
                    <th>image</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Orders</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                    <tr>
                        <td class="text-capitalize">
                            <img src="{{asset($u->image)}}" alt="" width="50" class="rounded">
                        </td>
                        <td class="text-capitalize">{{$u->name}}</td>
                        <td class="text-capitalize">{{$u->email}}</td>
                        <td class="text-capitalize">{{$u->order_count}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
