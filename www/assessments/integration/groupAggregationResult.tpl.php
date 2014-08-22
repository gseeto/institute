<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<h2>Integration Group Aggregation Results for <?php _p($this->objGroupAssessment->KeyCode)?></h2>
<h3>List of Users within this Integration Group:</h3>
<?php $this->dtgUsers->Render(); ?>
<br>
<?php /*$this->btnSubmit->Render();*/?>
<br><br>
<?php $this->lblDebug->Render(); ?>


<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
