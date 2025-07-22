<?php ob_start();
//database e bağlanma işslemi
try{
$baglanti=new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8mb4","root","");
  $baglanti ->setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
  die($e->getMessage());
}

class yonetim{

  //genel sorgu
  function sorgum($vt,$sorgu,$tercih=0){
    $al=$vt->prepare($sorgu);
    $al->execute();

    if ($tercih==1):
      return $al->fetch();
    elseif ($tercih==2):
      return $al;
    endif;
  }
  //siteyar fonksiyonu
  function siteayar($baglanti){
    $sonuc=self::sorgum($baglanti,"select * from ayarlar",1);

    if ($_POST):
    //veritabanı işlemleri
    $title=htmlspecialchars($_POST["title"]);
    $metatitle=htmlspecialchars($_POST["metatitle"]);
    $metadesc=htmlspecialchars($_POST["metadesc"]);
    $metakey=htmlspecialchars($_POST["metakey"]);
    $metaauthor=htmlspecialchars($_POST["metaauthor"]);
    $metaowner=htmlspecialchars($_POST["metaowner"]);
    $metacopy=htmlspecialchars($_POST["metacopy"]);
    $logoyazisi=htmlspecialchars($_POST["logoyazisi"]);
    $twit=htmlspecialchars($_POST["twit"]);
    $face=htmlspecialchars($_POST["face"]);
    $inst=htmlspecialchars($_POST["inst"]);
    $telefonno=htmlspecialchars($_POST["telefonno"]);
    $adres=htmlspecialchars($_POST["adres"]);
    $mailadres=htmlspecialchars($_POST["mailadres"]);
    $slogan=htmlspecialchars($_POST["slogan"]);
    $referansbaslik=htmlspecialchars($_POST["referansbaslik"]);
    $filobaslik=htmlspecialchars($_POST["filobaslik"]);
    $yorumbaslik=htmlspecialchars($_POST["yorumbaslik"]);
    $iletisimbaslik=htmlspecialchars($_POST["iletisimbaslik"]);
    
    $guncelleme=$baglanti->prepare("update ayarlar set title=?,metatitle=?,metadesc=?,metakey=?,
    metaauthor=?,metaowner=?,metacopy=?,logoyazisi=?,twit=?,face=?,ints=?,telefonno=?,adres=?,mailadres=?,
    slogan=?,referansbaslik=?,filobaslik=?,yorumbaslik=?,iletisimbaslik=?");

    $guncelleme->bindParam(1,$title,PDO::PARAM_STR);
    $guncelleme->bindParam(2,$metatitle,PDO::PARAM_STR);
    $guncelleme->bindParam(3,$metadesc,PDO::PARAM_STR);
    $guncelleme->bindParam(4,$metakey,PDO::PARAM_STR);
    $guncelleme->bindParam(5,$metaauthor,PDO::PARAM_STR);
    $guncelleme->bindParam(6,$metaowner,PDO::PARAM_STR);
    $guncelleme->bindParam(7,$metacopy,PDO::PARAM_STR);
    $guncelleme->bindParam(8,$logoyazisi,PDO::PARAM_STR);
    $guncelleme->bindParam(9,$twit,PDO::PARAM_STR);
    $guncelleme->bindParam(10,$face,PDO::PARAM_STR);
    $guncelleme->bindParam(11,$inst,PDO::PARAM_STR);
    $guncelleme->bindParam(12,$telefonno,PDO::PARAM_STR);
    $guncelleme->bindParam(13,$adres,PDO::PARAM_STR);
    $guncelleme->bindParam(14,$mailadres,PDO::PARAM_STR);
    $guncelleme->bindParam(15,$slogan,PDO::PARAM_STR);
    $guncelleme->bindParam(16,$referansbaslik,PDO::PARAM_STR);
    $guncelleme->bindParam(17,$filobaslik,PDO::PARAM_STR);
    $guncelleme->bindParam(18,$yorumbaslik,PDO::PARAM_STR);
    $guncelleme->bindParam(19,$iletisimbaslik,PDO::PARAM_STR);
    $guncelleme->execute();

    echo '<div class="alert alert-success" role="alert">
    <strong>Site ayarları</strong> başarıyla güncellendi.
    
    </div>';
    header("refresh:2,url=control.php?sayfa=siteayarlari");

    else:
    //form işlemleri
    ?>
    <form action="control.php?sayfa=siteayarlari" method="post">

        <div class="row">
          <div class="col-lg-7 mx-auto mt-2 border-bottom">
            <h3 class="text-info">SİTE AYARLARI</h3>
          </div>
        </div>
        <!--1-->
        <div class="row">
          <div class="col-lg-7 mx-auto mt-2 border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Title</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="title" class="form-control" value="<?php echo $sonuc["title"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--2-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Meta Title</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="metatitle" class="form-control" value="<?php echo $sonuc["metatitle"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--3-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Sayfa Açıklama</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="metadesc" class="form-control" value="<?php echo $sonuc["metadesc"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--4-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Anahtar Kelimeler</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="metakey" class="form-control" value="<?php echo $sonuc["metakey"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--5-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Yapımcı</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="metaauthor" class="form-control" value="<?php echo $sonuc["metaauthor"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--6-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Firma</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="metaowner" class="form-control" value="<?php echo $sonuc["metaowner"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--7-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Copyright</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="metacopy" class="form-control" value="<?php echo $sonuc["metacopy"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--8-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Logo Yazısı</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="logoyazisi" class="form-control" value="<?php echo $sonuc["logoyazisi"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--9-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Twitter</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="twit" class="form-control" value="<?php echo $sonuc["twit"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--10-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Facebook</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="face" class="form-control" value="<?php echo $sonuc["face"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--11-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Instagram</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="inst" class="form-control" value="<?php echo $sonuc["ints"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--12-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Telefon Numarası</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="telefonno" class="form-control" value="<?php echo $sonuc["telefonno"]; ?>"/>
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--13-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Adres</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="adres" class="form-control" value="<?php echo $sonuc["adres"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--14-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Mail Adresi</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc["mailadres"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--15-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Slogan</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="slogan" class="form-control" value="<?php echo $sonuc["slogan"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--16-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Referans Başlık</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="referansbaslik" class="form-control" value="<?php echo $sonuc["referansbaslik"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--17-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Filo Başlık</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="filobaslik" class="form-control" value="<?php echo $sonuc["filobaslik"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--18-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">Yorum Başlık</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="yorumbaslik" class="form-control" value="<?php echo $sonuc["yorumbaslik"]; ?>"/>
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <!--19-->
        <div class="row">
          <div class="col-lg-7 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span id="siteayarfont">İlteişim Başlık</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="iletisimbaslik" class="form-control" value="<?php echo $sonuc["iletisimbaslik"]; ?>" />
              </div>
            </div> <!-- row -->
          </div> <!-- col-lg-7 -->
        </div> <!-- row -->
        <!---->

        <div class="col-lg-7 mx-auto mt-2 border-bottom">
          <input type="submit" name="buton" class="btn btn-info m-1" value="GÜNCELLE" />
        </div>
      
    </form>
    <?php
    endif;
  }
  //şifreleme
  function sifrele($veri){
    return base64_encode(gzdeflate(gzcompress(serialize($veri))));
  }
  //sifreleme çözme
  function coz($veri){
    return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
  }
  //kullanıcı adı alma işlemi
  function kuladial($vt){
    $cookid=$_COOKIE["kulbilgi"];
    $cozduk=self::coz($cookid);
    $sorgusonuc=self::sorgum($vt,"select * from yonetim where id=$cozduk",1);
    return $sorgusonuc["kulad"];
  }
  //giriş
  function giriskontrol($kulad,$sifre,$vt){
    $sifrelihal=md5(sha1(md5($sifre)));//şifreleme işlemleri

    $sor=$vt->prepare("select * from yonetim where kulad='$kulad' and sifre='$sifrelihal'");
    $sor->execute();

    if($sor->rowCount ()==0):
      echo'<div class="container-fluid bg-white">
           <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-danger font-10 font-weight-bold">
           <img src="load.gif" class="mr-3">BİGİLER HATALI</div>
           </div>';
      header("refresh:2,url=index.php");
    else:
      $gelendeger=$sor->fetch();
      $id=self::sifrele($gelendeger["id"]);
      setcookie("kulbilgi",$id, time() + 60*60*24); //1 günlük cookie

      $sor=$vt->prepare("update yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'");
      $sor->execute();

      echo'<div class="container-fluid bg-white">
           <div class="alert alert-white border border-success mt-5 col-md-5 mx-auto p-3 text-success font-10 font-weight-bold">
           <img src="load.gif" class="mr-3">GİRİŞ YAPILIYOR</div>
           </div>';
      header("refresh:2,url=control.php"); //giriş yapıldığı için artık control php deyiz
    endif;
  }
  //çıkış
  function cikis($vt){
    $cookid=$_COOKIE["kulbilgi"];
    $cozduk=self::coz($cookid);
    self::sorgum($vt,"update yonetim set aktif=0 where id=$cozduk",0);
    setcookie("kulbilgi",$cookid, time() - 5);
    echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">Çıkış Yapılıyor</div>';
    header("refresh:2,url=index.php");
  }
  //cookie kontrol
  function kontrolet($sayfa){
    if(isset($_COOKIE["kulbilgi"])):
      if($sayfa=="ind"): header("Location:control.php"); endif;
      
    else: 
      if($sayfa=="cont"): header("Location:index.php"); endif;
      
    endif;
  }

  /*-------INTRO AYARLARI------------*/
  //mevcut introlar getiriliyor
  function introayar($vt){ 

    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom"><h3 class="float-left mt-3 text-info">İNTRO RESİMLERİ</h3><a href="control.php?sayfa=introresimekle" class="btn btn-success m-2 float-right">+</a></div>
    ';
    
    /*$introbilgiler=$vt->prepare("select * from intro");*/
    $introbilgiler=self::sorgum($vt,"select * from intro",2);
    while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
      echo '<div class="col-lg-4">
      <div class="row border border-light p-1 m-1">
      <div class="col-lg-12">
      <img src="../'.$sonbilgi["resimyol"].'">
      </div>

      <div class="col-lg-6 text-right">
      <a href="control.php?sayfa=introresimgüncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
      </div>

      <div class="col-lg-6 text-left">
      <a href="control.php?sayfa=introresimsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
      </div>
      </div>
      </div>';
    endwhile;
    echo '</div>';
  }
  //resim ekleme
  function introresimekle($vt){ 
    echo '<div class="row text-center">
    <div class="col-lg-12">';

    if($_POST):
    /*php işlemleri
    ilk önce dosyanın boş olup olmadığına bakılır
    dosyanın boyutuna bakılır
    dosyanın uzantısına bakılır*/

     if($_FILES["dosya"]["name"]==""):
       echo'<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş Olamaz</div>';
       header("refresh:2,url=control.php?sayfa=introresimekle");
     else: //boş değilse
       if($_FILES["dosya"]["size"]>(1024*1024*5)):
         echo'<div class="alert alert-danger mt-5">Dosya Boyutu Büyük</div>';
         header("refresh:2,url=control.php?sayfa=introresimekle");
       else: //boyutta problem yoksa
         $izinverilen=array("image/png","image/jpeg");
         if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
           echo'<div class="alert alert-danger mt-5">İzin Verilen Uzantı Değil</div>';
           header("refresh:2,url=control.php?sayfa=introresimekle");
         else: //artık herşey tamam
           $dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];
           move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
           echo'<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ</div>';
           header("refresh:2,url=control.php?sayfa=introayarlari");

           $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
           //dosya yüklendikten sonra veritabanına da eklemek gerekli
           $kayitekle=self::sorgum($vt,"insert into intro(resimyol) VALUES('$dosyaminyolu2')",0);
         endif;
       endif;
      endif;
    else:
      ?>
      <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
          <div class="card-body">
            <h5 class="title border-bottom">İntro Resim Ekleme</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              *İzin verilen formatlar : jpg-png<br/>
              *İzin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
      <?php
    endif;
    echo '</div></div></div>';
  }
  //resim silme
  function introsil($vt){
    $introid=$_GET["id"];
    $verial=self::sorgum($vt,"select * from intro where id=$introid",1);

    echo '<div class="row text-center">
    <div class="col-lg-12">';

    //dosyadan silme işlemi
    unlink('../'.$verial["resimyol"]);
    //veritabanından veriyi silme
    $verial=self::sorgum($vt,"delete from intro where id=$introid",0);

    echo'<div class="alert alert-success mt-5">Silmeler Başarılı</div>';
    echo'</div></div>';

    header("refresh:2,url=control.php?sayfa=introayarlari");

  }
  //resim güncelleme
  function introresimguncelleme($vt){ 
    $gelenintroid=$_GET["id"];

    echo '<div class="row text-center">
    <div class="col-lg-12">';

    if($_POST):
    /*php işlemleri
    ilk önce dosyanın boş olup olmadığına bakılır
    dosyanın boyutuna bakılır
    dosyanın uzantısına bakılır*/
    $formdangelenid=$_POST["introid"];

     if($_FILES["dosya"]["name"]==""):
       echo'<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş Olamaz</div>';
       header("refresh:2,url=control.php?sayfa=introayarlari");
     else: //boş değilse
       if($_FILES["dosya"]["size"]>(1024*1024*5)):
         echo'<div class="alert alert-danger mt-5">Dosya Boyutu Büyük</div>';
         header("refresh:2,url=control.php?sayfa=introayarlari");
       else: //boyutta problem yoksa
         $izinverilen=array("image/png","image/jpeg");
         if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
           echo'<div class="alert alert-danger mt-5">İzin Verilen Uzantı Değil</div>';
           header("refresh:2,url=control.php?sayfa=introayarlari");
         else: //artık herşey tamam
          $resimyolunabak=self::sorgum($vt,"select * from intro where id=$gelenintroid",1);

          $dbgelenyol='../'.$resimyolunabak["resimyol"]; //dbden mevcut veri çekildi
          unlink($dbgelenyol); //dbden mevcut dosya silindi

           $dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];
           move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

           $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
           //dosya yüklendikten sonra veritabanına da eklemek gerekli
           self::sorgum($vt,"update intro set resimyol='$dosyaminyolu2' where id=$gelenintroid",0);

           echo'<div class="alert alert-success mt-5">DOSYA BAŞARIYLA GÜNCELLENDİ</div>';
           header("refresh:2,url=control.php?sayfa=introayarlari");
         endif;
       endif;
      endif;
    else:
      ?>
      <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
          <div class="card-body">
            <h5 class="title border-bottom">İntro Resim Güncelleme</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>" /></p>
              <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              *İzin verilen formatlar : jpg-png<br/>
              *İzin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
      <?php
    endif;
    echo '</div></div></div>';
  }
  /*------------INTRO AYARLARI BİTTİ----------*/

  /*------------ARAC FILOSU----------*/
  //mevcut filo araçlar getiriliyor
  function aracfilosu($vt){ 

    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom"><h3 class="float-left mt-3 text-info">ARAÇ FİLO RESİMLERİ</h3><a href="control.php?sayfa=aracfiloekle" class="btn btn-success m-2 float-right">+</a></div>
    ';
    
    $introbilgiler=self::sorgum($vt,"select * from filomuz",2);
    while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
      echo '<div class="col-lg-4">
      <div class="row border border-light p-1 m-1">
      <div class="col-lg-12">
      <img src="../'.$sonbilgi["resimyol"].'">
      </div>

      <div class="col-lg-6 text-right">
      <a href="control.php?sayfa=aracfilogüncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
      </div>

      <div class="col-lg-6 text-left">
      <a href="control.php?sayfa=aracfilosil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
      </div>
      </div>
      </div>';
    endwhile;
    echo '</div>';
  }
  //yeni araç ekleme
  function aracfilosuekle($vt){ 
    echo '<div class="row text-center">
    <div class="col-lg-12">';

    if($_POST):
    /*php işlemleri
    ilk önce dosyanın boş olup olmadığına bakılır
    dosyanın boyutuna bakılır
    dosyanın uzantısına bakılır*/

     if($_FILES["dosya"]["name"]==""):
       echo'<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş Olamaz</div>';
       header("refresh:2,url=control.php?sayfa=aracfiloekle");
     else: //boş değilse
       if($_FILES["dosya"]["size"]>(1024*1024*5)):
         echo'<div class="alert alert-danger mt-5">Dosya Boyutu Büyük</div>';
         header("refresh:2,url=control.php?sayfa=aracfiloekle");
       else: //boyutta problem yoksa
         $izinverilen=array("image/png","image/jpeg");
         if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
           echo'<div class="alert alert-danger mt-5">İzin Verilen Uzantı Değil</div>';
           header("refresh:2,url=control.php?sayfa=aracfiloekle");
         else: //artık herşey tamam
           $dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];
           move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
           echo'<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ</div>';
           header("refresh:2,url=control.php?sayfa=aracfilosu");

           $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
           //dosya yüklendikten sonra veritabanına da eklemek gerekli
           self::sorgum($vt,"insert into filomuz(resimyol) VALUES('$dosyaminyolu2')",0);
         endif;
       endif;
      endif;
    else:
      ?>
      <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
          <div class="card-body">
            <h5 class="title border-bottom">Araç Filo Resim Ekleme</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              *İzin verilen formatlar : jpg-png<br/>
              *İzin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
      <?php
    endif;
    echo '</div></div></div>';
  }
  //araç silme
  function aracfilosusil($vt){
    $introid=$_GET["id"];
    $verial=self::sorgum($vt,"select * from filomuz where id=$introid",1);

    echo '<div class="row text-center">
    <div class="col-lg-12">';

    //dosyadan silme işlemi
    unlink('../'.$verial["resimyol"]);
    //veritabanından veriyi silme
    self::sorgum($vt,"delete from filomuz where id=$introid",0);

    echo'<div class="alert alert-success mt-5">Silmeler Başarılı</div>';
    echo'</div></div>';

    header("refresh:2,url=control.php?sayfa=aracfilosu");

  }
  //araç güncelleme
  function aracfilosuguncelleme($vt){ 
    $gelenintroid=$_GET["id"];

    echo '<div class="row text-center">
    <div class="col-lg-12">';

    if($_POST):
    /*php işlemleri
    ilk önce dosyanın boş olup olmadığına bakılır
    dosyanın boyutuna bakılır
    dosyanın uzantısına bakılır*/
    $formdangelenid=$_POST["introid"];

     if($_FILES["dosya"]["name"]==""):
       echo'<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş Olamaz</div>';
       header("refresh:2,url=control.php?sayfa=aracfilosu");
     else: //boş değilse
       if($_FILES["dosya"]["size"]>(1024*1024*5)):
         echo'<div class="alert alert-danger mt-5">Dosya Boyutu Büyük</div>';
         header("refresh:2,url=control.php?sayfa=aracfilosu");
       else: //boyutta problem yoksa
         $izinverilen=array("image/png","image/jpeg");
         if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
           echo'<div class="alert alert-danger mt-5">İzin Verilen Uzantı Değil</div>';
           header("refresh:2,url=control.php?sayfa=aracfilosu");
         else: //artık herşey tamam
          $resimyolunabak=self::sorgum($vt,"select * from filomuz where id=$gelenintroid",1);

          $dbgelenyol='../'.$resimyolunabak["resimyol"]; //dbden mevcut veri çekildi
          unlink($dbgelenyol); //dbden mevcut dosya silindi

           $dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];
           move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

           $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
           //dosya yüklendikten sonra veritabanına da eklemek gerekli
           self::sorgum($vt,"update filomuz set resimyol='$dosyaminyolu2' where id=$gelenintroid",0);

           echo'<div class="alert alert-success mt-5">DOSYA BAŞARIYLA GÜNCELLENDİ</div>';
           header("refresh:2,url=control.php?sayfa=aracfilosu");
         endif;
       endif;
      endif;
    else:
      ?>
      <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
          <div class="card-body">
            <h5 class="title border-bottom">Araç Filo Resim Güncelleme</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>" /></p>
              <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              *İzin verilen formatlar : jpg-png<br/>
              *İzin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
      <?php
    endif;
    echo '</div></div></div>';
  }
  /*------------ARAC FILOSU BİTTİ----------*/

  /*------------HAKKIMIZDA AYARLARI----------*/
  //Hakkımızda ayar bölümü
  function hakkimizda($vt) {
    echo '<div class="row text-center">';
    echo '<div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HAKKIMIZDA AYARLARI</h3></div>';

    if(!$_POST){
      $sonbilgi=self::sorgum($vt,"select * from hakkimizda",1);
      echo'<div class="col-lg-6 mx-auto">
      <div class="row card-bordered p-1 m-1">
      <div class="col-lg-3 border-bottom bg-light" style="padding-top:20%; font-size:20px;">
      Resim
      </div>

      <div class="col-lg-9 border-bottom">
      <img src="../'.$sonbilgi["resim"].'"><br>
      <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="dosya">
      </div>

      <div class="col-lg-3 border-bottom bg-light pt-3" style="font-size:20px;">
      Başlık
      </div>

      <div class="col-lg-9 border-bottom">
      <input type="text" name="baslik" class="form-control m-2" value="'.$sonbilgi["baslik"].'">
      </div>

      <div class="col-lg-3 bg-light" style="padding-top:20%; font-size:20px;">
      İçerik
      </div>

      <div class="col-lg-9">
      <textarea name="icerik" class="form-control m-2" rows="8">'.$sonbilgi["icerik"].'</textarea>
      </div>

      <div class="col-lg-12 border-top">
      <input type="submit" name="guncel" value="GÜNCELLE" class="btn btn-primary m-2">
      </form>
      </div>  
      </div>';
    }
     else {
       $baslik=htmlspecialchars($_POST["baslik"]);
       $icerik=htmlspecialchars($_POST["icerik"]);

        if($_FILES['dosya']['name']!=""){
          if($_FILES['dosya']['size']<(1024*1024*5)){
            $izinverilen=array("image/png","image/jpeg");

            if(in_array($_FILES['dosya']['type'],$izinverilen)){
              $dosyaminyolu='../img/'.$_FILES['dosya']['name'];
              move_uploaded_file($_FILES['dosya']['tmp_name'],$dosyaminyolu);
              $veritabaniicin=str_replace('../','',$dosyaminyolu);
            }
          }
        }
        if(@$_FILES["dosya"]["name"]!=""){
          self::sorgum($vt,"update hakkimizda set baslik='$baslik',icerik='$icerik',resim='$veritabaniicin'",0);
          echo'
          <div class="col-lg-6 mx-auto">
          <div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI</div>
          </div>
          ';
          header("refresh:2,url=control.php?sayfa=hakkimizdaayarlari");
        }else{
          self::sorgum($vt,"update hakkimizda set baslik='$baslik',icerik='$icerik'",0);
          echo'
          <div class="col-lg-6 mx-auto">
          <div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI</div>
          </div>
          ';
          header("refresh:2,url=control.php?sayfa=hakkimizdaayarlari");

        }
        echo '</div>';
      }
  }
  /*------------HAKKIMIZDA AYARLARI BİTTİ------*/

  /*------------HİZMETLERİMİZ AYARLARI----------*/
  //hizmetler geliyor
  function hizmetler($vt){ 

    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom"><h3 class="float-left mt-3 text-info">HİZMETLERİMİZ</h3><a href="control.php?sayfa=hizmetekle" class="btn btn-success m-2 float-right">+</a></div>
    ';
    
    $introbilgiler=self::sorgum($vt,"select * from hizmetler",2);
    while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
      echo '<div class="col-lg-6">
      <div class="row border border-light p-1 m-1 bg-light">
      <div class="col-lg-11 pt-3">
      '.$sonbilgi["baslik"].'
      </div>
      
      <div class="col-lg-1 text-right">
      <a href="control.php?sayfa=hizmetgüncelle&id='.$sonbilgi["id"].'" class="fa fa-edit text-success" style="font-size:25px;"></a>
      <a href="control.php?sayfa=hizmetsil&id='.$sonbilgi["id"].'" class="fa fa-trash text-danger" style="font-size:25px;"></a>
      </div>

      <div class="col-lg-12 border-top">
      '.$sonbilgi["icerik"].'
      </div>
      </div>
      </div>';
    endwhile;
    echo '</div>';
  }
  //hizmetler ekleme
  function hizmetekleme($vt){ 

    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info"> HİZMET EKLE</h3>
    </div>';

    if(!$_POST):
      echo '<div class="col-lg-6 mx-auto">
      <div class="row border border-light p-1 m-1 bg-light">
      <div class="col-lg-2 pt-3">
      Başlık
      </div>
      <div class="col-lg-10 p-2">
      <form action="" method="post">
      <input type="text" name="baslik" class="form-control">
      </div>

      <div class="col-lg-12 border-top p-2">
      İçerik
      </div>
      <div class="col-lg-12 border-top p-2">
      <textarea name="icerik" rows="5" class="form-control"></textarea>
      </div>

      <div class="col-lg-12 border-top p-2">
      <input type="submit" name="buton" value="HİZMET EKLE" class="btn btn-primary">
      </form>
      </div>

      </div>
      </div>';
    else:
      $baslik=htmlspecialchars($_POST["baslik"]);
      $icerik=htmlspecialchars($_POST["icerik"]);

      if($baslik=="" && $icerik==""):
        echo'
          <div class="col-lg-6 mx-auto">
          <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ</div>
          </div>
          ';
          header("refresh:2,url=control.php?sayfa=hizmetlerimizayarlari");
      else:
        self::sorgum($vt,"insert into hizmetler (baslik,icerik) VALUES('$baslik','$icerik')",0);
        echo'
          <div class="col-lg-6 mx-auto">
          <div class="alert alert-success mt-5">EKLEME BAŞARILI</div>
          </div>
          ';
          header("refresh:2,url=control.php?sayfa=hizmetlerimizayarlari");
      endif;
    endif;
    echo '</div>';
  }
  //hizmet güncelleme
  function hizmetguncelleme($vt){ 

    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info"> HİZMET GÜNCELLE</h3>
    </div>';

    /* gelen id alınacak
    id ile veritabanına çıkılıp verinin bilgileri gelecek
    inputlara o veriler yazılacak
    hidden ile id post için taşınacak */

    $kayitid=$_GET["id"];
    $kayitbilgial=self::sorgum($vt,"select * from hizmetler where id=$kayitid",1);

    if(!$_POST):
      echo '<div class="col-lg-6 mx-auto">
      <div class="row border border-light p-1 m-1 bg-light">
      <div class="col-lg-2 pt-3">
      Başlık
      </div>
      <div class="col-lg-10 p-2">
      <form action="" method="post">
      <input type="text" name="baslik" class="form-control" value="'.$kayitbilgial["baslik"].'">
      </div>

      <div class="col-lg-12 border-top p-2">
      İçerik
      </div>
      <div class="col-lg-12 border-top p-2">
      <textarea name="icerik" rows="5" class="form-control">'.$kayitbilgial["icerik"].'</textarea>
      </div>

      <div class="col-lg-12 border-top p-2">
      <input type="hidden" name="kayitidsi" value="'.$kayitid.'">
      <input type="submit" name="buton" value="HİZMET GÜNCELLE" class="btn btn-primary">
      </form>
      </div>

      </div>
      </div>';
    else:
      $baslik=htmlspecialchars($_POST["baslik"]);
      $icerik=htmlspecialchars($_POST["icerik"]);
      $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);

      if($baslik=="" && $icerik==""):
        echo'
          <div class="col-lg-6 mx-auto">
          <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ</div>
          </div>
          ';
          header("refresh:2,url=control.php?sayfa=hizmetlerimizayarlari");
      else:
        self::sorgum($vt,"update hizmetler set baslik='$baslik',icerik='$icerik' where id=$kayitidsi",0);
        echo'
          <div class="col-lg-6 mx-auto">
          <div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI</div>
          </div>
          ';
          header("refresh:2,url=control.php?sayfa=hizmetlerimizayarlari");
      endif;
    endif;
    echo '</div>';
  }
  //hizmet silme
  function hizmetsil($vt){
    $kayitid=$_GET["id"];

    echo '<div class="row text-center">
    <div class="col-lg-12">';
    //veritabanından veriyi silme
    self::sorgum($vt,"delete from hizmetler where id=$kayitid",0);

    echo'<div class="alert alert-success mt-5">SİLME BAŞARILI</div>';
    echo'</div></div>';

    header("refresh:2,url=control.php?sayfa=hizmetlerimizayarlari");
  }
  /*-------HİZMETLERİMİZ AYARLARI BİTTİ--------*/

  /*-------REFERANS AYARLARI--------*/
  //mevcut referanslar getiriliyor
  function referanslar($vt){ 

    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom"><h3 class="float-left mt-3 text-info">REFERANSLAR</h3><a href="control.php?sayfa=referansekle" class="btn btn-success m-2 float-right">+</a></div>
    ';
    
    $introbilgiler=self::sorgum($vt,"select * from referanslar",2);
    while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
      echo '<div class="col-lg-2">
      <div class="row border border-light p-1 m-1">
      <div class="col-lg-12">
      <img src="../'.$sonbilgi["resimyol"].'">
      <a href="control.php?sayfa=referanssil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
      </div>
      </div>
      </div>';
    endwhile;
    echo '</div>';
  }
  //referans ekleme
  function refekleme($vt){ 
    echo '<div class="row text-center">
    <div class="col-lg-12">';

    if($_POST):

     if($_FILES["dosya"]["name"]==""):
       echo'<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş Olamaz</div>';
       header("refresh:2,url=control.php?sayfa=referansayarlari");
     else: //boş değilse
       if($_FILES["dosya"]["size"]>(1024*1024*5)):
         echo'<div class="alert alert-danger mt-5">Dosya Boyutu Büyük</div>';
         header("refresh:2,url=control.php?sayfa=referansayarlari");
       else: //boyutta problem yoksa
         $izinverilen=array("image/png","image/jpeg");
         if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
           echo'<div class="alert alert-danger mt-5">İzin Verilen Uzantı Değil</div>';
           header("refresh:2,url=control.php?sayfa=referansayarlari");
         else: //artık herşey tamam
           $dosyaminyolu='../img/referans/'.$_FILES["dosya"]["name"];
           move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
           echo'<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ</div>';
           header("refresh:2,url=control.php?sayfa=referansayarlari");

           $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
           //dosya yüklendikten sonra veritabanına da eklemek gerekli
           self::sorgum($vt,"insert into referanslar(resimyol) VALUES('$dosyaminyolu2')",0);
         endif;
       endif;
      endif;
    else:
      ?>
      <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
          <div class="card-body">
            <h5 class="title border-bottom">Referans Ekleme Formu</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              *İzin verilen formatlar : jpg-png<br/>
              *İzin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
      <?php
    endif;
    echo '</div></div></div>';
  }
  //referans silme
  function refsil($vt){
    $refid=$_GET["id"];
    $verial=self::sorgum($vt,"select * from referanslar where id=$refid",1);

    echo '<div class="row text-center">
    <div class="col-lg-12">';

    //dosyadan silme işlemi
    unlink('../'.$verial["resimyol"]);
    //veritabanından veriyi silme
    self::sorgum($vt,"delete from referanslar where id=$refid",0);

    echo'<div class="alert alert-success mt-5">Silmeler Başarılı</div>';
    echo'</div></div>';

    header("refresh:2,url=control.php?sayfa=referansayarlari");
  }
} 
?>