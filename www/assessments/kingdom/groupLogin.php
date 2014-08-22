<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class KIAGroupLoginForm extends InstituteForm {
	protected $strPageTitle = 'Kingdom Business Assessment';
	protected $txtKeyCode;
	protected $btnSubmit;
	protected $lblErrorMsg;
	
	protected function Form_Run() {
	}
	
	protected function Form_Create() {		
		$this->txtKeyCode = new QTextBox($this);
		$this->txtKeyCode->Name = "KeyCode";
		$this->txtKeyCode->Width = 200;
		
		$this->btnSubmit = new QButton($this);
		$this->btnSubmit->Text = "Submit";
		$this->btnSubmit->CssClass = "externButton";
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
		
		$this->lblErrorMsg = new QLabel($this);
		$this->lblErrorMsg->Visible = false;
		$this->lblErrorMsg->CssClass = "errorMsg";
	}
	
	protected function btnSubmit_Click() {
		$objGroupAssessment = GroupAssessmentList::LoadByKeyCode(trim($this->txtKeyCode->Text));
		if (!$objGroupAssessment) {
			$this->lblErrorMsg->Text = "Invalid Key Code. Please Try again or contact info@inst.net";
			$this->lblErrorMsg->HtmlEntities = false;
			$this->lblErrorMsg->Visible = true;
			$objConditions = QQ::All();
			$objClauses = array();
			$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);
			foreach($groupArray as $objgroup) {
				$this->lblErrorMsg->Text .="<br>".$objgroup->KeyCode;
			}		
		} else {
			if ($objGroupAssessment->KeysLeft <= 0) {
				$this->lblErrorMsg->Text = "No more seats available on this Key Code. Please contact info@inst.net to purchase additional seats.";
				$this->lblErrorMsg->Visible = true;
			} else {
				// If you get here, then move to the next page to get user details
				QApplication::Redirect(__SUBDIRECTORY__.'/assessments/kingdom/groupInfo.php/'.$objGroupAssessment->Id);
			}
		}
	}
	
}

KIAGroupLoginForm::Run('KIAGroupLoginForm');
?>