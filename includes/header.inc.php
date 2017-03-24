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
		<link href="<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/ui-lightness/jquery-ui-1.10.1.custom.css" rel="stylesheet">
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/jquery-1.9.0.js"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/jquery-ui-1.10.0.custom.js"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/amcharts.js" type="text/javascript"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/pie.js" type="text/javascript"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/radar.js" type="text/javascript"></script>
		<script src="<?php _p(__VIRTUAL_DIRECTORY__ . __JS_ASSETS__); ?>/serial.js" type="text/javascript"></script>
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
	<div class="container-fluid">
<?php $this->RenderBegin(); ?>
<?php if (QApplication::$Login) { ?>
	<div class="row">
		<div class="col-md-6">
			<img class="img-responsive" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/logo.jpg" />
		</div>
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-3">
			<div style="padding-top:5px;">
			Welcome, <strong><?php _p(QApplication::$Login->__get('Username')); ?></strong>
			&nbsp;|&nbsp;
			<a href="<?php _p(__SUBDIRECTORY__)?>/logout/" title="Log Out of The Institute Portal">Logout</a>
			<br/>
			</div>
		</div>
	</div>
	<!-- Put the Navigation here -->
	<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
		<?php
		foreach (InstituteForm::$NavSectionArray as $intNavSectionId => $strNavSectionArray) {
			$strClassInfo = ($intNavSectionId == $this->intNavSectionId) ? 'class="active"' : null;
			if (($intNavSectionId == InstituteForm::NavSectionAdministration)||($intNavSectionId == InstituteForm::NavSectionAnalytics)) {
				if (QApplication::$Login->IsAdmin())
					printf('<li id="%s" %s><a href="%s%s" title="%s">%s</a></li>',
						$strNavSectionArray[0],$strClassInfo, __SUBDIRECTORY__,$strNavSectionArray[1], $strNavSectionArray[0], $strNavSectionArray[0]
						);
			} else {
				printf('<li id="%s" %s ><a href="%s%s" title="%s">%s</a></li>',
					 $strNavSectionArray[0], $strClassInfo,__SUBDIRECTORY__,$strNavSectionArray[1], $strNavSectionArray[0], $strNavSectionArray[0]
				);
			}
		}
		?>
		</ul>
	</div>
	</nav>
<?php }  ?>