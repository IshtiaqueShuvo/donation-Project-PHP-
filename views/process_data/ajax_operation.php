<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 21-09-19
 * Time: 04.29
 */

if(!isset($_SESSION)) session_start();

include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;

$dataManipulation = new DataManipulation();

//$_POST['email'] = $_SESSION['email'];
//$_POST['donatorId'] = $_SESSION['donatorId'];

$totalRequestNumber = $dataManipulation->totalRequestNumber();
$clothDonation = $dataManipulation->clothDonationNumber();
$clothRequest = $dataManipulation->clothRequestNumber();
$foodDonation = $dataManipulation->foodDonationNumber();
$foodReauest = $dataManipulation->foodRequestNumber();
$moneyDonaton = $dataManipulation->moneyDonationNumber();
$moneyRequest = $dataManipulation->moneyhRequestNumber();
$bloodRequest = $dataManipulation->bloodRequestNumber();

$data = array(
    'total'=>$totalRequestNumber,
    'clothD'=>$clothDonation,
    'cloth'=>$clothRequest,
    'foodD'=>$foodDonation,
    'food'=>$foodReauest,
    'moneyD'=>$moneyDonaton,
    'money'=>$moneyRequest,
    'blood'=>$bloodRequest
);

print json_encode($data);