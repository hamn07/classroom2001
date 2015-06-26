<?php
header("content-type:text/html; charset=utf-8");

// 0. 請先建立 Class 資料庫 （執行 class.sql）

// 1. 連接資料庫伺服器
$link = mysql_connect("localhost", "root", "password") or die(mysql_error());
$result = mysql_query("set names utf8", $link);
mysql_selectdb("class", $link);

// 2. 執行 SQL 敘述
$commandText = "select * from students";
$result = mysql_query($commandText, $link);

// 3. 處理查詢結果
while ($row = mysql_fetch_assoc($result))
{
  echo "ID：{$row['cID']}<br>";
  echo "Name：{$row['cName']}<br>";
  echo "<HR>";
}
mysql_free_result($result);

// 4. 結束連線
mysql_close($link);

echo "<br />-- Done --";
?>
