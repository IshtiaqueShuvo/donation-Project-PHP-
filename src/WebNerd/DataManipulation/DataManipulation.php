<?php
/**
 * Created by PhpStorm.
 * Date: 24-08-19
 * Time: 23.09
 */

namespace App\DataManipulation;

if(!isset($_SESSION))session_start();

use App\Model\Database as DB;
use App\Utility;
use PDO;
use DateTime;


class DataManipulation extends DB
{
//    properties
    public $donatorId;
    public $donatorEmail;
    public $organizationName;
    public $address;
    public $contactNumber;
    public $quantity;
    public $size;
    public $peopleNumber;

    public $bloodGroup;
    public $lastDate;
    public $date;
    public $time;
    public $bloodBag;
    public $requestType;
    public $cause;
    public $amount;
    public $transactionId;
    public $document;

//    properties end

//set data methods
    public function setDonateData($post){

        if(array_key_exists('organizationName',$post)){
            $this->organizationName = $post['organizationName'];
        }

        if(array_key_exists('organizationAddress',$post)){
            $this->address = $post['organizationAddress'];
        }

        if(array_key_exists('contactNumber',$post)){
            $this->contactNumber = $post['contactNumber'];
        }

        if(array_key_exists('quantity',$post)){
            $this->quantity = $post['quantity'];
        }

        if(array_key_exists('size',$post)){
            $this->size = $post['size'];
        }

        if(array_key_exists('email',$post)){
            $this->donatorEmail = $post['email'];
        }

        if(array_key_exists('donatorId',$post)){
            $this->donatorId = $post['donatorId'];
        }

        if(array_key_exists('bloodGroup',$post)){
            $this->bloodGroup = $post['bloodGroup'];
        }

        if(array_key_exists('lastDate',$post)){
            $this->lastDate = $post['lastDate'];
        }
        if(array_key_exists('bloodBag',$post)){
            $this->bloodBag = $post['bloodBag'];
        }
        if(array_key_exists('number',$post)){
            $this->peopleNumber = $post['number'];
        }

        if(array_key_exists('date',$post)){
            $this->date = $post['date'];
        }

        if(array_key_exists('time',$post)){
            $this->time = $post['time'];
        }

        if(array_key_exists('amount',$post)){
            $this->amount = $post['amount'];
        }

        if(array_key_exists('transactionId',$post)){
            $this->transactionId = $post['transactionId'];
        }
//        return $this;


    }

