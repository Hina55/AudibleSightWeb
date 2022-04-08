<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
include('login_u.php'); 
if(isset($_SESSION['login_user2'])){
header("location: glasslist.php"); 
}
if(isset($_SESSION['login_user1'])){
header("location: AdminPage/adminpanel.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | Audible Sight</title>
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
  <script>$(document).ready(function(){
    document.getElementById("cform").reset();

    $(window).bind("pageshow", function() {
  document.getElementById("username").reset();
  document.getElementById("password").reset();
});


});</script>

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
.breadcrumb>li:after {
    font-family: FontAwesome;
    content: "/";
    font-size: 11px;
    margin-left: 3px;
    margin-right: 3px
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
<nav style="background: #fff5f0;">
   
       <?php
function breadcrumbs($home = 'Home') {
  global $page_title; //global varable that takes it's value from the page that breadcrubs will appear on. Can be deleted if you wish, but if you delete it, delete also the title tage inside the <li> tag inside the foreach loop.
    $breadcrumb  = '<div class="breadcrumb-container"><div class="container"><ol class="breadcrumb">';
    $_SERVER['HTTPS'] = 'localhost';
    $root_domain = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'].'/';
  
    $breadcrumbs = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $breadcrumb .= '<li><i class="fa fa-home"></i><a href="' . $root_domain . '" title="Home Page"><span>' . $home . '</span></a></li>';
    foreach ($breadcrumbs as $crumb) {
        $link = ucwords(str_replace(array(".php","-","_"), array(""," "," "), $crumb));
        $root_domain .=  $crumb . '/';
        $breadcrumb .= '<li><a href="'. $root_domain .'" title="'.$page_title.'"><span>' . $link . '</span></a></li>';
    }
    $breadcrumb .= '</ol>';
    $breadcrumb .= '</div>';
    $breadcrumb .= '</div>';
    return $breadcrumb;
}
echo breadcrumbs();
?>

   
</nav>

    

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-down">
          <p>Login</p>
        </div>

        <div class="row justify-content-center" >

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            
            <form action="" method="post" role="form" class="myform" autocomplete="off" style="padding-bottom: 15%; padding-top: 12%;">
              <label class="text-danger" style="margin-bottom: 3%;"><span> <?php echo $error;  ?> </span></label>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" data-rule="minlen:4" required/>
                  <div class="validate"></div>
                </div>
                
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" data-rule="minlen:4" required />
                <div class="validate"></div>
              </div>


             <div class="form-group col-xs-4">
              <button style="background-color: #17a6a3;color:#ffffff;" class="btn"  name="submit" type="submit" value=" Login ">Login</button>
              
          </div>
             
             <!-- <div class="text-center"><button name="submit" type="submit">Login</button></div> -->

               <label style="margin-left: 5px;">or</label> <br>
       <label style="margin-left: 5px;color: #17a6a3;"><a style="color: #6389df;"href="customersignup.php">Create a new account.</a></label>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

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