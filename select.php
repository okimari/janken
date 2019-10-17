<?php
//1. DB接続
$dbn = 'mysql:dbname=gsacfd04_db15;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  exit('dbError:' . $e->getMessage());
}


//2. データ表示SQL作成
$sql = 'SELECT * FROM gs_bm_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
//executeで実行


//3. データ表示
$view = '';
if ($status == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<tr>';
    $view .= '<td>' . $result['name'] . '</td>'; //書籍の名前
    $view .= '<td>' . $result['url'] . '</td>'; //書籍のURL
    $view .= '<td>' . $result['comment'] . '</td>'; //本のコメント
    $view .= '<td class="category">' . $result['category'] . '</td>'; //カテゴリーだけlist.jsで呼び出すのでclss名追加
    $view .= '<td>' . $result['indate'] . '</td>'; //日時 
    $view .= '<td><a href="detail.php?id=' . $result['id'] . '" class="badge badge-primary">Edit</a></td>'; //日時
    $view .= '<td><a href="delete.php?id=' . $result['id'] . '" class="badge badge-danger">Delete</a></td>'; //日時
    $view .= '</tr>';
  }
}



?>




<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>todoリスト表示</title>
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
            <a class="nav-link" href="index.php">データ登録</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div id="list_boxs">

    <p>カテゴリーで検索してね</p>
    <p>[MANGA]・[NOVEL]・[DESIGN]・[LIVING]</p>

    <input id="custom-search-field" placeholder="Search name" />
    <button class="sort" data-sort="category">
      検索
    </button>

    <!-- ここにDBから取得したデータを表示しよう -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>書籍名</th>
          <th>書籍のURL</th>
          <th>感想コメント</th>
          <th>CATEGORY</th>
          <th>登録日時</th>
          <th>編集</th>
          <th>削除</th>
        </tr>
      </thead>
      <tbody class="list">
        <?= $view ?>
      </tbody>
    </table>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/list.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>

  <!-- list.jsの指定 -->
  <script>
    var options = {
      //引き出すカテゴリー指定
      valueNames: ['category']
    };
    //引き出す場所
    var userList = new List('list_boxs', options);

    //
    $('#custom-search-field').on('keyup', function() {
      var searchString = $(this).val()
      userList.search(searchString, {
        columns: ['category']
      })
    })
  </script>

</body>

</html>