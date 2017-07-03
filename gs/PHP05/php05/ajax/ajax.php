<?php
//HTTP_REFERERチェック！
if(
  isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "http://localhost/ajax/ajax.html")
{
  //POSTパラメータを取得
  $id = $_POST["id"];
  $mode = $_POST["mode"];
  $type = $_POST["type"];
  $sleep = $_POST["sleep"];
  $date = date("Y-m-d H-i-s");
  sleep($sleep);  //Timeoutテスト用
  echo "<div>あああああ</div><div>いいいいい</div><div>ううううう</div>";
//  $json = '[
//    {
//      "id":"'.$id.'",
//      "mode":"'.$mode.'",
//      "type":"'.$type.'",
//      "date":"'.$date.'"
//    }
//  ]';
//  echo $json;

}else{
  echo "false";
}

exit;
?>
