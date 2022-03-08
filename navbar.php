 <!-- bottom navbar (mobile) -->
 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

 <?php $page = basename($_SERVER['PHP_SELF']);?>



<nav class="nav-mobile">
    <a href="index.php" class="nav__link nav__link<?php print ($page == 'index.php') ? '--active':''?>">
        <i class="material-icons nav__icon">home</i>
        <span class="nav__text">Home</span>
    </a>
    <a href="all_products.php" class="nav__link nav__link<?php print ($page == 'all_products.php') ? '--active':''?>">
        <i class="material-icons nav__icon">inventory_2</i>
        <span class="nav__text">Products</span>
    </a>
    <a href="cart.php" class="nav__link nav__link<?php print ($page == 'cart.php') ? '--active':''?>" id="item-counter">

    </a>
</nav>