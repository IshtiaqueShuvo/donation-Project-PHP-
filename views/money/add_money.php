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

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
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
        <a class="nav-link" href="money_list.php">
          <i class="fas fa-fw fa-bars"></i>
          <span>Donated Money List</span>
        </a>
      </li>

        <li class="nav-item active">
            <a class="nav-link" href="add_money.php">
                <i class="fas fa-fw fa-plus"></i>
                <span>Donate Money</span>
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
        <h2>Donate Money</h2>
        <hr>
        <div class="card">
          <div class="card-header">
            Enter Details:
          </div>

          <div class="card-body">
              <?php
              if(isset($_SESSION['foodInsertSuccess'])){
                  echo $_SESSION['foodInsertSuccess'];
                  unset($_SESSION['foodInsertSuccess']);
              }
              ?>
            <form action="../process_data/insert_data.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Organization/Person Name:</label>

                            <input type="text" class="form-control" name="organizationName" required="required">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Add Amount:(Taka)</label>

                            <input type="number" class="form-control" name="amount">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact Number:(Bikas)</label>

                            <input type="number" class="form-control" name="contactNumber" required="required">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Transaction ID:(Send Money through Bikash to the following number, and give the transaction ID.)</label>
                            <h2>Bikash Agent Number <strong>01852454545</strong></h2>

                            <input type="text" class="form-control" name="transactionId" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="moneyInsert" value="Save">
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
    </div>
    <!-- /.content-wrapper -->

  <?php
include_once ("../../includes/foot_admin.php");
  ?>

