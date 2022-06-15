<?php
if(!isset($_SESSION)) session_start();
include_once ("../../vendor/autoload.php");


$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];

include_once ("../../includes/head_admin.php");

?>

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="#">Donation System</a>

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
        <a class="nav-link" href="request_list.php">
          <i class="fas fa-fw fa-bars"></i>
          <span>Request List</span>
        </a>
      </li>

        <li class="nav-item">
            <a class="nav-link" href="request_list_delivered.php">
                <i class="fas fa-fw fa-bars"></i>
                <span>Delivered List</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="request_make.php">
                <i class="fas fa-fw fa-plus"></i>
                <span>Make Request</span>
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
        <h2>Make Request</h2>
        <hr>
        <div class="card">
          <div class="card-header">
            Make your Request:
          </div>

          <div class="card-body">
              <?php
              if(isset($_SESSION['clothInsertSuccess'])){
                  echo $_SESSION['clothInsertSuccess'];
                  unset($_SESSION['clothInsertSuccess']);
              }
              ?>


              <ul class="nav nav-tabs" id="myTab" role="tablist">

                  <li class="nav-item">
                      <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">For Cloth</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">For Blood</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">For Money</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" id="for-food" data-toggle="tab" href="#for-foodd" role="tab" aria-controls="for-foodd" aria-selected="false">For Food</a>
                  </li>
              </ul>

              <div class="tab-content" id="myTabContent" style="margin-top:20px;">

                  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="blood-area">
                          <form action="../process_data/insert_data.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" value="for_cloth" name="requestType">
                              <div class="row">

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Quantity:</label>

                                          <input type="number" class="form-control" name="quantity">
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Size:</label>

                                          <select class="form-control" name="size">
                                              <option value="s">S</option>
                                              <option value="m">M</option>
                                              <option value="l">L</option>
                                              <option value="xl">XL</option>
                                          </select>

                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Cause</label>

                                          <textarea class="form-control" name="cause"></textarea>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Document</label>

                                          <input type="file" name="document" class="form-control">
                                      </div>
                                  </div>


                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <input type="submit" class="btn btn-primary" name="clothRequest" value="Send Request">
                                      </div>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>


                  <!-- blood request  -->
                  <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="blood-area">
                          <form action="../process_data/insert_data.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" value="for_blood" name="requestType">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Blood Group:</label>
                                          <select class="form-control" name="bloodGroup">
                                              <option value="ap">A<sup>+</sup></option>
                                              <option value="an">A<sup>-</sup></option>

                                              <option value="bp">B<sup>+</sup></option>
                                              <option value="bn">B<sup>-</sup></option>

                                              <option value="abp">AB<sup>+</sup></option>
                                              <option value="abn">AB<sup>-</sup></option>

                                              <option value="op">O<sup>+</sup></option>
                                              <option value="on">O<sup>-</sup></option>
                                          </select>

                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Blood Needed:(bags)</label>

                                          <input type="number" class="form-control" name="bloodBag">
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Date:</label>
                                          <input type="text" class="form-control" name="date" id="datepicker" autocomplete="off">
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Time:</label>
                                          <input type="text" class="form-control timepicker" name="time" autocomplete="off">
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Location:</label>
                                          <textarea class="form-control" name="address"></textarea>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Cause:</label>
                                          <textarea class="form-control" name="cause"></textarea>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Document</label>

                                          <input type="file" name="document" class="form-control">
                                      </div>
                                  </div>

                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <input type="submit" class="btn btn-primary" name="bloodRequestInsert" value="Send Request">
                                      </div>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>





                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      <div class="blood-area">
                          <form action="../process_data/insert_data.php" method="post" autocomplete="off" enctype="multipart/form-data">
                              <input type="hidden" value="for_money" name="requestType">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Needed Amount:</label>
                                          <input type="text" class="form-control" name="amount" required>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Cause</label>

                                          <textarea class="form-control" name="cause" required></textarea>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Document</label>

                                          <input type="file" name="document" class="form-control">
                                      </div>
                                  </div>

                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <input type="submit" class="btn btn-primary" name="moneyRequest" value="Send Request">
                                      </div>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>

                  <div class="tab-pane fade" id="for-foodd" role="tabpanel" aria-labelledby="for-food">
                      <div class="blood-area">
                          <form action="../process_data/insert_data.php" method="post" autocomplete="off" enctype="multipart/form-data">
                              <input type="hidden" value="for_food" name="requestType">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Food Needed for: (people)</label>
                                          <input type="number" class="form-control" name="number">

                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Date:</label>
                                          <input type="text" class="form-control date-picker" name="date">

                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Time:</label>
                                          <input type="text" class="form-control timepicker" name="time" autocomplete="off">

                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Cause</label>
                                          <textarea class="form-control" name="cause"></textarea>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Document</label>

                                          <input type="file" name="document" class="form-control">
                                      </div>
                                  </div>

                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <input type="submit" class="btn btn-primary" name="foodRequestInsert" value="Send Request">
                                      </div>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Donation System 2021</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->
    </div>

  <?php
include_once ("../../includes/foot_admin.php");
  ?>

        <script>
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                changeYear: true,
                changeMonth: true
            });

            $( ".date-picker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                changeYear: true,
                changeMonth: true
            });

            $('input.timepicker').timepicker({});
        </script>
