<?php

include("../functions.php");
$pdo = connect_to_db();
$request_i_id = $_POST['request_i_id'];
$response_message = $_POST['response_message'];

$sql = 'UPDATE image_table SET response=:response WHERE i_id=:i_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':i_id', $request_i_id, PDO::PARAM_INT);
$stmt->bindValue(':response', $response_message, PDO::PARAM_STR);

$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header('Location:request.php');
}

