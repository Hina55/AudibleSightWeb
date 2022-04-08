<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Audible Sight</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
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
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About us</a></li>
          <li><a href="#services">Features</a></li>
          <li><a href="#portfolio">Smart Glasses</a></li>
        
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" >


    <div class="header">


<!--Content before waves-->
<div class="inner-header flex pt-0">
<div class="row padding-small" style=" width: 85%;">
        <div class="col-lg-8 padding-onerem order-2 order-lg-1">
          <h1>Providing equal opportunities to blind and visually imapaired!</h1>
          <h2 class="mb-3" style="color: black;">Audible Sight - a sight for visually impaired people</h2>
          <a href="#myModal" class="btn-get-started scrollto" data-toggle="modal"><i class="bx bx-play"></i></a>
          <div id="myModal" class="modal fade" role="dialog">  
                    <div class="modal-dialog modal-lg">  
                        <div class="modal-content" >  
                            <div class="modal-header"> 
                              <h4 class="modal-title" style="color: black;">Audible Sight</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>  
                           <div class="modal-body resp-container" > <!--<iframe class="resp-iframe" id="cartoonVideo"  width="750" height="500"  type="audio/mpeg" autoplay="false" autostart="false"  muted src="assets/video/Audible-Sight.mp4" frameborder="0" allowfullscreen></iframe> -->
                            <video src="assets/video/Audible-Sight.mp4"  type="audio/mpeg" controls  width="100% auto" height="100% auto" id="cartoonVideo" allowfullscreen class="class"></video></div>  
                        </div>  
                    </div>  
                </div>
        </div>

        <div class="col-lg-3 order-1 order-lg-2 hero-img" >
          <img src="assets/img/blindman.png" class="img-fluid animated" alt="">
        </div>
        
        
      </div>
</div>


</div>
<!--Header ends-->


  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container"  >

        <div class="row justify-content-between  p-5">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/blindpic.png" class="img-fluid" alt="" data-aos="zoom-in" style="width: 340px; opacity: 85%;">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up" >Our Idea</h3>
            <p data-aos="fade-up" data-aos-delay="100" class="pt-3 text-justify">
              Audible sight is an assistive smart glass with mobile application which is a highly innovative solution for Pakistan’s visually impaired people.This project is aimed to help the blind to be more aware of their surroundings and regain their independence.
            </p>
            <div class="row">
              <div class="col-md-6 pt-3" data-aos="fade-up" data-aos-delay="100">
                <span><i class="bx bx-user-plus" style="display: inline; color: #17a6a3; font-size: 35px;"></i></span><h3 class="counter-count" style="display: inline;">2000000</h3>
                <h4 class="pt-3">Visually impaired & Blind population</h4>
              </div>
              <div class="col-md-6 pt-3" data-aos="fade-up" data-aos-delay="200">
               <span><i class="bx bx-user-plus" style="display: inline; color: #17a6a3; font-size: 35px;"></i></span><h3 class="counter-count" style="display: inline;">160000</h3>
                <h4 class="pt-3">Urdu Speaking</h4> 
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          
          <p>Features</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-user-check"></i></div>
              <h4 class="title"><a href="">Person Identification</a></h4>
              <p class="description">This feature will recognizes friends and people around them.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-images"></i></div>
              <h4 class="title"><a href="">Object Detection</a></h4>
              <p class="description">This feature will recognize the object in real time, the user will be able to know about front objects.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="icofont-magnet" style="font-size: 35px;"></i></div>
              <h4 class="title"><a href="">Native Language Support</a></h4>
              <p class="description">This feature will narrate the results in Urdu language about object detection, facial expression and person identification.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-smile"></i></div>
              <h4 class="title"><a href="">Face Expression Recognition</a></h4>
              <p class="description">This feature will recognize the expression of people and narrate the results via headphones.</p>
            </div>
          </div>

        </div>
         <div class="row justify-content-center">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Text Reading</a></h4>
              <p class="description">This feature enables blind to read text without the help of braille documents.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-palette"></i></div>
              <h4 class="title"><a href="">Color Recognition</a></h4>
              <p class="description">This feature will help blind to recognize different colors.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    

