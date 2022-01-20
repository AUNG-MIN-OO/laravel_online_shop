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
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-uppercase text-center mb-3">Admin Login</h2>
                    <div class="text-center">
                        <img src="{{asset('image/login.svg')}}" alt="" width="250">
                    </div>
                    <hr>
                    <form action="{{url('admin/login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control text-center" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control text-center" placeholder="password">
                        </div>
                        <button class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
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
