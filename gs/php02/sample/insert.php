<?php
//1. POSTデータ取得

$name = $_POST["name"];
$email = $_POST["email"];
$naiyou = $_POST["naiyou"];




//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','shinji','gstest');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
//バインド変数は:から初めること
$stmt = $pdo->prepare("INSERT INTO gs_an_table(id, name, email, naiyou,
indate )VALUES(NULL, :name, :email, :naiyou, sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  // header locationを使う場合はechoは使っちゃいけない ※注意！
  header("Location: index.php");
  exit;

}
?>
