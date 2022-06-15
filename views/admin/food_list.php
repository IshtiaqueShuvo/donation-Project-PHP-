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

            <li class="nav-item">
                <a class="nav-link" href="blood_donator_list.php">
                    <i class="fas fa-fw fa-burn"></i>
                    <span>Blood Donators</span></a>
            </li>

            <li class="nav-item active">
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
                <h2>Food List</h2>
                <hr>
                <div class="card">
                    <div class="card-header">
                        Total Food List
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
                                $clothLists = $dataManipulation->viewAllFoodList();
                                if($clothLists != false){
                                    ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Provider</th>
                                            <th>Location</th>
                                            <th>Contact Number</th>
                                            <th>Quantity</th>
                                            <th>Available</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                        foreach ($clothLists as $clothList){
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td>
                                                    <?php echo $clothList->organization_name;?>
                                                </td>
                                                <td>
                                                    <?php echo $clothList->address?>
                                                </td>
                                                <td>
                                                    <?php echo $clothList->contact_number?>
                                                </td>
                                                <td>
                                                    <?php echo $clothList->people_number?>
                                                </td>
                                                <td>
                                                    <?php echo $clothList->available_item ?>
                                                </td>

                                                <td>
                                                    <?php echo $clothList->date?>
                                                </td>

                                                <td>
                                                    <?php echo $clothList->time?>
                                                </td>

                                                <td>
                                                    <a href="javascript:;" class="btn btn-primary donate-btn">Donate <i class="fa fa-chevron-down" </a>
<!--                                                    <a href="../process_data/update_data.php?foodProductId=--><?php //echo $clothList->id ?><!--" class="smaller btn btn-success">Complete Donation (<i class="fa fa-check"></i> )</a>-->
                                                </td>
                                            </tr>
                                            <tr style="display:none">
                                                <td colspan="9">
                                                    <div class="donate-div position-relative">
                                                        <a href="javascript:;" class="btn btn-danger btn-sm close-btn" style="position: absolute; right:0;top:-10px;z-index: 99">Close</a>
                                                        <form action="../process_data/update_data.php" method="post">
                                                            <div class="row" style="margin-left:-12px;margin-right:-12px;">
                                                                <div class="col-md-3">
                                                                    <p class="mb-0">
                                                                        Total item to donate : <?php echo $clothList->people_number?>
                                                                    </p>
                                                                    <p class="mb-0">
                                                                        Available Item : <?php echo $clothList->available_item ?>
                                                                    </p>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="">
                                                                        <label>Donate item:</label>
                                                                        <input class="form-control" type="number" name="donatedItem" value="0">
                                                                        <input type="hidden" value="<?php echo $clothList->available_item; ?>" name="availableItem">
                                                                        <input type="hidden" value="<?php echo $clothList->people_number; ?>" name="totalItem">
                                                                        <input type="hidden" value="<?php echo $clothList->id; ?>" name="productId">
                                                                        <input type="hidden" value="<?php echo $clothList->organization_name; ?>" name="organizationName">
                                                                        <input type="hidden" value="<?php echo $clothList->provider_id; ?>" name="providerId">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="">
                                                                        <label>Donated Person:</label>
                                                                        <input class="form-control" type="text" name="donatedPerson">
                                                                        <!--<input type="hidden" value="<?php /*echo $clothList->available_item; */?>" name="availableItem">
                                                                        <input type="hidden" value="<?php /*echo $clothList->quantity; */?>" name="totalItem">
                                                                        <input type="hidden" value="<?php /*echo $clothList->id; */?>" name="productId">-->
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="">
                                                                        <label>&nbsp</label>
                                                                        <input class="btn btn-success btn-block" type="submit" name="makeFoodDonation" value="Donate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
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
    $('.donate-btn').click(function () {
        $(this).parent().parent().next().show();
    });

    $('.close-btn').click(function () {
        $(this).parent().parent().parent().hide();
    });
</script>
