<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminVentureForm extends InstituteForm {
	
	protected $strPageTitle = 'Venture Post Survey';
	
	protected function Form_Create() {			
				
	}
}

AdminVentureForm::Run('AdminVentureForm');
?>