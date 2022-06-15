<?php
if(!isset($_SESSION)) session_start();
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;

$dataManipulation = new DataManipulation();


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
            <li class="nav-item active">
                <a class="nav-link" href="add_details.php">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Add Details</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="update_details.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Update Details</span>
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
                <h2>Add Details</h2>
                <hr>
                <div class="card">
                    <div class="card-header">
                        Add your Blood group
                    </div>

                    <?php
                    if($dataManipulation->isBloodDetailsInsertedById($_SESSION['donatorId'])){
                        ?>
                        <div class="card-body">
                            <h2>You already given data needed. <a href="update_details.php">You can update your data from here.</a> </h2>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="card-body">
                            <form action="../process_data/insert_data.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Blood Given Date:</label>
                                            <input type="text" class="form-control" name="lastDate" id="datepicker" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" name="bloodDetails" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                    ?>


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


            <script>
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                changeYear: true,
                changeMonth: true
            });
        </script>

