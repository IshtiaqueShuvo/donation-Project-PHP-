<?php
if(!isset($_SESSION)) session_start();
include_once ("../../vendor/autoload.php");


$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];

include_once ("../../includes/head_admin.php");

?>

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="dashboard.php">Donation System</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="javascript:;">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="" href="../authentication/logout.php?user=clothDonator">Logout</a>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="cloth_list.php">
          <i class="fas fa-fw fa-bars"></i>
          <span>Cloth List</span>
        </a>
      </li>

        <li class="nav-item active">
            <a class="nav-link" href="add_cloth.php">
                <i class="fas fa-fw fa-plus"></i>
                <span>Donate Cloth</span>
            </a>
        </li>

<!--      <li class="nav-item dropdown">-->
<!--        <a class="nav-link dropdown-toggle" href="javascript:;" id="volunteerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--          <i class="fas fa-fw fa-folder"></i>-->
<!--          <span>Volunteer</span>-->
<!--        </a>-->
<!--        <div class="dropdown-menu" aria-labelledby="volunteerDropdown">-->
<!--          <a class="dropdown-item" href="#">Volunteer List</a>-->
<!--          <a class="dropdown-item" href="#">Create Volunteer</a>-->
<!--        </div>-->
<!--      </li>-->
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
<!--        <ol class="breadcrumb">-->
<!--          <li class="breadcrumb-item">-->
<!--            <a href="index.html">Dashboard</a>-->
<!--          </li>-->
<!--          <li class="breadcrumb-item active">Cloth List</li>-->
<!--        </ol>-->

        <!-- Page Content -->
        <h2>Donate Cloth</h2>
        <hr>
        <div class="card">
          <div class="card-header">
            Donate cloth details:
          </div>

          <div class="card-body">
              <?php
              if(isset($_SESSION['clothInsertSuccess'])){
                  echo $_SESSION['clothInsertSuccess'];
                  unset($_SESSION['clothInsertSuccess']);
              }
              ?>
            <form action="../process_data/insert_data.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Organization Name:</label>

                            <input type="text" class="form-control" name="organizationName" required="required">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Organization Address:</label>

                            <textarea class="form-control" name="organizationAddress" required="required"></textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact Number:</label>

                            <input type="number" class="form-control" name="contactNumber" required="required">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Quantity:</label>

                            <input type="number" class="form-control" name="quantity">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Size:</label>

                            <input type="text" class="form-control" name="size" required="required">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="clothInsert" value="Save">
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Donation System 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  <?php
include_once ("../../includes/foot_admin.php");
  ?>