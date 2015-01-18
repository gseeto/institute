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
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/ui-lightness/jquery-ui-1.10.0.custom.css");</style>
		<link href="<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/ui-lightness/jquery-ui-1.10.1.custom.css" rel="stylesheet">
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/jquery-1.9.0.js"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/jquery-ui-1.10.0.custom.js"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/amcharts.js" type="text/javascript"></script>
		
  	<script>
  	$(function() {
    	$( "#tabs" ).tabs();
    	jQuery( "#accordion" ).accordion();

    	initializeDefinitions();
    	// Display the first Category Definition for Time
    	$('.definitions').css("display", "none");
    	jQuery('#careerdef').css("display","block");
    	jQuery('#career').css("background","#cccccc");

    	// Display the first Category Definition for Seasons
    	jQuery('#desertdef').css("display","block");
    	jQuery('#desert').css("background","#cccccc");
    });

  	function initializeDefinitions() {
  		$(".def").click(function(){					 
  			var id =  $(this).attr('id');
  			$('.definitions').css("display", "none");
  			$('.def').css("background","#ffffff");
  			$('#'+ id + 'def').css("display","block");
  			$(this).css("background","#cccccc");
  		});
  	}
  </script>
  
	</head><body>
	<div class="container">
<?php $this->RenderBegin(); ?>
<?php if (QApplication::$Login) { ?>
	<img class="logo" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/logo.png" width="1000px" />
	<div class="status">
		Welcome, <strong><?php _p(QApplication::$Login->__get('Username')); ?></strong>
		&nbsp;|&nbsp;
		<a href="<?php _p(__SUBDIRECTORY__)?>/logout/" title="Log Out of The Institute Portal">Logout</a>
		<br/>
	</div>
	<!-- Put the Navigation here -->
	<div class="navbar"><ul class="navbar">
	<?php
	$intWidth = floor(550 / count(InstituteForm::$NavSectionArray));
	foreach (InstituteForm::$NavSectionArray as $intNavSectionId => $strNavSectionArray) {
		$strClassInfo = ($intNavSectionId == $this->intNavSectionId) ? 'class="selected"' : null;
		if (($intNavSectionId == InstituteForm::NavSectionAdministration)||($intNavSectionId == InstituteForm::NavSectionAnalytics)) {
			if (QApplication::$Login->IsAdmin())
				printf('<li style="width: %spx;"><a href="%s%s" %s title="%s">%s</a></li>',
					$intWidth, __SUBDIRECTORY__,$strNavSectionArray[1], $strClassInfo, $strNavSectionArray[0], $strNavSectionArray[0]
					);
		} else {
			printf('<li style="width: %spx;"><a href="%s%s" %s title="%s">%s</a></li>',
				$intWidth, __SUBDIRECTORY__,$strNavSectionArray[1], $strClassInfo, $strNavSectionArray[0], $strNavSectionArray[0]
			);
		}
	}
	?>
	</ul></div>
<?php }  ?>