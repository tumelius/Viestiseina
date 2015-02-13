<?php

// addMessage.php

include 'db.php';

if ( !isset( $_POST['viesti']) || empty($_POST['viesti'])) {
	echo("Jotain outoa yritettiin tehdä!!!");
}

$nimi = ( empty($_POST['nimi']) ) ? 'anonymous' : $_POST['nimi'];

$viesti = ( empty($_POST['viesti'] ) ) ? 'ei viestiä' : $_POST['viesti'];

/* Tavallinen tapa */
$sql = "INSERT INTO `viestiseina`.`viestit` (`viesti`, `nimi`) 
        VALUES ('$viesti', '$nimi');";

$dbConn->exec($sql);

$dbConn = null;

// header('Location: index.php');

echo 'ok';

?>