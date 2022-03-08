<!-- website brand -->
<?php
    require_once "utility/config.php";
?>


<div class="fixed-top navbar navbar-expand-lg navbar-light">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php">Bryan's PC Parts</a>
    <div class="float-right">
    <span class="user"><i class="user-icon material-icons nav__icon">account_circle</i>
        <a href="#" style="text-decoration: none; color: white;" data-bs-toggle="modal" data-bs-target="#userModal"><?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : "Guest"; ?>
        </a>
    </span>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">User Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php 
            if(isset($_SESSION['username'])){
                echo '<p>You are currently logged in as '. $_SESSION['username']. '</p>';
            }else{
                echo '<p>You are currently logged in as a Guest </p>';
            }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <?php 
            if(isset($_SESSION['username'])){
                echo '<a href="logout.php" type="button" class="btn btn-primary">Logout</a>';
            }else{
                echo '<a href="login.php" type="button" class="btn btn-primary">Login</a>';
            }
        ?>

      </div>
    </div>
  </div>
</div>