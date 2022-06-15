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
            <li class="nav-item">
                <a class="nav-link" href="add_details.php">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Add Details</span>
                </a>
            </li>

            <li class="nav-item active">
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
                <h2>Update Details</h2>
                <hr>

                <?php
                if($dataManipulation->isBloodDetailsInsertedById($_SESSION['donatorId'])){
                    $data = $dataManipulation->viewbloodListById($_SESSION['donatorId']);

                    $lastDate = $data->last_date;
                    $lastDateArray = explode('-',$lastDate);
                    $lastDateArray = array_reverse($lastDateArray);
                    $lastDate = implode('-',$lastDateArray);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            Update Your Details:
                        </div>
                        <div class="card-body">
                            <form action="../process_data/update_data.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <input type="number" class="form-control" name="contactNumber" value="<?php echo $data->contact_number; ?>">          </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Blood Given Date:</label>
                                            <input type="text" class="form-control" id="datepicker" name="lastDate" value="<?php echo $lastDate ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Blood Donated (bag)</label>
                                            <input type="text" class="form-control" name="bloodBag" value="0">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" name="bloodDetails" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <a href="add_details.php">Please, first add your details from here!</a>
                        </div>
                    </div>
                    <?php
                }
                ?>


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
