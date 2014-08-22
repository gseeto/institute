<?php

require(dirname(__FILE__) . '/../includes/prepend.inc.php');
// Extract Post data
extract($_REQUEST);

$objLogin = Login::LoadByUsernamePassword(trim(strtolower($username)), $password);
if (!$objLogin) {
	echo('Invalid email, username or password.<br>');
} else {
	QApplication::Login($objLogin);
	echo('Login to Portal Successful.');
	QApplication::Redirect($returnUrl);
}

?>