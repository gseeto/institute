<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class GroupAggregationResultForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Home';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $imgGroupBar;
	protected $imgGroupRadar;
	protected $imgFirstSecond;
	protected $imgGroupPie;
	protected $dtgUsers;
	protected $objGroupAssessment;
	protected $selectedUserArray;
	protected $btnSubmit;

	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/resources/index.php');
		
		if((QApplication::$Login->Role->Name != 'Company Manager')&&(QApplication::$Login->Role->Name != 'Administrator')) {			
			QApplication::Redirect('/resources/index.php');
		}
	}
	
	protected function Form_Create() {
		$this->objGroupAssessment = GroupAssessmentList::Load(QApplication::PathInfo(0));
		$this->selectedUserArray = array();
		
		$assessmentArray = array();
		$groupArray = LemonAssessment::LoadArrayByGroupId($this->objGroupAssessment->Id);	
		foreach($groupArray as $objGroup) {
			$assessmentArray[] = $objGroup->Id;
		}	
		$strArgs = implode('/',$assessmentArray);
		
		$this->lblDebug = new QLabel($this);
		
		$this->imgGroupBar = new QLabel($this);
		$this->imgGroupBar->CssClass = 'lemonImage';
		$this->imgGroupBar->HtmlEntities = false;
		$this->imgGroupBar->Text = '<img src=\'/resources/assessments/lemon/groupBarImg.php/'.$strArgs.'\' />';

		$this->imgGroupRadar = new QLabel($this);
		$this->imgGroupRadar->CssClass = 'lemonImage';
		$this->imgGroupRadar->HtmlEntities = false;
		$this->imgGroupRadar->Text = '<img src=\'/resources/assessments/lemon/groupRadarImg.php/'.$strArgs.'\' />';
		
		$this->imgFirstSecond = new QLabel($this);
		$this->imgFirstSecond->CssClass = 'lemonImage';
		$this->imgFirstSecond->HtmlEntities = false;
		$this->imgFirstSecond->Text = '<img src=\'/resources/assessments/lemon/groupFirstSecondImg.php/'.$strArgs.'\' />';
		
		$this->imgGroupPie = new QLabel($this);
		$this->imgGroupPie->CssClass = 'lemonImage';
		$this->imgGroupPie->HtmlEntities = false;
		$this->imgGroupPie->Text = '<img src=\'/resources/assessments/lemon/groupPieImg.php/'.$strArgs.'\' />';
		
		$this->dtgUsers = new UserDataGrid($this);
        $this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
        $this->dtgUsers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirAssessments."/lemon/viewAssessment.php/".$_ITEM->Id ?>','<?= $_FORM->RenderName($_ITEM)?>','Name');
		$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_FORM->RenderUserName($_ITEM->LoginId) ?>', 'HtmlEntities=false', 'Width=200px' ));
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
        $objStyle->BackColor = '#003366'; 
        
        $objStyle = $this->dtgUsers->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
        
        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = "Apply Group Analysis to selected Users";
		$this->btnSubmit->CssClass = 'primary';
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
        
	}

	public function dtgUsers_Bind() {
		$userArray = array();
		$groupArray = LemonAssessment::LoadArrayByGroupId($this->objGroupAssessment->Id);	
		foreach($groupArray as $objGroup) {
			$userArray[] = User::Load($objGroup->UserId);
		}	
		$this->dtgUsers->DataSource = $userArray; 
		if(count($userArray) == 0) {
			$this->imgGroupBar->Visible = false;
			$this->imgGroupRadar->Visible = false;
			$this->imgFirstSecond->Visible = false;
			$this->imgGroupPie->Visible = false;		
		} else {
			$this->imgGroupBar->Visible = true;
			$this->imgGroupRadar->Visible = true;
			$this->imgFirstSecond->Visible = true;
			$this->imgGroupPie->Visible = true;
		}
	}
		
	public function RenderName($objUser) {
		return $objUser->FirstName . ' ' . $objUser->LastName;
	}
	
    public function RenderUserName($intLoginId) {
    	$objLogin = Login::Load($intLoginId);
		return $objLogin->Username;
	}
	
	public function chkSelected_Render(User $objUser, $intRow) {
     	$strControlId = 'chkSelected' . $objUser->Id;
		$lemonArray = $objUser->GetLemonAssessmentArray();
        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $lemonArray[0]->Id;
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
    
	public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
		$strArgs = implode('/',$this->selectedUserArray);
		$this->imgGroupBar->Text = '<img src=\'/resources/assessments/lemon/groupBarImg.php/'.$strArgs.'\' />';
		$this->imgGroupRadar->Text = '<img src=\'/resources/assessments/lemon/groupRadarImg.php/'.$strArgs.'\' />';
		$this->imgFirstSecond->Text = '<img src=\'/resources/assessments/lemon/groupFirstSecondImg.php/'.$strArgs.'\' />';
		$this->imgGroupPie->Text = '<img src=\'/resources/assessments/lemon/groupPieImg.php/'.$strArgs.'\' />';	
	}
}

GroupAggregationResultForm::Run('GroupAggregationResultForm');
?>