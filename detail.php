<?php
// 関数ファイルの読み込み
include('functions.php');

//var_dump($_POST);

// getで送信されたidを取得
$id = $_GET['id'];

//DB接続します
$pdo = connectToDb();

// exit('erro');

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM gs_bm_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    // エラーのとき
    showSqlErrorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    //var_dump($rs);
    // fetch()で1レコードを取得して$rsに入れる
    // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
}
//categoryを取得する

//まずそれぞれのcategoryを変数にいれる
$MANGA = "";
$NOVEL = "";
$DESIGN = "";
$LIVING = "";

//switch($rs['category'])でカテゴリーを取得
//case 'MANGA'が取得できたらcheckedで表示
//なかったらbreakで他の取得に向かう 
switch ($rs['category']) {
    case 'MANGA':
        $MANGA = 'checked';
        break;
    case 'NOVEL':
        $NOVEL = 'checked';
        break;
    case 'DESIGN':
        $DESIGN = 'checked';
        break;
    case 'LIVING':
        $LIVING = 'checked';
        break;
}
?>
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>todo更新ページ</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }
        </style>
    </head>

    <body>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">todo更新</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">todo登録</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="select.php">todo一覧</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        <form action="insert.php" method="post">
            <div class="form-group">
                <label for="name">書籍名</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $rs['name'] ?>">
            </div>


            <div class="form-group">
                <label for="url">書籍のurl</label>
                <input type="text" class="form-control" id="url" name="url" value="<?= $rs['url'] ?>">
            </div>

            <div class="form-group">
                <label for="comment">感想コメント</label>
                <textarea class="form-control" id="comment" rows="3" name="comment"><?= $rs['comment'] ?>"</textarea>
            </div>

            <div class="category">
                <ul>
                    <input type="hidden" name="cur_shift" value="$shift">
                    <li>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="category" class="custom-control-input" value="MANGA" <?= $MANGA ?>>
                            <label class="custom-control-label" for="customRadio1" name="MANGA">漫画</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="category" class="custom-control-input" value="NOVEL" <?= $NOVEL ?>>
                            <label class="custom-control-label" for="customRadio2" name="NOVEL">小説</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="category" class="custom-control-input" value="DESIGN" <?= $DESIGN ?>>
                            <label class="custom-control-label" for="customRadio3" name="DESIGN">アート・デザイン</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="category" class="custom-control-input" value="LIVING" <?= $LIVING ?>>
                            <label class="custom-control-label" for="customRadio4" name="LIVING">暮らし・健康・料理</label>
                        </div>
                    </li>
                </ul>
                <input type="hidden" name="id" value="<?= $rs['id'] ?>">
            </div>


            <div class="btnbox">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">登録するよ〜ん</button>
                </div>
            </div>
        </form>
    </body>

    </html>