<!DOCTYPE html>
<html>
    <head>
        <title>New profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="bg-light">
        <div class="container">
        <div class="py-5 text-center">
            <h2>Создайте ваш профиль</h2>
            <p class="lead">Укажите свои данные, заполнив поля снизу. Нажимая кнопку "Подтвердить", вы подтверждаете регистрацию нового профиля и даёте согласие на обработку персональных данных.</p>
        </div>
        <div class="row">
            <form action="{{ route('registration') }}" class="needs-validation" method="POST">
                @csrf
                <h4 class="mb-3">Данные для входа</h4>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                        Введите email.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                        Введите пароль.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password">Подтверждение пароля</label>
                        <input type="password" name="confirm-password" class="form-control" id="password" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                        Пароли не совпадают!
                        </div>
                    </div>
                </div>
        <div class="row">
            <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Регистрация профиля</h4>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name">Имя</label>
                    <input type="text" class="form-control" name="first_name" id="firstName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                    Введите имя.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name">Фамилия</label>
                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                    Введите фамилию.
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="last_name">Отчество</label>
                    <input type="text" class="form-control" name="middle_name" id="middleName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                    Введите отчество.
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="last_name">Специализация</label>
                    <input type="text" class="form-control" name="specialisation" id="specialisation" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                    Введите специализацию.
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="qual">Научная степень</label>
                        <select class="form-select" name="qualification" aria-label="Default select example">
                            <option selected value="Без степени">Без степени</option>
                            <option value="Бакалавр">Бакалавр</option>
                            <option value="Мастер">Магистр</option>
                            <option value="Аспирант">Аспирант</option>
                            <option value="Кандидат наук">Кандидат наук</option>
                            <option value="Доктор наук">Доктор наук</option>
                        </select>
                    </div>
                </div>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" style="margin-top: 20px">Подтвердить</button>
            </form>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
            });
            }, false);
        })();
        </script>
    

    </body>
</html>