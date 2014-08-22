<?php
    class AdminCompanysView extends QPanel {     
        public $dtgCompanys;
        public $btnAdd;
        
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminCompanysView.tpl.php';

 
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
            
            $this->dtgCompanys = new CompanyDataGrid($this);
            $this->dtgCompanys->Paginator = new QPaginator($this->dtgCompanys);
			$this->dtgCompanys->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirCompany."viewCompany.php" ?>','<?=$_ITEM->Name?>','Name');
			$this->dtgCompanys->AddColumn(new QDataGridColumn('Address', '<?= $_CONTROL->ParentControl->RenderAddress($_ITEM) ?>', 'HtmlEntities=false', 'Width=400px' ));
			$this->dtgCompanys->AddColumn(new QDataGridColumn('Industry', '<?= $_CONTROL->ParentControl->RenderIndustry($_ITEM->Id) ?>', 'HtmlEntities=false' ));
            
			$this->dtgCompanys->CellPadding = 5;
			$this->dtgCompanys->SetDataBinder('dtgCompanys_Bind',$this);
			$this->dtgCompanys->NoDataHtml = 'No Companies.';
			$this->dtgCompanys->UseAjax = true;
			
			$this->dtgCompanys->SortColumnIndex = 1;
			$this->dtgCompanys->ItemsPerPage = 20;
		
			$objStyle = $this->dtgCompanys->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgCompanys->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgCompanys->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgCompanys->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAdd = new QButton($this);
	        $this->btnAdd->Text = 'Add A Company';
	        $this->btnAdd->CssClass = 'primary';
	        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAdd_Click'));
          
        }
        
    	public function dtgCompanys_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
	
			/*if ($strName = trim($this->strName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Recipe()->Name, $strName . '%')
				);
			}	*/	
			$companyArray = Company::QueryArray($objConditions,$objClauses);		
			$this->dtgCompanys->DataSource = $companyArray; 
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