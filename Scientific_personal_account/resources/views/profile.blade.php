<!DOCTYPE html>
<html>
    <head>
        <title>Account</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    </head>
    <body>
      <nav class="navbar navbar-expand-md navbar-light;" style="background: #343A40; padding-left: 16px">
        <a class="navbar-brand" href="#" style="color: white">НЛК</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
        <form action="{{ route('logout') }}" method="GET">
            <button class="btn btn-sm btn-outline-primary" type="submit" value="1" style="margin-right: 20px;">Выйти</button>
        </form>
      </nav>
        <div class="firstContainer">
            <p id="Портфолио">Портфолио</p>
            <p>
                Это место, где собраны ваши научные 
                публикации. Здесь вы можете добавлять<br> 
                свои научные работы, получать информацию 
                об их уникальности и смотреть<br> отзывы 
                ваших научных руководителей.
            </p>
            <form action="{{ route('article') }}" method="GET">
              <button type="submit" class="btn btn-primary" style="margin-top: 16px;">Добавить работу</button>
            </form>
        </div>
          <div class="secondContainer" style="padding-left: 55px">
            <div class="row"></div>
              <div class="col-lg-5 col-md-7 col-xs-6">
                <div class="card" style="margin-left: 24px; position: inherit;">
                  <p class="cardName" style="font-weight: 400;">Ваш профиль</p>
                  <div class="card-body">
                    <h5 class="card-title">{{ $fullName }}</h5>
                    <p class="card-text">
                      <strong>Научная степень:</strong> {{ $qualification }} <br>
                      <strong>Специализация:</strong> {{ $specialisation }}
                    </p>
                    <a href="#" class="btn btn-primary" style="margin-top: 16px;">Редактировать</a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-5 col-xs-6">
                <div class="card" style="position: inherit;">
                  <p class="cardName">Статистика</p>
                  <div class="card-body">
                    <p class="card-text">
                      <strong>На платформе:</strong> {{ $timeOnSite }} дней <br>
                      <strong>Добавлено работ:</strong> {{ $worksNumber }} <br>
                      <strong>Средняя уникальность:</strong> {{ $avgUniq }}% <br>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-xs-6" style="overflow:auto">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Название работы</th>
                      <th scope="col">Дата загрузки</th>
                      <th scope="col">Научный руководитель</th>
                      <th scope="col">Уникальность</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($articles as $article)
                    <tr>
                      <td scope="row"> <a href="{{ $article->path }}">{{ $article->title }}</a></td>
                      <td>{{ $article->created_at }}</td>
                      <td>{{ $article->title }}</td>
                      <td>{{$article->uniqueness}}</td>
                      <img src="/home/gv1don/Documents/Programming/Git/Scientific_personal_account/Scientific_personal_account/public/media/1906791.png">
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <div class=form-wrapper>
            <div class="contacts">
              <p>© Научный личный кабинет. Все права защищены</p>
            </div>
          </div>
    </body>
</html>