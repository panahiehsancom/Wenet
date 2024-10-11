<?php

session_start();

include "connection.php";
include 'logger.php';

take_log("Request Recevied");

if (isset($_REQUEST) && isset($_REQUEST['action'])) {
	take_log("Request Recevied");
	$action = $_REQUEST['action'];
	if ($action === "auth") {
		$authdata = $_POST["auth_data"];
		$obj = json_decode($authdata);
		$uname = $obj->{'uname'};
		$pass = $obj->{'pass'};
		take_log("input username = ". $uname);
		take_log("input password = ". $pass);
		
		$apple = new PDOConnection();
		//$state  = $apple->authenticate('wenet', 'ea96c09548fca37a398e9bf711346350');
		$state  = $apple->authenticate($uname, $pass);
		if($state)
		{
			take_log("login success");
			$json_response =
						[
							"valid" => true
						];
			echo json_encode(["status" => 200, "response" => $json_response]);
		}
		else
		{
			take_log("login Failed");
			$json_response =
						[
							"valid" => false
						];
			echo json_encode(["status" => 200, "response" => $json_response]);
		}
	}
	else{
		take_log("action does not have auth value");
	}
}
else{
		take_log("request does not in post mode or does not contain action"); 
}	
?>