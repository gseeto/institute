<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class UpwardAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Education 8-P Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objUpwardAssessment;
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
		
		$assessmentArray = UpwardAssessment::LoadArrayByUserId($intUserId);
		$this->objUpwardAssessment = $assessmentArray[0];

		$this->btnView = new QButton($this);
        $this->btnView->Text = 'View Assessment Results';
	 	$this->btnView->CssClass = 'primary';
	 	$this->btnView->AddAction(new QClickEvent(), new QAjaxAction('btnView_Click'));	
	 	
	 	$this->btnEdit = new QButton($this);
	 	$this->btnEdit->CssClass = 'primary';
	 	$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));	
		
	 	$this->lblMsg = new QLabel($this);
	 	
		// Check status of Assessment. See if untouched, taken or inactive
		// 1 = untouched
		// 2 = touched
		// 3 = inactive
		switch($this->objUpwardAssessment->ResourceStatusId) {
			case 1:
				$this->btnEdit->Text = 'Take Assessment';
				$this->btnView->Enabled = false;
				break;
			case 2:
				$this->btnEdit->Text = 'Edit Assessment Results';
				break;
			case 3:				
				$this->lblMsg->Text = 'Your Education 8-P Assessment has been deactivated. Contact the Administrator if you wish it reactivated.';
				break;
		}
	}
	
	protected function btnEdit_Click() {	
		if ($this->objUpwardAssessment->ResourceStatusId == 1) {
			QApplication::Redirect('newAssessment.php/create');
		} else {
			QApplication::Redirect('newAssessment.php/edit');
		}
	}
	
	protected function btnView_Click() {	
		QApplication::Redirect('viewAssessment.php');
	}
}

UpwardAssessmentForm::Run('UpwardAssessmentForm');
?>