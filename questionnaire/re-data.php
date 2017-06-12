<?php
	//ajaxのセキュリティーを書く

	function es($data, $charset){
		if(is_array($data)){
			// 再起呼び出し
			return array_map(__METHOD__, $data);
		}else{
			// htmlエスケープを行う
			return htmlspecialchars($data, ENT_QUOTES, $charset);
		}
	}

	$name = es($_POST['name']);//ポストで受け取れる
	$mail = es($_POST['mail']);
	$age  = es($_POST['age']);


	$str = "{$name},{$mail},{$age}\n";

	$file = fopen("data/data.csv","a") or die("ファイルが開けません");// dieで処理を終わらす。
	flock($file, LOCK_EX);			// ファイルロック
	fwrite($file, $str);			// ファイル書き込み
	flock($file, LOCK_UN);			// ファイルロック解除
	fclose($file);
  
  header('Content-type: application/json; charset=UTF-8');//指定されたデータタイプに応じたヘッダーを出力する
  echo json_encode( $str );

?>