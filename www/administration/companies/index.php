<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminCompaniesForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Companies';
	protected $dtgCompanys;
    protected $btnAdd;
    protected $strName;
    protected $btnSearch;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
		QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-companies').className = 'active';"); 
	}
	
	protected function Form_Create() {	
		$this->strName = new QTextBox($this);
		$this->strName->Name = 'Company Name';
		$this->strName->CssClass = 'form-control';
		
		$this->btnSearch = new QButton($this);
        $this->btnSearch->Text = 'Search';
        $this->btnSearch->CssClass = 'btn btn-default';
        $this->btnSearch->AddAction(new QClickEvent(), new QAjaxAction('dtgCompanys_Refresh'));	
				
		$this->dtgCompanys = new CompanyDataGrid($this);
        $this->dtgCompanys->Paginator = new QPaginator($this->dtgCompanys);		
		$this->dtgCompanys->AddColumn(new QDataGridColumn('Company Name', '<?= $_FORM->RenderCompanyLink($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::Company()->Name), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->Name, false))));
		
		$this->dtgCompanys->AddColumn(new QDataGridColumn('Address', '<?= $_FORM->RenderAddress($_ITEM) ?>', 'HtmlEntities=false' ));
		$this->dtgCompanys->AddColumn(new QDataGridColumn('Industry', '<?= $_FORM->RenderIndustry($_ITEM->Id) ?>', 'HtmlEntities=false' ));
		$this->dtgCompanys->CssClass = 'table table-striped table-hover';
            
		$this->dtgCompanys->CellPadding = 5;
		$this->dtgCompanys->SetDataBinder('dtgCompanys_Bind',$this);
		$this->dtgCompanys->NoDataHtml = 'No Companies.';
		$this->dtgCompanys->UseAjax = true;
		
		$this->dtgCompanys->SortColumnIndex = 1;
		$this->dtgCompanys->ItemsPerPage = 20;
		
        $objStyle = $this->dtgCompanys->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgCompanys->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $this->btnAdd = new QButton($this);
        $this->btnAdd->Text = 'Add A Company';
        $this->btnAdd->CssClass = 'btn btn-default';
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));		
	}
	
	public function RenderCompanyLink(Company $objCompany) {	
		return sprintf("<a href='%s/company/viewCompany.php/%s' target='_blank' >%s</a>", __SUBDIRECTORY__,$objCompany->Id, $objCompany->Name);   		
	}
	
	public function dtgCompanys_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgCompanys->PageNumber = 1;
			$this->dtgCompanys->Refresh();
	}
	
	public function dtgCompanys_Bind() {
			$objConditions = QQ::All();
	
			if ($strName = trim($this->strName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Company()->Name, $strName . '%')
				);
			}		
			$this->dtgCompanys->TotalItemCount = Company::CountAll();								
			$this->dtgCompanys->DataSource = Company::QueryArray($objConditions, QQ::Clause(
                $this->dtgCompanys->OrderByClause,
                $this->dtgCompanys->LimitClause
            ));		
		}
	
		public function RenderAddress($objCompany) {
			$objAddress = Address::Load($objCompany->AddressId);
			if (null != $objAddress) {
				return sprintf("%s, %s, %s, %s, %s", $objAddress->Address1,$objAddress->City,$objAddress->State, $objAddress->ZipCode,
					$objAddress->Country); 
			} else {
				return 'No Address Specified';
			}
		}
		
    	public function RenderIndustry($intCompanyId) {
    		$industryArray = Industry::LoadArrayByCompany($intCompanyId);
    		$commaSeparated = '';
    		foreach($industryArray as $objIndustry) {
    			$commaSeparated .= $objIndustry->Value .', ';
    		}
    		rtrim($commaSeparated, ', ');
    		if ($commaSeparated != '')
				return $commaSeparated;
			else 
				return 'No Industries Selected';
		}   	
		
	    public function btnAdd_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect(__SUBDIRECTORY__.'/admin/newCompany.php');
		}
}

AdminCompaniesForm::Run('AdminCompaniesForm');
?>