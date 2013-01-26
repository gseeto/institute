<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class AssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Home';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $btnAssessments;
	protected $btnGroupAssessments;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/resources/index.php');
	}
	
	protected function Form_Create() {
		$this->btnAssessments = array();
		$objResourceArray = Resource::LoadAll();
		foreach($objResourceArray as $objResource) {
			if ($objResource->Name != 'Scorecard') {
				$btnResource = new QButton($this);
				$btnResource->Name = $objResource->Id;
				$btnResource->Text = $objResource->Name;
				
				$objUserArray = User::LoadArrayByLoginId(QApplication::$LoginId);
				foreach($objUserArray as $objUser) {
					if($objUser->IsResourceAssociated($objResource)) {
						$btnResource->Enabled = true;
						$btnResource->CssClass = 'assessmentButton';
						switch ($btnResource->Text) {
							case 'Kingdom Business Assessment':
								$btnResource->AddAction(new QClickEvent(), new QAjaxAction('btnKingdomBusinessAssessment_Click'));	
								break;
							case '10-P Assessment':
								$btnResource->AddAction(new QClickEvent(), new QAjaxAction('btnPAssessment_Click'));	
								break;
							case '10-F Assessment':
								$btnResource->AddAction(new QClickEvent(), new QAjaxAction('btnFAssessment_Click'));	
								break;
							case 'LEMON Assessment':
								$btnResource->AddAction(new QClickEvent(), new QAjaxAction('btnLemonAssessment_Click'));	
								break;
						}
											
					} else {
						$btnResource->Enabled = false;
						$btnResource->CssClass = 'assessmentButtonDisabled';
					}
				}
				$this->btnAssessments[] = $btnResource;
			}
		}
		$this->btnGroupAssessments = new QButton($this);
		$this->btnGroupAssessments->Name = 'Group Assessments';
		$this->btnGroupAssessments->Text = 'Group Assessments';
		$this->btnGroupAssessments->CssClass = 'assessmentButton';
		if((QApplication::$Login->Role->Name == 'Company Manager') ||
			(QApplication::$Login->Role->Name == 'Administrator')) {
			$this->btnGroupAssessments->Enabled = true;
		} else {
			$this->btnGroupAssessments->Enabled = false;
			$this->btnGroupAssessments->CssClass = 'assessmentButtonDisabled';
		}
		$this->btnGroupAssessments->AddAction(new QClickEvent(), new QAjaxAction('btnGroupAssessments_Click'));
	}

	protected function btnGroupAssessments_Click() {	
		QApplication::Redirect('/resources/assessments/lemon/groupAggregation.php');
	}
	
	protected function btnKingdomBusinessAssessment_Click() {	
		QApplication::Redirect('/resources/assessments/kingdom/');
	}
	
	protected function btnPAssessment_Click() {	
		QApplication::Redirect('/resources/assessments/tenp/');
	}
	protected function btnFAssessment_Click() {	
		QApplication::Redirect('/resources/assessments/tenf/');
	}
	protected function btnLemonAssessment_Click() {
		QApplication::Redirect('/resources/assessments/lemon/');
	}
}

AssessmentForm::Run('AssessmentForm');
?>