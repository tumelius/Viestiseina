<?php

include 'db.php';

$output = '
<table class="table table-striped">
	<tr>
		<th>Lähettäjä</th>
		<th>Aikaleima</th>
		<th>Viesti</th>
		<th id="kissa">Toimenpide</th>
	</tr>';

// Haetaan viestit tietokannasta
foreach ($dbConn->query("SELECT id, nimi, viesti, DATE_FORMAT(aika, '%T %d.%m.%y') as aika, ok FROM viestit ORDER BY aika DESC") as $viesti) {
	$output .= '<tr>
					<td>' . $viesti['nimi'] . '</td>
					<td>' . $viesti['aika'] . '</td>
					<td>' . $viesti['viesti'] . '</td>
                                            
					<td>
						<a class="btn btn-danger btn-lg poista" id="' . $viesti['id'] . '" data-viesti-id="' . $viesti['id'] . '">Poista</a> 
						</a>';
		if ( $viesti['ok'] == 0 ) {
		
						
			$output	.=		'<a class="btn btn-primary btn-lg julkaise" id="' . $viesti['id'] . '" data-viesti-id="' . $viesti['id'] . '">Julkaise</a>';
		} else {
			$output .=		'<a class="btn btn-warning btn-lg piilota" id="' . $viesti['id'] . '" data-viesti-id="' . $viesti['id'] . '">Piilota</a>';
		}
		
		$output .= '
					</td>
				
				</tr>';
}
$output .= '</table>';

echo $output;