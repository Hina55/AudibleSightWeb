<!DOCTYPE html>
<html lang="en">

<head>
<?php
include ('../session_m.php');
if(!isset($_SESSION['login_user1'])){
header("location: ../customerlogin.php"); 
}
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="shortcut icon" href="../img/bus-icon.png" />
  <title>Admin | Audible Sight</title>
  <!-- Favicons -->
  <link href="../assets/img/AS-icon.jpg" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="../index.php">
          <img src="../assets/img/logo.png" alt="" title="" style="width: 60px; height: 30px;" /></img> <span style="padding-top: 1%;">&nbsp;&nbsp;Audible Sight </span>
    </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search 
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">

      <li class="nav-item  mx-1">
        <a class="nav-link" href="adminpanel.php" role="button">
          <h5 style="font-size: 18px;">Admin</h5>
        </a>
      </li>
      
   
                <?php
if(isset($_SESSION['login_user1'])){

?>


          
            <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['login_user1']; ?> <i class="fas fa-user-circle fa-fw"> </i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          
          <!--<div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
      
<?php
}
  ?>
      
      
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="adminpanel.php">
          <i class="fas fa-fw fa-clock"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <!--  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="adminpanel.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Customers</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view-order-detail.php">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Orders</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view-glass-item.php">
          <i class="fas fa-fw fa-glasses"></i>
          <span>Glasses</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update-glass-item.php">
          <i class="fas fa-fw fa-edit"></i>
          <span>Upadte Glasses</span></a>
      </li>

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="adminpanel.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Details</li>
        </ol>


        <!-- Icon Cards-->
        <div class="row" style="padding-bottom: 4%;">
          <div class="col-sm-4" style="margin-top: 2%;">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Customer Detail</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="adminpanel.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-sm-4" style="margin-top: 2%;">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Glass Items</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view-glass-item.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-sm-4" style="margin-top: 2%;">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">Orders Detail</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view-order-detail.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-sm-4" style="margin-top: 2%;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">Add Glass Items</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="add-glass-item.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-sm-4" style="margin-top: 2%;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">Update Glass Items</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="update-glass-item.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-sm-4" style="margin-top: 2%;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Delete Glass Items</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="delete-glass-item.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Update Glass Item</div>
          <div class="card-body">
            
              <div class="form-area" style="padding: 0px 100px 100px 100px;">
                <div style="text-align: center; padding-top: 5%;">
                  <h3>Click On Glass Item Link<br><br></h3>
                </div>
    <?php
   
 

    if (isset($_GET['submit'])) {
    $G_ID = $_GET['dfid'];
    $name = $_GET['dname'];
    $price = $_GET['dprice'];
    $description = $_GET['ddescription'];
    $user_check=$_SESSION['login_user1'];

    $query = mysqli_query($conn, "UPDATE glass set
    name='$name', price='$price',
    description='$description' where G_ID='$G_ID'");
    }
    $query = mysqli_query($conn, "SELECT * FROM glass ORDER BY G_ID");
    while ($row = mysqli_fetch_array($query)) {

      ?>

      <div class="list-group" style="text-align: center";>
        <?php
      echo "<b><a href='update-glass-item.php?update= {$row['G_ID']}'>ID: {$row['G_ID']}, {$row['name']}</a></b>";  
        ?>
      </div>


    <?php
    }
    ?>
    

    <?php
    if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $query1 = mysqli_query($conn, "SELECT * FROM glass WHERE G_ID=$update");
    while ($row1 = mysqli_fetch_array($query1)) {

    ?>




        <form action="update-glass-item.php" method="GET" style="padding-top: 5%;">
        
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Edit Your Glass Item Here. </h3>

          <div class="form-group">
            <input class='input' type='hidden' name="dfid" value=<?php echo $row1['G_ID'];  ?> />
          </div>

          <div class="form-group">
            <label for="dname"><span class="text-danger" style="margin-right: 5px;">*</span> Glass Name: </label>
            <input type="message" class="form-control" id="dname" name="dname" placeholder="Your glass name" required="" value="<?=$row1['name']?>" >
          </div>     

          <div class="form-group">
            <label for="dprice"><span class="text-danger" style="margin-right: 5px;">*</span> Glass Price: </label>
            <input type="text" class="form-control" id="dprice" name="dprice" placeholder="Your glass Price" required="" value="<?=$row1['price']?>" >
          </div>

          <div class="form-group">
            <label for="ddescription"><span class="text-danger" style="margin-right: 5px;">*</span> Glass Description: </label>
            <input type="message" class="form-control" id="ddescription" name="ddescription" placeholder="Your glass Description" required="" value="<?=$row1['description']?>" >
          </div>

          <div class="form-group">
         <center> <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right" onclick="display_alert()" value="Display alert box" > Update </button>    </center>
      </div>
        </form>

    <?php
}
}


  ?>
        
        </div>
            
          </div>
          <div class="card-footer small text-muted">Last Updated at <?php $filename = 'update-glass-item.php';
            if (file_exists($filename)) {
                echo " " . date ("F d Y, H:i:s A.", filemtime($filename));
            } ?>
            </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer bg-dark text-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Audible Sight <?php echo date("Y"); ?></span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
 <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout_m.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
