<?php
session_start();
include "connection.php";


take_log("Request Recevied");

if (isset($_REQUEST) && isset($_REQUEST['action'])) {
	take_log("Request Recevied");
	$action = $_REQUEST['action'];
	take_log("action is =" . $action);
	if ($action === "create") {
		$user_info = $_POST["user_info"];
		$obj = json_decode($user_info);



		$name = $obj->{'name'};
		$family = $obj->{'family'};
		$username = $obj->{'username'};
		$email = $obj->{'email'};
		$password = $obj->{'password'};

		take_log("input name = " . $name);
		take_log("input family = " . $family);
		take_log("input username = " . $username);
		take_log("input email = " . $email);
		take_log("input password = " . $password);

		$db_connection = new PDOConnection();
		$state = $db_connection->add_new_user($name, $family, $username, $password, $email);

		$json_response =
			[
				"valid" => $state
			];
		echo json_encode(["status" => 200, "response" => $json_response]);

	}
	if ($action === "login") {
		$user_info = $_POST["user_info"];
		$obj = json_decode($user_info);

		$username = $obj->{'username'};
		$password = $obj->{'password'};


		take_log("input username = " . $username);
		take_log("input password = " . $password);

		$db_connection = new PDOConnection();
		$userid = $db_connection->authenticate($username, $password);
		$_SESSION['userid'] = $userid;
		$state = false;
		if (strlen($userid) > 0)
			$state = true;
		$json_response =
			[
				"valid" => $state
			];
		echo json_encode(["status" => 200, "response" => $json_response]);

	}
}

?>