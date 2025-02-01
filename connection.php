<?php

include 'config_reader.php';
//
//$host = "localhost";
//$databaseName = "wenet_cms";
//$username = "root";
//$password=  "belDEN99**";
//

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
		$sql = "select ID from wenet_users where Username=:username and Password=:password";
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
		echo false;
	}
	function add_media($name, $path)
	{ 
		$mysql_db = $this->db;
		$sql = "insert into wenet_media(ID, Name, Path,Type, Created_By) values (:ID, :Name, :Path,:Type, :CreatedBy)";
		$stmt = $mysql_db->prepare($sql);

		$stmt->bindValue(':ID',$NEWGUID(), PDO::PARAM_STR);
		$stmt->bindValue(':Name',$name, PDO::PARAM_STR);
		$stmt->bindValue(':Path',$path, PDO::PARAM_STR);
		$stmt->bindValue(':Type',1, PDO::PARAM_INT);
		$stmt->bindValue(':CreatedBy', '', PDO::PARAM_STR);

		
		$result = $stmt->execute();
		if($result)
		{
			 
		}
	
	}
}



?>