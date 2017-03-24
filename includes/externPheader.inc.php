<?php
	// This example header.inc.php is intended to be modified for your application.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (isset($strPageTitle)) { ?>
		<title><?php _p($strPageTitle); ?></title>
<?php } ?>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/styles.css");</style>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/amcharts.js" type="text/javascript"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/radar.js" type="text/javascript"></script>
	</head><body>
	<div class="container-fluid">
<?php $this->RenderBegin(); ?>

	<img  src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/login_logo.png"  />
	<hr></hr>
