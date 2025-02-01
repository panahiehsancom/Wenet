<?php

include 'logger.php';
include 'config_reader.php';

class PDOConnection { 
	private $db;
	function __construct()
	{  				
			try
			{		 
				$db_info = ConfigReader::get_database_connection();
				$host =$db_info->host;
				$databaseName = $db_info->db_name;
				$mysql_connection_string = "mysql:host=$host;dbname=$databaseName";
				$this->db = new PDO($mysql_connection_string, $db_info->username, $db_info->password); 
				$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//echo "mysql connection success <br/>";		
			}
			catch(PDOException $error){
				//echo "Failed to connect to db <br/>";
				echo $error->getMessage();
			}
	}  
  
	function NEWGUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}
	
		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	function authenticate($username, $password)
	{ 
		$mysql_db = $this->db;
		$sql = "select userid from Users where Username=:username and Password=:password";
		$stmt = $mysql_db->prepare($sql);
		$stmt->bindValue(':username',$username, PDO::PARAM_STR);
		$stmt->bindValue(':password',$password, PDO::PARAM_STR);
		$result = $stmt->execute();
		if($result)
		{
			$user_info = $stmt->fetch();
			if($user_info)
			{
				//echo $user_info['ID'];
				return true;
			}
		}
		return false;
	}
	function is_email_exist($email)
	{ 
		$mysql_db = $this->db;
		$sql = "select userid from Users where Email=:email";
		$stmt = $mysql_db->prepare($sql);
		$stmt->bindValue(':email',$email, PDO::PARAM_STR); 
		$result = $stmt->execute();
		if($result)
		{
			$user_info = $stmt->fetch();
			if($user_info)
			{
				//echo $user_info['ID'];
				return true;
			}
		}
		return false;
	}
	
	function add_new_user($firstname, $lastname, $username, $password, $email)
	{ 
		if($this->is_email_exist($email) == false)
		{
			take_log("email is available");
			$mysql_db = $this->db;
			$userid = $this->NEWGUID();
			$sql = "insert into Users (firstname, lastname, userid, username, password, email) values  (:firstname, :lastname,:userid, :username, :password, :email)";
			$stmt = $mysql_db->prepare($sql);
			$stmt->bindValue(':firstname',$firstname, PDO::PARAM_STR); 
			$stmt->bindValue(':lastname',$lastname, PDO::PARAM_STR); 
			$stmt->bindValue(':username',$username, PDO::PARAM_STR); 
			$stmt->bindValue(':password',$password, PDO::PARAM_STR); 
			$stmt->bindValue(':email',$email, PDO::PARAM_STR);  
			$stmt->bindValue(':userid',$userid, PDO::PARAM_STR);  
			$result = $stmt->execute();
			if($result)
			{ 
				return true; 
			}
			return false;
		}
		else
		{
			take_log("email already exist"); 
			return false;
		}
	}
}



?>