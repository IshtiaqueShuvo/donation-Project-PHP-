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
            <li class="nav-item active">
                <a class="nav-link" href="cloth_list.php">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Cloth List</span>
                </a>
            </li>

            <li class="nav-item">
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
                <h2>Cloth List</h2>
                <hr>
                <div class="card">
                    <div class="card-header">
                        Total Cloth List
                    </div>
                    <div class="card-body">
                        <div class="table-striped table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Available Item</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $lists = $dataManipulation->viewAllClothByDonatorId($_SESSION['donatorId']);

                                $counter = 1;
                                $deliveredItem = 0;
                                if($lists){
                                    foreach ($lists as $list){
                                        $deliveredItem = $list->quantity - $list->available_item;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $counter;?>
                                            </td>
                                            <td>
                                                <?php echo $list->quantity?> &nbsp; pieces
                                            </td>

                                            <td>
                                                <?php echo $list->size?>
                                            </td>

                                            <td>
                                                <?php echo $list->available_item; ?>
                                            </td>

                                            <td>
                                                <?php
                                                if($list->is_delivered=="yes"){
                                                    echo "Delivered";
                                                }else{
                                                    echo $deliveredItem." pieces delivered";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $counter++;
                                    }
                                }

                                ?>


                                </tbody>
                            </table>
                        </div>
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