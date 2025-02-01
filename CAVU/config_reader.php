<?php

include 'meta.php';

class ConfigReader
{
	
	 public static function get_database_connection() {
		$config_content =  file_get_contents('config.json');
		
// Check if the file was read successfully
		if ($config_content === false) {
			die('Error reading the Config JSON file(config.json)');
		}
		//echo $config_content . '<br/><br/>';
		$json_data = json_decode($config_content); 
		$config_node = $json_data->system_configuration;
		$database_node = $config_node[0];
		$database_node_zero =  $database_node->database[0];
		//var_dump($database_node_zero->type);
		//var_dump($database_node->database[0]);
		
		$db_info = new DBInfo();
		$db_info->username = $database_node_zero->username;
		$db_info->host = $database_node_zero->host;
		$db_info->db_name = $database_node_zero->db_name;
		$db_info->password = $database_node_zero->password;
		
		return $db_info;	
		 
	}
	
}