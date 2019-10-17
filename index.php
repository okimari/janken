<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BOOK</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/colorbox.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">BOOKおまとめリスト</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="select.php">データ一覧</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category01.php"></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <div class="box">
    <div class="wrap_box">

      <form action="insert.php" method="post">
        <div class="form-group">
          <label for="name">書籍名</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>


        <div class="form-group">
          <label for="url">書籍のurl</label>
          <input type="text" class="form-control" id="url" name="url">
        </div>

        <div class="form-group">
          <label for="comment">感想コメント</label>
          <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
        </div>

        <div class="form-group">
          <label for="deadline">登録日時</label>
          <input type="date" class="form-control" id="indate" name="indate">
        </div>


        <div class="category">
          <ul>
            <li>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="category" class="custom-control-input" value="MANGA">
                <label class="custom-control-label" for="customRadio1">漫画</label>
              </div>
            </li>
            <li>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="category" class="custom-control-input" value="NOVEL">
                <label class="custom-control-label" for="customRadio2">小説</label>
              </div>
            </li>
            <li>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3" name="category" class="custom-control-input" value="DESIGN">
                <label class="custom-control-label" for="customRadio3">アート・デザイン</label>
              </div>
            </li>
            <li>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4" name="category" class="custom-control-input" value="LIVING">
                <label class="custom-control-label" for="customRadio4">暮らし・健康・料理</label>
              </div>
            </li>
          </ul>
        </div>


        <div class="btnbox">
          <div class="form-group">
            <button type="submit" class="btn btn-primary">登録するよ〜ん</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</body>

</html>