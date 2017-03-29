<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminIntegrationAssessmentsForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Integration Assessments';
	
	protected function Form_Create() {			
				
	}
}

AdminIntegrationAssessmentsForm::Run('AdminIntegrationAssessmentsForm');
?>