<?php
    class AdminPartneringView extends QPanel {     
        public $dtgPartnerAware;
        public $btnAdd;
        public $strFirstName;
		public $strUsername;
		public $strLastName;
		protected $selectedUserArray;
		public $pnlAddPartnerAwareAssessment;
		
		public $dtgPartnerReady;
        public $btnAddPReady;
        public $strPRFirstName;
		public $strPRUsername;
		public $strPRLastName;
		protected $selectedPRUserArray;
		public $pnlAddPartnerReadyAssessment;
        
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminPartneringView.tpl.php';

 
        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            $this->selectedUserArray = array();
            $this->selectedPRUserArray = array();
            
            $this->dtgPartnerAware = new PartneringAwarenessAssessmentDataGrid($this);
            $this->dtgPartnerAware->Paginator = new QPaginator($this->dtgPartnerAware);
            $this->dtgPartnerAware->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkPartnerAware($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
             $this->dtgPartnerAware->AddColumn(new QDataGridColumn('Group', '<?= $_CONTROL->ParentControl->RenderPartnerAwareGroup($_ITEM) ?>', 'HtmlEntities=false' ));             
            $this->dtgPartnerAware->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                                  
			$this->dtgPartnerAware->CellPadding = 5;
			$this->dtgPartnerAware->SetDataBinder('dtgPartnerAware_Bind',$this);
			$this->dtgPartnerAware->NoDataHtml = 'No Partnering Awareness Assessments have been assigned';
			$this->dtgPartnerAware->UseAjax = true;
			
			$this->dtgPartnerAware->SortColumnIndex = 1;
			$this->dtgPartnerAware->ItemsPerPage = 20;
		
			$this->dtgPartnerAware->GridLines = QGridLines::Both;
		
			$objStyle = $this->dtgPartnerAware->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgPartnerAware->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgPartnerAware->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->dtgPartnerReady = new PartneringReadinessAssessmentDataGrid($this);
            $this->dtgPartnerReady->Paginator = new QPaginator($this->dtgPartnerReady);
            $this->dtgPartnerReady->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkPartnerReady($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
             $this->dtgPartnerReady->AddColumn(new QDataGridColumn('Group', '<?= $_CONTROL->ParentControl->RenderPartnerReadyGroup($_ITEM) ?>', 'HtmlEntities=false' ));             
            $this->dtgPartnerReady->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                                  
			$this->dtgPartnerReady->CellPadding = 5;
			$this->dtgPartnerReady->SetDataBinder('dtgPartnerReady_Bind',$this);
			$this->dtgPartnerReady->NoDataHtml = 'No Partnering Readiness Assessments have been assigned';
			$this->dtgPartnerReady->UseAjax = true;
			
			$this->dtgPartnerReady->SortColumnIndex = 1;
			$this->dtgPartnerReady->ItemsPerPage = 20;
		
			$this->dtgPartnerReady->GridLines = QGridLines::Both;
		
			$objStyle = $this->dtgPartnerReady->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgPartnerReady->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgPartnerReady->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddPReady = new QButton($this);
	        $this->btnAddPReady->Text = 'Associate A User';
	        $this->btnAddPReady->CssClass = 'primary';
	        $this->btnAddPReady->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddPReady_Click'));	
	        
	        $this->strPRFirstName = new QTextBox($this);
			$this->strPRFirstName->Name = 'First Name';
			$this->strPRFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPartnerReady_Refresh'));
			$this->strPRFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPartnerReady_Refresh'));
			$this->strPRFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strPRFirstName->Focus();
			
			$this->strPRLastName = new QTextBox($this);
			$this->strPRLastName->Name = 'Last Name';
			$this->strPRLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPartnerReady_Refresh'));
			$this->strPRLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPartnerReady_Refresh'));
			$this->strPRLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strPRLastName->Focus();
			
			$this->strPRUsername = new QTextBox($this);
			$this->strPRUsername->Name = 'Username';
			//$this->strUsername->Width = 50;
			$this->strPRUsername->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPartnerReady_Refresh'));
			$this->strPRUsername->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPartnerReady_Refresh'));
			$this->strPRUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
	        $this->btnAdd = new QButton($this);
	        $this->btnAdd->Text = 'Associate A User';
	        $this->btnAdd->CssClass = 'primary';
	        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAdd_Click'));	        	    
	        
	        $this->strFirstName = new QTextBox($this);
			$this->strFirstName->Name = 'First Name';
			$this->strFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPartnerAware_Refresh'));
			$this->strFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPartnerAware_Refresh'));
			$this->strFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strFirstName->Focus();
			
			$this->strLastName = new QTextBox($this);
			$this->strLastName->Name = 'Last Name';
			$this->strLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPartnerAware_Refresh'));
			$this->strLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPartnerAware_Refresh'));
			$this->strLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strLastName->Focus();
			
			$this->strUsername = new QTextBox($this);
			$this->strUsername->Name = 'Username';
			//$this->strUsername->Width = 50;
			$this->strUsername->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPartnerAware_Refresh'));
			$this->strUsername->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPartnerAware_Refresh'));
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
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgPartnerReady,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(13) as $objGroup) {					
						if($objPartnerReady->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objPartnerReady->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstPartnerReadyGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
    	public function lstPartnerReadyGroup_Change($strFormId, $strControlId, $strParameter) {
			$intPartnerReadyId = $strParameter;
			$objPartnerReady = PartneringReadinessAssessment::Load($intPartnerReadyId);
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if($lstGroupType->SelectedValue != '-- None Selected --') {			
				$objPartnerReady->GroupId = $lstGroupType->SelectedValue;
				$objPartnerReady->Save();	
			}
		}
		
    	public function RenderPartnerAwareGroup(PartneringAwarenessAssessment $objPartnerAware) {
			$strControlId = 'lstPartnerAwareGroup' . $objPartnerAware->Id;
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgPartnerAware,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(12) as $objGroup) {					
						if($objPartnerAware->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objPartnerAware->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstPartnerAwareGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
		public function lstPartnerAwareGroup_Change($strFormId, $strControlId, $strParameter) {
			$intPartnerAwareId = $strParameter;
			$objPartnerAware = PartneringAwarenessAssessment::Load($intPartnerAwareId);
			$lstGroupType = $this->objForm->GetControl($strControlId);			
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
			//QApplication::Redirect(__SUBDIRECTORY__.'/admin/newUser.php');
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
			//QApplication::Redirect(__SUBDIRECTORY__.'/admin/newUser.php');
		}
		
    // Method Call back for the  panels 
	    public function UpdatePartnerAwareAssessmentList($blnUpdatesMade) {
	    	$this->dtgPartnerAware->PageNumber = 1;
			$this->dtgPartnerAware->Refresh();
	    }
    
    }