<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardView;
	protected $objScorecard;
	protected $dtgPArray;
	protected $dlgAssociateSphere;
	public    $dlgAssociateGiant;
	protected $imgSpheres;
	protected $imgSpheresInvolvement;
	protected $imgGiants;
	protected $imgGiantsInvolvement;
	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
	}
        
}

ViewForm::Run('ViewForm');
?>