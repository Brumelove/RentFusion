<?php
//namespace Model;
/*class dbConfig{

    protected $host = "localhost";
    protected $dbname = "";
    protected $user = "root";
    protected $pass = "";
    protected $DBH;

    function __construct() {

        try {

            $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        }
        catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function connect(){
        
            $this->DBH->beginTransaction();
            $this->DBH->commit();
        return  $this->DBH;
    }
  public function closeConnection(){

        $this->DBH = null;
    }
    public function pdoObj(){
        $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->DBH;
    }
} */



    #connect to database 
    $hostname = "db4free.net";
    $username = "brumelove";
    $password = "brumelovee";
    $dbname = "brumelove";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if(!conn){
        echo "Connection failed";
    }else{
        echo "Connection successful";
    }

?>