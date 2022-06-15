<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 06-09-19
 * Time: 01.09
 */

//var_dump($_POST);

if(!isset($_SESSION) )  session_start();

include_once ('../../vendor/autoload.php');
require'../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

use App\Utility\Utility;
use App\Message\Message;
use App\UserRegistration\Auth;
use App\UserRegistration\Registration;

//var_dump($_POST);


//moderator register
if(isset($_POST['register'])){

    $auth= new Auth();
    $status= $auth->setData($_POST)->is_exist();
//Utility::var_dump($_POST);
    if($status){
        $_SESSION['registrationNotice']="<div class='alert alert-warning'>Email has already been taken! Please try with another...</div>";
        Utility::redirect('../register.php');
    }else{
        echo "email is new!";
        $yourGmailAddress = 'omni.donation.system@gmail.com';
        $yourGmailPassword = 'Shuvo123';
        $recipient = $_POST['email'];

        $code = mt_rand(100000, 999999);

        $_POST['emailToken'] = $code;

        date_default_timezone_set('Etc/UTC');

        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        $mail->isSMTP();
        //Tell PHPMailer to use SMTP
        //$mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465; //587
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'ssl'; //tls
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $yourGmailAddress;
        //Password to use for SMTP authentication
        $mail->Password = $yourGmailPassword;
        $mail->setFrom($yourGmailAddress, 'donation_system');
        $mail->addReplyTo($yourGmailAddress, 'donation_system');
        $mail->addAddress($_REQUEST['email']);
        $mail->Subject = 'Verification link....';
        $mail->AltBody = 'This is a plain text message body';
        $message =  "Your account activation code is: <b>$code</b>";
        $mail->Body = $message;
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $_SESSION['registrationSuccess'] = "<div class='alert alert-warning'>Something went wrong please try again!</div>";
            $http_refferer = $_SERVER['HTTP_REFERER'];
            Utility::redirect("$http_refferer");
        } else {
            Message::message("<strong>Success!</strong> Email has been sent successfully.");
            echo Message::getMessage();


            $userRegistration = new Registration();

            $userRegistration->setRegisterData($_POST);
            $status = $userRegistration->registerDataInsert();

            $_SESSION['registrationSuccess'] = "<div class='alert alert-success'>An activation code has been sent to your email, write down it here to activate your account.</div>";
            Utility::redirect('../register_activation.php');
        }
    }

}
