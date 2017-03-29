<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminTenPandFForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage 10-P and 10-F Assessments';
	
	protected function Form_Create() {			
				
	}
}

AdminTenPandFForm::Run('AdminTenPandFForm');
?>