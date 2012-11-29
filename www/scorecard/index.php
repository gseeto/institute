<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class ScorecardSelectForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $rbnScorecards;
	protected $btnSubmit;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/inst/index.php');
	}
	
	protected function Form_Create() {
		
		$this->rbnScorecards = new QRadioButtonList($this);
		$objUser = User::LoadArrayByLoginId(QApplication::$LoginId);
		$objScorecardArray = $objUser[0]->GetScorecardArray();
		foreach($objScorecardArray as $objScorecard) {
			$this->rbnScorecards->AddItem($objScorecard->Name, $objScorecard->Id);
		}
		$this->btnSubmit = new QButton($this);
		$this->btnSubmit->Text = "Review Selected Scorecard";
		$this->btnSubmit->CssClass = 'primary';
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
	}
	
 	public function btnSubmit_Click() {
		// redirect to appropriate scorecard
		QApplication::Redirect('/inst/scorecard/scorecard.php/'.$this->rbnScorecards->SelectedValue);
	}

}

ScorecardSelectForm::Run('ScorecardSelectForm');
?>