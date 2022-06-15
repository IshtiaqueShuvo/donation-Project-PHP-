<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 23-08-19
 * Time: 00.04
 */
if(!isset($_SESSION)) session_start();

include_once ('../../vendor/autoload.php');
use App\Utility\Utility;
use App\Message\Message;
use App\UserRegistration\Auth;

$auth = new Auth();

if(isset($_POST['login'])){
    $status = $auth->setData($_POST);

    $userDetails = $auth->is_registered();
    if($userDetails !=false){
        $_SESSION['email']=$_POST['email'];
        $_SESSION['donatorType']=$userDetails->user_type;
        $_SESSION['donatorId'] = $userDetails->user_id;

        if($userDetails->user_type == "cloth_donator"){
            Utility::redirect("../cloth/dashboard.php");


        }elseif ($userDetails->user_type == "money_donator"){
            Utility::redirect('../money/dashboard.php');


        }elseif ($userDetails->user_type == "food_donator"){
            Utility::redirect('../food/dashboard.php');

        }elseif ($userDetails->user_type == "blood_donator"){
            Utility::redirect("../blood/dashboard.php");


        }elseif($userDetails->user_type == "admin"){
            Utility::redirect('../admin/dashboard.php');


        } elseif($userDetails->user_type=="user"){
            Utility::redirect("../user/dashboard.php");

        }else{
//            var_dump($userDetails);
            $http_refferer = $_SERVER['HTTP_REFERER'];
            $_SESSION['somethingWrong'] = "<div class='alert alert-danger'>Something went wrong, try again!</div>";
            Utility::redirect("$http_refferer");
        }
    }else{
        $http_refferer = $_SERVER['HTTP_REFERER'];
        $_SESSION['loginErrors'] = "<div class='alert alert-warning'>Email or Password mismath, try again!</div>";
        Utility::redirect("$http_refferer");
    }
}