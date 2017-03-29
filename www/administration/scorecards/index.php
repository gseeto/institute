<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminScorecardsForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Scorecards';
	
	protected function Form_Create() {			
				
	}
}

AdminScorecardsForm::Run('AdminScorecardsForm');
?>