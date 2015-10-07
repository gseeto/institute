<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<h2>LEMON Group Aggregation Results for <?php $this->title->Render();?></h2>
<h3>List of Users within this LEMON Group:</h3>
<?php $this->dtgUsers->Render(); ?>
<br>
<?php $this->btnSubmit->Render();?>
<br><br><br>
<?php $this->lblDebug->Render();?>

<?php $this->accordionCharts->Render();?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
