<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminVentureForm extends InstituteForm {
	
	protected $strPageTitle = 'Venture Post Survey';
	protected $dtgVentures;
    protected $btnAdd;
    protected $strFirstName;
	protected $strUsername;
	protected $strLastName;
	protected $selectedUserArray;
	protected $pnlAddVentureAssessment;
	
	protected function Form_Run() {
    	if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
    	QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-venture').className = 'active';");    	
    }
    
	protected function Form_Create() {			
		$this->selectedUserArray = array();
        $this->dtgVentures = new PostventureAssessmentDataGrid($this);
        $this->dtgVentures->Paginator = new QPaginator($this->dtgVentures);
        $this->dtgVentures->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkPostVenture($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgVentures->AddColumn(new QDataGridColumn('Group', '<?= $_FORM->RenderPostVentureGroup($_ITEM) ?>', 'HtmlEntities=false' ));             
        $this->dtgVentures->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                                  
		$this->dtgVentures->CellPadding = 5;
		$this->dtgVentures->SetDataBinder('dtgVentures_Bind',$this);
		$this->dtgVentures->NoDataHtml = 'No Post Venture Assessments have been assigned';
		$this->dtgVentures->UseAjax = true;
		$this->dtgVentures->CssClass = 'table table-striped table-hover';
		
		$this->dtgVentures->SortColumnIndex = 1;
		$this->dtgVentures->ItemsPerPage = 20;
	
        $objStyle = $this->dtgVentures->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgVentures->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $this->btnAdd = new QButton($this);
        $this->btnAdd->Text = 'Associate A User';
        $this->btnAdd->CssClass = 'btn btn-default';
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));	        	    
        
        $this->strFirstName = new QTextBox($this);
		$this->strFirstName->Name = 'First Name';
		$this->strFirstName->CssClass = 'form-control';
		$this->strFirstName->AddAction(new QChangeEvent(), new QAjaxAction('dtgVentures_Refresh'));
		$this->strFirstName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgVentures_Refresh'));
		$this->strFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strFirstName->Focus();
			
		$this->strLastName = new QTextBox($this);
		$this->strLastName->Name = 'Last Name';
		$this->strLastName->CssClass = 'form-control';
		$this->strLastName->AddAction(new QChangeEvent(), new QAjaxAction('dtgVentures_Refresh'));
		$this->strLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgVentures_Refresh'));
		$this->strLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strLastName->Focus();
		
		$this->strUsername = new QTextBox($this);
		$this->strUsername->Name = 'Username';
		$this->strUsername->CssClass = 'form-control';
		$this->strUsername->AddAction(new QChangeEvent(), new QAjaxAction('dtgVentures_Refresh'));
		$this->strUsername->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgVentures_Refresh'));
		$this->strUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          
		$this->pnlAddVentureAssessment = new QPanel($this);
	    $this->pnlAddVentureAssessment->Position = QPosition::Relative;
	    $this->pnlAddVentureAssessment->Visible = false;
	    $this->pnlAddVentureAssessment->AutoRenderChildren = true;		
	}
	
	public function dtgVentures_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgVentures->PageNumber = 1;
			$this->dtgVentures->Refresh();
		}
		
    	public function dtgVentures_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$objClauses = QQ::Clause($this->dtgVentures->OrderByClause,$this->dtgVentures->LimitClause);
	
	    	if ($strName = trim($this->strFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::PostventureAssessment()->User->FirstName, $strName . '%')
				);
			}
	
			if ($strName = trim($this->strLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::PostventureAssessment()->User->LastName, $strName . '%')
				);
			}
			
			if ($strName = trim($this->strUsername->Text)) {
				$objLoginCondition = QQ::All();
				$objLoginCondition = QQ::AndCondition($objLoginCondition,
					QQ::Like( QQN::Login()->Username, $strName . '%')
				);
				$objLogin = Login::QuerySingle($objLoginCondition);
				if (null != $objLogin) {
					$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal(QQN::PostventureAssessment()->User->LoginId, (int)$objLogin->Id)
				);
				} 
			}
			
			$postventureArray = PostventureAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgVentures->TotalItemCount = PostventureAssessment::CountAll();
			$this->dtgVentures->DataSource = $postventureArray; 
		}
	
    	public function RenderUserLinkPostVenture($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/postventure/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderPostVentureGroup(PostventureAssessment $objPostVenture) {
			$strControlId = 'lstPostventureGroup' . $objPostVenture->Id;
			$lstGroupType = $this->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgVentures,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->CssClass = 'form-control';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(11) as $objGroup) {					
						if($objPostVenture->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objPostVenture->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstPostventureGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
		public function lstPostventureGroup_Change($strFormId, $strControlId, $strParameter) {
			$intVentureId = $strParameter;
			$objVenture = PostventureAssessment::Load($intVentureId);
			$lstGroupType = $this->GetControl($strControlId);			
			$objVenture->GroupId = $lstGroupType->SelectedValue;
			$objVenture->Save();	
		}
		
    	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
	    public function btnAdd_Click($strFormId, $strControlId, $strParameter) {
	    	$this->pnlAddVentureAssessment->Visible = true;
	        $this->pnlAddVentureAssessment->RemoveChildControls(true);
	    	$pnlAddVentureAssessmentView = new AddVentureAssessment($this->pnlAddVentureAssessment,'UpdateVentureAssessmentList',$this);
		}
		
    	// Method Call back for the  panels 
	    public function UpdateVentureAssessmentList($blnUpdatesMade) {
	    	$this->dtgVentures->PageNumber = 1;
			$this->dtgVentures->Refresh();
	    }
}

AdminVentureForm::Run('AdminVentureForm');
?>