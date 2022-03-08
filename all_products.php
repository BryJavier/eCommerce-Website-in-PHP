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
    <link rel="stylesheet" href="css/products.css">
</head>
<body>

    <?php
        setcookie('page', basename($_SERVER['PHP_SELF']), time()+3600);
        
        require_once "utility/config.php";
        include "topnav.php";
    ?>



    <!-- header -->
      <div class="header-welcome">
        <h1>All Products</h1>

            <?php include "search_bar.php"?>
      </div>

    <!-- CPUs -->
    <div class="container">
      <div class="row">
          <div class="col-12">
              <h2 class="mt-4 mb-4" id="category">CPUs</h2>
          </div>

          <?php 
            $result = $db->query("select * from cpus");
            $resultCount = $result->num_rows;

            if($resultCount > 0 && $resultCount > 2){
                for($i=0; $i<3; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="cpus">'.$row['product_name'].'</a></h3>';
                        echo '<p class="text-secondary">'.$row['currency'].' <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></p>';
                        echo '<button class="btn btn-md btn-primary float-right" id="add-to-cart">Add To Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }else{
                for($i=0; $i<$resultCount; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="cpus">'.$row['product_name'].'</a></h3>';
                        echo '<p class="text-secondary">'.$row['currency'].' <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></p>';
                        echo '<button class="btn btn-md btn-primary float-right" id="add-to-cart">Add To Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
                    
            ?>
    </div>
        
    <div class="view-more">
        <a href="product_category.php" id="view-more" aria-label="cpus">Click Here To View More CPUs</a>
    </div>
 
    

     <!-- GPUs -->
     <div class="container">
      <div class="row">
          <div class="col-12">
              <h2 class="mt-4 mb-4" id="category">GPUs</h2>
          </div>

          <?php 
            $result = $db->query("select * from gpus");
            $resultCount = $result->num_rows;

            if($resultCount > 0 && $resultCount > 2){
                for($i=0; $i<3; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="gpus">'.$row['product_name'].'</a></h3>';
                        echo '<p class="text-secondary">'.$row['currency'].' <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></p>';
                        echo '<button class="btn btn-md btn-primary float-right" id="add-to-cart">Add To Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }else{
                for($i=0; $i<$resultCount; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="gpus">'.$row['product_name'].'</a></h3>';
                        echo '<p class="text-secondary">'.$row['currency'].' <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></p>';
                        echo '<button class="btn btn-md btn-primary float-right" id="add-to-cart">Add To Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
      
    </div>
    </div>
    <div class="view-more">
        <a href="product_category.php" id="view-more" aria-label="gpus">Click Here To View More GPUs</a>
    </div>

     <!-- Ram -->
     <div class="container">
      <div class="row">
          <div class="col-12">
              <h2 class="mt-4 mb-4" id="category">Ram</h2>
          </div>


          <?php 
            $result = $db->query("select * from ram");
            $resultCount = $result->num_rows;

            if($resultCount > 0 && $resultCount > 2){
                for($i=0; $i<3; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="ram">'.$row['product_name'].'</a></h3>';
                        echo '<p class="text-secondary">'.$row['currency'].' <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></p>';
                        echo '<button class="btn btn-md btn-primary float-right" id="add-to-cart">Add To Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }else{
                for($i=0; $i<$resultCount; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="prebuilts">'.$row['product_name'].'</a></h3>';
                        echo '<p class="text-secondary">'.$row['currency'].' <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></p>';
                        echo '<button class="btn btn-md btn-primary float-right" id="add-to-cart">Add To Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
      
    </div>
    </div>
    <div class="view-more">
        <a href="product_category.php" id="view-more" aria-label="ram">Click Here To View More Ram</a>
    </div>

    <!-- Prebuilts -->
    <div class="container">
      <div class="row">
          <div class="col-12">
              <h2 class="mt-4 mb-4" id="category">Pre Builts</h2>
          </div>

          <?php 
            $result = $db->query("select * from prebuilts");
            $resultCount = $result->num_rows;

            if($resultCount > 0 && $resultCount > 2){
                for($i=0; $i<3; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="prebuilts">'.$row['product_name'].'</a></h3>';
                        echo '<p class="text-secondary">'.$row['currency'].' <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></p>';
                        echo '<button class="btn btn-md btn-primary float-right" id="add-to-cart">Add To Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }else{
                for($i=0; $i<$resultCount; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="#" class="mt-2 text-secondary" id="product-name" aria-label="prebuilts">'.$row['product_name'].'</a></h3>';
                        echo '<p class="text-secondary">'.$row['currency'].' <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></p>';
                        echo '<button class="btn btn-md btn-primary float-right" id="add-to-cart">Add To Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
      
    </div>
    </div>

    <div class="view-more">
        <a href="product_category.php" id="view-more" aria-label="prebuilts">Click Here To View More Prebuilts</a>
    </div>
    </div>

    <?php
         include "navbar.php";
    ?>
    <script src="js/cart.js" type="text/javascript"></script>
    <script src="js/navbar.js" type="text/javascript"></script>
    <script src="js/product.js" type="text/javascript"></script>
      
</body>
</html>
