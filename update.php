<?php
// var_dump($_POST);
// exit('erro');
// 関数ファイル読み込み
//includでファイル呼び出す
include('functions.php');

//入力チェック(受信確認処理追加)
if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['url']) || $_POST['url'] == '' ||
    !isset($_POST['comment']) || $_POST['comment'] == '' ||
    !isset($_POST['category']) || $_POST['category'] == ''
) {
    exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$category = $_POST['category'];
$id = $_POST['id'];


//DB接続します(エラー処理追加)

$pdo = connectToDb();


//exit('erro');

//データ登録SQL作成
$sql = 'UPDATE gs_bm_table SET name=:a1,url=:a2,comment=:a3,category=:a4 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);
$stmt->bindValue(':a4', $category, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//exit('erro');

//4．データ登録処理後
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    header('Location: select.php');
    exit;
}
