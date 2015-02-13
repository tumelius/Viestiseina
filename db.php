<?php
//db.php
$servername = 'paja.esedu.fi';
$username = 'viestiUser';
$password = 'qwerty';
$dbname = 'viestiseina';

try {
	$dbConn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	}
catch(PDOException $e) 
	{
	echo $e->getMessage();
	}

?>