
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <?php
        setcookie('page', basename($_SERVER['PHP_SELF']), time()+3600);
        require_once "utility/config.php";
        include "topnav.php";
    ?>



    <!-- header -->
      <div class="header-welcome">
        <h1>Search Page</h1>
            <?php include "search_bar.php";?>
      </div>

    <div class="container">
      <div class="row">
          <div class="col-12">
              <h2 class="mt-4 mb-4"></h2>
          </div>

          <?php 
            $isSearched = false;
            $searchValue = $_REQUEST['search-product'];

            //CPU table search
            $query = "select * from cpus".
            " where product_name like '%$searchValue%'";

            $result = $db->query($query);
            $resultCount = $result->num_rows;

            
            if($resultCount > 0){
                $isSearched = true;
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

            //GPU table search
            $query = "select * from gpus".
            " where product_name like '%$searchValue%'";

            $result = $db->query($query);
            $resultCount = $result->num_rows;

            
            if($resultCount > 0){
                $isSearched = true;
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

            //Ram table search
            $query = "select * from ram".
            " where product_name like '%$searchValue%'";

            $result = $db->query($query);
            $resultCount = $result->num_rows;

            
            if($resultCount > 0){
                $isSearched = true;
                for($i=0; $i<$resultCount; ++$i){
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
            }

            //Prebuilt table search
            $query = "select * from prebuilts".
            " where product_name like '%$searchValue%'";

            $result = $db->query($query);
            $resultCount = $result->num_rows;

            
            if($resultCount > 0){
                $isSearched = true;
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

            if($isSearched == false){
                echo "<h3>No results for $searchValue ...</h3>";
            }

                    
            ?>
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