<?php
if(!isset($_SESSION)) session_start();
include_once ("../../vendor/autoload.php");


$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];

include_once ("../../includes/head_admin.php");

?>

<nav class="navbar navbar-expand navbar-dark bg-light static-top">

    <a class="navbar-brand mr-1" href="javascript:;" style="color:#202020;cursor: default">Donation System</a>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="" href="../authentication/logout.php?user=clothDonator">Logout</a>
        </li>
    </ul>

</nav>

    <div id="content-wrapper" class="bg-dark">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 130px)">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Dashboard
                        </div>
                        <div class="card-body">
                            <div class="mb-lg-2">
                                <div class="card text-white bg-primary o-hidden h-100">
                                    <a class="card-body" href="request_list.php">
                                        <div class="mr-5" style="color:#fff;">Request List</div>
                                    </a>
                                </div>
                            </div>

                            <div class="mb-lg-2">
                                <div class="card text-white bg-primary o-hidden h-100">
                                    <a class="card-body" href="request_list_delivered.php">
                                        <div class="mr-5" style="color:#fff;">Delivered List</div>
                                    </a>
                                </div>
                            </div>

                            <div class="mb-lg-2">
                                <div class="card text-white bg-primary o-hidden h-100">
                                    <a class="card-body" href="request_make.php">
                                        <div class="mr-5" style="color:#fff;">Make Request</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- Sticky Footer -->
        <footer class="sticky-footer" style="width:100%;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Donation System 2021</span>
                </div>
            </div>
        </footer>
    </div>


    <?php
include_once ('../../includes/foot_admin.php');
    ?>