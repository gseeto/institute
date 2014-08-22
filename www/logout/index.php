<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Logout();
	QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	
?>