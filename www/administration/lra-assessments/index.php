<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminLRAAssessmentsForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Leadership Readiness Assessments';
	protected $dtgLRAAssessments;
	protected $btnAddLRAAssessment;
	protected $pnlAddLRAAssessment;
	
	protected function Form_Run() {
    	if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
    	QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-lra').className = 'active';");    	
    }
    
	protected function Form_Create() {	
		$this->dtgLRAAssessments = new LRAAssessmentDataGrid($this);
        $this->dtgLRAAssessments->Paginator = new QPaginator($this->dtgLRAAssessments);
        $this->dtgLRAAssessments->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkLRA($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgLRAAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
        $this->dtgLRAAssessments->CellPadding = 5;
		$this->dtgLRAAssessments->SetDataBinder('dtgLRAAssessments_Bind',$this);
		$this->dtgLRAAssessments->NoDataHtml = 'No Leadership Readiness Assessments have been assigned.';
		$this->dtgLRAAssessments->UseAjax = true;
		$this->dtgLRAAssessments->CssClass = 'table table-striped table-hover';
		
		$this->dtgLRAAssessments->SortColumnIndex = 1;
		$this->dtgLRAAssessments->ItemsPerPage = 20;

		$objStyle = $this->dtgLRAAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgLRAAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
        $this->btnAddLRAAssessment = new QButton($this);
        $this->btnAddLRAAssessment->Text = 'Add A User';
        $this->btnAddLRAAssessment->CssClass = 'btn btn-default';
        $this->btnAddLRAAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddLRAAssessment_Click'));
          
        $this->pnlAddLRAAssessment = new QPanel($this);
        $this->pnlAddLRAAssessment->Position = QPosition::Relative;
        $this->pnlAddLRAAssessment->Visible = false;
        $this->pnlAddLRAAssessment->AutoRenderChildren = true;
	}
	
	public function dtgLRAAssessments_Bind() {
			$this->dtgLRAAssessments->TotalItemCount = LraAssessment::CountAll();
    		$objConditions = QQ::All();
			$objClauses = array();
			$lraArray = LraAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgLRAAssessments->DataSource = $lraArray; 
		}
		
	public function RenderUserLinkLRA($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		if($objUser) {
	    		// Only display link if there is an assessment to display
	    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
					return sprintf("<a href='%s/assessments/lra/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
	    		} else {
	    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
	    		}
    		} else return sprintf("No User. Id = %s",$intUserId);
		}

		public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
	public function btnAddLRAAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddLRAAssessment->Visible = true;
	        $this->pnlAddLRAAssessment->RemoveChildControls(true);	        
	        $pnlAddLRAView = new AddLRAAssessment($this->pnlAddLRAAssessment,'UpdateLRAAssessmentList',$this);
		
		}
		
	public function UpdateLRAAssessmentList($blnUpdatesMade) {
	    	$this->dtgLRAAssessments->PageNumber = 1;
			$this->dtgLRAAssessments->Refresh();
	    }
	
}

AdminLRAAssessmentsForm::Run('AdminLRAAssessmentsForm');
?>