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
	else if ($action === "login") {
		$user_info = $_POST["user_info"];
		$obj = json_decode($user_info);

		$username = $obj->{'username'};
		$password = $obj->{'password'};


		take_log("input username = " . $username);
		take_log("input password = " . $password);

		$db_connection = new PDOConnection();
		$userid = $db_connection->authenticate($username, $password);
		$_SESSION['userid'] = $userid;
		take_log("userid = " . $_SESSION['userid']);

		$state = false;
		if (strlen($userid) > 0)
			$state = true;
		$json_response =
			[
				"valid" => $state
			];
		echo json_encode(["status" => 200, "response" => $json_response]);

	}
	else if ($action === "logout") {
		$_SESSION['userid'] = '';
		$json_response =
			[
				"valid" => true
			];
		echo json_encode(["status" => 200, "response" => $json_response]);
	}
	else if ($action === "add_request") {
		take_log("new request received!");

		$user_info = $_POST["request_info"];
		$obj = json_decode($user_info);


		$userid = $_SESSION['userid'];
		$title = $obj->{'title'};
		$description = $obj->{'description'};
		$points = $obj->{'points'};

		take_log("input userid = " . $userid);
		take_log("input title = " . $title);
		take_log("input description = " . $description);
		//take_log("input points = " . $points);



		$db_connection = new PDOConnection();
		$request_id = $db_connection->add_new_request($userid, $title, $description);
		if (strlen($request_id) > 0) {
			foreach ($points as $p) { //foreach element in $arr
				$latitude = $p->{'latitude'};
				$longitude = $p->{'longitude'};
				$db_connection->add_new_point($request_id, $latitude, $longitude);
			}
			$json_response =
				[
					"valid" => true
				];
			echo json_encode(["status" => 200, "response" => $json_response]);
		} else {
			$json_response =
				[
					"valid" => false
				];
			echo json_encode(["status" => 200, "response" => $json_response]);
		}

	} 
	else if ($action === "load_requests") {
		take_log("load user requests!");

		$userid = $_SESSION['userid'];

		take_log("input userid = " . $userid);
		//take_log("input points = " . $points);

		$db_connection = new PDOConnection();
		$request_content = $db_connection->get_all_user_requests($userid);
		$json_requests = json_encode($request_content);
		take_log("output json = " . $json_requests);
 
		echo json_encode(["status" => 200, "json" => $json_requests]); 
	}
	else if ($action === "get_vertices") {
		take_log("load request vertices!");

		$request_info = $_POST["request_info"];
		take_log("input json = " . $request_info);
		$obj = json_decode($request_info);

		$request_id = $obj->{'requestid'};

		take_log("input request_id = " . $request_id);
		//take_log("input points = " . $points);

		$db_connection = new PDOConnection();
		$request_content = $db_connection->get_request_points($request_id);
		$json_requests = json_encode($request_content);
		take_log("output json = " . $json_requests);
 
		echo json_encode(["status" => 200, "json" => $json_requests]);

	}
}

?>