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

<div id="wrapper">

    <div id="content-wrapper" class="bg-dark">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 130px)">
                <div class="col-6">

                    <div class="card">
                        <div class="card-header">
                            Dashboard
                        </div>

                        <div class="card-body">
                            <div class="card text-white bg-primary o-hidden mb-lg-2">
                                <a class="card-body" href="money_list.php">
                                    <div class="mr-5" style="color:#fff;">Donated Money List</div>
                                </a>
                            </div>

                            <div class="card text-white bg-primary o-hidden">
                                <a class="card-body" href="add_money.php">
                                    <div class="mr-5" style="color:#fff;">Donate Money</div>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>

</div>


    <?php
include_once ('../../includes/foot_admin.php');
    ?>