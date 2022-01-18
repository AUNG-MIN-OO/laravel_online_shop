<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM-Coder-Shop</title>
    <link rel="stylesheet"
          href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/nucleo/css/nucleo.css">
    <link rel="stylesheet"
          href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard/assets/css/argon.min.css?v=1.2.0">
    @yield('style')
    <style>
        .table td{
            vertical-align: middle;
        }
    </style>
</head>

<body>

<div class="container">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <a>
                            <li class="list-group-item bg-primary text-white">
                                Admin Management
                            </li>
                        </a>
                        <a>
                            <li class="list-group-item text-white {{\Illuminate\Support\Facades\Request::url()=='/admin/' ? 'bg-primary':''}}">
                                Dashboard
                            </li>
                        </a>
                        <a href="{{route('admin.category.index')}}">
                            <li class="list-group-item">
                                Category
                            </li>
                        </a>
                        <a href="{{route('admin.product.index')}}">
                            <li class="list-group-item">
                                Product
                            </li>
                        </a>
                        <a>
                            <li class="list-group-item">
                                Order
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
<script
    src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard/assets/js/argon.min.js?v=1.2.0"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>
@yield('script')
</body>

</html>
