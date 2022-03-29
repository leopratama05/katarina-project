<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('admlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admlte/css/adminlte.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('template/images/favicon.ico')}}" type="image/x-icon">

    @yield('css')
    <title>Login Page</title>
</head>

<body class="hold-transition login-page">
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="login-box">
        <div class="login-logo">
            <h1>Login Page</h1>
        </div>
        <div class="card">

            @yield('content')

        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')

</html>
