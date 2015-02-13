<?php
//delMessage.php
if ( empty($_POST) || !isset($_POST['id']) ) {
	header('Content-Type: text/html; charset=utf-8');
	header('refresh:4;url=admin.php');
	die('sähläsit jotain joten sinun on kuoltava');
}

include 'db.php';

$sql = "DELETE FROM viestit WHERE id = " . $_POST['id'];

$dbConn->exec($sql);		

echo 'ok';

$dbConn = null;

//header('location: admin.php');

?>