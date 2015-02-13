<?php

include 'db.php';

//getMessages.php
$output = '
<table class="table table-striped">
	<tr>
		<th>Lähettäjä</th>
		<th>Aikaleima</th>
		<th>Viesti</th>
	</tr>';

// Haetaan viestit tietokannasta
foreach ($dbConn->query("SELECT nimi, viesti, aika FROM viestit WHERE ok = 1 ORDER BY id") as $viesti) {
	$output .= '<tr>
					<td>' . $viesti['nimi'] . '</td>
					<td>' . $viesti['aika'] . '</td>
					<td>' . $viesti['viesti'] . '</td>
				</tr>';
}
$output .= '
</table>';

echo $output;
?>