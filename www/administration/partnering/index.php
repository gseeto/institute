<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminPartneringForm extends InstituteForm {
	
	protected $strPageTitle = 'Partnering';
	protected $dtgPartnerAware;
    protected $btnAdd;
    protected $strFirstName;
	protected $strUsername;
	protected $strLastName;
	protected $selectedUserArray;
	protected $pnlAddPartnerAwareAssessment;
		
	protected $dtgPartnerReady;
    protected $btnAddPReady;
    protected $strPRFirstName;
	protected $strPRUsername;
	protected $strPRLastName;
	protected $selectedPRUserArray;
	protected $pnlAddPartnerReadyAssessment;
	
	protected function Form_Run() {
    	if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
    	QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-partnering').className = 'active';");    	
    }
    
	protected function Form_Create() {			
		$this->selectedUserArray = array();
        $this->selectedPRUserArray = array();
            
        $this->dtgPartnerAware = new PartneringAwarenessAssessmentDataGrid($this);
        $this->dtgPartnerAware->Paginator = new QPaginator($this->dtgPartnerAware);
        $this->dtgPartnerAware->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkPartnerAware($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgPartnerAware->AddColumn(new QDataGridColumn('Group', '<?= $_FORM->RenderPartnerAwareGroup($_ITEM) ?>', 'HtmlEntities=false' ));             
        $this->dtgPartnerAware->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                                  
		$this->dtgPartnerAware->CellPadding = 5;
		$this->dtgPartnerAware->SetDataBinder('dtgPartnerAware_Bind',$this);
		$this->dtgPartnerAware->NoDataHtml = 'No Partnering Awareness Assessments have been assigned';
		$this->dtgPartnerAware->UseAjax = true;
		$this->dtgPartnerAware->CssClass = 'table table-striped table-hover';
		
		$this->dtgPartnerAware->SortColumnIndex = 1;
		$this->dtgPartnerAware->ItemsPerPage = 20;
	
        $objStyle = $this->dtgPartnerAware->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgPartnerAware->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
	    $this->dtgPartnerReady = new PartneringReadinessAssessmentDataGrid($this);
        $this->dtgPartnerReady->Paginator = new QPaginator($this->dtgPartnerReady);
        $this->dtgPartnerReady->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkPartnerReady($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgPartnerReady->AddColumn(new QDataGridColumn('Group', '<?= $_FORM->RenderPartnerReadyGroup($_ITEM) ?>', 'HtmlEntities=false' ));             
        $this->dtgPartnerReady->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                                  
		$this->dtgPartnerReady->CellPadding = 5;
		$this->dtgPartnerReady->SetDataBinder('dtgPartnerReady_Bind',$this);
		$this->dtgPartnerReady->NoDataHtml = 'No Partnering Readiness Assessments have been assigned';
		$this->dtgPartnerReady->UseAjax = true;
		$this->dtgPartnerReady->CssClass = 'table table-striped table-hover';
		
		$this->dtgPartnerReady->SortColumnIndex = 1;
		$this->dtgPartnerReady->ItemsPerPage = 20;
	
        $objStyle = $this->dtgPartnerReady->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgPartnerReady->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
        $this->btnAddPReady = new QButton($this);
        $this->btnAddPReady->Text = 'Associate A User';
        $this->btnAddPReady->CssClass = 'btn btn-default';
        $this->btnAddPReady->AddAction(new QClickEvent(), new QAjaxAction('btnAddPReady_Click'));	
        
        $this->strPRFirstName = new QTextBox($this);
		$this->strPRFirstName->Name = 'First Name';
		$this->strPRFirstName->CssClass = 'form-control';
		$this->strPRFirstName->AddAction(new QChangeEvent(), new QAjaxAction('dtgPartnerReady_Refresh'));
		$this->strPRFirstName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgPartnerReady_Refresh'));
		$this->strPRFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strPRFirstName->Focus();
		
		$this->strPRLastName = new QTextBox($this);
		$this->strPRLastName->Name = 'Last Name';
		$this->strPRLastName->CssClass = 'form-control'; 
		$this->strPRLastName->AddAction(new QChangeEvent(), new QAjaxAction('dtgPartnerReady_Refresh'));
		$this->strPRLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgPartnerReady_Refresh'));
		$this->strPRLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strPRLastName->Focus();
		
		$this->strPRUsername = new QTextBox($this);
		$this->strPRUsername->Name = 'Username';
		$this->strPRUsername->CssClass = 'form-control';
		$this->strPRUsername->AddAction(new QChangeEvent(), new QAjaxAction('dtgPartnerReady_Refresh'));
		$this->strPRUsername->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgPartnerReady_Refresh'));
		$this->strPRUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
        $this->btnAdd = new QButton($this);
        $this->btnAdd->Text = 'Associate A User';
        $this->btnAdd->CssClass = 'btn btn-default';
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));	        	    
        
        $this->strFirstName = new QTextBox($this);
		$this->strFirstName->Name = 'First Name';
		$this->strFirstName->CssClass = 'form-control';
		$this->strFirstName->AddAction(new QChangeEvent(), new QAjaxAction('dtgPartnerAware_Refresh'));
		$this->strFirstName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgPartnerAware_Refresh'));
		$this->strFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strFirstName->Focus();
		
		$this->strLastName = new QTextBox($this);
		$this->strLastName->Name = 'Last Name';
		$this->strLastName->CssClass = 'form-control';
		$this->strLastName->AddAction(new QChangeEvent(), new QAjaxAction('dtgPartnerAware_Refresh'));
		$this->strLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgPartnerAware_Refresh'));
		$this->strLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strLastName->Focus();
		
		$this->strUsername = new QTextBox($this);
		$this->strUsername->Name = 'Username';
		$this->strUsername->CssClass = 'form-control';
		$this->strUsername->AddAction(new QChangeEvent(), new QAjaxAction('dtgPartnerAware_Refresh'));
		$this->strUsername->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgPartnerAware_Refresh'));
		$this->strUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          
		$this->pnlAddPartnerAwareAssessment = new QPanel($this);
        $this->pnlAddPartnerAwareAssessment->Position = QPosition::Relative;
        $this->pnlAddPartnerAwareAssessment->Visible = false;
        $this->pnlAddPartnerAwareAssessment->AutoRenderChildren = true;
        
        $this->pnlAddPartnerReadyAssessment = new QPanel($this);
        $this->pnlAddPartnerReadyAssessment->Position = QPosition::Relative;
        $this->pnlAddPartnerReadyAssessment->Visible = false;
        $this->pnlAddPartnerReadyAssessment->AutoRenderChildren = true;		
	}
	
	public function dtgPartnerAware_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgPartnerAware->PageNumber = 1;
			$this->dtgPartnerAware->Refresh();
		}
		
    	public function dtgPartnerReady_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgPartnerReady->PageNumber = 1;
			$this->dtgPartnerReady->Refresh();
		}
		
    	public function dtgPartnerReady_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$objClauses = QQ::Clause($this->dtgPartnerReady->OrderByClause,$this->dtgPartnerReady->LimitClause);
	
	    	if ($strName = trim($this->strPRFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::PartneringReadinessAssessment()->User->FirstName, $strName . '%')
				);
			}
	
			if ($strName = trim($this->strPRLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::PartneringReadinessAssessment()->User->LastName, $strName . '%')
				);
			}
			
			if ($strName = trim($this->strPRUsername->Text)) {
				$objLoginCondition = QQ::All();
				$objLoginCondition = QQ::AndCondition($objLoginCondition,
					QQ::Like( QQN::Login()->Username, $strName . '%')
				);
				$objLogin = Login::QuerySingle($objLoginCondition);
				if (null != $objLogin) {
					$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal(QQN::PartneringReadinessAssessment()->User->LoginId, (int)$objLogin->Id)
				);
				} 
			}
			
			$partnerreadinessArray = PartneringReadinessAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgPartnerReady->TotalItemCount = PartneringReadinessAssessment::CountAll();
			$this->dtgPartnerReady->DataSource = $partnerreadinessArray; 
		}
		
    	public function dtgPartnerAware_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$objClauses = QQ::Clause($this->dtgPartnerAware->OrderByClause,$this->dtgPartnerAware->LimitClause);
	
	    	if ($strName = trim($this->strFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::PartneringAwarenessAssessment()->User->FirstName, $strName . '%')
				);
			}
	
			if ($strName = trim($this->strLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::PartneringAwarenessAssessment()->User->LastName, $strName . '%')
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
					QQ::Equal(QQN::PartneringAwarenessAssessment()->User->LoginId, (int)$objLogin->Id)
				);
				} 
			}
			
			$partnerawarenessArray = PartneringAwarenessAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgPartnerAware->TotalItemCount = PartneringAwarenessAssessment::CountAll();
			$this->dtgPartnerAware->DataSource = $partnerawarenessArray; 
		}
	
    	public function RenderUserLinkPartnerReady($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/partnerready/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderUserLinkPartnerAware($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/partneraware/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderPartnerReadyGroup(PartneringReadinessAssessment $objPartnerReady) {
			$strControlId = 'lstPartnerReadyGroup' . $objPartnerReady->Id;
			$lstGroupType = $this->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgPartnerReady,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->CssClass = 'form-control';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(13) as $objGroup) {					
						if($objPartnerReady->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objPartnerReady->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstPartnerReadyGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
    	public function lstPartnerReadyGroup_Change($strFormId, $strControlId, $strParameter) {
			$intPartnerReadyId = $strParameter;
			$objPartnerReady = PartneringReadinessAssessment::Load($intPartnerReadyId);
			$lstGroupType = $this->GetControl($strControlId);
			if($lstGroupType->SelectedValue != '-- None Selected --') {			
				$objPartnerReady->GroupId = $lstGroupType->SelectedValue;
				$objPartnerReady->Save();	
			}
		}
		
    	public function RenderPartnerAwareGroup(PartneringAwarenessAssessment $objPartnerAware) {
			$strControlId = 'lstPartnerAwareGroup' . $objPartnerAware->Id;
			$lstGroupType = $this->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgPartnerAware,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->CssClass = 'form-control';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(12) as $objGroup) {					
						if($objPartnerAware->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objPartnerAware->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstPartnerAwareGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
		public function lstPartnerAwareGroup_Change($strFormId, $strControlId, $strParameter) {
			$intPartnerAwareId = $strParameter;
			$objPartnerAware = PartneringAwarenessAssessment::Load($intPartnerAwareId);
			$lstGroupType = $this->GetControl($strControlId);			
			if($lstGroupType->SelectedValue != '-- None Selected --') {
				$objPartnerAware->GroupId = $lstGroupType->SelectedValue;
				$objPartnerAware->Save();
			}	
		}
		
    	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
    	public function btnAddPReady_Click($strFormId, $strControlId, $strParameter) {
	    	$this->pnlAddPartnerReadyAssessment->Visible = true;
	        $this->pnlAddPartnerReadyAssessment->RemoveChildControls(true);
	    	$pnlAddPartnerReadyAssessmentView = new AddPartneringReadinessAssessment($this->pnlAddPartnerReadyAssessment,'UpdatePartnerReadyAssessmentList',$this);
		}
		
    	// Method Call back for the  panels 
	    public function UpdatePartnerReadyAssessmentList($blnUpdatesMade) {
	    	$this->dtgPartnerReady->PageNumber = 1;
			$this->dtgPartnerReady->Refresh();
	    }
	    
	    public function btnAdd_Click($strFormId, $strControlId, $strParameter) {
	    	$this->pnlAddPartnerAwareAssessment->Visible = true;
	        $this->pnlAddPartnerAwareAssessment->RemoveChildControls(true);
	    	$pnlAddPartnerAwareAssessmentView = new AddPartneringAwarenessAssessment($this->pnlAddPartnerAwareAssessment,'UpdatePartnerAwareAssessmentList',$this);
		}
		
    // Method Call back for the  panels 
	    public function UpdatePartnerAwareAssessmentList($blnUpdatesMade) {
	    	$this->dtgPartnerAware->PageNumber = 1;
			$this->dtgPartnerAware->Refresh();
	    }
}

AdminPartneringForm::Run('AdminPartneringForm');
?>