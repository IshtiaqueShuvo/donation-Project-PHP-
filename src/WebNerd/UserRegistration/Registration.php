<?php
/**
 * Created by PhpStorm.
 * User: royex technologies
 * Date: 8/29/2019
 * Time: 3:03 PM
 */

namespace App\UserRegistration;

use App\Utility\Utility;
use App\Message\Message;
use App\Model\Database as DB;
use PDO;


if(!isset($_SESSION)) session_start();

class Registration extends DB
{
    public $userType,
        $name,
        $contactNumber,
        $address,
        $email,
        $password,
        $emailToken;

    /*set dada method */
    public function setRegisterData($post){
        if(array_key_exists('userType',$post)){
            $this->userType = $post['userType'];
        }

        if(array_key_exists('name',$post)){
            $this->name = $post['name'];
        }

        if(array_key_exists('contactNumber',$post)){
            $this->contactNumber = $post['contactNumber'];
        }

        if(array_key_exists('address',$post)){
            $this->address = $post['address'];
        }


        if(array_key_exists('email',$post)){
            $this->email = $post['email'];
        }

        if(array_key_exists('password',$post)){
            $this->password = $post['password'];
        }

        if(array_key_exists('emailToken',$post)){
            $this->emailToken = $post['emailToken'];
        }


    }
    /*set dada method end*/

    //store data methos
    public function registerDataInsert(){
        $dataArray = array($this->userType, $this->name, $this->contactNumber, $this->address, $this->email, $this->password, $this->emailToken);
        $sql = "INSERT INTO `users`(`user_type`, `name`, `contact_number`, `address`, `email`, `password`, `email_verified`) VALUES(?,?,?,?,?,?,?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    //store data methos end

    //view methods

    //single view
    public function singleViewByMail(){
        $query="SELECT * FROM `users` WHERE `email` = '".$this->email."'";
        $result=$this->dbh->query($query);
        $data=$result->fetch(PDO::FETCH_OBJ);
        $row = $result->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }
    //single view end


    //view methods end

    //email_verified updating
    public function validTokenUpdate($emailToken){
        $query="UPDATE `users` SET  `email_verified`='".'Yes'."' WHERE `users`.`email_verified` ='".$emailToken."'";
        $result = $this->dbh->exec($query);

        if($result){
            $_SESSION['tokenUpdated'] = "<div class='alert alert-success'>Your email has been verified, you can login now.</div>";
            Utility::redirect('../login.php');
        }
        else {
            $_SESSION['tokenUpdated'] = "<div class='alert alert-warning'>Try registering again with another email.</div>";
            Utility::redirect('../register.php');
        }
    }
    //email_verified updating end
}