<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<h2>LEMON Group Aggregation Results for <?php _p($this->objGroupAssessment->KeyCode)?></h2>
<h3>List of Users within this LEMON Group:</h3>
<?php $this->dtgUsers->Render(); ?>
<br>
<?php $this->btnSubmit->Render();?>

<h3>Group Aggregate Bar Chart</h3>
<?php $this->imgGroupBar->Render(); ?>
<?php $this->lblDebug->Render();?>
<h3>Group Aggregate Radar</h3>
<?php $this->imgGroupRadar->Render(); ?>

<h3>Group First And Second Slices</h3>
<?php $this->imgFirstSecond->Render(); ?>

<h3>Group Pie Chart</h3>
<?php $this->imgGroupPie->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
