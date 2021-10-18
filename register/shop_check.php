<?php
include("../functions.php");
$pdo = connect_to_db();
session_start();

if ($_SESSION["session_id"] != session_id()) {
  $u_name = $_POST['u_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['都道府県'] . $_POST['市区町村'] . $_POST['番地'] . $_POST['建物名・部屋番号'];
  $phone = $_POST['phone1'] . $_POST['phone2'] . $_POST['phone3'];
  $p_name = $_POST['p_name'];
  $birthday = $_POST['birthday_y'] . $_POST['birthday_m'] . $_POST['birthday_d'];
  $sex = $_POST['sex'];
  $s_id = $_GET['s_id'];
  if (($_POST['d_type'] == null && $_POST['c_type'] == null) || ($_POST['d_type'] != null && $_POST['c_type'] != null)) {
    echo "<p>ペットの種類は、どちらか一方に入力してください．</p>";
  } elseif ($_POST['d_type'] == null) {
    $type = $_POST['c_type'];
  } else {
    $type = $_POST['d_type'];
  }

  if (
    $u_name == null ||
    $email == null ||
    $password == null || strlen($password) < 6 ||
    $address == null ||
    $phone == null ||
    $birthday == null ||
    $sex == null
  ) {
    echo "<p>入力内容に誤りがあります．</p>";
    exit();
  }

  $sql = 'SELECT * FROM store_table WHERE s_id=:s_id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':s_id', $s_id, PDO::PARAM_INT);
  $status = $stmt->execute();

  if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    $store_data = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名を取得
    $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所
    $directory_path = '../upload/'; //アップロード先フォルダ
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
    $filename_to_save = $directory_path . $unique_name;

    if (is_uploaded_file($temp_path)) {
      if (move_uploaded_file($temp_path, $filename_to_save)) {
        chmod($filename_to_save, 0644);
      } else {
        exit('ERROR①:アップロードできませんでした。申し訳ありませんがエラーナンバーを「お問い合わせ」までご報告ください');
      }
    } else {
      exit('ERROR②:画像がありません');
    }
  } else {
    exit('ERROR③:画像が送信されていません。申し訳ありませんがエラーナンバーを「お問い合わせ」までご報告ください');
  }
} else {
  check_session_id();
  $u_id = $_SESSION['u_id'];

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

    $u_name = $user_data['u_name'];
    $address = $user_data['address'];
    $phone = $user_data['phone'];
    $email = $user_data['email'];
  }

  $p_name = $_POST['p_name'];
  $birthday = $_POST['birthday_y'] . $_POST['birthday_m'] . $_POST['birthday_d'];
  $sex = $_POST['sex'];
  $s_id = $_GET['s_id'];
  if (($_POST['d_type'] == null && $_POST['c_type'] == null) || ($_POST['d_type'] != null && $_POST['c_type'] != null)) {
    echo "<p>ペットの種類は、どちらか一方に入力してください．</p>";
  } elseif ($_POST['d_type'] == null) {
    $type = $_POST['c_type'];
  } else {
    $type = $_POST['d_type'];
  }

  if (
    $birthday == null ||
    $sex == null
  ) {
    echo "<p>入力内容に誤りがあります．</p>";
    exit();
  }
  if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名を取得
    $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所
    $directory_path = '../upload/'; //アップロード先ォルダ(自分で決める)
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
    $filename_to_save = $directory_path . $unique_name;
    if (is_uploaded_file($temp_path)) {
      if (move_uploaded_file($temp_path, $filename_to_save)) {
        chmod($filename_to_save, 0644);
      } else {
        exit('ERROR:アップロードできませんでした');
      }
    } else {
      exit('ERROR:画像がありません');
    }
  } else {
    exit('error:画像が送信されていません');
  }
  $sql = 'SELECT * FROM store_table WHERE s_id=:s_id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':s_id', $s_id, PDO::PARAM_INT);
  $status = $stmt->execute();

  if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    $store_data = $stmt->fetch(PDO::FETCH_ASSOC);
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集内容確認</title>
<!-- bootstrap icon CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- bootstrap icon CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- bootstrap-icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
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

  <main class="mx-auto my-2"  style="width: 80%">
    <p>お客様情報</p>
    <table class="w-100 mb-3" style="background: #fefaec; border:10px solid #fefaec">
    <tbody>
      <tr>
        <td>お名前</td>
        <td>:</td>
        <td><?= $u_name ?></td>
      </tr>
      <tr>
        <td>住所</td>
        <td>:</td>
        <td><?= $address ?></td>
      </tr>
      <tr>
        <td>電話番号</td>
        <td>:</td>
        <td><?= $phone ?></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td>:</td>
        <td><?= $email ?></td>
      </tr>
    </tbody>
  </table>

  <p>ペット情報</p>
  <table  class="w-100 mb-3" style="background: #fefaec; border:10px solid #fefaec">
    <tbody>
      <tr>
        <td>購入店舗</td>
        <td>:</td>
        <td><?= $store_data['store_name'] ?></td>
      </tr>
      <tr>
        <td>お名前</td>
        <td>:</td>
        <td><?= $p_name ?></td>
      </tr>
      <tr>
        <td>犬種／猫種</td>
        <td>:</td>
        <td><?= $type ?></td>
      </tr>
      <tr>
        <td>性別</td>
        <td>:</td>
        <td><?= $sex ?></td>
      </tr>
      <tr>
        <td>生年月日</td>
        <td>:</td>
        <td><?= $birthday ?></td>
      </tr>
      <tr>
        <td class="align-top">写真</td>
        <td class="align-top">:</td>
        <td> <img class="img-fluid m-auto rounded-circle" style="width: 90px; height:90px" src="<?= $filename_to_save ?>" alt="" height="160px"></td>
      </tr>
    </tbody>
  </table>

  <div class="text-center">
    <div class="my-2">
      <p class="m-0 text-primary"><?= $store_data['store_name'] ?>様が<br>ボタンを押して下さい</p>
    </div>
    <form action="user_create.php" method="POST">
      <input type="hidden" name="u_name" value="<?= $u_name ?>">
      <input type="hidden" name="email" value="<?= $email ?>">
      <input type="hidden" name="password" value="<?= $password ?>">
      <input type="hidden" name="address" value="<?= $address ?>">
      <input type="hidden" name="phone" value="<?= $phone ?>">
      <input type="hidden" name="s_id" value="<?= $s_id ?>">
      <input type="hidden" name="p_name" value="<?= $p_name ?>">
      <input type="hidden" name="birthday" value="<?= $birthday ?>">
      <input type="hidden" name="sex" value="<?= $sex ?>">
      <input type="hidden" name="type" value="<?= $type ?>">
      <input type="hidden" name="p_image" value="<?= $filename_to_save ?>">
      <button class="btn btn-primary w-50" type="submit">承認します</button>
    </form>

    <form action="user_input.php" method="POST">
      <input type="hidden" name="u_name" value="<?= $u_name ?>">
      <input type="hidden" name="email" value="<?= $email ?>">
      <input type="hidden" name="password" value="<?= $password ?>">
      <input type="hidden" name="address" value="<?= $address ?>">
      <input type="hidden" name="phone" value="<?= $phone ?>">
      <input type="hidden" name="s_id" value="<?= $s_id ?>">
      <input type="hidden" name="p_name" value="<?= $p_name ?>">
      <input type="hidden" name="birthday" value="<?= $birthday ?>">
      <input type="hidden" name="sex" value="<?= $sex ?>">
      <input type="hidden" name="type" value="<?= $type ?>">
      <input type="hidden" name="p_image" value="<?= $filename_to_save ?>">
      <button class="btn btn-danger w-50 my-3" type="submit">修正する</button>
    </form>

    
  </div>
  <!-- POSTでデータ持って帰って前に戻るボタンを作る -->
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