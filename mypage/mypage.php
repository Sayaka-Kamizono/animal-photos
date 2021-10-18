<?php

session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];

$sql = 'SELECT * FROM users_table WHERE u_id=:u_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
}


$thisMon_m = date("m", strtotime("this week Monday"));
$thisMon_d = date("d", strtotime("this week Monday"));
$thisSun = date("d", strtotime("this week Sunday"));
$message = "今週の投稿期間は" . $thisMon_m . "月" . $thisMon_d . "日〜" . $thisSun . "日です";


$sql = 'SELECT * FROM pet_table WHERE u_id=:u_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
    $pets_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// $breeding_petsはu_idが飼ってるペットたちのp_id
$breeding_pets = [];
  foreach ($pets_data as $pet_data) {
    array_push($breeding_pets, $pet_data['p_id']);
  } 

    date_default_timezone_set('Asia/Tokyo');
    $limit = date("Y-m-d", strtotime("last week sunday"));

    $sql = 'SELECT * FROM image_table WHERE u_id=:u_id AND created_at > :limit';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_STR);
    $status = $stmt->execute();
    if ($status == false) {
      $error = $stmt->errorInfo();
      echo json_encode(["error_msg" => "{$error[2]}"]);
      exit();
    } else {
        // $imageUped_petsは投稿完了してる子たちの情報
        // $imageUped_petは投稿完了してる子単体の情報
        $imageUped_pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $imageUped_petsID = [];
        foreach ($imageUped_pets as $imageUped_pet) {
        array_push($imageUped_petsID, $imageUped_pet['p_id']);        
      }
      unset($value);
    }

$result = [];
    for ($i = 0; $i < count($breeding_pets); $i++) {
        if (!in_array($breeding_pets[$i], $imageUped_petsID)) {
            array_push($result, "NG");
        }
    }

        if (empty($result)) {
            $alert = "今週の投稿は完了しました！";
        } else {
          $alert = "今週の投稿は完了していません";
        }
   


$sql = 'SELECT * FROM pet_table WHERE u_id=:u_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $pets_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $output = "";
  foreach ($pets_data as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["p_name"]}</td>";
    $output .= "<td>
    <a href='../pet/pet.php?p_id={$record["p_id"]}'><img src='{$record["p_image"]}' width='100' height='100'></a>
                </td>";
    $output .= "</tr>";
  }
  unset($value);
}

$sql = 'SELECT * FROM image_table WHERE u_id=:u_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
    $image_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ</title>
  <!-- boootstrapのパッケージ -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- bootstrap icon CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<!-- bootstrap-icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<!-- マスクのスタイル -->
<style>
  .mask {
  background: rgba(0, 0, 0, 0.5);
	position: fixed;
	top: 0;
	bottom: 0;
	right: 0;
	left: 0;
	z-index: 5;
  }
  .none {
    display: none;
  }

  p {
    text-align: center;
  }

  a:link, a:visited, a:hover, a:active {
  color: white;
  }

  a {
    text-decoration:none; 
  }

  .img-fluid {
      width: 90px;
      height: auto;
      object-fit: cover;
    }
</style>
<body>
  <!-- マスク -->
<div id="mask" class="mask none"></div>
  <!-- ヘッダー --> 
  <div style="height: 80px;">
    <header class="container-fluid d-flex align-items-center justify-content-between fixed-top" style="background: #213a70; color:white">
      <div class="row h-85">
        <div class="col-2 p-0">
          <img src="../肉球白.png" alt="ハンバーガーメニュー" class="img-fluid" onclick={openMenue()}>
        </div>
        <div class="col-10 d-flex d-flex align-items-center"><?= $alert ?></div>
        
      </div>
    </header>
</div>
    <!-- ハンバーガーメニュー -->
    <div id="menue" class="rounded" style="z-index:10; height: 225px; width:180px; background:white; position:fixed; top:70px; left:10px; display:none;">
    
      <div class="m-3">
        <a style="color: gray;" href="mypage.php">マイページ</a>
      </div>
      <div class="m-3">
        <a style="color: gray;" href="../other/account.php">アカウント情報</a>
      </div>
      <div class="m-3">
        <a style="color: gray;" href="../other/advice.php">飼育方法アドバイス</a>
      </div>
      <div class="m-3">
        <a style="color: gray;" href="../multi/multi.php">新しい家族を追加</a>
      </div>
      <div class="m-3">
        <a style="color: gray" href="../other/logout.php">ログアウト</a>
      </div>
    </div>
  </div>
  <!-- ヘッダーend -->

  <!-- メイン -->
    <main>
    <p><?= $user_data['u_name'] ?>さん！こんにちは</p>
    <p><?= $message ?></p>
  
    <!-- マイペット一覧 -->
  <div class="container-fluid">
    <div class="row justify-content-center text-center my-2"> 
      <?php foreach ($pets_data as $record): ?>
      <div class="col-4 my-2">
          <a href="../pet/pet.php?p_id=<?= $record['p_id'] ?>">
          <img class="img-fluid m-auto rounded-circle" style="width: 90px; height:90px" src=<?= $record["p_image"] ?> alt="">
        </a>
          <p class="m-0"><?= $record["p_name"] ?></p>
      </div>
      <?php endforeach ?>
    </div>
  </div>
<!-- マイペット一覧 end -->


    </main>

    <footer class="container-fluid text-center fixed-bottom bg-white text-white">
      <div class="row" style="background: #213a70;">
        <div class="d-flex justify-content-between">
          <a href="../other/terms.php"><p class="m-0">利用規約</p></a>
          <a href="../other/contact.php"><p class="m-0">お問い合わせ</p></a>
          <a href="../other/company.php"><p class="m-0">会社概要</p></a>
        </div>
        
        <!-- <hr class="m-0"> -->
        <div class="d-flex justify-content-center">
          <i class="bi bi-twitter h1 mx-3"></i>
          <i class="bi bi-facebook h1 mx-3"></i> 
          <i class="bi bi-instagram h1 mx-3"></i>
        </div>
      </div>
      <p class="m-0 text-black">&copy; someday it will disappear company.</p> 
    </footer>

<script>
  const mask = document.getElementById('mask');
  function openMenue() {
    const menue = document.getElementById('menue');
      if (menue.style.display == "none") {
        menue.style.display = "inline-block"
        mask.classList.remove("none");
        } else {
        menue.style.display = "none";
        mask.classList.add('none');
        } 
      };
  mask.addEventListener('click', () => {
    openMenue();
  });
</script>

<script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>

<!-- <script>

var len = $result('NG').length;
console.log(len);


</script> -->


</body>


</html>