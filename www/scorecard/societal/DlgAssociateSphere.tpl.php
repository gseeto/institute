<h3>Select Spheres of Influence</h3>
<h4>Strategy:</h4>
<?php $_CONTROL->lblStrategy->Render();?>
<p>Select which Spheres or Sectors this Strategy is associated with.</p>
<?php 
	foreach($_CONTROL->chkSpheres as $chkSphere) {
		$chkSphere->Render();
	}
?>
<br>
<?php 
$_CONTROL->btnUpdate->Render();
$_CONTROL->btnCancel->Render();
?>
