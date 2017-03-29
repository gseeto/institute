<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminTenPandFForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage 10-P and 10-F Assessments';
	protected $dtgTenPAssessments;
	protected $btnAddTenPAssessment;
	protected $pnlAddTenPAssessment;
        
	protected $dtgTenFAssessments;
	protected $btnAddTenFAssessment;
	protected $pnlAddTenFAssessment;
	
	protected function Form_Create() {			
		$this->dtgTenPAssessments = new TenPAssessmentDataGrid($this);
        $this->dtgTenPAssessments->Paginator = new QPaginator($this->dtgTenPAssessments);
        $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkTenP($_ITEM) ?>', 'HtmlEntities=false', 
        	array('OrderByClause' => QQ::OrderBy(QQN::TenPAssessment()->User->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::TenPAssessment()->User->LastName, false))));
        $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_FORM->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Group', '<?= $_FORM->RenderTenPGroup($_ITEM) ?>', 'HtmlEntities=false' ));             
        $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
        $this->dtgTenPAssessments->CellPadding = 5;
		$this->dtgTenPAssessments->SetDataBinder('dtgTenPAssessments_Bind',$this);
		$this->dtgTenPAssessments->NoDataHtml = 'No 10-P Assessments have been assigned.';
		$this->dtgTenPAssessments->UseAjax = true;
		$this->dtgTenPAssessments->CssClass = 'table table-striped table-hover';
			
		$this->dtgTenPAssessments->SortColumnIndex = 1;
		$this->dtgTenPAssessments->ItemsPerPage = 20;
				
        $objStyle = $this->dtgTenPAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgTenPAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $this->btnAddTenPAssessment = new QButton($this);
        $this->btnAddTenPAssessment->Text = 'Add A User';
        $this->btnAddTenPAssessment->CssClass = 'btn btn-default';
        $this->btnAddTenPAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddTenPAssessment_Click'));
          
        $this->pnlAddTenPAssessment = new QPanel($this);
        $this->pnlAddTenPAssessment->Position = QPosition::Relative;
        $this->pnlAddTenPAssessment->Visible = false;
        $this->pnlAddTenPAssessment->AutoRenderChildren = true;
	        /*******************************/
	    $this->dtgTenFAssessments = new TenFAssessmentDataGrid($this);
        $this->dtgTenFAssessments->Paginator = new QPaginator($this->dtgTenFAssessments);
        $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkTenF($_ITEM) ?>', 'HtmlEntities=false', 
        	array('OrderByClause' => QQ::OrderBy(QQN::TenFAssessment()->User->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::TenFAssessment()->User->LastName, false))));
        $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('Group', '<?= $_FORM->RenderTenFGroup($_ITEM) ?>', 'HtmlEntities=false' ));
        $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
        $this->dtgTenFAssessments->CellPadding = 5;
		$this->dtgTenFAssessments->SetDataBinder('dtgTenFAssessments_Bind',$this);
		$this->dtgTenFAssessments->NoDataHtml = 'No 10-F Assessments have been assigned.';
		$this->dtgTenFAssessments->UseAjax = true;
		$this->dtgTenFAssessments->CssClass = 'table table-hover table-striped';
			
		$this->dtgTenFAssessments->SortColumnIndex = 1;
		$this->dtgTenFAssessments->ItemsPerPage = 20;
				
        $objStyle = $this->dtgTenFAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgTenFAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $this->btnAddTenFAssessment = new QButton($this);
        $this->btnAddTenFAssessment->Text = 'Add A User';
        $this->btnAddTenFAssessment->CssClass = 'btn btn-default';
        $this->btnAddTenFAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddTenFAssessment_Click'));
          
	    $this->pnlAddTenFAssessment = new QPanel($this);
	    $this->pnlAddTenFAssessment->Position = QPosition::Relative;
	    $this->pnlAddTenFAssessment->Visible = false;
	    $this->pnlAddTenFAssessment->AutoRenderChildren = true;			
	}
	
	public function dtgTenPAssessments_Bind() {
			$this->dtgTenPAssessments->TotalItemCount = TenPAssessment::CountAll();
    		$objConditions = QQ::All();			 		
			$this->dtgTenPAssessments->DataSource = TenPAssessment::QueryArray($objConditions,QQ::Clause(
                $this->dtgTenPAssessments->OrderByClause,
                $this->dtgTenPAssessments->LimitClause)); 
		}
	
    	public function dtgTenFAssessments_Bind() {
			$this->dtgTenFAssessments->TotalItemCount = TenFAssessment::CountAll();
    		$objConditions = QQ::All();
			$this->dtgTenFAssessments->DataSource = TenFAssessment::QueryArray($objConditions,QQ::Clause(
                $this->dtgTenFAssessments->OrderByClause,
                $this->dtgTenFAssessments->LimitClause)); 
		}
		
	public function RenderCompany($intCompanyId) {
			$objCompany = Company::Load($intCompanyId);
			if (null != $objCompany)
				return $objCompany->Name;
			else 
				return 'No Company';
		}
        
	public function RenderUserLinkTenP($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/tenp/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
    	public function RenderTenFGroup(TenFAssessment $objTenF) {
			$strControlId = 'lstTenFGroup' . $objTenF->Id;
			$lstGroupType = $this->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgTenFAssessments,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(3) as $objGroup) {					
						if($objTenF->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objTenF->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstTenFGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
		public function lstTenFGroup_Change($strFormId, $strControlId, $strParameter) {
			$lstGroupType = $this->GetControl($strControlId);
			if ($lstGroupType != null){
				$objTenFAssessment = TenFAssessment::Load($strParameter);
				if($lstGroupType->SelectedValue == 0)
					$objTenFAssessment->GroupId = null;
				else
					$objTenFAssessment->GroupId = $lstGroupType->SelectedValue;
				$objTenFAssessment->Save();
			}
			$this->dtgTenFAssessments->Refresh();
		}
		
		public function RenderTenPGroup(TenPAssessment $objTenP) {
			$strControlId = 'lstTenPGroup' . $objTenP->Id;
			$lstGroupType = $this->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgTenPAssessments,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(2) as $objGroup) {					
						if($objTenP->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objTenP->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstTenPGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
		public function lstTenPGroup_Change($strFormId, $strControlId, $strParameter) {
			$lstGroupType = $this->GetControl($strControlId);
			if ($lstGroupType != null){
				$objTenPAssessment = TenPAssessment::Load($strParameter);
				if($lstGroupType->SelectedValue == 0)
					$objTenPAssessment->GroupId = null;
				else
					$objTenPAssessment->GroupId = $lstGroupType->SelectedValue;
				$objTenPAssessment->Save();
			}
			$this->dtgTenPAssessments->Refresh();
		}
		
	public function RenderUserLinkTenF($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/tenf/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
	  
    	public function btnAddTenPAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTenPAssessment->Visible = true;
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);	       
	        $pnlAddTenPView = new AddTenPAssessment($this->pnlAddTenPAssessment,'UpdateTenPAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateTenPAssessmentList($blnUpdatesMade) {
	    	$this->dtgTenPAssessments->PageNumber = 1;
			$this->dtgTenPAssessments->Refresh();
	    }
	    
    	public function btnAddTenFAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTenFAssessment->Visible = true;
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);	        
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);	        
	        $pnlAddTenFView = new AddTenFAssessment($this->pnlAddTenFAssessment,'UpdateTenFAssessmentList',$this);		
		}
						    
	    
	    // Method Call back for the  panels 
	    public function UpdateTenFAssessmentList($blnUpdatesMade) {
	    	$this->dtgTenFAssessments->PageNumber = 1;
			$this->dtgTenFAssessments->Refresh();
	    }
}

AdminTenPandFForm::Run('AdminTenPandFForm');
?>