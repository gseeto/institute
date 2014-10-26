<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class GroupUpwardAggregationResultForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Home';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $dtgUsers;
	protected $objGroupAssessment;
	protected $selectedUserArray;
	protected $btnSubmit;
	protected $tabCharts;

	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		
		if((QApplication::$Login->Role->Name != 'Company Manager')&&(QApplication::$Login->Role->Name != 'Administrator')) {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
	}
	
	protected function Form_Create() {
		$this->objGroupAssessment = GroupAssessmentList::Load(QApplication::PathInfo(0));
		$this->selectedUserArray = array();
		
		$assessmentArray = array();
		$groupArray = UpwardAssessment::LoadArrayByGroupId($this->objGroupAssessment->Id);	
		foreach($groupArray as $objGroup) {
			$assessmentArray[] = $objGroup->Id;
		}	
		$strArgs = implode('/',$assessmentArray);
		
		$this->lblDebug = new QLabel($this);
		
		$tabs = array('Group Aggregated Spider Diagram', 'Gaps By Title', 'Gaps By Tenure','Gaps by Country');
		$content = array('<img src=\''.__SUBDIRECTORY__.'/assessments/upward/groupSpiderImg.php/'.$strArgs.'\' />',
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/upward/groupTitleGapImg.php/'.$strArgs.'\' />',
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/upward/groupTenureGapImg.php/'.$strArgs.'\' />',
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/upward/groupCountryGapImg.php/'.$strArgs.'\' />');
		$this->tabCharts = new QTab($this, $tabs, $content);
		$this->tabCharts->AddAction(new QClickEvent(), new QAjaxAction('tabCharts_Click'));
		
		$this->dtgUsers = new UserDataGrid($this);
        $this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
        $this->dtgUsers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirAssessments."/upward/viewAssessment.php/".$_ITEM->Id ?>','<?= $_FORM->RenderName($_ITEM)?>','Name');
		$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_FORM->RenderUserName($_ITEM->LoginId) ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgUsers->MetaAddColumn('Country', 'Html=<?= $_FORM->RenderCountry($_ITEM); ?>','Width=100px');
        $this->dtgUsers->MetaAddColumn('Title', 'Html=<?= $_FORM->RenderTitle($_ITEM); ?>','Width=100px');
        $this->dtgUsers->MetaAddColumn('Tenure', 'Html=<?= $_FORM->RenderTenure($_ITEM); ?>','Width=100px');
		$this->dtgUsers->AddColumn(new QDataGridColumn('Select User for Group Analysis', '<?= $_FORM->chkSelected_Render($_ITEM, $_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false','Width=200px' ));
            			
        $this->dtgUsers->CellPadding = 5;
		$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
		$this->dtgUsers->NoDataHtml = 'No Users have taken the Assessment.';
		$this->dtgUsers->UseAjax = true;
		$this->dtgUsers->Width = 700;
		
		$this->dtgUsers->SortColumnIndex = 1;
		$this->dtgUsers->ItemsPerPage = 20;
		$this->dtgUsers->GridLines = QGridLines::Both;
		
		$objStyle = $this->dtgUsers->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgUsers->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $objStyle = $this->dtgUsers->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = "Apply Group Analysis to selected Users";
		$this->btnSubmit->CssClass = 'primary';
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
        
	}

	public function dtgUsers_Bind() {
		$userArray = array();
		$groupArray = UpwardAssessment::LoadArrayByGroupId($this->objGroupAssessment->Id);	
		foreach($groupArray as $objGroup) {
			$userArray[] = User::Load($objGroup->UserId);
		}	
		$this->dtgUsers->DataSource = $userArray; 
	}
		
	public function RenderName($objUser) {
		return $objUser->FirstName . ' ' . $objUser->LastName;
	}
	
    public function RenderUserName($intLoginId) {
    	$objLogin = Login::Load($intLoginId);
		return $objLogin->Username;
	}
	
	public function RenderCountry(User $objUser) {
    	if($objUser->CountryId) {
    		return CountryList::Load($objUser->CountryId)->Name;
    	} else return ' ';
	}

	public function RenderTitle(User $objUser) {
    	if($objUser->TitleId) {
    		return TitleList::Load($objUser->TitleId)->Name;
    	} else return ' ';
	}

	public function RenderTenure(User $objUser) {
    	if($objUser->TenureId) {
    		return TenureList::Load($objUser->TenureId)->Range;
    	} else return ' ';
	}
	
	public function chkSelected_Render(User $objUser, $intRow) {
     	$strControlId = 'chkSelected' . $objUser->Id;
		$tenPArray = $objUser->GetUpwardAssessmentArray();
        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $tenPArray[0]->Id;
            $chkSelected->AddAction(new QClickEvent(), new QAjaxAction('chkSelected_Click'));
        }
        return $chkSelected->Render(false);
            
    }
        
    public function chkSelected_Click($strFormId, $strControlId, $strParameter) {
		$intUserId = $strParameter;
		if ($this->GetControl($strControlId)->Checked) {
			if (!in_array ($intUserId, $this->selectedUserArray))
				$this->selectedUserArray[] = $intUserId;
		} else {
			$key = array_search($intUserId, $this->selectedUserArray);
			unset($this->selectedUserArray[$key]);
		}
    }
    
    public function tabCharts_Click($strFormId, $strControlId, $strParameter) {
    	$this->lblDebug->Text = 'php catch click event worked also';
    }
	public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
		$strArgs = implode('/',$this->selectedUserArray);
		$content = array('<img src=\''.__SUBDIRECTORY__.'/assessments/upward/groupSpiderImg.php/'.$strArgs.'\' />',
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/upward/groupTitleGapImg.php/'.$strArgs.'\' />',
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/upward/groupTenureGapImg.php/'.$strArgs.'\' />',
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/upward/groupCountryGapImg.php/'.$strArgs.'\' />');
		$this->tabCharts->Content = $content;
		$this->tabCharts->Refresh();			
	}
	
}

GroupUpwardAggregationResultForm::Run('GroupUpwardAggregationResultForm');
?>