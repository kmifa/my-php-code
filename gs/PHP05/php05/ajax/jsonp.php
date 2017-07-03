<?php
//POSTパラメータを取得
$id = $_POST["id"];
$mode = $_POST["mode"];
$type = $_POST["type"];
$sleep = $_POST["sleep"];
$date = date("Y-m-d H-i-s");
sleep($sleep); ////Timeoutテスト用

$jsonp = '
jsonp_data(
[
    {
      "src":"img/l1.png",
      "alt":"1の画像"
    },
    {
      "src":"img/l2.png",
      "alt":"2の画像"
    },
    {
      "src":"img/l3.png",
      "alt":"3の画像"
    },
    {
      "src":"img/l4.png",
      "alt":"4の画像"
    },
    {
      "src":"img/l5.png",
      "alt":"5の画像"
    },
    {
      "src":"img/l6.png",
      "alt":"6の画像"
    },
    {
      "src":"img/l7.png",
      "alt":"7の画像"
    }
]
);
';

echo $jsonp;

?>
