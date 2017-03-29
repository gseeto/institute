<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminChecklistForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Check lists';
	protected $dtgCompanies;
    protected $btnAdd;
    protected $btnAssociateUser;
    protected $pnlAddCompany;
	protected $pnlAssociateUser;
	
	protected function Form_Create() {			
		$this->dtgCompanies = new BusinessChecklistDataGrid($this);
        $this->dtgCompanies->Paginator = new QPaginator($this->dtgCompanies);
        $this->dtgCompanies->AddColumn(new QDataGridColumn('Company', '<?= $_FORM->RenderCompany($_ITEM) ?>', 'HtmlEntities=false', 'Width=400px' ));
        $this->dtgCompanies->AddColumn(new QDataGridColumn('Managers', '<?= $_FORM->RenderManagers($_ITEM) ?>', 'HtmlEntities=false', 'Width=450px'  ));                                              
		$this->dtgCompanies->CellPadding = 5;
		$this->dtgCompanies->SetDataBinder('dtgCompanies_Bind',$this);
		$this->dtgCompanies->NoDataHtml = 'No Companies in the Business Checklist';
		$this->dtgCompanies->UseAjax = true;
		$this->dtgCompanies->CssClass = 'table table-striped table-hover';
			
		$this->dtgCompanies->SortColumnIndex = 1;
		$this->dtgCompanies->ItemsPerPage = 20;
	
       	$objStyle = $this->dtgCompanies->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgCompanies->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
        $this->btnAdd = new QButton($this);
        $this->btnAdd->Text = 'Add a Company';
        $this->btnAdd->CssClass = 'btn btn-default';
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));	        	    
        
        $this->btnAssociateUser = new QButton($this);
        $this->btnAssociateUser->Text = 'Associate a Manager with a company';
        $this->btnAssociateUser->CssClass = 'btn btn-default';
        $this->btnAssociateUser->AddAction(new QClickEvent(), new QAjaxAction('btnAssociateUser_Click'));
                  
		$this->pnlAddCompany = new QPanel($this);
        $this->pnlAddCompany->Position = QPosition::Relative;
        $this->pnlAddCompany->Visible = false;
        $this->pnlAddCompany->AutoRenderChildren = true;
        
        $this->pnlAssociateUser = new QPanel($this);
        $this->pnlAssociateUser->Position = QPosition::Relative;
        $this->pnlAssociateUser->Visible = false;
        $this->pnlAssociateUser->AutoRenderChildren = true;		
	}
	
	protected function dtgCompanies_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgCompanies->PageNumber = 1;
			$this->dtgCompanies->Refresh();
		}
		
    	protected function dtgCompanies_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$objClauses = QQ::Clause($this->dtgCompanies->OrderByClause,$this->dtgCompanies->LimitClause);
		    				
			$checklistArray = BusinessChecklist::QueryArray($objConditions,$objClauses);		
			$this->dtgCompanies->TotalItemCount = BusinessChecklist::CountAll();
			$this->dtgCompanies->DataSource = $checklistArray; 
		}
	
    	public function RenderCompany(BusinessChecklist $objChecklist) {
    		$intCompanyId = $objChecklist->CompanyId;
    		$objCompany = Company::Load($intCompanyId);
			return sprintf("<a href='%s/checklist/i4center/viewChecklist.php/%s' target='_blank' >%s</a>", __SUBDIRECTORY__,$objChecklist->Id, $objCompany->Name);   		
		}
		
    	public function RenderManagers(BusinessChecklist $objChecklist) {
    		$strReturn  = '';
			$objArray = $objChecklist->GetUserAsManagerArray();
			foreach($objArray as $objUser) {				
				$strReturn .= $objUser->Login->Username .', ';
			}
			return $strReturn;
		}
		
		
	    protected function btnAdd_Click($strFormId, $strControlId, $strParameter) {
	    	$this->pnlAddCompany->Visible = true;
	        $this->pnlAddCompany->RemoveChildControls(true);
	    	$pnlAddCompanyView = new AddBusinesschecklist($this->pnlAddCompany,'UpdateCheckList',$this);
		}
		
		public function btnAssociateUser_Click($strFormId, $strControlId, $strParameter) {
			$this->pnlAssociateUser->Visible = true;
	        $this->pnlAssociateUser->RemoveChildControls(true);
	    	$pnlAddCompanyView = new AddUserToBusinessChecklist($this->pnlAssociateUser,'UpdateCheckList',$this);
		}
		
    // Method Call back for the  panels 
	    public function UpdateCheckList($blnUpdatesMade) {
	    	$this->dtgCompanies->PageNumber = 1;
			$this->dtgCompanies->Refresh();
	    }
}

AdminChecklistForm::Run('AdminChecklistForm');
?>