<?php include_once("assets/fonksiyon.php"); $yonetim=new yonetim;
$yonetim->kontrolet("ind"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title>Yıldız Nakliyat-Giriş</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">   
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<div class="login-area text-center">

<?php
if(!$_POST):

  ?>

  <div class="container">
    <div class="login-box ptb--100">
      <form action="" method="post">
        <div class="login-form-head">
          <h4>YÖNETİM PANELİ</h4>
        </div>

        <div class="login-form-body">
          <div class="form-gp">
            <input type="text" name="kulad" id="kuladlab" placeholder="Kullanıcı Adı" />
            <i class="ti-user"></i>
          </div>

          <div class="form-gp">
            <input type="password" name="sifre" id="sifrelab" placeholder="Şifre" />
            <i class="ti-lock"></i>
          </div>

          <div class="submit-btn-area">
            <input type="submit" class="btn btn-dark" value="GİRİŞ YAP" />
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>

  <?php

else:

  $kulad=htmlspecialchars($_POST["kulad"]);
  $sifre=htmlspecialchars($_POST["sifre"]);

  if($kulad=="" && $sifre==""):
    
    echo '
    <div class="container-fluid bg-white">
    <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-10 font-weight-bold">
    <img src="load.gif" class="mr-3">BİGİLER BOŞ OLAMAZ</div>
    </div>';
    header("refresh:2,url=index.php");
  else:
    //burada veritabanı kontrol fonksiyonu gelecek
    $yonetim->giriskontrol($kulad,$sifre,$baglanti);
  endif;

endif; 
?>
         
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>    
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
