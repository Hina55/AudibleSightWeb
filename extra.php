<script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
</script>

<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['login_user2'])){
  header("location: customerlogin.php"); 
}
?>
<?php
if (isset($_POST["add"])){
  $new_item_id = $_GET["id"];
  $item_array = [
    'glass_id' => $new_item_id,
    'glass_name' => $_POST["hidden_name"],
    'glass_price' => $_POST["hidden_price"],
    'glass_quantity' => $_POST["quantity"]
  ];
  if (isset($_SESSION["cart"]) && isset($_SESSION["cart"][$new_item_id])){
    $_SESSION["cart"][$new_item_id]['glass_quantity'] += $item_array['glass_quantity'];
  }
  else{
    $_SESSION["cart"][$new_item_id] = $item_array;
  }


}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["cart"] as $keys => $values)
    {
      if($values["glass_id"] == $_GET["id"])
      {
        unset($_SESSION["cart"][$keys]);
       // echo '<script>alert("glass has been removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "empty")
  {
    foreach($_SESSION["cart"] as $keys => $values)
    {

      unset($_SESSION["cart"]);
      //echo '<script>alert("Cart is made empty!")</script>';
      echo '<script>window.location="cart.php"</script>';

    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Smart Glasses | Audible Sight</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/AS-icon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

<style type="text/css">
html,
body {
   margin:0;
   padding:0;
   height:100%;
}
main {
  width: 100%;
  overflow:auto;
  padding-bottom:150px; /* this needs to be bigger than footer height*/
  background-color: #fff5f0;

}

footer {
  position: relative;
  clear:both;
}
.bloc_left_price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 150%;
}
.category_block li:hover {
    background-color: #007bff;
}
.category_block li:hover a {
    color: #ffffff;
}
.category_block li a {
    color: #343a40;
}
.add_to_cart_block .price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 200%;
    margin-bottom: 0;
}
.add_to_cart_block .price_discounted {
    color: #343a40;
    text-align: center;
    text-decoration: line-through;
    font-size: 140%;
}
.product_rassurance {
    padding: 10px;
    margin-top: 15px;
    background: #ffffff;
    border: 1px solid #6c757d;
    color: #6c757d;
}
.product_rassurance .list-inline {
    margin-bottom: 0;
    text-transform: uppercase;
    text-align: center;
}
.product_rassurance .list-inline li:hover {
    color: #343a40;
}
.reviews_product .fa-star {
    color: gold;
}
.pagination {
    margin-top: 20px;
}
</style>

</head>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">

    <div class="container-fluid d-flex">

       <div class="logo">
        <a href="index.php"><img src="assets/img/logo.png" alt="" title="" style="width: 65px;" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span style="font-size: 20px;">Audible Sight</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block mr-5">
        <ul>
          <li><a href="contactus.php">Contact us</a></li>
        
        
          <?php
if(isset($_SESSION['login_user1'])){

?>


          
            <li><a href="#"><span class="bx bx-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="AdminPage/adminpanel.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="AdminPage/logout_m.php"><span class="bx bx-log-out"></span> Log Out </a></li>
      
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           
            <li><a href="#"><span class="bx bx-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="glasslist.php"><span class="bx bx-glasses-alt"></span> Glass Zone </a></li>
            <li><a href="cart.php"><span class="bx bx-cart"></span> Cart
              (<?php
              
                      function getCartQty()
              {
                  # If there is nothing in the cart, return 0
                  if(empty($_SESSION['cart']))
                  {
                      return 0;
                  }
                  # Store array
                  $qty = array();
                  # Loop items in cart
                  foreach($_SESSION["cart"] as $item){
                      # Store the quantity of each item
                      $qty[] =  $item['glass_quantity'];
                  }
                  # Return the sum
                  return array_sum($qty);
              }
          
           echo  getCartQty();
            
              ?>)
             </a></li>
            <li><a href="logout_u.php"><span class="bx bx-log-out"></span> Log Out </a></li>
         
  <?php        
}
else {

  ?>

                
              <li> <a href="customersignup.php"><span class="bx bx-user-plus" style="font-size: 17px;"></span> Sign-up</a></li>
              
              <li> <a href="customerlogin.php"><span class="bx bx-log-in"></span> Login</a></li>
             
            
      

<?php
}
?>
          <!--<li class="get-started"><a href="#about">Get Started</a></li> -->
      
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  <main id="main">

      <div class="container" style="padding-top: 6%;">
        <div class="section-title" data-aos="fade-up">
          <p>Shopping Cart</p>
        </div><br><br>


      </div>


<?php
      if(!empty($_SESSION["cart"]))
      {
        ?>
    <!-- Display all glass from glass table -->
<div class="container mb-4">
    <div class="row" style="width: 100% auto;">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead style="background: #17a6a3; color: white;">
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th scope="col" class="text-right">Order Total</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>

            <?php  

            $total = 0;
            foreach($_SESSION["cart"] as $keys => $values)
            {
              ?>
                    <tbody>
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td><?php echo $values["glass_name"]; ?></td>
                            
                            <td class="text-center"><?php echo $values["glass_quantity"];?></td>
                            <td class="text-right">Rs. <?php echo $values["glass_price"]; ?></td>
                            <td class="text-right">Rs. <?php echo number_format($values["glass_quantity"] * $values["glass_price"], 2); ?></td>
                            <td class="text-right"><a href="cart.php?action=delete&id=<?php echo $values["glass_id"]; ?>"><button class="btn" onclick="alert('Glass has been removed')"><span class="text-danger">Remove</span></button></a></td>
                        </tr>
                        
                        <?php 
              include "connection.php";
              $total = $total + ($values["glass_quantity"] * $values["glass_price"]);
            }
            ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>Rs. <?php echo number_format($total, 2); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <center><a href="cart.php?action=empty">
            <button class="btn text-white" style="margin-top: 2%; background: #17a6a3;" onclick="alert('Cart is made empty!')"><span class="bx bx-Trash"></span> Empty Cart</button>
          </a>&nbsp;&nbsp;
          <a href="glasslist.php">
            <button class="btn text-white" style="margin-top: 2%; background: #17a6a3;">Continue Shopping</button>
          </a>&nbsp;&nbsp;
          <a href="payment.php">
            <button class="btn text-white" style="margin-top: 2%; background: #17a6a3;"><span class="bx bx-Fast-Forward"></span> Check Out</button>
          </a>
          </center>
</div>
<?php
    }
    if(empty($_SESSION["cart"]))
    {
      ?>
      <div class="jumbotron">
        <div class="container text-center">
          <h1 style="font-size: 40px; padding-top: 4%;">Your Shopping Cart</h1>
          <p>Your Cart is Empty. <br>Go back and <a href="glasslist.php">order now.</a></p>
          
        </div>
        
      </div>
      <?php
    }
    ?>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="section-bg bg-dark text-white">

    <div class="container py-4">
      <div class="copyright">
        &copy; <strong><span>Audible Sight</span></strong>. All Rights Reserved
      </div>
      <div class="credits text-white">
        
        Designed by <a href="#">Audible Sight Team</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/video.js"></script>
 
</body>

</html>