<?php
include "./logger.php"; 
include "connection.php";

 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["file"])) {
     $targetDir = "uploads/";
     $targetFile = $targetDir . basename($_FILES["file"]["name"]);
     if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        take_log("save uploaded file to upload folder");
        take_log($targetFile);

        $apple = new PDOConnection();
		//$state  = $apple->authenticate('wenet', 'ea96c09548fca37a398e9bf711346350');
		$state  = $apple->add_media($uname, $pass);

        echo json_encode(["status" => 200, "response" => 'succeed']);  
    } else {
        take_log("failed to upload selected_file");
        take_log($targetFile);
        echo json_encode(["status" => 200, "response" => 'failed']);  
    }
} else {
    take_log("step invalid");
 }
?>