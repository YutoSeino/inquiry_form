<?php
require_once '../classes/InquiryLogic.php';

$hasGet = InquiryLogic::getInquiry($_POST);

if(!$hasGet) {
  $err[] = '一覧の取得に失敗しました';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問い合わせ一覧</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<table>
<h1>問い合わせリスト</h1>
  <tr>
    <th>名前</th>
    <th>メールアドレス</th>
    <th>問い合わせ内容</th>
  </tr>
  <?php foreach($hasGet as $column): ?>
    <tr>
      <td><?php echo $column['clientname'] ?></td>
      <td><?php echo $column['email'] ?></td>
      <td><?php echo $column['content'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<a href="inquiry.html">TOP画面へ</a>
</body>
</html>