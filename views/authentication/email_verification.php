<?php
/**
 * Created by PhpStorm.
 * User: royex technologies
 * Date: 8/2/2021
 * Time: 3:32 PM
 */


if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');

use App\UserRegistration\Registration;
use App\Message\Message;
use App\Utility\Utility;

$registration = new Registration();

if(isset($_POST['activation'])){
    $registration->validTokenUpdate($_POST['email_token']);
}
