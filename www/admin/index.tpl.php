<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<?php $this->pnlSideNav->Render(); ?> 
<?php $this->pnlMainContent->Render(); ?> 
<?php $this->objDefaultWaitIcon->Render(); ?>

<script type="text/javascript">
function lblDescription_Clicked(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("lblDescription".length);
   // alert("got the dang function call. intIndex = " + intIndex);
    $("#lblDescription"+intIndex+"_ctl").hide();
	$("#txtDescription"+intIndex+"_ctl").show();
	$("#btnDescriptionSave"+intIndex+"_ctl").show();
	$("#btnDescriptionCancel"+intIndex+"_ctl").show();
}'';

function btnCancelDescription_Click(objControl) {
	var strControlId = objControl.id;
 	var intIndex = strControlId.substr("btnDescriptionCancel".length);
	$("#lblDescription"+intIndex+"_ctl").show();	
	var oldText = $("#lblDescription"+intIndex).text();
	$("#txtDescription"+intIndex).text(oldText);
	$("#txtDescription"+intIndex+"_ctl").hide();
	$("#btnDescriptionSave"+intIndex+"_ctl").hide();
	$("#btnDescriptionCancel"+intIndex+"_ctl").hide();
}
</script>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>