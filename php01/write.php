<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
書き込みを行います。<br>
This is a Pen. とdata.txt に書き込みます。
</body>
<?php
$str = date("Y-m-d H:i:s")."文字列";
$file = fopen("data/data.txt","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fwrite($file, $str."\n");
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>