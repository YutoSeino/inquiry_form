<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['clientname'] = $_POST['clientname'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['content'] = $_POST['content'];
}

// エラーメッセージ
$err = [];

// バリデーショ
if(!$clientname = filter_input(INPUT_POST, 'clientname')) {
  $err['err_clientname'] = 'お名前を記入してください。';
}

if(!$email = filter_input(INPUT_POST, 'email')) {
  $err['err_email'] = 'メールアドレスを記入してください。';
}

if(!$content = filter_input(INPUT_POST, 'content')) {
  $err['err_content'] = 'お問い合わせ内容を記入してください。';
}


// エスケープ処理
$clientname = htmlspecialchars($clientname);
$email = htmlspecialchars($email);
$content = htmlspecialchars($content);

if (count($err) > 0) {
  // エラーがあった場合は戻す
  $_SESSION = $err;
  header('Location: inquiry_form.php');
  return;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認画面</title>
</head>
<body>
<form action="./register.php" method="POST">
  <input type="hidden" name='clientname' value='<?php echo $_SESSION['clientname']; ?>'>
  <input type="hidden" name='email' value='<?php echo $_SESSION['email']; ?>'>
  <input type="hidden" name='content' value='<?php $_SESSION['content']; ?>'>
<h1>内容確認</h1>
<h3>内容はこちらでよろしいでしょうか？</h3>
<p>お名前：<?php echo $_SESSION['clientname'] ?></p>
<p>メールアドレス：<?php echo $_SESSION['email'] ?></p>
<p>お問い合わせ内容：<?php echo $_SESSION['content'] ?></p>
<br>
<a href="./inquiry_form.php">修正</a>
<button type='submit' name='submit'>送信</button>
</form>
</body>
</html>