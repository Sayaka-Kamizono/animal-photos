<?php

include("../functions.php");
$pdo = connect_to_db();
$request = "-";
$response = "-";


$sql = 'SELECT * FROM image_table WHERE request != :request AND response = :response';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':request', $request, PDO::PARAM_STR);
$stmt->bindValue(':response', $response, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $no_response_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if($no_response_data == NULL){
  $output = "未回答案件なし";
} else {
    $output = "";
    for ($i = 0; $i < count($no_response_data); $i++) {
        $output .= "<div>{$no_response_data[$i]["request"]}
<form action='response.php' method='POST'>
<input type='hidden' name='request_i_id' value='{$no_response_data[$i]["i_id"]}'>
<textarea name='response_message' cols='55' rows='10'></textarea>
<button type='submit'>回答</button>
</form></div>";
    }
    unset($value);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お悩み相談一覧</title>
</head>
<body>


<h1>未回答お悩み一覧</h1>
<?= $output ?>
  
</body>
</html>