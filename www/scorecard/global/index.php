<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class GlobalForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardGlobal;
	protected $objScorecard;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
	}
        
}

GlobalForm::Run('GlobalForm');
?>