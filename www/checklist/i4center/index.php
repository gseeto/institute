<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class i4ChecklistForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'i4 Center Checklist';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	
	protected $vieweableArray;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {		
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		
		$checklistArray = BusinessChecklist::LoadArrayByUserAsManager($intUserId);
		$this->vieweableArray = array();
		if($checklistArray != null) {
			foreach($checklistArray as $objChecklist) {
				$this->vieweableArray[] = sprintf("<a href='%s/checklist/i4center/viewChecklist.php/%s' target='_self' >%s</a>", __SUBDIRECTORY__,$objChecklist->Id, $objChecklist->Company->Name); 
			}
		}		
	}	
}

i4ChecklistForm::Run('i4ChecklistForm');
?>