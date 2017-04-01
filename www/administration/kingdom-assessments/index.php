<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminKingdomAssessmentsForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Kingdom Business Assessments';
	protected $dtgKingdomBizAssessments;
    protected $btnAddKingdomBizAssessment;
    protected $pnlAddKingdomAssessment;
	
	protected function Form_Run() {
    	if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
    	QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-kingdom').className = 'active';");    	
    }
    
	protected function Form_Create() {	
		$this->dtgKingdomBizAssessments = new KingdomBusinessAssessmentDataGrid($this);
        $this->dtgKingdomBizAssessments->Paginator = new QPaginator($this->dtgKingdomBizAssessments);
        $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkKingdom($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_FORM->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
        $this->dtgKingdomBizAssessments->CellPadding = 5;
		$this->dtgKingdomBizAssessments->SetDataBinder('dtgKingdomBizAssessments_Bind',$this);
		$this->dtgKingdomBizAssessments->NoDataHtml = 'No Kingdom Business Assessments have been assigned.';
		$this->dtgKingdomBizAssessments->UseAjax = true;
		$this->dtgKingdomBizAssessments->CssClass = 'table table-striped table-hover';
		
		$this->dtgKingdomBizAssessments->SortColumnIndex = 1;
		$this->dtgKingdomBizAssessments->ItemsPerPage = 20;

		$objStyle = $this->dtgKingdomBizAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
        $objStyle = $this->dtgKingdomBizAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $this->btnAddKingdomBizAssessment = new QButton($this);
        $this->btnAddKingdomBizAssessment->Text = 'Add A User';
        $this->btnAddKingdomBizAssessment->CssClass = 'btn btn-default';
        $this->btnAddKingdomBizAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddKingdomBizAssessment_Click'));
          
	    $this->pnlAddKingdomAssessment = new QPanel($this);
	    $this->pnlAddKingdomAssessment->Position = QPosition::Relative;
	    $this->pnlAddKingdomAssessment->Visible = false;
	    $this->pnlAddKingdomAssessment->AutoRenderChildren = true;	
	}
	
	public function dtgKingdomBizAssessments_Bind() {
			$this->dtgKingdomBizAssessments->TotalItemCount = KingdomBusinessAssessment::CountAll();
			$objConditions = QQ::All();
			$objClauses = array();
			$KingdomBizArray = KingdomBusinessAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgKingdomBizAssessments->DataSource = $KingdomBizArray; 
	}
	
	public function RenderUserLinkKingdom($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/kingdom/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__, $intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}

	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
	}
	
	public function btnAddKingdomBizAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddKingdomAssessment->Visible = true;
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);	        
	        $pnlAddKingdomView = new AddKingdomAssessment($this->pnlAddKingdomAssessment,'UpdateAssessmentList',$this);
		
		}
	
	// Method Call back for the  panels 
	public function UpdateAssessmentList($blnUpdatesMade) {
	    	$this->dtgKingdomBizAssessments->PageNumber = 1;
			$this->dtgKingdomBizAssessments->Refresh();
	}
	    
	public function RenderCompany($intCompanyId) {
			$objCompany = Company::Load($intCompanyId);
			if (null != $objCompany)
				return $objCompany->Name;
			else 
				return 'No Company';
		}
        
    	public function RenderUser($intUserId) {
    		$objUser = User::Load($intUserId);
			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
		}
}

AdminKingdomAssessmentsForm::Run('AdminKingdomAssessmentsForm');
?>