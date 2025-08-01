<?php include_once("assets/fonksiyon.php"); $yonetim=new yonetim;
$yonetim->kontrolet("cont"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title>Yıldız Nakliyat-Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">    
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">   
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<div id="preloader">
  <div class="loader"></div>
</div>

<div class="page-container">
   <!--sidebar baslangıc-->
  <div class="sidebar-menu">
      <div class="sidebar-header">
        <div class="logo">
          <a href="control.php"><img src="assets/images/logo/starlogo.png" alt="logo" /></a>
        </div>
      </div>
    <div class="main-menu">
      <div class="menu-inner">
        <nav>
        
          <ul class="metismenu" id="menu">
         
            <li><a href="control.php?sayfa=siteayarlari"><i class="ti-pencil"></i><span>Site Ayarları</span></a></li>
            <li><a href="control.php?sayfa=introayarlari"><i class="ti-image"></i><span>İntro Ayarları</span></a></li>
            <li><a href="control.php?sayfa=aracfilosu"><i class="ti-car"></i><span>Araç Filosu</span></a></li>
            <li><a href="control.php?sayfa=hakkimizdaayarlari"><i class="ti-flag"></i><span>Hakkımızda Ayarları</span></a></li>
            <li><a href="control.php?sayfa=hizmetlerimizayarlari"><i class="ti-medall"></i><span>Hizmetlerimiz Ayarları</span></a></li>
            <li><a href="control.php?sayfa=referansayarlari"><i class="ti-eye"></i><span>Referans Ayarları</span></a></li>
            <li><a href="control.php?sayfa=musteriyorumlari"><i class="ti-comment-alt"></i><span>Müşteri Yorumları</span></a></li>
          </ul>
        </nav>  
      </div> <!--menu inner-->
    </div> <!--main menu-->
  </div> <!--sidebar menu-->

  <!--sidebar bitis-->

  <!--ana içerik baslangic-->
  <div class="main-content">
  <div class="header-area">
    <div class="row align-items-center">
      <div class="col-md-6 col-sm-8 clearfix">
        <div class="nav-btn pull-left">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>  

      <div class="col-sm-6 clearfix">
        <div class="user-profile pull-right">
          <h4 class="user-name drop-toggle" data-toggle="dropdown"><?php echo $yonetim->kuladial($baglanti); ?><i class="fa fa-angle-down"></i></h4>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="control.php?sayfa=cikis">Çıkış</a>
          </div>
        </div> <!-- user-profile -->
      </div> <!-- col-sm-6 -->
    </div> <!-- row align-items-center -->
  </div> <!-- header-area -->

  <div class="main-content-inner">
    <div class="row">
      <div class="col-lg-12 mt-2 bg-white text-center" style="min-height:500px">

  <?php 
  @$sayfa = $_GET["sayfa"];
  switch ($sayfa):
    case "siteayarlari":
      $yonetim->siteayar($baglanti);
    break;
    case "cikis":
      $yonetim->cikis($baglanti);
    break;
    /*---------------------------------------------------*/
    case "introayarlari":
      $yonetim->introayar($baglanti);
    break;
    case "introresimgüncelle":
      $yonetim->introresimguncelleme($baglanti);
    break;
    case "introresimsil":
      $yonetim->introsil($baglanti);
    break;
    case "introresimekle":
      $yonetim->introresimekle($baglanti);
    break;
    /*---------------------------------------------------*/
    case "aracfilosu":
      $yonetim->aracfilosu($baglanti);
    break;
    case "aracfilogüncelle":
      $yonetim->aracfilosuguncelleme($baglanti);
    break;
    case "aracfilosil":
      $yonetim->aracfilosusil($baglanti);
    break;
    case "aracfiloekle":
      $yonetim->aracfilosuekle($baglanti);
    break;
    /*---------------------------------------------------*/
    case "hakkimizdaayarlari":
      $yonetim->hakkimizda($baglanti);
    break;
    /*---------------------------------------------------*/
    case "hizmetlerimizayarlari":
      $yonetim->hizmetler($baglanti);
    break;
    case "hizmetgüncelle":
      $yonetim->hizmetguncelleme($baglanti);
    break;
    case "hizmetsil":
      $yonetim->hizmetsil($baglanti);
    break;
    case "hizmetekle":
      $yonetim->hizmetekleme($baglanti);
    break;
    /*---------------------------------------------------*/
    case "referansayarlari":
      $yonetim->referanslar($baglanti);
    break;
    case "referanssil":
      $yonetim->refsil($baglanti);
    break;
    case "referansekle":
      $yonetim->refekleme($baglanti);
    break;
  endswitch;
  ?>

</div> <!-- main-content -->

</div> <!-- page-container -->


    

 

  

   

         
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>    
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script> 
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
