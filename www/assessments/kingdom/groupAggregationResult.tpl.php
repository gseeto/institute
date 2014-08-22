<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<h2>Kingdom Business Impact Group Aggregation Results for <?php _p($this->objGroupAssessment->KeyCode)?></h2>
<h3>List of Users within this Kingdom Business Impact Group:</h3>
<?php $this->dtgUsers->Render(); ?>
<br>
<?php $this->btnSubmit->Render();?>
<br><br>
<?php $this->lblDebug->Render(); ?>
<?php $this->tabCharts->Render(); ?>



<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
