<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <main class="Login">
            <form class="loginForm" action="/login" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal" style="display: flex; justify-content: center;">Выполните вход</h1>
                <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="floatingPassword">Пароль</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" style="margin-top: 20px">Войти</button>
            </form>
            <form action="{{ route('registration') }}" method="GET">
                <button class="w-100 btn btn-lg btn-primary" type="submit" style="margin-top: 20px">Зарегистрироваться</button>
            </form>
        </main>
    </body>
</html>