<?php
if(!isset($_SESSION)) session_start();
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation();
$deliveredClothes = $dataManipulation->viewTotalDeleiveredClothes();
$donatedBloodBags = $dataManipulation->viewTotalDonatedBloodBag();
$donatedMoney = $dataManipulation->viewTotalDeleiveredMoney();
$donatedFood = $dataManipulation->viewTotalDeleiveredFood();


$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];

include_once ("../../includes/head_admin.php");

?>

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="#">Donation System</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="javascript:;">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow mx-1" style="margin-right:20px!important;">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger total-number" style="margin-left:0"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <div class="col-md-12">
                        <h6>Cloth</h6>
                    </div>
                    <a class="dropdown-item" href="cloth_list.php">Cloth Donation Request ( <span class="cloth-d"></span> ) </a>

                    <a class="dropdown-item" href="request_cloth.php">Cloth Request ( <span class="cloth"></span> )</a>

                    <div class="dropdown-divider"></div>

                    <div class="col-md-12">
                        <h6>Food</h6>
                    </div>
                    <a class="dropdown-item" href="food_list.php">Food Donation Request ( <span class="food-d"></span> )</a>

                    <a class="dropdown-item" href="request_food.php">Food Request ( <span class="food"></span> )</a>

                    <div class="dropdown-divider"></div>

                    <div class="col-md-12">
                        <h6>Money</h6>
                    </div>
                    <a class="dropdown-item" href="money_list.php">Money Donation Request ( <span class="money-d"></span> )</a>

                    <a class="dropdown-item" href="request_money.php">Money Request ( <span class="money"></span> )</a>

                    <div class="dropdown-divider"></div>

                    <div class="col-md-12">
                        <h6>Blood</h6>
                    </div>

                    <a class="dropdown-item" href="request_blood.php">Blood Request ( <span class="blood"></span> )</a>

                </div>
            </li>

            <li class="nav-item">
                <a class="" href="../authentication/logout.php?user=clothDonator">Logout</a>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Request List</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="request_cloth.php">Request For Cloth</a>
                    <a class="dropdown-item" href="request_blood.php">Request For Blood</a>
                    <a class="dropdown-item" href="request_money.php">Request For Money</a>
                    <a class="dropdown-item" href="request_food.php">Request For Food</a>

                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="cloth_list.php">
                    <i class="fas fa-fw fa-child"></i>
                    <span>Cloth List</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="donated_cloth_list.php">
                    <i class="fas fa-fw fa-child"></i>
                    <span>Donated Cloth List</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="blood_donator_list.php">
                    <i class="fas fa-fw fa-burn"></i>
                    <span>Blood Donators</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="food_list.php">
                    <i class="fas fa-fw fa-cookie"></i>
                    <span>Food List</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="donated_food_list.php">
                    <i class="fas fa-fw fa-cookie"></i>
                    <span>Donated Food List</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="money_list.php">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Money List</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="donated_money_list.php">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Donated Money List</span></a>
            </li>



<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="event_list.php">-->
<!--                    <i class="fas fa-fw fa-calendar-alt"></i>-->
<!--                    <span>Event List</span></a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="javascript:;" id="volunteerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    <i class="fas fa-fw fa-folder"></i>-->
<!--                    <span>Volunteer</span>-->
<!--                </a>-->
<!--                <div class="dropdown-menu" aria-labelledby="volunteerDropdown">-->
<!--                    <a class="dropdown-item" href="volunteer_list.php">Volunteer List</a>-->
<!--                    <a class="dropdown-item" href="volunteer_create.php">Create Volunteer</a>-->
<!--                </div>-->
<!--            </li>-->
        </ul>

        <div id="content-wrapper">

            <div class="container-fluid">


                <!-- Page Content -->
                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-dollar-sign"></i>
                                </div>
                                <div class="mr-5">Money Donated</div>
                            </div>
                            <div class="card-footer text-white clearfix small z-1">
                                <span class="float-left">
                                    <?php
//                                    $totalMoney=0;
//                                    if($donatedMoney){
//                                        foreach($donatedMoney as $deliveredClothe){
//                                            $totalMoney = $totalMoney + $deliveredClothe->amount;
//                                        }
//                                    }
                                    echo $donatedMoney." Tk";
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-cookie-bite"></i>
                                </div>
                                <div class="mr-5">Food Donated</div>
                            </div>
                            <div class="card-footer text-white clearfix small z-1">
                                <span class="float-left">
                                    <?php
//                                    $totalFood=0;
//                                    if($donatedFood){
//                                        foreach($donatedFood as $deliveredClothe){
//                                            $totalFood = $totalFood + $deliveredClothe->people_number;
//                                        }
//                                    }
                                    echo $donatedFood." People";
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-shopping-cart"></i>
                                </div>
                                <div class="mr-5">Cloth Donated</div>
                            </div>
                            <div class="card-footer text-white clearfix small z-1">
                                <span class="float-left"><?php
//                                    $sum=0;
//                                    if($deliveredClothes){
//                                        foreach($deliveredClothes as $deliveredClothe){
//                                            $sum = $sum + $deliveredClothe->quantity;
//                                        }
//                                    }
                                    echo $deliveredClothes." Pieces";

                                ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-burn"></i>
                                </div>
                                <div class="mr-5">Blood Donated</div>
                            </div>
                            <div class="card-footer text-white clearfix small z-1">
                                <span class="float-left">
                                    <?php
                                    $sum = 0;
                                    if($donatedBloodBags){
                                        foreach ($donatedBloodBags as $donatedBloodBag){
                                            $sum = $sum+$donatedBloodBag->donated;
                                        }
                                    }
                                    echo $sum. " Bags";
                                    ?>
                                </span>
                                <span class="float-right">
                  <!--<i class="fas fa-angle-right"></i>-->
                </span>
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
                        <span>Copyright © Donation System 2019</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

<?php
include_once ("../../includes/foot_admin.php");
?>


