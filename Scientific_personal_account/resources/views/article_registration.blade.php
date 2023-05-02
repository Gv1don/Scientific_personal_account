<!DOCTYPE html>
<html>
    <head>
        <title>New article</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="bg-light">

        <div class="container">
        <div class="py-5 text-center">
            <h2>Заполните данные научной работы</h2>
            <p class="lead">Укажите необходимые данные, заполнив поля снизу. Нажимая кнопку "Подтвердить", вы подтверждаете загрузку новой статьи и даёте согласие на обработку персональных данных.</p>
        </div>
        <div class="row">
            <form action="{{ route('article-create') }}" class="needs-validation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Регистрация новой статьи</h4>
                <div class="col-md-12 mb-3">
                    <label for="title">Название статьи</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="" value="" required pattern=".*\S.*">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="mentor">Научный руководитель</label>
                    <input type="text" class="form-control" name="mentor" id="lastName" placeholder="" value="" required pattern="(([А-ЯЁ][а-яё]+)|([A-Za-z]+))(\s(([А-ЯЁ][а-яё]+)|([A-Za-z]+))){1,2}">
                </div>
                <h4 style="margin-top: 30px; margin-bottom: 30px;">Добавьте файл вашей статьи в формате PDF</h4>
                <div class="file-upload">
                    <input type="file" name="file" id="input-file-now" class="file-upload" required accept=".pdf">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" style="margin-top: 40px">Подтвердить</button>
            </form>
        </div>

        <script>

            const fileUploads = document.querySelectorAll('.file-upload input[type=file]');

            fileUploads.forEach((fileUpload) => {
            fileUpload.addEventListener('change', (event) => {
                const file = event.target.files[0];
                const allowedExtensions = /(\.pdf)$/i;
                if (!allowedExtensions.exec(file.name)) {
                    alert('Пожалуйста, выберите файл формата PDF.');
                    event.target.value = '';
                    return false;
                    }
                });
            });
        </script>
    </body>
</html>