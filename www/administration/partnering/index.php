<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminPartneringForm extends InstituteForm {
	
	protected $strPageTitle = 'Partnering';
	
	protected function Form_Create() {			
				
	}
}

AdminPartneringForm::Run('AdminPartneringForm');
?>