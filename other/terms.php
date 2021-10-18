<?php
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>利用規約</title>
    <!-- boootstrapのパッケージ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- bootstrap icon CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- bootstrap-icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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
</head>

<body>
  <!-- マスク -->
<div id="mask" class="mask none"></div>
  <!-- ヘッダー --> 
  <div style="height: 80px;">
    <header class="container-fluid d-flex fixed-top" style="background: #213a70; color:white">
      <div class="row h-85">
        <div class="p-0">
        <img src="../肉球白.png" alt="ハンバーガーメニュー" class="img-fluid" onclick={openMenue()} style="height: 56px; width:auto">
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
</div>
  <!-- ヘッダーend -->

  <main>
  <div class>
    <p class="text-center m-0">利用規約</p>
    <div class="m-auto border border-secondary" style="overflow-y: scroll; height:500px; width:85%" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
      <strong>第１条</strong><br>
      このアプリに登録した者（以下、会員）は、毎週月曜日〜日曜日の間に該当するペットの写真を投稿する義務を負います。該当するペットとはこのアプリに登録した犬や猫を指します。登録しているペットが複数になった場合は、全てのペットの写真を週に１回投稿してください。<br>
      <strong>第２条</strong><br>
      第１条に違反した場合、警告メッセージが送信されます。投稿が３回滞った時点で、「不適切な飼い主」とみなし当アプリのブラックリストに掲載します。ブラックリストは当アプリを導入している店舗や譲渡会主催者にも共有されます。<br>
      <strong>第３条</strong><br>
      会員またはペットの体調不良などで、やむを得ず投稿を中断する場合は、必ずお問い合わせフォームから申請し、許可を得た上で中断して下さい。その際、診断書などの提出をお願いする場合がありますのでご了承ください。許可なく中断された場合は第２条と同様の措置を取らせて頂きます。<br>
      <strong>第４条</strong><br>
      ペットを譲渡した場合は、新たな飼い主が会員となって写真を投稿する義務を負います。新たな飼い主への引き継ぎ作業を行う必要がありますので、メールまたは電話にてご連絡下さい。引き継ぎ作業が完了する前に写真投稿を中断したり無断で譲渡した場合は、第２条同様「ブラックリスト」に掲載されます。<br>
      <strong>第５条</strong><br>
      このアプリの使用を開始した時点で、当利用規約に同意したものとみなします。理由を問わず規約違反に対する処分内容は全て当社の方針に従って頂きます。<br>
      <strong>第６条</strong><br>
      テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
    </div>
  </div>


  </main>

  <footer class="p-0 container-fluid text-center fixed-bottom bg-white">
      <hr class="my-2" style="border:2px solid #213a70">
      <p class="mb-2 text-black">&copy; someday it will disappear company.</p> 
    </footer>


  <script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>



</body>

  </main>
  <footer class="container-fluid text-center fixed-bottom bg-white text-white">
      <div class="row" style="background: #213a70;">
        <div class="d-flex justify-content-between">
          <a href="../other/terms.php"><p class="m-0">利用規約</p></a>
          <a href="../other/contact.php"><p class="m-0">お問い合わせ</p></a>
          <a href="../other/company.php"><p class="m-0">会社概要</p></a>
        </div>
        
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