<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録ユーザー情報入力</title>
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

  main {
    padding-bottom: 300px;
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

  <main>
    <div class="mx-auto" style="width: 80%">
      <form action="pet_input.php?s_id=<?= $_GET['s_id'] ?>" method="POST" autocomplete="off">
        <div class="my-4">
          <p class="m-0">お名前</p>
          <input class="w-100" type="text" name="u_name">
        </div>
        <div>
          <table class="my-4">
            <tbody>
              <tr>
                <td>都道府県</td>
                <td> <select name="都道府県">
                    <option value="" selected="selected">【選択して下さい】</option>
                    <optgroup label="北海道・東北地方">
                      <option value="北海道">北海道</option>
                      <option value="青森県">青森県</option>
                      <option value="岩手県">岩手県</option>
                      <option value="秋田県">秋田県</option>
                      <option value="宮城県">宮城県</option>
                      <option value="山形県">山形県</option>
                      <option value="福島県">福島県</option>
                    </optgroup>
                    <optgroup label="関東地方">
                      <option value="栃木県">栃木県</option>
                      <option value="群馬県">群馬県</option>
                      <option value="茨城県">茨城県</option>
                      <option value="埼玉県">埼玉県</option>
                      <option value="東京都">東京都</option>
                      <option value="千葉県">千葉県</option>
                      <option value="神奈川県">神奈川県</option>
                    </optgroup>
                    <optgroup label="中部地方">
                      <option value="山梨県">山梨県</option>
                      <option value="長野県">長野県</option>
                      <option value="新潟県">新潟県</option>
                      <option value="富山県">富山県</option>
                      <option value="石川県">石川県</option>
                      <option value="福井県">福井県</option>
                      <option value="静岡県">静岡県</option>
                      <option value="岐阜県">岐阜県</option>
                      <option value="愛知県">愛知県</option>
                    </optgroup>
                    <optgroup label="近畿地方">
                      <option value="三重県">三重県</option>
                      <option value="滋賀県">滋賀県</option>
                      <option value="京都府">京都府</option>
                      <option value="大阪府">大阪府</option>
                      <option value="兵庫県">兵庫県</option>
                      <option value="奈良県">奈良県</option>
                      <option value="和歌山県">和歌山県</option>
                    </optgroup>
                    <optgroup label="四国地方">
                      <option value="徳島県">徳島県</option>
                      <option value="香川県">香川県</option>
                      <option value="愛媛県">愛媛県</option>
                      <option value="高知県">高知県</option>
                    </optgroup>
                    <optgroup label="中国地方">
                      <option value="鳥取県">鳥取県</option>
                      <option value="島根県">島根県</option>
                      <option value="岡山県">岡山県</option>
                      <option value="広島県">広島県</option>
                      <option value="山口県">山口県</option>
                    </optgroup>
                    <optgroup label="九州・沖縄地方">
                      <option value="福岡県">福岡県</option>
                      <option value="佐賀県">佐賀県</option>
                      <option value="長崎県">長崎県</option>
                      <option value="大分県">大分県</option>
                      <option value="熊本県">熊本県</option>
                      <option value="宮崎県">宮崎県</option>
                      <option value="鹿児島県">鹿児島県</option>
                      <option value="沖縄県">沖縄県</option>
                    </optgroup>
                  </select></td>
              </tr>
              <tr>
                <td>市区町村</td>
                <td><textarea name="市区町村" cols="20" rows="1"></textarea></td>
              </tr>
              <tr>
                <td>番地</td>
                <td><textarea name="番地" cols="20" rows="1"></textarea></td>
              </tr>
              <tr>
                <td>建物名•部屋番号</td>
                <td><textarea name="建物名・部屋番号" cols="20" rows="1"></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="my-4">
          <p class="m-0">電話番号</p>
          <div class="d-flex justify-content-around">
            <input type="text" name="phone1" size="8" maxlength="3"> - <input type="text" name="phone2" size="8" maxlength="4"> - <input type="text" name="phone3" size="8" maxlength="4">
          </div>
        </div>
        <div class="my-4">
          <p class="m-0">E-mail <span class="text-danger pl-3" style="font-size: 14px;">※ログイン、警告通知に使用します</span></p>
          <input class="w-100" type="email" name="email">
        </div>
        <div class="my-4">
          <p class="m-0">パスワード<span class="text-danger pl-3" style="font-size: 14px;">※ログインに使用します</span></p>
          <input class="w-100" type="text" name="password" placeholder="6文字以上">
        </div>
        <div class="w-100 text-center mt-5">
          <button class="btn btn-primary " type="submit">ペット情報入力へ</button>
        </div>
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