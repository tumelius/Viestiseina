<?php

// autetntikoi.php

function autentikoiBasic() {

	$valid_passwords = array(	"tuomas" => "salasana", 
								"joulupukki" => "qwerty",
								"simppa" => "huhhuh");
	
	
	$valid_users = array_keys($valid_passwords);
	
	$user = (isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '');
	$pass = (isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '');
	
	$valid = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);
	
	if (!$valid) {
		header('WWW-Authenticate: Basic realm="Salattu alue"');
		header('HTTP/1.0 401 Unauthorized');
		return false;
	} else {
		$_SESSION['user'] = $user;
		return true;
	}
}