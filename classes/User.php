<?php
include "config/dbConfig.php";
	class User{

		public $address;
		public $favourite_movie;
		public $city;
		public $state;
		public $zip;
		public $age;
		public $email;
		public $description;
		public $vid;
		public $location;
		public $delete;
		function __construct($address='',$favourite_movie = '',$city = '',$state = '',$zip = '',$age = '',$email='',$description='',$vid='',$location='',$delete='' ){
			$this->address=$address;
			$this->favourite_movie=$favourite_movie;
			$this->city=$city;
			$this->state=$state;
			$this->zip=$zip;
			$this->age=$age;
			$this->email=$email;
			$this->description=$description;
			$this->vid=$vid;
			$this->location=$location;
			$this->delete=$delete;
			
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
				$sql ="CREATE TABLE IF NOT EXISTS `user_uploads` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `address` varchar(300) NOT NULL,
				  `favourite_movie` varchar(100) NOT NULL,
				  `city` varchar(100) NOT NULL,
				  `state` varchar(100) NOT NULL,
				  `zip` int(5) NOT NULL,
				  `age` int(3) NOT NULL,
				   `email` varchar(70) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ";
				$this->db_conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		public function insert(){
			$sql = "INSERT INTO user_uploads (address,favourite_movie,city,state,zip,age,email) VALUES(:address,:favourite_movie,:city,:state,:zip,:age,:email)";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':favourite_movie',$this->favourite_movie);
            $stmt->bindParam(':city',$this->city);
            $stmt->bindParam(':state', $this->state);
            $stmt->bindParam(':zip',$this->zip);
            $stmt->bindParam(':age',$this->age);
            $stmt->bindParam(':email', $this->email);
            if ($stmt->execute()) {
                $message="success";
            }
            else{
                $message="something went wrong";
            }
           echo $message;   
		}
		public function viewprofile(){
			try{
				$sql="SELECT * FROM user_uploads WHERE email=?";
				$stmt = $this->db_conn->prepare($sql);
				$stmt->bindParam(':email', $this->email);
				$stmt->execute([$this->email]);
				$result=$stmt->fetch(PDO::FETCH_ASSOC);
				if(count($result)>0){
					$_SESSION['favourite_movie']=$result['favourite_movie'];
					$_SESSION['city']=$result['city'];
					$_SESSION['state']=$result['state'];
					$_SESSION['age']=$result['age']; 
					$_SESSION['address']=$result['address'];
					$_SESSION['mailaddress']=$result['email'];
				}
			}
			catch(PDOException $e){
			echo $e->getMessage();
			}

		}
		public function updateProfile(){
			$query="SELECT * FROM user_uploads WHERE email=?";
			$statement = $this->db_conn->prepare($query);
			$statement->bindParam(':email', $this->email);
			$statement->execute([$this->email]);
			$res=$statement->fetch(PDO::FETCH_ASSOC);
			if(count($res)>0){
				$_SESSION['mailaddresss']=$res['email'];
			}
			$sql="UPDATE `user_uploads` SET `address`=:address, `favourite_movie`=:movie, `city`=:city, `state`=:state, `zip`=:zip,`age`=:age WHERE `email`=:email";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->bindParam(":address", $this->address ); 
			$stmt->bindParam(":movie", $this->favourite_movie); 
			$stmt->bindParam(":city", $this->city); 
			$stmt->bindParam(":state", $this->state); 
			$stmt->bindParam(":zip", $this->zip ); 
			$stmt->bindParam(":age", $this->age); 
			$stmt->bindParam(':email', $this->email); 
			if($stmt->execute() && $_SESSION['mailaddresss']!=null){	
				echo "success";
			}
			$stmt->closeCursor();
		}
		public function logout(){
			
		}
		public function createvideo(){
			try{
				$sql ="CREATE TABLE IF NOT EXISTS `video` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `description` varchar(300) NOT NULL,
				  `location` varchar(100) NOT NULL,
				   `email` varchar(70) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ";
				$this->db_conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}

		}
		public function insertvideo(){
			$sql = "INSERT INTO video (description,location,email) VALUES(:description,:location,:email)";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':location',$this->location);
            $stmt->bindParam(':email',$this->email);
            if ($stmt->execute()) {
                $message="success";
            }
            else{
                $message="something went wrong";
            }
           echo $message;   
		}
		public function viewvideo(){
			try{
				$sql="SELECT * FROM video WHERE email=? ORDER BY ID DESC LIMIT 4";
				$stmt = $this->db_conn->prepare($sql);
				$stmt->bindParam(':email', $this->email);
				$stmt->execute([$this->email]);
				//$result=$stmt->fetch(PDO::FETCH_ASSOC);
				 while ( $result = $stmt->fetch() ) {
					$_SESSION['id']=$result['id'];
					$type=$result['description'];
					$name=$result['location'];
					$usermail=$result['email'];
					echo "<video width='200' height='300' style='margin:10px;'controls><source src='$name' type='video/mp4'></video>$name".
						"<a class='btn btn-primary' href='classes/User.php?deletevideo=".$result['id']."'>Delete Video</a>";

				}
			}
			catch(PDOException $e){
			echo $e->getMessage();
			}

		}
		
		public function deletevideo($id){
			
			try{
				$sql="SELECT * FROM video WHERE id=? ORDER BY ID DESC LIMIT 4";
				$stmt = $this->db_conn->prepare($sql);
				$stmt->bindParam(':email', $id);
				$stmt->execute([$id]);
				//$result=$stmt->fetch(PDO::FETCH_ASSOC);
				 while ( $result = $stmt->fetch() ) {
					$_SESSION['id']=$result['id'];
					$type=$result['description'];
					$name=$result['location'];
					$_SESSION['name']=$result['location'];
					$usermail=$result['email'];
					
					
					}
				}catch(PDOException $e){
				echo $e->getMessage();
				}
				$query="DELETE FROM video WHERE location=? ";
				$statement=$this->db_conn->prepare($query);
				$statement->bindParam(':location',$name);
				$statement->execute([$name]);

		}

	}
	
	
	if (isset($_GET['deletevideo'])) {
		$video_id = $_GET['deletevideo'];
	
		$model = new User();
		$model->deletevideo($video_id);
		header("location:/viewProfile.php");
	}
?>