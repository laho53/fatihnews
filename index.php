<?php


// DB QUERIES
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('f_news.db');
    }
}

$db = new MyDB();

$getType_1 = "SELECT * FROM news WHERE news_type=1";
$getType_2 = "SELECT * FROM news WHERE news_type=2";
$getType_3 = "SELECT * FROM news WHERE news_type=3";

$result_1 = $db->query($getType_1);
$result_2 = $db->query($getType_2);
$result_3 = $db->query($getType_3);

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fatih News</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/home.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Fatih News</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Anasayfa
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kategoriler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="haberler.php">Haberler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="yazarlar.php">Yazarlar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="iletisim.php">Iletisim</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
    <div class="col-md-12"><hr><h1 class="my-4">Dünya Genelinde Canlı Veriler
        </h1></div>
      <div class="col-md-12" id="player"></div>
      

      <div class="col-md-12">
        <h1 class="my-4">Turkiye'den COVID-19 Haberleri
        </h1>
        <hr>
      </div>

      
      <div class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/banner1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/banner2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/banner3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Onceki</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Soonraki</span>
          </a>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-8">
        <?php
          while ($row = $result_1->fetchArray()) { ?>
            <div class="card mb-4">
              <img class="card-img-top" src="images/<?php echo $row['news_image_large']; ?>" alt="<?php echo $row['news_title']; ?>">
              <div class="card-body">
                <h2 class="card-title"><?php echo $row['news_title']; ?></h2>
                <?php if ($row['news_is_breaking'] == 1) { ?>
                  <span class="badge badge-pill badge-danger">Son Dakika</span></h2>
                <?php  } ?><br /><br />
                <p class="card-text"><?php echo $row['news_detail']; ?></p>
                <a href="haber_detay.php?id=<?php echo $row['news_id']; ?>" class="btn btn-info float-right">Devamini Oku &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                16 Nisan 2020 -
                <a href="#">Fatih Gur</a>
              </div>
            </div>
        <?php
          }
        
        ?>

      </div>

      <div class="col-md-4">
        <?php
          while ($row = $result_2->fetchArray()) { ?>
            <div class="card my-4">
              <div class="card h-100">
                <div class="card-body">
                  <h2 class="card-title"><?php echo $row['news_title']; ?></h2>
                  <img class="right-card-image" src="images/<?php echo $row["news_image_small"]; ?>" width="75" height="75">
                  <p class="card-text"><?php echo $row['news_detail']; ?></p>
                  <a href="haber_detay.php?id=<?php echo $row['news_id']; ?>" class="btn btn-info float-right">Devamini Oku &rarr;</a>
                </div>
              </div>
            </div>
        <?php
          }
        
        ?>
      </div>
    </div>

    <h2>Dunyadan COVID-19 Haberleri</h2>
    <hr>
    <div class="row text-center">

      <?php
        while ($row = $result_3->fetchArray()) { ?>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
              <img class="card-img-top" src="images/<?php echo $row['news_image_small']; ?>" alt="">
              <div class="card-body">
                <h4 class="card-title"><?php echo $row['news_title']; ?></h4>
                <p class="card-text"><?php echo $row['news_detail']; ?></p>
              </div>
              <div class="card-footer">
                <a href="haber_detay.php?id=<?php echo $row['news_id']; ?>" class="btn btn-info">Devamini Oku &rarr;</a>
              </div>
            </div>
          </div>
      <?php
        }
      
      ?>

    </div>
  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Fatih News 2020</p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>

      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          playerVars: {
                    autoplay: 1,
                    loop: 1,
                    controls: 0,
                    showinfo: 0,
                    autohide: 1,
                    modestbranding: 1,
                    vq: 'hd1080'},
          videoId: 'x6UiR9Rs6dA',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      function onPlayerReady(event) {
        event.target.playVideo();
        player.mute();
      }

      var done = false;
      function onPlayerStateChange(event) {
        
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>

</body>

</html>