<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>
       
<?php // $this->lblDebug->Render(); ?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Scorecards</a></li>
		<li><a href="#tabs-2">LEMON Assessment Emails</a></li>
		<li><a href="#tabs-3">LEMON Assessment Keycodes</a></li>
	</ul>

<div id="tabs-1">
	<h2>Scorecard Analytics</h2>
	<?php $this->dtgScorecard->Render();?>
</div>

<div id="tabs-2">
	<h2>LEMON Assessment Emails</h2>
	<p>List of all known emails of people who have taken an assessment.</p>
	<?php $this->dtgLemonEmails->Render();?>
	<br>
	
</div>
<div id="tabs-3">
	<h2>LEMON Assessment Keycodes</h2>
	<p>List of all Companies (keycodes) who have taken a LEMON assessment.</p>
	<?php $this->dtgLemonKeyCodes->Render();?>
</div>


</div>

<script type="text/javascript">
<!--
	$( "#tabs" ).tabs();
//-->
</script>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>