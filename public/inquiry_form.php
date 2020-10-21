<?php
session_start();

if (isset($_POST['clientname'])){
  $_SESSION['clientname'] = $_POST['clientname'];
}

if (isset($_POST['email'])){
  $_SESSION['email'] = $_POST['email'];
}

if (isset($_POST['content'])){
  $_SESSION['content'] = $_POST['content'];
}

$err = $_SESSION;

session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問い合わせ画面</title>
</head>
<body>
  <h2>問い合わせフォーム</h2>
  <form action="confirm.php" method="POST">
  <p>
    <label for="clientname">名前（必須）</label>
    <br>
    <input type="text" name="clientname" value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?>">
    <?php if(isset($err['err_clientname'])) : ?>
      <p><?php echo $err['err_clientname']; ?></p>
    <?php endif; ?>
  </p>
  <br>
  <p>
    <label for="email">返信メールアドレス（必須）</label>
    <br>
    <input type="email" name="email" value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?>">
    <?php if(isset($err['err_email'])) : ?>
      <p><?php echo $err['err_email']; ?></p>
    <?php endif; ?>
  </p>
  <br>
  <p>
    <label for="content">問い合わせ内容（必須）</label>
    <br>
    <textarea name="content" id="content" cols="30" rows="10"><?php if(isset($_SESSION['content'])) {echo $_SESSION['content'];} ?></textarea>
    <?php if(isset($err['err_content'])) : ?>
      <p><?php echo $err['err_content']; ?></p>
    <?php endif; ?>
  </p>
  <p>
    <input type="submit" value="送信確認">
  </p>
  </form>
  <a href="index.html">TOP画面に戻る</a>
</body>
</html>

<?php 
  // セッションを消す
  $_SESSION = array();

  $_SESSION = array();
?>

