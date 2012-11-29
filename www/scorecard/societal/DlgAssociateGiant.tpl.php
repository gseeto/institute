<h3>Select Societal Ills</h3>
<h4>Strategy:</h4>
<?php $_CONTROL->lblStrategy->Render();?>
<div style='clear:both'></div>
<table>
	<tr>
	<td>
		<h4>Giants To Select From</h4>
		<?php $_CONTROL->lstGiants->Render();?>
	</td>
	<td>
		<br><br>
		<?php $_CONTROL->btnSelect->Render();?>
		<br>
		<?php $_CONTROL->btnDeselect->Render();?>
	</td>
	<td>
		<h4>Selected Giants</h4>
		<?php $_CONTROL->lstSelectedGiants->Render();?>
	</td>
	</tr>
</table>
<div style='clear:both'></div>
<br>
<p>If you are addressing a Societal Ill that isn't yet listed then <?php $_CONTROL->btnAddGiant->Render()?></p> 
<?php $_CONTROL->pnlAddGiant->Render();?>
<?php 
$_CONTROL->btnUpdate->Render();
$_CONTROL->btnCancel->Render();
?>
