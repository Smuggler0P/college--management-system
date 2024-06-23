<?php  

include "creds.php";


try {
	$conn = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOExeption $e){
	echo "Connection failed: ". $e->getMessage();
	exit;
}

?>
