<?php
session_start();

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Order | Audible Sight</title>
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




    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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
    <!-- Display all glass from glass table -->


<!-- ======= Payment Section ======= -->
   

<?php
 include "connection.php";
 $total = 0;
$gtotal = 0;
 

  if(!isset($_SESSION["rand"])) {
    $_SESSION["rand"] = rand(100000,999999);
    $num=$_SESSION["rand"];
  }
 

if(!empty($_SESSION["cart"])){
  foreach($_SESSION["cart"] as $keys => $values)
  {

    $G_ID = $values["glass_id"];
    $glassname = $values["glass_name"];
    $quantity = $values["glass_quantity"];
    $price =  $values["glass_price"];
    $total = $total + ($values["glass_price"]);
    //$V_ID = $values["V_ID"];
    $username = $_SESSION["login_user2"];
    $order_date = date('Y-m-d');
    
    $gtotal = $gtotal + $total;
    

     $query = "INSERT INTO ORDERS (G_ID, glassname, price,  quantity, order_date, username, order_number) 
              VALUES ('" . $G_ID . "','" . $glassname . "','" . $price . "','" . $quantity . "','" . $order_date . "','" . $username . "', '" . $num . "')";
             

              $success = $conn->query($query);   

?>

 <section id="portfolio" class="portfolio section-bg" style="padding-top: 8%; padding-bottom: 6%;">
      <div class="container" >

        <div class="section-title" data-aos="fade-up">
          <p data-aos="fade-up">Order</p>
          <div class="container text-center" style="padding-top: 5%;">
           <h1 >Order placed Successfully </h1>
           <h4>Thank you!! For ordering at Audible Sight.The Ordering process in now complete.</h4>
         </div>
      
        <br><br>
      
   
<h3 class="text-center"> <strong>Your Order Number:</strong> <span style="color: blue;"><?php echo  $_SESSION["rand"]; ?></span> </h3>

   
      </section>


<?php


      if ($success) {
            unset($_SESSION["cart"]);
           }     

      if(!$success)
      {
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>

        <?php
      }
      
  }
  unset($_SESSION["cart"]);
}
else
{?>
       <div class="section-title" data-aos="fade-up" style="margin-top: 10%; margin-bottom: 10%;">
          <p data-aos="fade-up">Order</p>
          <div class="container text-center" style="padding-top: 5%;">
           <h1 >You have not placed any order!! </h1>
           </div>
         </div>
<?php }

        ?>


   
      </div><!-- ======= Container ======= -->
<!-- ======= Payment Section ======= -->

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