<!-- ======= Mobile Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up"> 
          <p>Mobile App.</p>
        </div>

         <div class="cards-list" data-aos="fade-up">
          <div class="card 3" style="border: none;">
              <div class="card_image"><img src="assets/img/personscreen.png" /> </div>
            </div>
           
              <div class="card 2" style="border: none;">
              <div class="card_image"><img src="assets/img/Objectscreen.png" /> </div>
            </div>

             <div class="card 1" style="border: none;">
              <div class="card_image"> <img src="assets/img/colorscreen.png" /> </div>
             </div>
       </div>
      </div>
    </section> <!-- End Mobile Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Smart Glasses</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
             <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-black">Black</li>
              <li data-filter=".filter-blue">Blue</li>
              <li data-filter=".filter-brown">Brown</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-black">
            <div class="portfolio-wrap border border-black">
              <img src="assets/img/portfolio/black11.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/black11.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Price</h4>
                <p>Rs. 10,000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-black">
            <div class="portfolio-wrap border border-black">
              <img src="assets/img/portfolio/black22.jpg" class="img-fluid" alt="">
              <div class="portfolio-links ">
                <a href="assets/img/portfolio/black22.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus-circle"></i></a>
                
              </div>
              <div class="portfolio-info">
                <h4>Price</h4>
                <p>Rs. 7,000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-brown">
            <div class="portfolio-wrap border border-black">
              <img src="assets/img/portfolio/brown11.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/brown11.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="icofont-plus-circle"></i></a>
                
              </div>
              <div class="portfolio-info">
                <h4>Price</h4>
                <p>Rs. 10,000</p>
              </div>
            </div>
          </div>

         <div class="col-lg-4 col-md-6 portfolio-item filter-blue">
            <div class="portfolio-wrap border border-black">
              <img src="assets/img/portfolio/blue11.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/blue11.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Price</h4>
                <p>Rs. 12,000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-blue">
            <div class="portfolio-wrap border border-black">
              <img src="assets/img/portfolio/blue22.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/blue22.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Price</h4>
                <p>Rs. 9,000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-black">
            <div class="portfolio-wrap border border-black">
              <img src="assets/img/portfolio/black33.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/black33.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Price</h4>
                <p>Rs. 15,000</p>
              </div>
            </div>
          </div>


        </div> 
<div class="orderblock">
   
    <center><a class="btn btn-lg text-white orderbutton" href="customerlogin.php" role="button"> Order Now </a></center>
    </div>

      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          
          <p>Meet Our Team</p>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member" style="background-color: transparent;">
              <img src="assets/img/team/girl-user.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Fareena Imran</h4>
                  <span>Web Developer</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <h5>Fareena Imran</h5>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="member" style="background-color: transparent;">
              <img src="assets/img/team/girl-user.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Hina Alla-ud-din</h4>
                  <span>Web Developer</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <h5>Hina Alla-ud-din</h5>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="member" style="background-color: transparent;">
              <img src="assets/img/team/girl-user.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Jaweria Kamran</h4>
                  <span>Web Developer</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <h5>Jaweria Kamran</h5>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="member" style="background-color: transparent;">
              <img src="assets/img/team/girl-user.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mariam Safdar</h4>
                  <span>Web Developer</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <h5>Mariam Safdar</h5>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->


    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Contact Us</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Jinnah University for Women Nazimabad, Karachi</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>audible-sight@example.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>(92-21)36620857-59</p>
              </div>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="section-bg bg-dark text-white">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
            <h3>Audible Sight</h3>
            <p>
              Jinnah University for Women<br>
              Nazimabad, Karachi<br>
              Pakistan <br><br>
              <strong>Phone:</strong> (92-21)36620857-59<br>
              <strong>Email:</strong> audible-sight@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Features</a></li>
             
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
            <h4>Our Social Networks</h4>
            <p>Connect with us!</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-youtube"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-google"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-linkedin"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

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