<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('admlte/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('css')
    <title>Login Page</title>
</head>

<body class="hold-transition login-page">
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
