<?php

require_once '../dbconnect.php';

class InquiryLogic
{
  /**
   * お問い合わせメールを送信する
   * @param array $inquiryDate
   * @return bool $result
   */
  public static function createInquiry($inquiryData)
  {
    $result = false;

    $sql = 'INSERT INTO client (clientname, email, content) VALUES (?, ?, ?)';

    // 問い合わせデータを配列に入れる
    $arr = [];
    $arr[] = $inquiryData['clientname'];
    $arr[] = $inquiryData['email'];
    $arr[] = $inquiryData['content'];

    try {
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    } catch(\Exception $e) {
      echo $e;
      error_log($error, 3, '../e.log');
      return $result;
    }

  }


  /**
   * お問い合わせリストを表示
   * @param array $inquiryData
   * @return bool $result
   */
  public static function getInquiry($inquiryData)
  {
    $result = false;

    $sql = 'SELECT * FROM client';

    try {
      $stmt = connect()->query($sql);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch(\Exception $e) {
      echo $e;
      return $result;
    }
  }

}