<?php
//unpublishMessage.php
if ( empty($_GET) || !isset($_GET['id']) ) {
	header('Content-Type: text/html; charset=utf-8');
	header('refresh:4;url=admin.php');
	die('sähläsit jotain joten sinun on kuoltava');
}

include 'db.php';

$sql = "UPDATE viestit SET ok = '0' WHERE viestit.id = " . $_GET['id'];

$dbConn->exec($sql);		
		
header('location: admin.php');

?>