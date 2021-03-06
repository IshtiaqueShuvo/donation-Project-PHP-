<?php
if(!isset($_SESSION)) session_start();
include_once ("../../vendor/autoload.php");


$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];

include_once ("../../includes/head_admin.php");
use App\DataManipulation\DataManipulation;

$dataManipulation = new DataManipulation();

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
            <li class="nav-item">
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

            <li class="nav-item active">
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
                <h2>Blood Donators</h2>
                <hr>
                <div class="card">
                    <div class="card-header">
                        All Blood Donators
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_SESSION['listUpdated'])){
                            echo $_SESSION['listUpdated'];
                            unset($_SESSION['listUpdated']);
                        }
                        ?>
                        <div class="table-striped table-responsive">
                            <?php
                                $counter = 1;
                                $clothLists = $dataManipulation->viewAllbloodList();
                                if($clothLists != false){
                                    ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>Blood Group</th>
                                            <th>Last Date</th>
                                            <th>Can/not Donate</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                        foreach ($clothLists as $clothList){
                                            $bloodGroup = $clothList->blood_group;
                                            if($bloodGroup=="ap"){
                                                $bloodGroup="A<sup>+</sup>";
                                            }elseif($bloodGroup=='am'){
                                                $bloodGroup="A<sup>+</sup>";
                                            }elseif($bloodGroup=='bp'){
                                                $bloodGroup="B<sup>+</sup>";
                                            }elseif($bloodGroup=='bm'){
                                                $bloodGroup="B<sup>-</sup>";
                                            }elseif($bloodGroup=='abp'){
                                                $bloodGroup="AB<sup>+</sup>";
                                            }elseif($bloodGroup=='abm'){
                                                $bloodGroup="AB<sup>-</sup>";
                                            }elseif($bloodGroup=='op'){
                                                $bloodGroup="O<sup>+</sup>";
                                            }else{
                                                $bloodGroup="O<sup>-</sup>";
                                            }

                                            $lastDate = $clothList->last_date;
                                            $lastDateArray = explode('-',$lastDate);
                                            $lastDateArray = array_reverse($lastDateArray);
                                            $lastDate = implode('-',$lastDateArray);
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td>
                                                    <?php echo $clothList->donator_name;?>
                                                </td>
                                                <td>
                                                    <?php echo $clothList->contact_number?>
                                                </td>
                                                <td>
                                                    <?php echo $clothList->donator_address?>
                                                </td>
                                                <td>
                                                    <?php echo $bloodGroup;?>&nbsp
                                                </td>

                                                <td>
                                                    <?php echo $lastDate?>
                                                </td>

                                                <td>
                                                    <?php
                                                        $date = date('d-m-Y');
//                                                        echo $date;
                                                    $datetime1 = date_create("$lastDate");
                                                    $datetime2 = date_create("$date");
                                                    $interval = date_diff($datetime1, $datetime2);
                                                    $days =  $interval->format('%R%a');
//                                                    $days = explode('+',$days);
                                                    $days = (int)$days;
//                                                    echo $days;

                                                    if($days>120){
                                                        ?>
                                                        <span class="text-light bg-success">Can donate</span>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span class="text-light bg-danger">Can not donate</span>
                                                        <?php
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                            <?php
                                            $counter++;
                                        }
                                        ?>





                                        </tbody>
                                    </table>
                                    <?php
                                }
                                ?>

                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright ?? Donation System 2019</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

<?php
include_once ("../../includes/foot_admin.php");
?>