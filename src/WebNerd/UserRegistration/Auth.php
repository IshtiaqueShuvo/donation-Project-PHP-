<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-08-19
 * Time: 23.23
 */

namespace App\UserRegistration;
use App\Message\Message;
use App\Utility\Utility;

if(!isset($_SESSION) )  session_start();

use App\Model\Database as DB;
use PDO;
use PDOException;
use PDORow;
class Auth extends DB{

    public $email = "";
    public $password = "";
    public $userType;

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }

        if(array_key_exists('userType',$data)){
            $this->userType = $data['userType'];
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `users` WHERE `users`.`email` =:email";
        $STH=$this->dbh->prepare($query);
        $STH->execute(array(':email'=>$this->email));

        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $dataArray = array($this->email, $this->password);
        $query = "SELECT * FROM `users` WHERE `email_verified`='yes' AND `email`='".$this->email."' AND `password` ='".$this->password."'";
        $sth=$this->dbh->query($query);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetch();
        $count = $sth->rowCount();

        if ($count > 0) {
            return $data;
        } else {
            return FALSE;
        }
    }

    public function hospital_is_registered(){
        $query = "SELECT * FROM `users` WHERE `email_verified`='Yes' AND `email`='".$this->email."' AND `password` ='".$this->password."' AND `user_type`='hospital moderator'";
        $sth=$this->dbh->query($query);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if($count>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function police_is_registered(){
        $query = "SELECT * FROM `users` WHERE `email_verified`='Yes' AND `email`='".$this->email."' AND `password` ='".$this->password."' AND `user_type`='police station moderator'";
        $sth=$this->dbh->query($query);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if($count>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function fire_is_registered(){
        $query = "SELECT * FROM `users` WHERE `email_verified`='Yes' AND `email`='".$this->email."' AND `password` ='".$this->password."' AND `user_type`='fire station moderator'";
        $sth=$this->dbh->query($query);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if($count>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function user_is_registered(){
        $query = "SELECT * FROM `users` WHERE `email_verified`='Yes' AND `email`='".$this->email."' AND `password` ='".$this->password."' AND `user_type`='user'";
        $sth=$this->dbh->query($query);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if($count>0){
            return $data;
        }else{
            return FALSE;
        }
    }


    public function admin_is_registered(){
        $query = "SELECT * FROM `users` WHERE `email_verified`='Yes' AND `email`='".$this->email."' AND `password` ='".$this->password."' AND `user_type`='admin'";
        $sth=$this->dbh->query($query);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if($count>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
//            Utility::redirect($_SERVER['HTTP_REFERER']);
//            header('location:'.$_SERVER['HTTP_REFERER']);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['email']="";
        return TRUE;
    }

    public function viewUserById($user_id){
        $sql = "select * from users where user_id = '".$user_id."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $count = $sth->rowCount();

        if($count>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewUserIdByEmail($mail,$moderatorType){
        $sql = "select * from users where mail = '".$mail."' and user_type = '".$moderatorType."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetch();
        $count = $sth->rowCount();
        if($count>0){
            return $data;
        }else{
            return FALSE;
        }
    }
}
