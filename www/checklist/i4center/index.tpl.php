<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<div class="section">
<h2>i4 Center Business Checklist</h2>
<p>Below is a list of Company checklists you are responsible for:</p>
<?php foreach($this->vieweableArray as $objChecklist) { 
	echo  $objChecklist."<br><br>";
}?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>