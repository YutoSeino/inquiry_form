<?php
require_once '../classes/InquiryLogic.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 送信完了をする処理
  $hasCreated = InquiryLogic::createInquiry($_POST);

  if(!$hasCreated) {
    $err[] = '送信に失敗しました';
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>送信完了画面</title>
</head>
<body>
  <p>送信が完了しました</p>
  <a href="index.html">TOPへ</a>
  <a href="inquiry_list.php">問い合わせリストへ</a>
</body>
</html>