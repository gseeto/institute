<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

<h1>Scorecard</h1>
<br>
<p>You are a member of the following Scorecards. Please select the scorecard you wish to review</p>
<?php $this->rbnScorecards->Render();?>
<br><br>
<?php $this->btnSubmit->Render('CssClass="btn btn-primary"');?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>