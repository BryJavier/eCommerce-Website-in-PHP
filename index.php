<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bryan's PC Parts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <?php
        setcookie('page', basename($_SERVER['PHP_SELF']), time()+3600);
        require_once "utility/config.php";
        include "topnav.php";
    ?>
 
    <!-- carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/carousel-image-1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carousel-image-2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carousel-image-3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <!-- header -->
      <div class="header-welcome">
        <h1>Popular PC Parts</h1>
      </div>

    <!-- products -->
    <div class="products d-flex flex-wrap justify-content-evenly bd-highlight">
        <div class="product-img p-2 bd-highlight">
            <div class="container">
              <a href="product_category.php" id="view-more" aria-label="prebuilts">
                <div class="overlay">
                  <div class="text" id="category">Pre-Builts</div>
                </div>
              </a>
                <img src="img/homepage-products-1.jpg" alt="pre-builts" class="image">
            </div>
        </div>
        <div class="product-img p-2 bd-highlight">
            <div class="container">
                <a href="product_category.php" id="view-more" aria-label="cpus">
                  <div class="overlay">
                    <div class="text" id="category">CPUs</div>
                  </div>
                </a>
                <a href="product_category.php" title="cpu"><img src="img/homepage-products-2.jfif" alt="cpu" class="image"></a>
            </div>
        </div>
        <div class="product-img p-2 bd-highlight">
            <div class="container">
                <a href="product_category.php" id="view-more" aria-label="gpus">
                  <div class="overlay">
                    <div class="text" id="category">GPUs</div>
                  </div>
                </a>
                <a href="product_category.php" title="gpu"><img src="img/homepage-products-3.png" alt="gpu" class="image"></a>
            </div>
        </div>
        <div class="product-img p-2 bd-highlight">
            <div class="container">
                <a href="product_category.php" id="view-more" aria-label="ram">
                  <div class="overlay">
                    <div class="text" id="category">Ram</div>
                  </div>
                </a>
                <a href="product_category.php" title="ram"><img src="img/homepage-products-4.jpg" alt="ram" class="image"></a>
            </div>
        </div>
    </div>
    
    <!-- View More Products -->
    <div class="view-more">
        <h4>Click This To View More Products</h4>
        <h4 class="material-icons nav__icon">arrow_downward</h4>
    </div>

    <?php
         include "navbar.php";
    ?>
    <script src="js/cart.js" type="text/javascript"></script>
    <script src="js/navbar.js" type="text/javascript"></script>
    <script src="js/product.js" type="text/javascript"></script>
</body>
</html>

