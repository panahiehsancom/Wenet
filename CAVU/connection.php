<?php

include 'logger.php';
include 'config_reader.php';

class PDOConnection
{
	private $db;
	function __construct()
	{
		try {
			$db_info = ConfigReader::get_database_connection();
			$host = $db_info->host;
			$databaseName = $db_info->db_name;
			$mysql_connection_string = "mysql:host=$host;dbname=$databaseName";
			$this->db = new PDO($mysql_connection_string, $db_info->username, $db_info->password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "mysql connection success <br/>";		
		} catch (PDOException $error) {
			//echo "Failed to connect to db <br/>";
			echo $error->getMessage();
		}
	}

	function NEWGUID()
	{
		if (function_exists('com_create_guid') === true) {
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	function authenticate($username, $password)
	{
		$mysql_db = $this->db;
		$sql = "select userid from Users where Username=:username and Password=:password";
		$stmt = $mysql_db->prepare($sql);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':password', $password, PDO::PARAM_STR);
		$result = $stmt->execute();
		if ($result) {
			$user_info = $stmt->fetch();
			if ($user_info) {
				return $user_info['userid'];
			}
		}
		return '';
	}
	function is_email_exist($email)
	{
		$mysql_db = $this->db;
		$sql = "select userid from Users where Email=:email";
		$stmt = $mysql_db->prepare($sql);
		$stmt->bindValue(':email', $email, PDO::PARAM_STR);
		$result = $stmt->execute();
		if ($result) {
			$user_info = $stmt->fetch();
			if ($user_info) {
				//echo $user_info['ID'];
				return true;
			}
		}
		return false;
	}

	function add_new_user($firstname, $lastname, $username, $password, $email)
	{
		if ($this->is_email_exist($email) == false) {
			take_log("email is available");
			$mysql_db = $this->db;
			$userid = $this->NEWGUID();
			$sql = "insert into Users (firstname, lastname, userid, username, password, email) values  (:firstname, :lastname,:userid, :username, :password, :email)";
			$stmt = $mysql_db->prepare($sql);
			$stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
			$stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
			$stmt->bindValue(':username', $username, PDO::PARAM_STR);
			$stmt->bindValue(':password', $password, PDO::PARAM_STR);
			$stmt->bindValue(':email', $email, PDO::PARAM_STR);
			$stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
			$result = $stmt->execute();
			if ($result) {
				return true;
			}
			return false;
		} else {
			take_log("email already exist");
			return false;
		}
	}
	function add_new_request($userid, $title, $description)
	{
		take_log("insert request in db");

		$mysql_db = $this->db;
		$requestid = $this->NEWGUID();
		$date = date('Y-m-d h:i:s a', time());
		$sql = "insert into UserRequests (RequestID, UserID, RequestTitle, Date, RequestDescription) values  (:RequestID, :UserID,:RequestTitle, :Date, :RequestDescription)";
		$stmt = $mysql_db->prepare($sql);
		$stmt->bindValue(':RequestID', $requestid, PDO::PARAM_STR);
		$stmt->bindValue(':UserID', $userid, PDO::PARAM_STR);
		$stmt->bindValue(':RequestTitle', $title, PDO::PARAM_STR);
		$stmt->bindValue(':Date', $date, PDO::PARAM_STR);
		$stmt->bindValue(':RequestDescription', $description, PDO::PARAM_STR);
		$result = $stmt->execute();
		if ($result)
		{
			take_log("success request id is:".$requestid);

			return $requestid;
		}
		take_log("failed to insert");

		return '';
	}
	 
	function add_new_point($requestid, $lat, $lng)
	{

		$mysql_db = $this->db;
		$PointID = $this->NEWGUID(); 
		$sql = "insert into RequestPoints (PointID, RequestID, Latitude, Longitude) values  (:PointID, :RequestID,:Latitude, :Longitude)";
		$stmt = $mysql_db->prepare($sql);
		$stmt->bindValue(':PointID', $PointID, PDO::PARAM_STR);
		$stmt->bindValue(':RequestID', $requestid, PDO::PARAM_STR);
		$stmt->bindValue(':Latitude', $lat, PDO::PARAM_STR);
		$stmt->bindValue(':Longitude', $lng, PDO::PARAM_STR);
		$result = $stmt->execute();
		if ($result) {
			return true;
		}
		return false;

	}
	function get_all_user_requests($userid)
	{

		take_log("user id is" . $userid);
		$mysql_db = $this->db;
		$sql = "select * from UserRequests where UserID = :UserID";
		$stmt = $mysql_db->prepare($sql);
		$stmt->bindValue(':UserID', $userid, PDO::PARAM_STR);
		$result = $stmt->execute();
		$req_list = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$RequestID = $row['RequestID'];
			$RequestTitle = $row['RequestTitle'];
			$Date = $row['Date'];
			$RequestDescription = $row['RequestDescription'];
			$req = array(
				"RequestID" => $RequestID,
				"RequestTitle" => $RequestTitle,
				"RequestDescription" => $RequestDescription,
				"Date" => $Date
			);
			array_push($req_list, $req);
		}
		return $req_list;

	}
	function get_request_points($req_id)
	{

		take_log("req_id is" . $req_id);
		$mysql_db = $this->db;
		$sql = "select * from RequestPoints where RequestID = :RequestID";
		$stmt = $mysql_db->prepare($sql);
		$stmt->bindValue(':RequestID', $req_id, PDO::PARAM_STR);
		$result = $stmt->execute();
		$point_list = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$Latitude = $row['Latitude'];
			$Longitude = $row['Longitude'];
			$point = array(
				"Latitude" => $Latitude,
				"Longitude" => $Longitude
			);
			array_push($point_list, $point);
		}
		return $point_list;

	}
  
}



?>