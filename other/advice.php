<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>飼育方法アドバイス</title>
   <!-- bootstrap icon CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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

  <main class="m-auto" style="width: 97%;">
    <div class="text-center m-5">
      <p>飼育方法ワンポイントアドバイス</p>
    </div>

    <div>
      <p class="m-0">Q：食べさせてはいけない物は？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">玉ねぎ、ネギ類、ニンニク、ぶどう、キシリトール、チョコレート、カフェイン、鶏の骨、甲殻類、イカ、牛乳。青魚やマグロも長期間与え続けると「黄色脂肪症」という病気になる恐れがありますので注意してください。</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">玉ねぎ、ネギ類、ニンニク、ぶどう、キシリトール、チョコレート、カフェイン、鶏の骨、甲殻類、イカ、牛乳。猫ちゃんは魚好きと思われがちですが、犬と同じように青魚やマグロを長期間食べ続けると病気になる恐れがあります。</p>
      </div>
    </div>
    
    <div>
      <p class="m-0">Q：散歩の時間はどのくらいが理想？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">犬種、体格、年齢によって異なりますが一般的には小型犬20分、中型犬30分、大型犬30〜60分をそれぞれ１日２回（熱中症を防ぐために早朝、涼しくなった夕方以降）が望ましいです。食後は胃捻転や胃拡張のリスクがあるため食前または食後1〜2時間経過後に行きましょう。</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">お家の中に遊べる環境があれば散歩は必要ありません。犬と違って猫にとって外は危険がいっぱいです。どうしても気晴らしで連れて行ってあげたいという場合には、リードではなくハーネスを着けて脱走しないように細心の注意を払って短時間で行うようにしましょう。</p>
      </div>
    </div>
    <div>
      <p class="m-0">Q：トイレトレーニングどうやるの？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
    </div>
    <div>
      <p class="m-0">Q：ワクチンって本当に必要？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
    </div>
    <div>
      <p class="m-0">Q：かかりつけ医はどうやって見つける？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
    </div>
    <div>
      <p class="m-0">Q：休日や夜間に体調が急変したら？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
    </div>
    <div>
      <p class="m-0">Q：かかりやすい病気って？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
    </div>
    <div>
      <p class="m-0">Q：ストレスが溜まっている時の行動は？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
    </div>
    <div>
      <p class="m-0">Q：信頼関係築けているかな？</p>
      <div class="bg-info d-flex rounded p-2 my-2">
        <img src="../11026.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
      <div class="bg-warning d-flex rounded p-2 my-2">
      <img src="../10986.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">随時更新予定</p>
      </div>
    </div>
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