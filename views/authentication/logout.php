<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 28-04-18
 * Time: 17.52
 */

if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\UserRegistration\Registration;
use App\UserRegistration\Auth;
use App\Message\Message;
use App\Utility\Utility;


$auth= new Auth();

if(!isset($_GET['clothDonator'])){
    $status= $auth->log_out();
    $_SESSION['logout'] = "<div class='alert alert-success'>You have successfully been logged out!</div>";

    session_destroy();
    session_start();


    return Utility::redirect('../login.php');
}
