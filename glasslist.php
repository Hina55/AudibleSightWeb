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
.breadcrumb>li:after {
    font-family: FontAwesome;
    content: "/";
    font-size: 11px;
    margin-left: 3px;
    margin-right: 3px
}
#outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
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
    <!-- Display all glass from glass table -->
    <nav >
    
       <?php
function breadcrumbs($home = 'Home') {
  global $page_title; //global varable that takes it's value from the page that breadcrubs will appear on. Can be deleted if you wish, but if you delete it, delete also the title tage inside the <li> tag inside the foreach loop.
    $breadcrumb  = '<div class="breadcrumb-container" ><div class="container"><ol class="breadcrumb">';
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


<!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Smart Glasses</p>
          <div class="container text-center" style="padding-top: 5%;">
           <h1 >Welcome To Audible Sight</h2>
   <h4>Empowering people with low vision through our eyewear technology </h4>
         </div>
        </div><br><hr><br>
        




        <?php

require 'connection.php';

$sql = "SELECT * FROM glass WHERE options = 'ENABLE' ORDER BY G_ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;
include "connection.php";
  while($row = mysqli_fetch_array($result)){
    $imageURL="uploads/".$row["images_path"];
    if ($count == 0)
      echo "<div class='row portfolio-container'>";

?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-black" >
            <div class="container-fluid  pt-0 pr-0 pl-0 ">
            <div class="portfolio-wrap border border-black" >
              <img src="<?php echo $imageURL; ?>" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="<?php echo $imageURL; ?>" data-gall="portfolioGallery" class="venobox"><i class="icofont-plus-circle"></i></a>
              </div>
              

            </div>
            <div class="container p-3 text-center" >
              <form method="post" action="cart.php?action=add&id=<?php echo $row["G_ID"]; ?>">

                <h4 class="text-dark"><?php echo $row["name"]; ?></h4>
                <h6 class="text-dark"><?php echo $row["description"]; ?></h6>
                <p class="text-dark">Rs. <?php echo $row["price"]; ?>/-</p>
                <div class="container">
                <!--<span style="border: 1px solid black;">
                  <h5 class="text-dark" style="display: inline;">Quantity:</h5>
                  &nbsp;&nbsp;&nbsp;
                  <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px; display: inline;">
                  &nbsp;&nbsp;&nbsp;
                  <button type="submit" name="add" class="bx bx-cart" style="font-size: 26px; display: inline; padding: 3%; padding-top: 4%; border: 1px solid black; border-radius: 10px; background: rgba(20,20,20,0.5); color: white;"></button>
                </span> -->
                

                <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-secondary" style="background: none; cursor: none; border:none; color:black;" disabled>Quantity:</button>
                  </div>
                  <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"/>
                  </div>
                  <div class="btn-group" role="group" aria-label="Third group">
                    <button type="submit" name="add" class="bx bx-cart" title="Add to Cart" style="font-size: 26px; padding: 18%; border: 1px solid black; border-radius: 10px; background: #17a6a3; color: white;"></button>
                  </div>
                </div>




              </div>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                <input type="hidden" name="glass_image" value="<?php echo $imageURL; ?>">
                <br>
               <!-- <input type="submit" name="add" style="margin-top:3%; margin-bottom: 3%;" class="btn btn-info" value="Add to Cart"> -->
              </form>
                </div>
              </div>
          </div>


    <?php
$count++;
if($count==3)
{
  echo "</div><hr><br> ";
  $count=0;
}
}
}else
{
  ?>

  <div class="container p-5" >
    
      <center>
         <h1>Sorry! No glass is available.</h1> 
      </center>
       
    
  </div>

  <?php

}

?>
      </div>
    </section><!-- End Portfolio Section -->

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