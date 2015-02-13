<?php

include 'db.php';

//getMessages.php
$output = '';

// Haetaan viestit tietokannasta
foreach ($dbConn->query("SELECT nimi, viesti, DATE_FORMAT(aika, '%k:%i %d.%m.%y') as aika FROM viestit WHERE ok = 1 ORDER BY aika DESC") as $viesti) {
	$output .= '<div class="kupla">' . 
                        '<p>' . $viesti['viesti'] . '</p>' .
                   '</div>' .
                   '<p class="sender">' . $viesti['nimi'] . ' sanoi ' . $viesti['aika'] . '</p>';
}

echo $output;