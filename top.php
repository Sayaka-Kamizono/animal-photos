<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- boootstrapのパッケージ -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- bootstrap icon CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- bootstrap-icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>TOP画面</title>
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
        <img src="肉球白.png" alt="ハンバーガーメニュー" class="img-fluid" onclick={openMenue()} style="height: 60px; width:auto">
        </div>
      </div>
    </header>
</div>

  <!-- ハンバーガーメニュー -->
  <div id="menue" class="rounded" style="z-index:10; height: 225px; width:180px; background:white; position:fixed; top:70px; left:10px; display:none;">
    
    <div class="m-3">
      <a style="color: gray;" href="mypage/mypage.php">マイページ</a>
    </div>
    <div class="m-3">
      <a style="color: gray;" href="other/account.php">アカウント情報</a>
    </div>
    <div class="m-3">
      <a style="color: gray;" href="other/advice.php">飼育方法アドバイス</a>
    </div>
    <div class="m-3">
      <a style="color: gray;" href="multi/multi.php">新しい家族を追加</a>
    </div>
    <div class="m-3">
      <a style="color: gray" href="other/logout.php">ログアウト</a>
    </div>
  </div>
  <!-- ヘッダーend -->

<main class="d-flex align-items-center justify-content-center" style="height: 600px;">
    <div class="align-items-center justify-content-center d-inline-block w-50">
      <div class="my-5">
        <p>初めてアプリを<br>利用される方はこちら</p>
        <a class="btn btn-primary w-100" href="register/terms.php?s_id=<?= $_GET['s_id'] ?>">
        新規登録
        </a>
      </div>
      <div style="height:10px"></div>
        <div class="my-5">
        <p>２匹目以降の方はこちら</p>
          <a class="btn btn-primary w-100" href="login/login.php?s_id=<?= $_GET['s_id'] ?>">
          ログイン
          </a>
      </div>
    </div>
</main>

<footer class="container-fluid text-center fixed-bottom bg-white text-white">
      <div class="row" style="background: #213a70;">
        <div class="d-flex justify-content-between">
          <a href="other/terms.php"><p class="m-0">利用規約</p></a>
          <a href="other/contact.php"><p class="m-0">お問い合わせ</p></a>
          <a href="other/company.php"><p class="m-0">会社概要</p></a>
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