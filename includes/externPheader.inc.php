<?php
	// This example header.inc.php is intended to be modified for your application.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
<?php if (isset($strPageTitle)) { ?>
		<title><?php _p($strPageTitle); ?></title>
<?php } ?>
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/styles.css");</style>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/amcharts.js" type="text/javascript"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/radar.js" type="text/javascript"></script>
	</head><body>
	<div class="externPContainer">
<?php $this->RenderBegin(); ?>

	<img  src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/login_logo.png"  />
	<hr></hr>
