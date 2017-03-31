<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class IntegrationAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Integration Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objIntegrationAssessment;
	protected $lblMsg;
	protected $btnView;
	protected $btnEdit;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {		
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		
		$assessmentArray = IntegrationAssessment::LoadArrayByUserId($intUserId);
		$this->objIntegrationAssessment = $assessmentArray[0];

		$this->btnView = new QButton($this);
        $this->btnView->Text = 'View Assessment Results';
	 	$this->btnView->CssClass = 'btn btn-default';
	 	$this->btnView->AddAction(new QClickEvent(), new QAjaxAction('btnView_Click'));	
	 	
	 	$this->btnEdit = new QButton($this);
	 	$this->btnEdit->CssClass = 'btn btn-default';
	 	$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));	
		
	 	$this->lblMsg = new QLabel($this);
	 	
		// Check status of Assessment. See if untouched, taken or inactive
		// 1 = untouched
		// 2 = touched
		// 3 = inactive
		switch($this->objIntegrationAssessment->ResourceStatusId) {
			case 1:
				$this->btnEdit->Text = 'Take Assessment';
				$this->btnView->Enabled = false;
				break;
			case 2:
				$this->btnEdit->Text = 'Edit Assessment Results';
				break;
			case 3:				
				$this->lblMsg->Text = 'Your Integration Assessment has been deactivated. Contact the Administrator if you wish it reactivated.';
				break;
		}
	}
	
	protected function btnEdit_Click() {	
		if ($this->objIntegrationAssessment->ResourceStatusId == 1) {
			QApplication::Redirect('newAssessment.php/create');
		} else {
			QApplication::Redirect('newAssessment.php/edit');
		}
	}
	
	protected function btnView_Click() {	
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/integration/viewAssessment.php/');
	}
}

IntegrationAssessmentForm::Run('IntegrationAssessmentForm');
?>