<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class AdminForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Administration';
	protected $intNavSectionId = InstituteForm::NavSectionAdministration;
	protected $pnlSideNav;
	public $pnlMainContent;
	protected $lblDebug;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/inst/index.php');
	}
	
	protected function Form_Create() {
		$this->pnlSideNav = new QPanel($this);
        $this->pnlSideNav->Position = QPosition::Relative;
        $this->pnlSideNav->CssClass = 'panelSideNavigation';
        $this->pnlSideNav->AutoRenderChildren = true;
               
        $this->pnlMainContent = new QPanel($this);
        $this->pnlMainContent->Position = QPosition::Relative;
        $this->pnlMainContent->CssClass = 'panelMainContent';
        $this->pnlMainContent->AutoRenderChildren = true;
        
        // Initialize a new SideNavPanel, and set its parent to pnlSideNav
        $strPanel = QApplication::PathInfo(0);
        $pnlNavView = new AdminNavView($this->pnlSideNav, $strPanel, $this->pnlMainContent->ControlId);
	}
	
	public function btnAddTenPAssessment_Click($strFormId, $strControlId, $strParameter) {
	}

}

AdminForm::Run('AdminForm');
?>