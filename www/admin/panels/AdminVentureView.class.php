<?php
    class AdminVentureView extends QPanel {     
        public $dtgVentures;
        public $btnAdd;
        public $strFirstName;
		public $strUsername;
		public $strLastName;
		protected $selectedUserArray;
		public $pnlAddVentureAssessment;
        
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminVentureView.tpl.php';

 
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
            $this->dtgVentures = new PostventureAssessmentDataGrid($this);
            $this->dtgVentures->Paginator = new QPaginator($this->dtgVentures);
            $this->dtgVentures->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkPostVenture($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
             $this->dtgVentures->AddColumn(new QDataGridColumn('Group', '<?= $_CONTROL->ParentControl->RenderPostVentureGroup($_ITEM) ?>', 'HtmlEntities=false' ));             
            $this->dtgVentures->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                                  
			$this->dtgVentures->CellPadding = 5;
			$this->dtgVentures->SetDataBinder('dtgVentures_Bind',$this);
			$this->dtgVentures->NoDataHtml = 'No Post Venture Assessments have been assigned';
			$this->dtgVentures->UseAjax = true;
			
			$this->dtgVentures->SortColumnIndex = 1;
			$this->dtgVentures->ItemsPerPage = 20;
		
			$this->dtgVentures->GridLines = QGridLines::Both;
		
			$objStyle = $this->dtgVentures->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgVentures->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgVentures->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAdd = new QButton($this);
	        $this->btnAdd->Text = 'Associate A User';
	        $this->btnAdd->CssClass = 'primary';
	        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAdd_Click'));	        	    
	        
	        $this->strFirstName = new QTextBox($this);
			$this->strFirstName->Name = 'First Name';
			$this->strFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgVentures_Refresh'));
			$this->strFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgVentures_Refresh'));
			$this->strFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strFirstName->Focus();
			
			$this->strLastName = new QTextBox($this);
			$this->strLastName->Name = 'Last Name';
			$this->strLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgVentures_Refresh'));
			$this->strLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgVentures_Refresh'));
			$this->strLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strLastName->Focus();
			
			$this->strUsername = new QTextBox($this);
			$this->strUsername->Name = 'Username';
			//$this->strUsername->Width = 50;
			$this->strUsername->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgVentures_Refresh'));
			$this->strUsername->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgVentures_Refresh'));
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
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgVentures,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(11) as $objGroup) {					
						if($objPostVenture->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objPostVenture->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstPostventureGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
		public function lstPostventureGroup_Change($strFormId, $strControlId, $strParameter) {
			$intVentureId = $strParameter;
			$objVenture = PostventureAssessment::Load($intVentureId);
			$lstGroupType = $this->objForm->GetControl($strControlId);			
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
			//QApplication::Redirect(__SUBDIRECTORY__.'/admin/newUser.php');
		}
		
    // Method Call back for the  panels 
	    public function UpdateVentureAssessmentList($blnUpdatesMade) {
	    	$this->dtgVentures->PageNumber = 1;
			$this->dtgVentures->Refresh();
	    }
    
    }