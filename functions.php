<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）

function connectToDb()
{
    //1. DB接続
    $dbn = 'mysql:dbname=gsacfd04_db15;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}


//SQL処理エラー
function showSqlErrorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
