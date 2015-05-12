<?php
class DBConnector{
	public static function Connect(){
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = new mysqli($servername, $username, $password);
		$conn->select_db ( "webconnect" );

		// Check connection
		if ($conn->connect_error) {
		    return false;
		}
		return true;
	}
}
