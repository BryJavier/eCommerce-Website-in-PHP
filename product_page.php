
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
    
    <!-- Product Container -->
    <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">

                        <?php 
                            $query = 'select * from '. $_COOKIE['product_category']. ' where product_name = "'. $_COOKIE['product_name']. '"';
                            $result = $db->query($query);
                            $resultCount = $result->num_rows;
                
                            if($resultCount > 0){
                                $row = $result->fetch_assoc();
                                echo '<div class="preview-pic tab-content">';
                                    echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                                    echo '<div class="tab-pane active" id="pic-1"><img src="'.$row['product_image'].'" /></div>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="details col-md-6">';
                                    echo'<h3 class="product-title" id="product-name">'.$row['product_name'].'</h3>';
                            }
                        ?>
						
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>

                        <?php 
                            echo '<p class="product-description">'.$row['product_description'].'</p>';
                            echo '<h4 class="price">PRICE: <span>₱</span> <span id="product-price" aria-label="'.$row['price'].'">'.number_format($row['price'],2).'</span></h4>';
                        
                        ?>
                        <span>Quantity: <input type="number" id="qty" style="width: 50px; margin: 10px;" min="1" value="1"> </span> 
						<div class="action">
							<button id="add-to-cart-product" class="add-to-cart btn btn-primary" type="button">add to cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

     <!-- Related Products -->
     <div class="container">
      <div class="row">
          <div class="col-12">
              <h2 class="mt-4 mb-4">Related Products</h2>
          </div>

          <?php 
            $query = 'select * from '. $_COOKIE['product_category']. ' where product_name <> "'. $row['product_name']. '"';
            $result = $db->query($query);
            $resultCount = $result->num_rows;

            if($resultCount > 0 && $resultCount > 2){
                for($i=0; $i<3; ++$i){
                    $row = $result->fetch_assoc();
                    echo '<div class="col-md-6 col-lg-4">';
            
                    echo '<div class="card-box">';
                    echo '<div class="card-thumbnail">';
                        echo '<span id="product-image" style="display:none">'.$row['product_image'].'</span>';
                        echo '<img src="'.$row['product_image'].'" class="img-fluid" alt="image not found">';
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="'.$_COOKIE['product_category'].'">'.$row['product_name'].'</a></h3>';
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
                        echo '<h3><a href="product_page.php" class="mt-2 text-secondary" id="product-name" aria-label="'.$_COOKIE['product_category'].'">'.$row['product_name'].'</a></h3>';
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


    <?php
         include "navbar.php";
    ?>
    <script src="js/cart.js" type="text/javascript"></script>
    <script src="js/navbar.js" type="text/javascript"></script>
    <script src="js/product.js" type="text/javascript"></script>
      
</body>
</html>