<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 07-09-19
 * Time: 02.09
 */

if(!isset($_SESSION)) session_start();

include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;

$dataManipulation = new DataManipulation();

if(isset($_GET['productId'])){
    $status = $dataManipulation->updateClothListById($_GET['productId']);

    if($status){
        $_SESSION['listUpdated'] = "<div class='alert alert-success'>List updated!</div>";

        $http_referer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("$http_referer");
    }
}

if(isset($_GET['gotId'])){
    $status = $dataManipulation->updateMoneyTransactionById($_GET['gotId']);

    if($status){
        $_SESSION['transactionCheck'] = "<div class='alert alert-success'>Transaction Succesfull!</div>";


        $http_referer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("$http_referer");
    }
}

if(isset($_GET['foodProductId'])){
    $status = $dataManipulation->updateFoodListById($_GET['foodProductId']);

    if($status){
        $_SESSION['listUpdated'] = "<div class='alert alert-success'>List updated!</div>";

        $http_referer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("$http_referer");
    }
}

if(isset($_GET['moneyProductId'])){
    $status = $dataManipulation->updateMoneyListById($_GET['moneyProductId']);

    if($status){
        $_SESSION['moneyDelivered'] = "<div class='alert alert-success'>List updated!</div>";

        $http_referer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("../admin/donated_money_list.php");
    }
}

if(isset($_POST['bloodDetails'])){
    $_POST['email'] = $_SESSION['email'];
    $_POST['donatorId'] = $_SESSION['donatorId'];

    $dateArray = explode('-',$_POST['lastDate']);
    $dateArray = array_reverse($dateArray);

    $dateArrayString = implode('-',$dateArray);
//    echo $dateArrayString;
    $_POST['lastDate']=$dateArrayString;
    $dataManipulation->setDonateData($_POST);
//    var_dump($status);

    $status = $dataManipulation->updateBloodListById();
    if($status){
        $_SESSION['updateBlood'] ="<div class='alert alert-success'>Data has been updated</div>";
        Utility::redirect('../blood/dashboard.php');
    }else{
        echo "failed";
    }

}

if(isset($_GET['requestId'])){
    $status = $dataManipulation->updateRequestListById($_GET['requestId']);
    if($status){
        $_SESSION['requestDelivered'] = "<div class='alert alert-success'>Request Complete succesfully</div>";
        Utility::redirect('../user/request_list_delivered.php');
    }else{
        $_SESSION['requestDelivered'] = "<div class='alert alert-warning'>Something went wrong, please, try again.</div>";
        Utility::redirect('../user/request_list.php');
    }
}

if(isset($_POST['makeFoodDonation'])){
    $availableItem = $_POST['availableItem'];
    $availableItem = $availableItem - $_POST['donatedItem'];
//    echo $availableItem;
    $http_referer=$_SERVER['HTTP_REFERER'];
    if($_POST['donatedItem']>$_POST['availableItem']){
        $_SESSION['listUpdated']="<div class='alert alert-warning'>Wrong data given</div>";
        Utility::redirect("$http_referer");
    }else{
        $dataManipulation->updateFoodAvailable($availableItem, $_POST['productId'],$_POST['donatedPerson'],$_POST['donatedItem'],$_POST['organizationName'],$_POST['providerId']);
        $_SESSION['listUpdated']="<div class='alert alert-success'>Data Updated Successfully!</div>";
        Utility::redirect("$http_referer");
    }
}

if(isset($_POST['makeClothDonation'])){
    $availableItem = $_POST['availableItem'];
    $availableItem = $availableItem - $_POST['donatedItem'];
    $donatedPerson = $_POST['donatedPerson'];
    $totalItem = $_POST['totalItem'];
    $organizationName = $_POST['organizationName'];
    $providerId = $_POST['providerId'];
//    echo $availableItem;
    $http_referer=$_SERVER['HTTP_REFERER'];
    if($_POST['donatedItem']>$_POST['availableItem']){
        $_SESSION['listUpdated']="<div class='alert alert-warning'>Wrong data given</div>";
        Utility::redirect("$http_referer");
    }else{
        $dataManipulation->updateClothAvailable($availableItem, $_POST['productId'],$donatedPerson,$totalItem,$organizationName,$providerId,$_POST['donatedItem']);
        $_SESSION['listUpdated']="<div class='alert alert-success'>Data Updated Successfully!</div>";
        Utility::redirect("$http_referer");
    }
}

if(isset($_POST['makeMoneyDonation'])){
    $availableItem = $_POST['availableItem'];
    $availableItem = $availableItem - $_POST['donatedItem'];
    $donatedPerson = $_POST['donatedPerson'];
//    echo $availableItem;
    $http_referer=$_SERVER['HTTP_REFERER'];
    if($_POST['donatedItem']>$_POST['availableItem']){
        $_SESSION['listUpdated']="<div class='alert alert-warning'>Wrong data given</div>";
        Utility::redirect("$http_referer");
    }else{
        $dataManipulation->updateMoneyAvailable($availableItem, $_POST['productId'],$donatedPerson,$_POST['donatedItem'],$_POST['providerId']);
        $_SESSION['listUpdated']="<div class='alert alert-success'>Data Updated Successfully!</div>";
        Utility::redirect("$http_referer");
    }
}