    public function setRequestData($post){

        if(array_key_exists('document',$post)){
            $this->document = $post['document'];
        }

        if(array_key_exists('email',$post)){
            $this->donatorEmail = $post['email'];
        }

        if(array_key_exists('donatorId',$post)){
            $this->donatorId = $post['donatorId'];
        }

        if(array_key_exists('requestType',$post)){
            $this->requestType = $post['requestType'];
        }

        if(array_key_exists('requestType',$post)){
            $this->requestType = $post['requestType'];
        }

        if(array_key_exists('quantity',$post)){
            $this->quantity = $post['quantity'];
        }

        if(array_key_exists('size',$post)){
            $this->size = $post['size'];
        }

        if(array_key_exists('cause',$post)){
            $this->cause = $post['cause'];
        }

        if(array_key_exists('address',$post)){
            $this->address = $post['address'];
        }

        if(array_key_exists('bloodGroup',$post)){
            $this->bloodGroup = $post['bloodGroup'];
        }

        if(array_key_exists('bloodBag',$post)){
            $this->bloodBag = $post['bloodBag'];
        }

        if(array_key_exists('date',$post)){
            $this->date = $post['date'];
        }

        if(array_key_exists('time',$post)){
            $this->time = $post['time'];
        }

        if(array_key_exists('amount',$post)){
            $this->amount = $post['amount'];
        }

        if(array_key_exists('number',$post)){
            $this->peopleNumber = $post['number'];
        }
    }
//set data methods end

//insert data methods
    public function insertCloth(){
        $sql = "select * from users where user_id = '".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $donatorData = $sth->fetch();

        $dataArray = array($this->donatorId, $this->organizationName, $this->address, $this->contactNumber, $this->quantity, $this->size, $this->quantity);
        $sql = "insert into cloth_list (provider_id, organization_name, address, contact_number, quantity, size, available_item) values (?, ?, ?, ?, ?, ?, ?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function insertMoney(){
        $sql = "select * from users where user_id = '".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $donatorData = $sth->fetch();

        $dataArray = array($this->donatorId, $this->organizationName, $this->contactNumber, $this->amount, $this->transactionId, $this->amount);
        $sql = "insert into money_list (provider_id, organization_name, contact_number, amount, transaction, available_item) values (?, ?, ?, ?, ?, ?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function insertFood(){
        $sql = "select * from users where user_id = '".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $donatorData = $sth->fetch();

        $dataArray = array($this->donatorId, $this->organizationName, $this->address, $this->contactNumber, $this->peopleNumber, $this->date, $this->time, $this->peopleNumber);
        $sql = "insert into food_list (provider_id, organization_name, address, contact_number, people_number, date, time, available_item) values (?, ?, ?, ?, ?, ?, ?, ?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function insertBlood(){

        $sql = "select * from users where user_id = '".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $donatorData = $sth->fetch();

        $dataArray = array($this->donatorId, $donatorData->name, $donatorData->contact_number, $donatorData->address, $this->bloodGroup, $this->lastDate);
        $sql = "insert into blood_list (donator_id, donator_name, contact_number, donator_address, blood_group, last_date) values (?, ?, ?, ?, ?, ?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function isBloodDetailsInsertedById($donatorId){
        $sql = "select * from blood_list where donator_id = '".$donatorId."'";
        $sth = $this->dbh->query($sql);

        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $row = $sth->rowCount();
        if($row>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function insertClothRequestData(){
        $sql = "select * from users where user_id='".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetch();


        $dataArray = array($this->donatorId, $data->name, $data->contact_number, $data->address, $this->requestType, $this->quantity, $this->size, $this->cause, $this->document);
        $sql = "insert into request (user_id, user_name, contact_number, address, request_type, quantity, size, cause, document) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function insertBloodRequestData(){
        $sql = "select * from users where user_id='".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetch();


        $dataArray = array($this->donatorId, $data->name, $data->contact_number, $this->address, $this->requestType, $this->cause, $this->bloodGroup, $this->bloodBag, $this->date, $this->time, $this->document);
        $sql = "insert into request (user_id, user_name, contact_number, address, request_type, cause, blood_group, blood_bag, date, time, document) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function insertMoneyRequestData(){
        $sql = "select * from users where user_id='".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetch();


        $dataArray = array($this->donatorId, $data->name, $data->contact_number, $data->address, $this->requestType, $this->amount, $this->cause, $this->document);
        $sql = "insert into request (user_id, user_name, contact_number, address, request_type, amount, cause, document) values(?, ?, ?, ?, ?, ?, ?, ?)";

        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function insertFoodRequestData(){
        $sql = "select * from users where user_id='".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetch();


        $dataArray = array($this->donatorId, $data->name, $data->contact_number, $data->address, $this->requestType, $this->peopleNumber, $this->date, $this->time, $this->cause, $this->document);
        $sql = "insert into request (user_id, user_name, contact_number, address, request_type, people_number, date, time, cause, document) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
//insert data methods end

//update data methods
    public function updateClothListById($productId){
        $sql = "update cloth_list set is_delivered='yes' where id='".$productId."'";
        $status = $this->dbh->exec($sql);

        return $status;
    }

    public function updateFoodListById($productId){
        $sql = "update food_list set is_delivered='yes' where id='".$productId."'";
        $status = $this->dbh->exec($sql);

        return $status;
    }

    public function updateMoneyListById($productId){
        $sql = "update money_list set is_delivered='yes' where id='".$productId."'";
        $status = $this->dbh->exec($sql);

        return $status;
    }

    public function updateMoneyTransactionById($productId){
        $sql = "update money_list set transaction_match='yes' where id='".$productId."'";
        $status = $this->dbh->exec($sql);

        return $status;
    }

    public function updateBloodListById(){
        $sql = "select * from blood_list where donator_id='".$this->donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetch();
        if(($this->contactNumber==$data->contact_number) &&($this->lastDate==$data->last_date) && ($this->bloodBag==0)){
            $sth=TRUE;
            return $sth;
        }else{
            $donated = $data->donated + $this->bloodBag;
            $sql = "update blood_list set contact_number='".$this->contactNumber."', last_date='".$this->lastDate."', donated='".$donated."' where donator_id='".$this->donatorId."'";
            $sth = $this->dbh->exec($sql);
            return $sth;
        }
    }

    public function updateRequestListById($requestId){
        $sql = "update request set is_delivered='yes' where id='".$requestId."'";
        $status = $this->dbh->exec($sql);
        return $status;
    }

//update data methods end

//view methods

    public function viewAllClothList(){
        $sql = "select * from cloth_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllFoodList(){
        $sql = "select * from food_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllMoneyList(){
        $sql = "select * from money_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllClothByDonatorId($donatorId){
        $sql = "select * from cloth_list where provider_id='".$donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllFoodByDonatorId($donatorId){
        $sql = "select * from food_list where provider_id='".$donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllMoneyByDonatorId($donatorId){
        $sql = "select * from money_list where provider_id='".$donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllbloodList(){
        $sql = "select * from blood_list";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }



    public function viewDonatedClothList(){
        $query = "select * from cloth_list as c INNER JOIN cloth_provider as cp on c.organization_name = cp.organization_name";
        $sql = "select * from cloth_provider ";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewDonatedFoodList(){
        $sql = "select * from food_provider";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewDonatedMoneyList(){
        $sql = "select * from money_provider";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }



    public function viewbloodListById($donatorId){
        $sql = "select * from blood_list where donator_id = '".$donatorId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetch();
        return $data;
    }

    public function viewTotalDeleiveredClothes(){
        $totalCloth = 0;
        $sql = "select * from cloth_list";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();

        if($data){
            foreach ($data as $singleData){
                $totalCloth = $totalCloth + ($singleData->quantity - $singleData->available_item);
            }
        }
        return $totalCloth;
    }

    public function viewTotalDonatedBloodBag(){
        $sql = "select donated from blood_list";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        return $data;
    }

    public function viewTotalDeleiveredMoney(){
        $donatedMoney = 0;
        $sql = "select * from money_list where transaction_match='yes'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();

        foreach($data as $singleData){
            $donatedMoney = $donatedMoney + ($singleData->amount - $singleData->available_item);
        }
        return $donatedMoney;
    }

    public function viewTotalDeleiveredFood(){
        $deliveredFood = 0;
        $sql = "select * from food_list";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        if($data){
            foreach($data as $singleData){
                $deliveredFood = $deliveredFood + ($singleData->people_number - $singleData->available_item);
            }
        }

        return $deliveredFood;
    }

    public function viewRequestListByUserId($userId){
        $sql = "select * from request where user_id='".$userId."' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewRequestListDeliveredByUserId($userId){
        $sql = "select * from request where user_id='".$userId."' and is_delivered='yes'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllClothRequestList(){
        $sql = "select * from request where request_type='for_cloth'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllFoodRequestList(){
        $sql = "select * from request where request_type='for_food'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllBloodRequestList(){
        $sql = "select * from request where request_type='for_blood'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewAllMoneyRequestList(){
        $sql = "select * from request where request_type='for_money'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }
//view methods end

//blood donator suggestions
    public function suggestBloodDonatorByRequestGroup($requestGroup,$donatingDate){
        $currentDate = date('Y-m-d');
        $date = new DateTime($currentDate);
        $date->modify('-4 month');
        $eligibilityDate = $date->format('Y-m-d');

        $sql = "select * from blood_list where blood_group='".$requestGroup."' and last_date<'".$donatingDate."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }

    }
    //blood donator suggestions end

//    total feed
    public function totalFeed(){
        $sql ="select * from food_list where is_delivered='yes'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        return $data;
    }


    public function updateFoodAvailable($availableItem, $productId,$donatedPerson,$donatedItem,$organizationName,$providerId){
        $query = "insert into food_provider (provider_id,organization_name,donatedPerson,item_donate,time,date) VALUE ('".$providerId."','".$organizationName."','".$donatedPerson."','".$donatedItem."',now(),now())";
        $data = $this->dbh->exec($query);
        if($availableItem==0){
            $sql = "update food_list set available_item='".$availableItem."', is_delivered='yes' where id='".$productId."'";
            $status = $this->dbh->exec($sql);

            return $status;
        }else{
            $sql = "update food_list set available_item='".$availableItem."' where id='".$productId."'";
            $status = $this->dbh->exec($sql);

            return $status;
        }

    }

    public function updateClothAvailable($availableItem, $productId,$donatedPerson,$totalItem,$organizationName,$providerId,$item_donate){
        $query = "insert into cloth_provider (provider_id,organization_name,quantity,available_item,donatedPerson,item_donate) VALUE ('".$providerId."','".$organizationName."','".$totalItem."','".$availableItem."','".$donatedPerson."','".$item_donate."')";
        $data = $this->dbh->exec($query);
       if($availableItem==0){
            $sql = "update cloth_list set donatedPerson = '".$donatedPerson."', available_item='".$availableItem."', is_delivered='yes' where id='".$productId."'";
            $status = $this->dbh->exec($sql);

            return $status;
        }else{
            $sql = "update cloth_list set donatedPerson = '".$donatedPerson."' , available_item='".$availableItem."' where id='".$productId."'";
            $status = $this->dbh->exec($sql);

            return $status;
        }

    }

    public function updateMoneyAvailable($availableItem, $productId,$donatedPerson,$donatedItem,$providerId){
        $query = "insert into money_provider (provider_id,donatedPerson,amount,time,date) VALUE ('".$providerId."','".$donatedPerson."','".$donatedItem."',now(),now())";
        $data = $this->dbh->exec($query);

        if($availableItem==0){
            $sql = "update money_list set available_item='".$availableItem."', is_delivered='yes' where id='".$productId."'";
            $status = $this->dbh->exec($sql);

            return $status;
        }else{
            $sql = "update money_list set available_item='".$availableItem."' where id='".$productId."'";
            $status = $this->dbh->exec($sql);

            return $status;
        }

    }

    public function totalRequestNumber(){
        $requestNumber = 0;
        $sql = "select * from cloth_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();

        $sql = "select * from request where request_type='for_cloth' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();

        $sql = "select * from food_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();

        $sql = "select * from request where request_type='for_food' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();

        $sql = "select * from money_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();

        $sql = "select * from request where request_type='for_money' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();


        $sql = "select * from request where request_type='for_blood' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();

        return $requestNumber;

    }

    public function clothDonationNumber(){
        $requestNumber = 0;
        $sql = "select * from cloth_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();
        return $requestNumber;
    }

    public function clothRequestNumber(){
        $requestNumber = 0;
        $sql = "select * from request where request_type='for_cloth' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();
        return $requestNumber;
    }

    public function foodDonationNumber(){
        $requestNumber = 0;
        $sql = "select * from food_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();
        return $requestNumber;
    }

    public function foodRequestNumber(){
        $requestNumber = 0;
        $sql = "select * from request where request_type='for_food' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();
        return $requestNumber;
    }

    public function moneyDonationNumber(){
        $requestNumber = 0;
        $sql = "select * from money_list where is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();
        return $requestNumber;
    }

    public function moneyhRequestNumber(){
        $requestNumber = 0;
        $sql = "select * from request where request_type='for_money' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();
        return $requestNumber;
    }

    public function bloodRequestNumber(){
        $requestNumber = 0;
        $sql = "select * from request where request_type='for_blood' and is_delivered='no'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        $requestNumber = $requestNumber + $sth->rowCount();
        return $requestNumber;
    }


}