@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold text-uppercase">Category</div>
        <div class="card-body">
            <a href="{{route('admin.category.create')}}" class="btn btn-primary mb-2">Create New</a>
            <table class="table table-striped table-hover table-dark">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($categories as $c)
                    <tr>
                        <td>{{$i}}</td>
                        <td class="text-capitalize">{{$c->name}}</td>
                        <td>
                            <a href="{{route('admin.category.edit',$c->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{route('admin.category.destroy',$c->id)}}" id="delelteCategory" class="d-inline" method="POST">
                                @csrf
                                @method('delete')
                                <button id="delCatBtn" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++ ?>
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
