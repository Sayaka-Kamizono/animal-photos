<?php

include("../functions.php");
$pdo = connect_to_db();

$sql = 'SELECT * FROM contact_table';
$stmt = $pdo->query($sql);


$output = "";
foreach ($stmt as $row) {
  $output .= "<tr>";
  $output .= "<td><div style='background: skyblue; padding: 10px;'><span style='color: white';>contact_id：{$row['contact_id']}</div></td>";
  $output .= "</tr>";
  $output .= "<tr>";
  $output .= "<td>名前(u_id)：{$row['u_name']}({$row['u_id']})</td>";
  $output .= "</tr>";
  $output .= "<tr>";
  $output .= "<td>メールアドレス：{$row['email']}</td>";
  $output .= "</tr>";
  $output .= "<tr>";
  $output .= "<td>件名：{$row['subject']}</td>";
  $output .= "</tr>";
  $output .= "<tr>";
  $output .= "<td>内容：{$row['message']}</td>";
  $output .= "</tr>";
  }
  unset($value);


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ一覧</title>
</head>
<body>

<h2>お問い合わせ一覧</h2>

<table>
    <tbody><?= $output ?></tbody>
  </table>


</body>
</html>
