<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<div class="Section">
	<h2>Global LEMON Statistics</h2>
	<p>Lets calculate some global LEMON statistics from the entire Database and store them here.</p> 
	<?php $this->lblDebug->Render();?>
	<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Averages</a></li>
		<li><a href="#tabs-2">First Slice</a></li>
	</ul>
	<div id="tabs-1">
		<h3>Averages</h3>
		<h4>Overall Average</h4>
		<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemon/globalAverageImg.php'>
		<br>
		<h4>By Gender</h4>
		<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemon/globalAverageGenderImg.php/0'>
		<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemon/globalAverageGenderImg.php/1'>
		<br>
		<h4>By Country</h4>
		<?php 
		foreach($this->countryArray as $country) {
		?>
			<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemon/globalAverageCountryImg.php/<?php _p($country)?>'>
		<?php 
		}
		?>
	</div>
		
	<div id="tabs-2">
		<h3>Primary Slices</h3>
		<h4>Overall Primary Slices</h4>
		<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemon/globalFirstImg.php/global'>
		<br>
		<h4>By Gender</h4>
		<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemon/globalFirstImg.php/gender/0'>
		<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemon/globalFirstImg.php/gender/1'>
		<h4>By Country</h4>
		<?php 
		foreach($this->countryArray as $country) {
		?>
			<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemon/globalFirstImg.php/country/<?php _p($country)?>'>
		<?php 
		}
		?>
	</div>
	
</div>

<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>