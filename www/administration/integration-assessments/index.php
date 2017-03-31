<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminIntegrationAssessmentsForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Integration Assessments';
	protected $dtgIntegrationAssessments;
	protected $btnAddIntegrationAssessment;
	protected $pnlAddIntegrationAssessment;
	
	protected $dtgSeasonalAssessments;
	protected $btnAddSeasonalAssessment;
	protected $pnlAddSeasonalAssessment;
	
	protected $dtgTimeAssessments;
	protected $btnAddTimeAssessment;
	protected $pnlAddTimeAssessment;
	
	protected function Form_Run() {
    	if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
    	QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-integration').className = 'active';");    	
    }
    
	protected function Form_Create() {	
		$this->dtgIntegrationAssessments = new IntegrationAssessmentDataGrid($this);
        $this->dtgIntegrationAssessments->Paginator = new QPaginator($this->dtgIntegrationAssessments);
        $this->dtgIntegrationAssessments->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkIntegration($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgIntegrationAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
        $this->dtgIntegrationAssessments->CellPadding = 5;
		$this->dtgIntegrationAssessments->SetDataBinder('dtgIntegrationAssessments_Bind',$this);
		$this->dtgIntegrationAssessments->NoDataHtml = 'No Integration Assessments have been assigned.';
		$this->dtgIntegrationAssessments->UseAjax = true;
		$this->dtgIntegrationAssessments->CssClass = 'table table-striped table-hover';
			
		$this->dtgIntegrationAssessments->SortColumnIndex = 1;
		$this->dtgIntegrationAssessments->ItemsPerPage = 20;
		
        $objStyle = $this->dtgIntegrationAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
        $objStyle = $this->dtgIntegrationAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
	    $this->btnAddIntegrationAssessment = new QButton($this);
	    $this->btnAddIntegrationAssessment->Text = 'Add A User';
	    $this->btnAddIntegrationAssessment->CssClass = 'btn btn-default';
	    $this->btnAddIntegrationAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddIntegrationAssessment_Click'));
          
        $this->pnlAddIntegrationAssessment = new QPanel($this);
        $this->pnlAddIntegrationAssessment->Position = QPosition::Relative;
        $this->pnlAddIntegrationAssessment->Visible = false;
        $this->pnlAddIntegrationAssessment->AutoRenderChildren = true;
        
        /***************************************************************/
	     
	    $this->dtgSeasonalAssessments = new SeasonalAssessmentDataGrid($this);
        $this->dtgSeasonalAssessments->Paginator = new QPaginator($this->dtgSeasonalAssessments);
        $this->dtgSeasonalAssessments->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkSeasonal($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgSeasonalAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
        $this->dtgSeasonalAssessments->CellPadding = 5;
		$this->dtgSeasonalAssessments->SetDataBinder('dtgSeasonalAssessments_Bind',$this);
		$this->dtgSeasonalAssessments->NoDataHtml = 'No Seasonal Assessments have been assigned.';
		$this->dtgSeasonalAssessments->UseAjax = true;
		$this->dtgSeasonalAssessments->CssClass = 'table table-striped table-hover';
			
		$this->dtgSeasonalAssessments->SortColumnIndex = 1;
		$this->dtgSeasonalAssessments->ItemsPerPage = 20;
		
        $objStyle = $this->dtgSeasonalAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgSeasonalAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
        $this->btnAddSeasonalAssessment = new QButton($this);
        $this->btnAddSeasonalAssessment->Text = 'Add A User';
        $this->btnAddSeasonalAssessment->CssClass = 'btn btn-default';
        $this->btnAddSeasonalAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddSeasonalAssessment_Click'));
          
        $this->pnlAddSeasonalAssessment = new QPanel($this);
        $this->pnlAddSeasonalAssessment->Position = QPosition::Relative;
        $this->pnlAddSeasonalAssessment->Visible = false;
        $this->pnlAddSeasonalAssessment->AutoRenderChildren = true;
	        
	    /***************************************************************/
	     
	        $this->dtgTimeAssessments = new TimeAssessmentDataGrid($this);
            $this->dtgTimeAssessments->Paginator = new QPaginator($this->dtgTimeAssessments);
            $this->dtgTimeAssessments->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkTime($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgTimeAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgTimeAssessments->CellPadding = 5;
			$this->dtgTimeAssessments->SetDataBinder('dtgTimeAssessments_Bind',$this);
			$this->dtgTimeAssessments->NoDataHtml = 'No Where Does The Time Go Assessments have been assigned.';
			$this->dtgTimeAssessments->UseAjax = true;
			$this->dtgTimeAssessments->CssClass = 'table table-striped table-hover';
			
			$this->dtgTimeAssessments->SortColumnIndex = 1;
			$this->dtgTimeAssessments->ItemsPerPage = 20;
			
	        $objStyle = $this->dtgTimeAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        
	        $objStyle = $this->dtgTimeAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        
	        $this->btnAddTimeAssessment = new QButton($this);
	        $this->btnAddTimeAssessment->Text = 'Add A User';
	        $this->btnAddTimeAssessment->CssClass = 'btn btn-default';
	        $this->btnAddTimeAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddTimeAssessment_Click'));
          
	        $this->pnlAddTimeAssessment = new QPanel($this);
	        $this->pnlAddTimeAssessment->Position = QPosition::Relative;
	        $this->pnlAddTimeAssessment->Visible = false;
	        $this->pnlAddTimeAssessment->AutoRenderChildren = true;					
	}
	
	public function dtgIntegrationAssessments_Bind() {
			$this->dtgIntegrationAssessments->TotalItemCount = IntegrationAssessment::CountAll();
    		$objConditions = QQ::All();	
			$this->dtgIntegrationAssessments->DataSource = IntegrationAssessment::QueryArray($objConditions); 
		}
		
		public function dtgSeasonalAssessments_Bind() {
			$this->dtgSeasonalAssessments->TotalItemCount = SeasonalAssessment::CountAll();
    		$objConditions = QQ::All();	
			$this->dtgSeasonalAssessments->DataSource = SeasonalAssessment::QueryArray($objConditions); 
		}
		
    	public function dtgTimeAssessments_Bind() {
			$this->dtgTimeAssessments->TotalItemCount = TimeAssessment::CountAll();
    		$objConditions = QQ::All();	
			$this->dtgTimeAssessments->DataSource = TimeAssessment::QueryArray($objConditions); 
		}
		
		public function RenderUserLinkIntegration($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		if($objUser) {
	    		// Only display link if there is an assessment to display
	    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
					return sprintf("<a href='%s/assessments/integration/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
	    		} else {
	    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
	    		}
    		} else return sprintf("No User. UserId = %d",$intUserId);
		}
		
		public function RenderUserLinkSeasonal($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		if($objUser) {
	    		// Only display link if there is an assessment to display
	    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
					return sprintf("<a href='%s/assessments/seasons/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
	    		} else {
	    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
	    		}
    		} else return sprintf("No User. UserId = %d",$intUserId);
		}
		
		public function RenderUserLinkTime($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		if($objUser) {
	    		// Only display link if there is an assessment to display
	    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
					return sprintf("<a href='%s/assessments/time/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
	    		} else {
	    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
	    		}
	    	} else return sprintf("No User. UserId = %d",$intUserId);
		}
		
    	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
		public function btnAddIntegrationAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddIntegrationAssessment->Visible = true;
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $pnlAddIntegrationView = new AddIntegrationAssessment($this->pnlAddIntegrationAssessment,'UpdateIntegrationAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateIntegrationAssessmentList($blnUpdatesMade) {
	    	$this->dtgIntegrationAssessments->PageNumber = 1;
			$this->dtgIntegrationAssessments->Refresh();
	    }
	    
    	public function btnAddSeasonalAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddSeasonalAssessment->Visible = true;
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $pnlAddSeasonalView = new AddSeasonalAssessment($this->pnlAddSeasonalAssessment,'UpdateSeasonalAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateSeasonalAssessmentList($blnUpdatesMade) {
	    	$this->dtgSeasonalAssessments->PageNumber = 1;
			$this->dtgSeasonalAssessments->Refresh();
	    }
	    
    	public function btnAddTimeAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTimeAssessment->Visible = true;
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $pnlAddTimeView = new AddTimeAssessment($this->pnlAddTimeAssessment,'UpdateTimeAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateTimeAssessmentList($blnUpdatesMade) {
	    	$this->dtgTimeAssessments->PageNumber = 1;
			$this->dtgTimeAssessments->Refresh();
	    }
}

AdminIntegrationAssessmentsForm::Run('AdminIntegrationAssessmentsForm');
?>