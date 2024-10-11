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

}



?>