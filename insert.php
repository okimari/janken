<?php
// exit('erro');
// var_dump($_POST);
// 入力チェック


if (
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['url']) || $_POST['url'] == '' ||
  !isset($_POST['comment']) || $_POST['comment'] == '' ||
  // !isset($_POST['category']) || $_POST['category'] == '' ||
  !isset($_POST['indate']) || $_POST['indate'] == ''
) {
  exit('ParamError');
}

// exit('erro');
// var_dump($_POST);


//categoryを取得する
if (isset($_POST['category'])) {
  $category = $_POST['category'];
  echo 'カテゴリー：' . $category . '<br>';
} else {
  echo 'カテゴリーが選択されてなーい<br>';
}


//POSTデータ取得
//まず変数を指定
$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$category = $_POST['category'];
$indate = $_POST['indate'];



//DB接続
$dbn = 'mysql:dbname=gsacfd04_db15;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  exit('dbError:' . $e->getMessage());
}



//データ登録SQL登録

$sql = 'INSERT INTO gs_bm_table(id, name, url, comment,category,indate)VALUES(NULL, :a1, :a2, :a3, :a4,sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $category, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  header('Location: index.php');
}
