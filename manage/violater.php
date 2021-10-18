<?php

include("../functions.php");
$pdo = connect_to_db();

date_default_timezone_set('Asia/Tokyo');
$last_Monday = date("Y-m-d", strtotime("last week monday"));
$last_Sunday = date("Y-m-d", strtotime("last week sunday"));

$sql = "SELECT * FROM image_table WHERE created_at BETWEEN '$last_Monday' AND '$last_Sunday'";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $image_data = $stmt->fetchALL(PDO::FETCH_ASSOC);
}


$OK_submit_id = [];
foreach ($image_data as $row) {
  array_push($OK_submit_id, $row['p_id']);
}


$sql = 'SELECT * FROM pet_table';
$stmt = $pdo->prepare($sql);

$status = $stmt->execute();
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $pet_data = $stmt->fetchALL(PDO::FETCH_ASSOC);
}

$all_p_id = [];
  foreach ($pet_data as $row) {
  array_push($all_p_id, $row['p_id']);
}

$result = [];
  for ($i = 0; $i < count($all_p_id); $i++) {
  if (!in_array($all_p_id[$i], $OK_submit_id)) {
  array_push($result, $all_p_id[$i]);
  }
}


$violater_list = [];
$violater_pet_list = [];

for ($i = 0; $i < count($result); $i++) {
    $sql = 'SELECT * FROM pet_table WHERE p_id=:result';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':result', $result[$i], PDO::PARAM_STR);
    $status = $stmt->execute();

    if ($status == false) {
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        $NO_submit_pet = $stmt->fetch(PDO::FETCH_ASSOC);
    }


    $sql = 'SELECT * FROM users_table WHERE u_id=:NO_submit_pet_u_id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':NO_submit_pet_u_id', $NO_submit_pet['u_id'], PDO::PARAM_INT);
    $status = $stmt->execute();

    if ($status == false) {
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        $violater = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    if ($violater != null) {
      array_push($violater_pet_list, $NO_submit_pet);
      array_push($violater_list, $violater);
    }
}

$output = "";
for ($i = 0; $i < count($violater_pet_list); $i++){
  $output .= "<tr>";
  $output .= "<td><div style='background: darkorchid; padding: 5px;'><span style='color: white';>名前(id)：{$violater_list[$i]["u_name"]}({$violater_list[$i]["u_id"]})</div></td>";
  $output .= "</tr>";
  $output .= "<tr>";
  $output .= "<td>メールアドレス：{$violater_list[$i]["email"]}</td>";
  $output .= "</tr>";
  $output .= "<tr>";
  $output .= "<td>ペットの名前(id)：{$violater_pet_list[$i]["p_name"]}({$violater_pet_list[$i]["p_id"]})</td>";
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
  <title>違反者一覧</title>
</head>
<body>

<h2>違反者一覧</h2>

<p><font size="4" color="darkorchid">対象期間：<?= $last_Monday ?>〜<?= $last_Sunday ?></font></p>

<table>
  <tbody><?= $output ?></tbody>
</table>


</body>
</html>

