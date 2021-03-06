<?php
date_default_timezone_set('Asia/Tokyo');
$dataFile = 'bbs.dat';

// CSRF対策

session_start();



function setToken(){
    // sha1では、不十分なのでsha256が望ましい
    $token = sha1(uniqid(mt_rand(), true));    
    $_SESSION['token'] = $token;
}

function checkToken(){
    if(empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['token'])){
        echo "不正なPOSTが行われました";
        exit;
    }
}

function h($s){
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

// ページにアクセスする際に使用されたリクエストのメソッド名
if($_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['message']) &&
    isset($_POST['user'])){

    checkToken();
    
    $message = trim($_POST['message']);
    $user = trim($_POST['user']);

    if ($message !== ''){

        $user = ($user === '') ? 'ななしさん' : $user;

        $message = str_replace("\t", ' ', $message);
        $user = str_replace("\t", ' ', $user);

        $postedAt = date('Y-m-d H:i:s');

        $newData = $message . "\t" . $user . "\t" . $postedAt . "\n";

        $fp = fopen($dataFile, 'a');
        fwrite($fp, $newData);
        fclose($fp);
    }
} else {
    // 外部リンクからアクセスした時に、トークンをセットする
    setToken();
}
// 最後の改行コードを取る(第2引数);
$posts = file($dataFile, FILE_IGNORE_NEW_LINES);

$posts = array_reverse($posts);

?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>簡易掲示板</title>
</head>
<body>

    <h1>簡易掲示板</h1>
    <form action="" method="POST">
        message: <input type="text" name="message">
        user : <input type="text" name="user">
        <input type="submit" value="投稿">
        <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
    </form>
    <h2>投稿一覧 <?php echo count($posts); ?>件</h2>
    <ul>
        <?php if (count($posts)) : ?>
            <?php foreach($posts as $post) : ?>
            <!--配列をそれぞれの変数に代入-->
            <?php list($message, $user, $postedAt) = explode("\t", $post); ?>
                <li><?php echo h($message); ?> (<?php echo h($user); ?>) - <?php echo h($postedAt); ?></li>
            <?php endforeach; ?>
        <?php else : ?>
            <li>まだ投稿はありません。</li>
        <?php endif; ?>
    </ul>
</body>
</html>