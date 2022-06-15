<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 20-11-17
 * Time: 22.57
 */

namespace App\Model;

use PDO, PDOException;
use App\Message\Message;
class Database
{
    /*----------------------------------------------/
    |                                               |
    |                                               |
                  properties
    |                                               |
    |                                               |
    /----------------------------------------------*/
    private $hostName = 'localhost';
    private $dbName = 'emergency_system';
    private $dbUserName = 'root';
    private $dbPassword = '';

    public $dbh;
    /*----------------------------------------------/
                properties end
    /----------------------------------------------*/

    /*----------------------------------------------/
    |                                               |
    |                                               |
                  methods
    |                                               |
    |                                               |
    /----------------------------------------------*/
    public function __construct()
    {
        try{
            $this->dbh = new PDO("mysql:host=localhost;dbname=donation_system","root", "");
            $this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }catch(PDOException $error){
            $error = $error->getMessage();
            Message::message($error);
        }
    }
    /*----------------------------------------------/
                methods end
    /----------------------------------------------*/

}