<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h3>Add New User</h3>
<?php $this->txtFirstName->RenderWithName(); ?> 
<?php $this->txtLastName->RenderWithName(); ?>
<?php $this->txtEmail->RenderWithName(); ?>  
<?php $this->lstGender->RenderWithName(); ?> 
<?php $this->lstCountry->RenderWithName(); ?>
<?php $this->lstLevel->RenderWithName(); ?> 
<?php $this->lstTenure->RenderWithName(); ?>  
<?php $this->txtUserName->RenderWithName(); ?> 
<?php $this->txtPassword->RenderWithName(); ?> 
<?php $this->lstRole->RenderWithName(); ?> 
<div class="subsection">
<table>
<tr>
	<td><?php $this->chkLemon->Render(); ?></td><td><?php $this->txtLemonKeycode->RenderWithName(); ?> </td>
</tr>
<tr>
	<td><?php $this->chkTenP->Render(); ?></td><td><?php $this->txtTenPKeycode->RenderWithName(); ?> </td>
</tr>
<tr>
	<td><?php $this->chkTenF->Render(); ?></td><td><?php $this->txtTenFKeycode->RenderWithName(); ?> </td>
</tr>
<tr>
	<td><?php $this->chkKingdom->Render(); ?></td><td><?php $this->txtKingdomKeycode->RenderWithName(); ?> </td>
</tr>
<tr>
	<td><?php $this->chkIntegration->Render(); ?></td><td><?php $this->txtIntegrationKeycode->RenderWithName(); ?> </td>
</tr>
<tr>
	<td><?php $this->chkSeasonal->Render(); ?></td><td><?php $this->txtSeasonalKeycode->RenderWithName(); ?> </td>
</tr>
<tr>
	<td><?php $this->chkTime->Render(); ?></td><td><?php $this->txtTimeKeycode->RenderWithName(); ?> </td>
</tr>
<tr>
	<td><?php $this->chkLRA->Render(); ?></td><td><?php $this->txtLRAKeycode->RenderWithName(); ?> </td>
</tr>
</table>
</div>
 	
<?php $this->btnSubmit->Render(); ?> 
<?php $this->btnCancel->Render(); ?> 

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>