<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class LemonloversGroupLoginForm extends InstituteForm {
	protected $strPageTitle = 'LEMON Assessment (50 Questions)';
	protected $txtKeyCode;
	protected $btnSubmit;
	protected $lblErrorMsg;
	
	protected function Form_Run() {
	}
	
	protected function Form_Create() {		
		$this->txtKeyCode = new QTextBox($this);
		$this->txtKeyCode->Name = "KeyCode";
		$this->txtKeyCode->CssClass = 'form-control';
		$this->txtKeyCode->HtmlBefore = 'If you have a code, please enter it here: &nbsp;';
		
		$this->btnSubmit = new QButton($this);
		$this->btnSubmit->Text = "Submit";
		$this->btnSubmit->CssClass = "btn btn-default";
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
		
		$this->lblErrorMsg = new QLabel($this);
		$this->lblErrorMsg->Visible = false;
		$this->lblErrorMsg->CssClass = "text-danger";
	}
	
	protected function btnSubmit_Click() {
		$objGroupAssessment = GroupAssessmentList::LoadByKeyCode(trim($this->txtKeyCode->Text));
		if (!$objGroupAssessment) {
			$this->lblErrorMsg->Text = "Invalid Key Code. Please Try again or contact lemon@inst.net";
			$this->lblErrorMsg->Visible = true;
		} else {
			if ($objGroupAssessment->KeysLeft <= 0) {
				$this->lblErrorMsg->Text = "No more seats available on this Key Code. Please contact lemon@inst.net to purchase additional seats.";
				$this->lblErrorMsg->Visible = true;
			} else {
				// If you get here, then move to the next page to get user details
				QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemonlovers/groupInfo.php/'.$objGroupAssessment->Id);
			}
		}
	}
	
}

LemonloversGroupLoginForm::Run('LemonloversGroupLoginForm');
?>