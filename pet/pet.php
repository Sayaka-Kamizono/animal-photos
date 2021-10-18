<?php

session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];
$p_id = $_GET["p_id"];

$sql = 'SELECT * FROM pet_table WHERE p_id=:p_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':p_id', $p_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $pet_data = $stmt->fetch(PDO::FETCH_ASSOC);
}

$sql = 'SELECT * FROM image_table WHERE p_id=:p_id ORDER BY created_at DESC';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':p_id', $p_id, PDO::PARAM_INT);
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
  <title>ペット個別情報</title>
  <!-- bootstrap icon CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!-- bootstrap-icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<!-- ハンバーガーメニューの設定 -->
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

  select {
    padding: 4px 10px;
  }

  .search {
    margin-top: 10px;
    text-align: center;
  }

  a:link, a:visited, a:hover, a:active {
  color: white;
  }

  a {
    text-decoration:none; 
  }
</style>

<body>
  <!-- マスク -->
  <div id="mask" class="mask none"></div>
  <!-- ヘッダー -->
  <div style="height: 80px;">
    <header class="container-fluid d-flex fixed-top" style="background: #213a70; color:white">
      <div class="row h-85">
        <div class="p-0">
        <img src="../肉球白.png" alt="ハンバーガーメニュー" class="img-fluid" onclick={openMenue()} style="height: 60px; width:auto">
        </div>
      </div>
    </header>
</div>

  <!-- ハンバーガーメニュー -->
  <div id="menue" class="rounded" style="z-index:10; height: 225px; width:180px; background:white; position:fixed; top:70px; left:10px; display:none;">
    
    <div class="m-3">
      <a style="color: gray;" href="../mypage/mypage.php">マイページ</a>
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
  <!-- ヘッダーend -->

  <main class="m-auto" style="width: 80%">
    <div class="text-center my-3">
      <img class="img-fluid m-auto rounded-circle" style="width: 90px; height:90px" src="<?= $pet_data['p_image'] ?>" alt="" height="80" width="80">
    </div>

    <div class="container my-2">
      <div class="row">
        <table class="col-8">
          <tbody>
            <tr>
              <td>名前</td>
              <td>:</td>
              <td><?= $pet_data['p_name'] ?></td>
            </tr>
            <tr>
              <td>生年月日</td>
              <td>:</td>
              <td><?= $pet_data['birthday'] ?></td>
            </tr>
            <tr>
              <td>性別</td>
              <td>:</td>
              <td><?= $pet_data['sex'] ?></td>
            </tr>
            <tr>
              <td>種類</td>
              <td>:</td>
              <td><?= $pet_data['type'] ?></td>
            </tr>
          </tbody>
        </table>

        <div class="col-4 p-0 text-center">
          <form action="pet_edit.php" method="POST">
            <a class="m-2 p-0 btn btn-secondary w-100 text-white d-flex align-items-center justify-content-center" style="height: 50px;" href="pet_up.php?p_id=<?= $p_id ?>">
              <p class="h3 m-0 px-1">投稿</p>
              <i class="m-0 h1 bi bi-camera"></i>
            </a>
            <input type="hidden" name="p_id" value="<?= $pet_data['p_id'] ?>">
            <button class="m-2 btn btn-primary w-100" type="submit">編集</button>
          </form>
        </div>
      </div>
    </div>

    <!-- ↓過去写真一覧を並べる↓ -->
    <div class="container-fluid">
      <div class="row">
        <?php $i = 0 ?>
        <?php foreach ($image_data as $record) : ?>
          <?php if ($i > 11) {
            break;
          } ?>
          <div class="col-3 p-0">
            <a href="pet_detail.php?i_id=<?= $record['i_id'] ?>">
              <img class="img-fluid" style="width: 80px; height:80px" src=<?= $record['image'] ?> alt="">
            </a>
          </div>
          <?php $i++ ?>
        <?php endforeach ?>
      </div>
    </div>



    <!-- 過去の投稿検索 -->
    <div class="search">
      <p>過去の写真を見る</p>
      <form action="pet_detail.php" method="POST">
        <select name="i_id">
          <?php foreach ($image_data as $record) : ?>

            <option value=<?= $record['i_id'] ?>>
              <?= substr($record['created_at'], 0, 4) ?>年
              <?= substr($record['created_at'], 5, 2) ?>月
              <?= substr($record['created_at'], 8, 2) ?>日
            </option>
          <?php endforeach ?>
        </select>
        <input type="submit" name="submit" value="検索">
      </form>
    </div>
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





</body>


</html>