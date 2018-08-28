<?php
require "config/dbConfig";
	class configClass{

		//private property
		/*private $db_conn;
		private $db_dsn  = 'mysql:host=localhost; dbname=dbase';
		private $db_user = 'root';
		private $db_pass = '';*/
		//for heroku
    	private $db_url;
		private $db_dsn;
		private $db_host;
		private $db_user;
		private $db_pass;	
		private $db_name;	
		private $db_conn;

		//public properties
		public $username;
		public $password;
		public $email;

		function __construct($username='',$password = '',$email = '' )
		{
			$this->username =$username;
			$this->password = $password;
			$this->email   = $email;
			$this->db_url  = parse_url(getenv("CLEARDB_DATABASE_URL")); 
			$this->db_host = isset($this->db_url['host'])? $this->db_url['host'] : 'localhost';
			$this->db_user = isset($this->db_url['user'])? $this->db_url['user'] : 'root';
			$this->db_pass = isset($this->db_url['pass'])?$this->db_url['pass'] : '';
			$this->db_name = strlen($this->db_url['path']) > 0 ? substr($this->db_url["path"], 1) : 'dbase'; 
			$this->db_dsn  = 'mysql:host='.$this->db_host.'; dbname='.$this->db_name; //var_dump($this->db_dsn);exit();
			$this->db_conn = $this->dbConnect();
		}

		function dbConnect(){
       		try{
                $connect = new PDO($this->db_dsn, $this->db_user,$this->db_pass);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDPException $e){
                die ("connection failed:". $e->getMessage());
            }
            return $connect;
		}

		function createTable(){
			try{
				$sql ="CREATE TABLE IF NOT EXISTS `boousttest` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `username` varchar(60) NOT NULL,
				  `password` varchar(60) NOT NULL,
				  `email` varchar(100) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `email` (`email`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ";
				$this->db_conn->exec($sql);
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function insert(){
			$hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO boousttest(username,password,email) VALUES(:username,:password,:email)";
            $stmt = $this->db_conn->prepare($sql);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password',$hashed_password);
            $stmt->bindParam(':email',$this->email);
            if ($stmt->execute()) {
                $message="success";
            }
            else{
                $message="something went wrong";
            }
           
        }

		public function login(){
			//var_dump($this->email,$this->password); exit;
			$sql="SELECT id, username,email,password FROM boousttest WHERE email=:email";
			$stmt = $this->db_conn->prepare($sql);
           	$stmt->execute(array(
           		
           		'email'=>$this->email

           	));
			$row = $stmt->rowCount();
			if($row >0) {
				$result = $stmt->fetch();
				if(password_verify($this->password,$result['password'])){
					session_start();
					$message="success";
					 $_SESSION['user'] =$this->email;
					 $_SESSION['username'] =$result['username'];
					header("location:/view.php");
				}else{
					$message = 'username or password invalid';
				}
  			}
  			else{
  				$message="This user account dosent exist";
  			}
			echo "<p>".$message."</p>";	
		}
		public function logout(){
			//header("location:/index.php");
			session_unset();	
			session_destroy(); 
			
			//return TRUE;
		}
		public function emailExists(){
			$sql="SELECT  count(email) as email_record FROM boousttest WHERE email=?";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute([$this->email]);
			$result = $stmt->fetch();	
			if ($result['email_record'] > 0) {
				return false;
			}
			return true;
		}

		public function validateName(){
				if(!preg_match("/[a-zA-Z'-]/",$this->username)){
					return false;
				}
				return true;
		}
		public function validatePassword(){
				
				if (strlen($this->password)<=5) {
					return false;
				}
				return true;
		}
	
		public function validateEmail(){

			if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
				return false;
			}
			
			return true;
		} 
	}	
?>

