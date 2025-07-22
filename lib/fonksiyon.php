<?php
// Veritabanına bağlanma işlemi
try {
  $baglanti = new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8mb4", "root", "");
  $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die($e->getMessage());
}

// Ayarlar Class
class kurumsal {
  public $normaltitle, $metatitle, $metadesc, $metakey, $metaauthor, $metaown, $metacopy, $logoyazi, $tvit, $face, $ints, $telno, $mailadres, $normaladres, $slogan, $referansbaslik, $filobaslik, $yorumbaslik, $iletisimbaslik, $hizmetlerbaslik;

  function __construct() {
    try {
      $baglanti = new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8mb4", "root", "");
      $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage());
    }

    $ayarcek = $baglanti->prepare("SELECT * FROM ayarlar");
    $ayarcek->execute();
    $sorguson = $ayarcek->fetch();

    $this->normaltitle = $sorguson["title"];
    $this->metatitle = $sorguson["metatitle"];
    $this->metadesc = $sorguson["metadesc"];
    $this->metakey = $sorguson["metakey"];
    $this->metaauthor = $sorguson["metaauthor"];
    $this->metaown = $sorguson["metaowner"];
    $this->metacopy = $sorguson["metacopy"];
    $this->logoyazi = $sorguson["logoyazisi"];
    $this->tvit = $sorguson["twit"];
    $this->ints = $sorguson["ints"];
    $this->telno = $sorguson["telefonno"];
    $this->mailadres = $sorguson["mailadres"];
    $this->normaladres = $sorguson["adres"];
    $this->slogan = $sorguson["slogan"];
    $this->referansbaslik = $sorguson["referansbaslik"];
    $this->filobaslik = $sorguson["filobaslik"];
    $this->yorumbaslik = $sorguson["yorumbaslik"];
    $this->iletisimbaslik = $sorguson["iletisimbaslik"];
    $this->hizmetlerbaslik = $sorguson["hizmetlerbaslik"];
  }

  function introbak($baglanti) {
    $introal = $baglanti->prepare("SELECT * FROM intro");
    $introal->execute();

    while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="item" style="background-image:url(' . $sonucum["resimyol"] . ');"></div>';
    }
  }

  function hakkimizda($baglanti) {
    $introal = $baglanti->prepare("SELECT * FROM hakkimizda");
    $introal->execute();

    $sonucum = $introal->fetch();

    echo '<div class="row">
      <div class="col-lg-6 hakkimiz-img">
        <img src="' . $sonucum["resim"] . '" alt="' . $sonucum["resim"] . '-Hakkında"/>
      </div>
      <div class="col-lg-6 content">
        <h2>' . $sonucum["baslik"] . '</h2>
        <h3>' . $sonucum["icerik"] . '</h3>
      </div>
    </div>';
  }

  function hizmetler($baglanti) {
    $introal = $baglanti->prepare("SELECT * FROM hizmetler");
    $introal->execute();

    echo '<div class="section-header">
      <h2>HİZMETLERİMİZ</h2>
      <p>'; echo $this->hizmetlerbaslik; echo '</p>
    </div>
    <div class="row">';

    while($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):
      echo'<div class="col-lg-6">
        <div class="box wow fadeInTop">
          <div class="icon"><i class="fa fa-certificate"></i></div>
          <h4 class="title"><a href="#">' . $sonucum["baslik"] . '</a></h4>
          <p class="description">' . $sonucum["icerik"] . '</p>
        </div>
      </div>';
    endwhile;
    echo'</div>';
  }

  function referans($baglanti) {
    $introal = $baglanti->prepare("SELECT * FROM referanslar");
    $introal->execute();

    echo '<div class="section-header">
      <h2>Referanslar</h2>
      <p>' . $this->referansbaslik . '</p>
    </div>';

    echo '<div class="owl-carousel clients-carousel">';

    while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) {
      echo '<img src="' . $sonucum["resimyol"] . '" alt="Referans - ' . $sonucum["id"] . '" />';
    }

    echo '</div>';
  }

  function filomuz($baglanti) {
    $introal = $baglanti->prepare("SELECT * FROM filomuz");
    $introal->execute();

    echo '<div class="container">
      <div class="section-header">
        <h2>Araçlarımız</h2>
        <p>' . $this->filobaslik . '</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row no-gutters">';

    while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="col-lg-3 col-md-4">
        <div class="filo-item wow fadeInUp">
          <a href="' . $sonucum["resimyol"] . '" class="filo-popup">
            <img src="' . $sonucum["resimyol"] . '" alt="Referans-' . $sonucum["id"] . '" />
            <div class="filo-overlay"></div>
          </a>
        </div>
      </div>';
    }

    echo '</div></div>';
  }

  function yorumlar($baglanti) {
    $introal = $baglanti->prepare("SELECT * FROM yorumlar");
    $introal->execute();

    echo '<div class="section-header">
      <h2>Müşterİ Yorumları</h2>
      <p>' . $this->yorumbaslik . '</p>
    </div>
    <div class="owl-carousel testimonials-carousel">';

    while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="testimonial-item">
        <p>
          <img src="img/sol.png" class="quote-sign-left" />
          ' . $sonucum["icerik"] . '
          <img src="img/sag.png" class="quote-sign-right" />
        </p>
        <img src="img/yorum.jpg" class="testimonial-img" alt="Müşteri Yorum-' . $sonucum["id"] . '" />
        <h3>' . $sonucum["isim"] . '</h3>
      </div>';
    }

    echo '</div>';
  }
}
?>
