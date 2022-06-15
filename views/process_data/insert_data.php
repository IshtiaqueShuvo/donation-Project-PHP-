<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 06-09-19
 * Time: 19.45
 */

if(!isset($_SESSION)) session_start();

include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;

$dataManipulation = new DataManipulation();

if(isset($_POST['clothInsert'])){
    $_POST['email'] = $_SESSION['email'];
    $_POST['donatorId'] = $_SESSION['donatorId'];
    $dataManipulation->setDonateData($_POST);

    $status = $dataManipulation->insertCloth();

    if($status){
        $_SESSION['clothInsertSuccess'] = "<div class='alert alert-success'>Data has been inserted successfully!</div>";
        $http_refferer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("$http_refferer");
    }else{
        $_SESSION['clothInsertSuccess'] = "<div class='alert alert-warning'>Data has not been inserted successfully!</div>";
        $http_refferer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("$http_refferer");
    }
}

if(isset($_POST['moneyInsert'])){
    $_POST['email'] = $_SESSION['email'];
    $_POST['donatorId'] = $_SESSION['donatorId'];
    $dataManipulation->setDonateData($_POST);

    $status = $dataManipulation->insertMoney();

    if($status){
        $_SESSION['moneyInsertSuccess'] = "<div class='alert alert-success'>Data has been inserted successfully!</div>";
        $http_refferer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("../money/money_list.php");
    }else{
        $_SESSION['moneyInsertSuccess'] = "<div class='alert alert-warning'>Data has not been inserted successfully!</div>";
        $http_refferer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("$http_refferer");
    }
}

if(isset($_POST['foodInsert'])){
    $_POST['email'] = $_SESSION['email'];
    $_POST['donatorId'] = $_SESSION['donatorId'];
    $dataManipulation->setDonateData($_POST);

    $status = $dataManipulation->insertFood();

    if($status){
        $_SESSION['foodInsertSuccess'] = "<div class='alert alert-success'>Data has been inserted successfully!</div>";
        $http_refferer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("../food/food_list.php");
    }else{
        $_SESSION['foodInsertSuccess'] = "<div class='alert alert-warning'>Data has not been inserted successfully! Try again.</div>";
        $http_refferer = $_SERVER['HTTP_REFERER'];
        Utility::redirect("$http_refferer");
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
    $status = $dataManipulation->insertBlood();

    if($status){
        $_SESSION['insertBlood'] = "<div class='alert alert-success'>Details Inserted.</div>";

        Utility::redirect('../blood/dashboard.php');
    }
}

if(isset($_POST['clothRequest'])){

    $file_name = time().$_FILES['document']['name'];
    $_POST['document']=$file_name;

    $source=$_FILES['document']['tmp_name'];
    $destination = "../user/Upload/$file_name";
    move_uploaded_file($source,$destination);

    $_POST['email'] = $_SESSION['email'];
    $_POST['donatorId'] = $_SESSION['donatorId'];

    $dataManipulation->setRequestData($_POST);

    $status = $dataManipulation->insertClothRequestData();
    if($status){
        $_SESSION['clothRequest'] = "<div class='alert alert-success'>Request made succesfully</div>";
        Utility::redirect('../user/request_list.php');
    }


}

if(isset($_POST['bloodRequestInsert'])){
    $file_name = time().$_FILES['document']['name'];
    $_POST['document']=$file_name;

    $source=$_FILES['document']['tmp_name'];
    $destination = "../user/Upload/$file_name";
    move_uploaded_file($source,$destination);



    $_POST['email'] = $_SESSION['email'];
    $_POST['donatorId'] = $_SESSION['donatorId'];

    $dataManipulation->setRequestData($_POST);
    $status = $dataManipulation->insertBloodRequestData();
    if($status){
        $_SESSION['bloodRequest'] = "<div class='alert alert-success'>Request made succesfully</div>";
        Utility::redirect('../user/request_list.php');
    }
}

if(isset($_POST['moneyRequest'])){

    $file_name = time().$_FILES['document']['name'];
    $_POST['document']=$file_name;

    $source=$_FILES['document']['tmp_name'];
    $destination = "../user/Upload/$file_name";
    move_uploaded_file($source,$destination);

    $_POST['email'] = $_SESSION['email'];
    $_POST['donatorId'] = $_SESSION['donatorId'];

    $dataManipulation->setRequestData($_POST);
    $status = $dataManipulation->insertMoneyRequestData();
    if($status){
        $_SESSION['MoneyRequest'] = "<div class='alert alert-primary'>Request made succesfully</div>";
        Utility::redirect('../user/request_list.php');
    }


}

if(isset($_POST['foodRequestInsert'])){

    $file_name = time().$_FILES['document']['name'];
    $_POST['document']=$file_name;

    $source=$_FILES['document']['tmp_name'];
    $destination = "../user/Upload/$file_name";
    move_uploaded_file($source,$destination);

    $_POST['email'] = $_SESSION['email'];
    $_POST['donatorId'] = $_SESSION['donatorId'];

    $dataManipulation->setRequestData($_POST);
    $status = $dataManipulation->insertFoodRequestData();
    if($status){
        $_SESSION['foodRequest'] = "<div class='alert alert-success'>Request made succesfully</div>";
        Utility::redirect('../user/request_list.php');
    }


}