<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('f_news.db');
    }
}

$db = new MyDB();



$news_sql = "SELECT * FROM news";
$news_result = $db->query($news_sql);

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
            <div class="col-lg-12">
                <?php
                
                    while ($row = $news_result->fetchArray()) { ?>
                        <h1 class="mt-4"><?php echo $row['news_title']; ?></h1>
                        <hr>
                        <img class="img-fluid rounded" src="images/<?php echo $row["news_image_large"]; ?>" alt="">
                        <hr>
                        <p class="lead"><?php echo $row['news_detail']; ?></p>
                        <p><?php echo $row['news_content']; ?></p>
                <?php
                    }
                
                ?>
                <hr>

                

            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Fatih News 2020</p>
        </div>
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>