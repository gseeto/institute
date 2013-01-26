<?php	
    class AdminAssessmentsView extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $dtgKingdomBizAssessments;
        public $btnAddKingdomBizAssessment;
        public $pnlAddKingdomAssessment;
        
        public $dtgTenPAssessments;
		public $btnAddTenPAssessment;
		public $pnlAddTenPAssessment;
        
		public $dtgTenFAssessments;
		public $btnAddTenFAssessment;
		public $pnlAddTenFAssessment;
		
		public $dtgLemonAssessments;
		public $btnAddLemonAssessment;
		public $pnlAddLemonAssessment;
		
		public $dtgGroupAssessments;
		public $btnAddGroupAssessment;
		public $pnlAddGroupAssessment;
		
		public $txtKeyCode;
		public $lblKeyCode;
		public $txtDescription;
		public $lblDescription;
		public $txtTotalKeys;
		public $lblTotalKeys;
		public $txtKeysLeft;
		public $lblKeysLeft;
		public $lstAssessmentType;
		
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminAssessmentsView.tpl.php';

 
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
           
            $this->dtgKingdomBizAssessments = new KingdomBusinessAssessmentDataGrid($this);
            $this->dtgKingdomBizAssessments->Paginator = new QPaginator($this->dtgKingdomBizAssessments);
            $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkKingdom($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgKingdomBizAssessments->CellPadding = 5;
			$this->dtgKingdomBizAssessments->SetDataBinder('dtgKingdomBizAssessments_Bind',$this);
			$this->dtgKingdomBizAssessments->NoDataHtml = 'No Kingdom Business Assessments have been assigned.';
			$this->dtgKingdomBizAssessments->UseAjax = true;
			
			$this->dtgKingdomBizAssessments->SortColumnIndex = 1;
			$this->dtgKingdomBizAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgKingdomBizAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgKingdomBizAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgKingdomBizAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgKingdomBizAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddKingdomBizAssessment = new QButton($this);
	        $this->btnAddKingdomBizAssessment->Text = 'Add A User';
	        $this->btnAddKingdomBizAssessment->CssClass = 'primary';
	        $this->btnAddKingdomBizAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddKingdomBizAssessment_Click'));
          
	        $this->pnlAddKingdomAssessment = new QPanel($this);
	        $this->pnlAddKingdomAssessment->Position = QPosition::Relative;
	        $this->pnlAddKingdomAssessment->Visible = false;
	        $this->pnlAddKingdomAssessment->AutoRenderChildren = true;
	        /********************************************/
	        $this->dtgLemonAssessments = new LemonAssessmentDataGrid($this);
            $this->dtgLemonAssessments->Paginator = new QPaginator($this->dtgLemonAssessments);
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkLemon($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgLemonAssessments->CellPadding = 5;
			$this->dtgLemonAssessments->SetDataBinder('dtgLemonAssessments_Bind',$this);
			$this->dtgLemonAssessments->NoDataHtml = 'No Lemon Assessments have been assigned.';
			$this->dtgLemonAssessments->UseAjax = true;
			
			$this->dtgLemonAssessments->SortColumnIndex = 1;
			$this->dtgLemonAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgLemonAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgLemonAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgLemonAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgLemonAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddLemonAssessment = new QButton($this);
	        $this->btnAddLemonAssessment->Text = 'Add A User';
	        $this->btnAddLemonAssessment->CssClass = 'primary';
	        $this->btnAddLemonAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddLemonAssessment_Click'));
          
	        $this->pnlAddLemonAssessment = new QPanel($this);
	        $this->pnlAddLemonAssessment->Position = QPosition::Relative;
	        $this->pnlAddLemonAssessment->Visible = false;
	        $this->pnlAddLemonAssessment->AutoRenderChildren = true;
	        /*****************************************/
	        $this->dtgTenPAssessments = new TenPAssessmentDataGrid($this);
            $this->dtgTenPAssessments->Paginator = new QPaginator($this->dtgTenPAssessments);
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkTenP($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgTenPAssessments->CellPadding = 5;
			$this->dtgTenPAssessments->SetDataBinder('dtgTenPAssessments_Bind',$this);
			$this->dtgTenPAssessments->NoDataHtml = 'No 10-P Assessments have been assigned.';
			$this->dtgTenPAssessments->UseAjax = true;
			
			$this->dtgTenPAssessments->SortColumnIndex = 1;
			$this->dtgTenPAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgTenPAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgTenPAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgTenPAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgTenPAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddTenPAssessment = new QButton($this);
	        $this->btnAddTenPAssessment->Text = 'Add A User';
	        $this->btnAddTenPAssessment->CssClass = 'primary';
	        $this->btnAddTenPAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddTenPAssessment_Click'));
          
	        $this->pnlAddTenPAssessment = new QPanel($this);
	        $this->pnlAddTenPAssessment->Position = QPosition::Relative;
	        $this->pnlAddTenPAssessment->Visible = false;
	        $this->pnlAddTenPAssessment->AutoRenderChildren = true;
	        /*******************************/
	        $this->dtgTenFAssessments = new TenFAssessmentDataGrid($this);
            $this->dtgTenFAssessments->Paginator = new QPaginator($this->dtgTenFAssessments);
            $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkTenF($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            /*$this->dtgTenFAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));*/
            $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgTenFAssessments->CellPadding = 5;
			$this->dtgTenFAssessments->SetDataBinder('dtgTenFAssessments_Bind',$this);
			$this->dtgTenFAssessments->NoDataHtml = 'No 10-F Assessments have been assigned.';
			$this->dtgTenFAssessments->UseAjax = true;
			
			$this->dtgTenFAssessments->SortColumnIndex = 1;
			$this->dtgTenFAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgTenFAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgTenFAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgTenFAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgTenFAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddTenFAssessment = new QButton($this);
	        $this->btnAddTenFAssessment->Text = 'Add A User';
	        $this->btnAddTenFAssessment->CssClass = 'primary';
	        $this->btnAddTenFAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddTenFAssessment_Click'));
          
	        $this->pnlAddTenFAssessment = new QPanel($this);
	        $this->pnlAddTenFAssessment->Position = QPosition::Relative;
	        $this->pnlAddTenFAssessment->Visible = false;
	        $this->pnlAddTenFAssessment->AutoRenderChildren = true;
	        /***************************************************************/
	        
	        $this->dtgGroupAssessments = new GroupAssessmentListDataGrid($this);
            $this->dtgGroupAssessments->Paginator = new QPaginator($this->dtgGroupAssessments);
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_CONTROL->ParentControl->RenderKeyCode($_ITEM) ?>', 'HtmlEntities=false', 'Width=200px' ));
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_CONTROL->ParentControl->RenderDescription($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_CONTROL->ParentControl->RenderTotalKeys($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_CONTROL->ParentControl->RenderKeysLeft($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));   
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Assessment Type', '<?= $_CONTROL->ParentControl->RenderAssessmentType($_ITEM) ?>', 'HtmlEntities=false' )); 
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Assessment Manager', '<?= $_CONTROL->ParentControl->RenderAssessmentManager($_ITEM) ?>', 'HtmlEntities=false' )); 
            $this->dtgGroupAssessments->CellPadding = 5;
			$this->dtgGroupAssessments->SetDataBinder('dtgGroupAssessments_Bind',$this);
			$this->dtgGroupAssessments->NoDataHtml = 'No Group Assessments have been assigned.';
			$this->dtgGroupAssessments->UseAjax = true;
			
			$this->dtgGroupAssessments->SortColumnIndex = 1;
			$this->dtgGroupAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgGroupAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgGroupAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgGroupAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgGroupAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddGroupAssessment = new QButton($this);
	        $this->btnAddGroupAssessment->Text = 'Add Group Assessment';
	        $this->btnAddGroupAssessment->CssClass = 'primary';
	        $this->btnAddGroupAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddGroupAssessment_Click'));
          
	        $this->pnlAddGroupAssessment = new QPanel($this);
	        $this->pnlAddGroupAssessment->Position = QPosition::Relative;
	        $this->pnlAddGroupAssessment->Visible = false;
	        $this->pnlAddGroupAssessment->AutoRenderChildren = true;
        }
        
    public function RenderKeyCode($objGroupAssessment) {
		$strControlId = 'txtKeyCode' . $objGroupAssessment->Id;
        $txtKeyCode = $this->objForm->GetControl($strControlId);     
        if (!$txtKeyCode) {
        	$txtKeyCode = new QTextBox($this->dtgGroupAssessments,$strControlId);
			$txtKeyCode->Name = 'Key Code';
            $txtKeyCode->Text = $objGroupAssessment->KeyCode;
            $txtKeyCode->ActionParameter = $objGroupAssessment->Id;
            $txtKeyCode->Width = 100;
            $txtKeyCode->Visible = false;
            $txtKeyCode->AddAction(new QMouseOutEvent(), new QAjaxControlAction($this,'txtKeyCode_MouseOut'));
        }
        $strLblControlId = 'lblKeyCode' . $objGroupAssessment->Id;
        $lblKeyCode = $this->objForm->GetControl($strLblControlId);     
        if (!$lblKeyCode) {
        	$lblKeyCode = new QLabel($this->dtgGroupAssessments,$strLblControlId);
        	$lblKeyCode->Text = $objGroupAssessment->KeyCode;
        	$lblKeyCode->ActionParameter = $strControlId;
        	$lblKeyCode->AddAction(new QMouseOverEvent(), new QAjaxControlAction($this,'lblKeyCode_MouseOver'));
        }
        return ($txtKeyCode->Render(false) . $lblKeyCode->Render(false));
	}
    public function lblKeyCode_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblKeyCode = $this->objForm->GetControl($strControlId);
		$lblKeyCode->Visible = false;
		$txtKeyCode = $this->objForm->GetControl($strParameter);
		$txtKeyCode->Visible = true;
	}
	
	public function txtKeyCode_MouseOut($strFormId, $strControlId, $strParameter) {
		$GroupAssessmentId = $strParameter;
        $objGroupAssessment = GroupAssessmentList::Load($GroupAssessmentId);
        $txtKeyCode = $this->objForm->GetControl($strControlId);
        $objGroupAssessment->KeyCode = $txtKeyCode->Text;
        $objGroupAssessment->Save();
        $txtKeyCode->Visible = false;
        $strLblControlId = 'lblKeyCode' . $objGroupAssessment->Id;
        $lblKeyCode = $this->objForm->GetControl($strLblControlId); 
        $lblKeyCode->Text = $txtKeyCode->Text;
        $lblKeyCode->Visible = true;
        $this->dtgGroupAssessments->Refresh();
	}
	
    public function RenderDescription($objGroupAssessment) {
		$strControlId = 'txtDescription' . $objGroupAssessment->Id;
        $txtDescription = $this->objForm->GetControl($strControlId);     
        if (!$txtDescription) {
        	$txtDescription = new QTextBox($this->dtgGroupAssessments,$strControlId);
			$txtDescription->Name = 'Description';
            $txtDescription->Text = $objGroupAssessment->Description;
            $txtDescription->ActionParameter = $objGroupAssessment->Id;
            $txtDescription->Width = 300;
            $txtDescription->Visible = false;
            $txtDescription->AddAction(new QMouseOutEvent(), new QAjaxControlAction($this,'txtDescription_MouseOut'));
        }
        $strLblControlId = 'lblDescription' . $objGroupAssessment->Id;
        $lblDescription = $this->objForm->GetControl($strLblControlId);     
        if (!$lblDescription) {
        	$lblDescription = new QLabel($this->dtgGroupAssessments,$strLblControlId);
        	$lblDescription->Text = $objGroupAssessment->Description;
        	$lblDescription->ActionParameter = $strControlId;
        	$lblDescription->AddAction(new QMouseOverEvent(), new QAjaxControlAction($this,'lblDescription_MouseOver'));
        }
        return ($txtDescription->Render(false) . $lblDescription->Render(false));
	}
    public function lblDescription_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblDescription = $this->objForm->GetControl($strControlId);
		$lblDescription->Visible = false;
		$txtDescription = $this->objForm->GetControl($strParameter);
		$txtDescription->Visible = true;
	}
	
	public function txtDescription_MouseOut($strFormId, $strControlId, $strParameter) {
		$GroupAssessmentId = $strParameter;
        $objGroupAssessment = GroupAssessmentList::Load($GroupAssessmentId);
        $txtDescription = $this->objForm->GetControl($strControlId);
        $objGroupAssessment->Description = $txtDescription->Text;
        $objGroupAssessment->Save();
        $txtDescription->Visible = false;
        $strLblControlId = 'lblDescription' . $objGroupAssessment->Id;
        $lblDescription = $this->objForm->GetControl($strLblControlId); 
        $lblDescription->Text = $txtDescription->Text;
        $lblDescription->Visible = true;
        $this->dtgGroupAssessments->Refresh();
	}
	
     public function RenderTotalKeys($objGroupAssessment) {
		$strControlId = 'txtTotalKeys' . $objGroupAssessment->Id;
        $txtTotalKeys = $this->objForm->GetControl($strControlId);     
        if (!$txtTotalKeys) {
        	$txtTotalKeys = new QIntegerTextBox($this->dtgGroupAssessments,$strControlId);
			$txtTotalKeys->Name = 'Total Keys';
            $txtTotalKeys->Text = $objGroupAssessment->TotalKeys;
            $txtTotalKeys->ActionParameter = $objGroupAssessment->Id;
            $txtTotalKeys->Width = 50;
            $txtTotalKeys->Visible = false;
            $txtTotalKeys->AddAction(new QMouseOutEvent(), new QAjaxControlAction($this,'txtTotalKeys_MouseOut'));
        }
        $strLblControlId = 'lblTotalKeys' . $objGroupAssessment->Id;
        $lblTtotalKeys = $this->objForm->GetControl($strLblControlId);     
        if (!$lblTtotalKeys) {
        	$lblTtotalKeys = new QLabel($this->dtgGroupAssessments,$strLblControlId);
        	$lblTtotalKeys->Text = $objGroupAssessment->TotalKeys;
        	$lblTtotalKeys->ActionParameter = $strControlId;
        	$lblTtotalKeys->AddAction(new QMouseOverEvent(), new QAjaxControlAction($this,'lblTotalKeys_MouseOver'));
        }
        return ($txtTotalKeys->Render(false) . $lblTtotalKeys->Render(false));
	}
    public function lblTotalKeys_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblTtotalKeys = $this->objForm->GetControl($strControlId);
		$lblTtotalKeys->Visible = false;
		$txtTotalKeys = $this->objForm->GetControl($strParameter);
		$txtTotalKeys->Visible = true;
	}
	
	public function txtTotalKeys_MouseOut($strFormId, $strControlId, $strParameter) {
		$GroupAssessmentId = $strParameter;
        $objGroupAssessment = GroupAssessmentList::Load($GroupAssessmentId);
        $txtTotalKeys = $this->objForm->GetControl($strControlId);
        $objGroupAssessment->TotalKeys = $txtTotalKeys->Text;
        $objGroupAssessment->Save();
        $txtTotalKeys->Visible = false;
        $strLblControlId = 'lblTotalKeys' . $objGroupAssessment->Id;
        $lblTtotalKeys = $this->objForm->GetControl($strLblControlId); 
        $lblTtotalKeys->Text = $txtTotalKeys->Text;
        $lblTtotalKeys->Visible = true;
        $this->dtgGroupAssessments->Refresh();
	}
	
    public function RenderKeysLeft($objGroupAssessment) {
		$strControlId = 'txtKeysLeft' . $objGroupAssessment->Id;
        $txtKeysLeft = $this->objForm->GetControl($strControlId);     
        if (!$txtKeysLeft) {
        	$txtKeysLeft = new QIntegerTextBox($this->dtgGroupAssessments,$strControlId);
			$txtKeysLeft->Name = 'Keys Left';
            $txtKeysLeft->Text = $objGroupAssessment->KeysLeft;
            $txtKeysLeft->ActionParameter = $objGroupAssessment->Id;
            $txtKeysLeft->Width = 50;
            $txtKeysLeft->Visible = false;
            $txtKeysLeft->AddAction(new QMouseOutEvent(), new QAjaxControlAction($this,'txtKeysLeft_MouseOut'));
        }
        $strLblControlId = 'lblKeysLeft' . $objGroupAssessment->Id;
        $lblKeysLeft = $this->objForm->GetControl($strLblControlId);     
        if (!$lblKeysLeft) {
        	$lblKeysLeft = new QLabel($this->dtgGroupAssessments,$strLblControlId);
        	$lblKeysLeft->Text = $objGroupAssessment->KeysLeft;
        	$lblKeysLeft->ActionParameter = $strControlId;
        	$lblKeysLeft->AddAction(new QMouseOverEvent(), new QAjaxControlAction($this,'lblKeysLeft_MouseOver'));
        }
        return ($txtKeysLeft->Render(false) . $lblKeysLeft->Render(false));
	}
    public function lblKeysLeft_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblKeysLeft = $this->objForm->GetControl($strControlId);
		$lblKeysLeft->Visible = false;
		$txtKeysLeft = $this->objForm->GetControl($strParameter);
		$txtKeysLeft->Visible = true;
	}
	
	public function txtKeysLeft_MouseOut($strFormId, $strControlId, $strParameter) {
		$GroupAssessmentId = $strParameter;
        $objGroupAssessment = GroupAssessmentList::Load($GroupAssessmentId);
        $txtKeysLeft = $this->objForm->GetControl($strControlId);
        $objGroupAssessment->KeysLeft = $txtKeysLeft->Text;
        $objGroupAssessment->Save();
        $txtKeysLeft->Visible = false;
        $strLblControlId = 'lblKeysLeft' . $objGroupAssessment->Id;
        $lblKeysLeft = $this->objForm->GetControl($strLblControlId); 
        $lblKeysLeft->Text = $txtKeysLeft->Text;
        $lblKeysLeft->Visible = true;
        $this->dtgGroupAssessments->Refresh();
	}
    	public function dtgKingdomBizAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$KingdomBizArray = KingdomBusinessAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgKingdomBizAssessments->DataSource = $KingdomBizArray; 
		}
		
    	public function dtgTenPAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$TenPArray = TenPAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgTenPAssessments->DataSource = $TenPArray; 
		}
	
    	public function dtgTenFAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$TenPArray = TenFAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgTenFAssessments->DataSource = $TenPArray; 
		}
		
		public function dtgLemonAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$LemonArray = LemonAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgLemonAssessments->DataSource = $LemonArray; 
		}
		
		public function dtgGroupAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);		
			$this->dtgGroupAssessments->DataSource = $groupArray; 
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
		
    	public function RenderUserLinkKingdom($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='/resources/assessments/kingdom/viewAssessment.php/%s' target='_blank' >%s %s</a>", $intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
    	public function RenderUserLinkLemon($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='/resources/assessments/lemon/viewAssessment.php/%s' target='_blank' >%s %s</a>", $intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
    	public function RenderUserLinkTenP($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='/resources/assessments/tenp/viewAssessment.php/%s' target='_blank' >%s %s</a>", $intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		public function RenderAssessmentType($objGroupAssessment) {
			$intResourceId = $objGroupAssessment->ResourceId;
			$strControlId = 'lstAssessmentType' . $objGroupAssessment->Id;
			$lstAssessmentType = $this->objForm->GetControl($strControlId);
			if(!$lstAssessmentType) {
				$lstAssessmentType = new QListBox($this->dtgGroupAssessments,$strControlId);
				$lstAssessmentType->Name = 'AssessmentType';
				foreach(Resource::LoadAll() as $objResource) {
					if($objResource->Name != 'Scorecard') {
						if($intResourceId == $objResource->Id)
							$lstAssessmentType->AddItem($objResource->Name, $objResource->Id,true);
						else 
							$lstAssessmentType->AddItem($objResource->Name, $objResource->Id);
					}
				}			
				$lstAssessmentType->ActionParameter = $objGroupAssessment->Id;
				$lstAssessmentType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstAssessmentType_Change'));
			}
			return $lstAssessmentType->Render(false);
		}
		public function lstAssessmentType_Change($strFormId, $strControlId, $strParameter) {
			$lstAssessmentType = $this->objForm->GetControl($strControlId);
			if ($lstAssessmentType != null){
				$objGroupAssessment = GroupAssessmentList::Load($strParameter);
				$objGroupAssessment->ResourceId = $lstAssessmentType->SelectedValue;
				$objGroupAssessment->Save();
			}
			$this->dtgGroupAssessments->Refresh();
		}
		public function RenderAssessmentManager(GroupAssessmentList $objGroupAssessment) {
			$strControlId = 'lstAssessmentManager' . $objGroupAssessment->Id;
			$lstAssessmentManager = $this->objForm->GetControl($strControlId);
			if(!$lstAssessmentManager) {
				$lstAssessmentManager = new QListBox($this->dtgGroupAssessments,$strControlId);
				$lstAssessmentManager->Name = 'AssessmentManager';
				$lstAssessmentManager->AddItem('-Non Selected-', 0);
				$objConditions = QQ::OrCondition(QQ::Equal( QQN::User()->Login->Role->Name, 'Administrator'),
					QQ::Equal( QQN::User()->Login->Role->Name, 'Company Manager'));
				$objConditions = QQ::OrCondition($objConditions,
					QQ::Equal( QQN::User()->Login->Role->Name, 'Manager'));
				foreach(User::QueryArray($objConditions) as $objUser) {
					if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUser)) 
							$lstAssessmentManager->AddItem($objUser->FirstName.' '.$objUser->LastName, $objUser->Id,true);
						else 
							$lstAssessmentManager->AddItem($objUser->FirstName.' '.$objUser->LastName, $objUser->Id);	
				}			
				$lstAssessmentManager->ActionParameter = $objGroupAssessment->Id;
				$lstAssessmentManager->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstAssessmentManager_Change'));
			}
			return $lstAssessmentManager->Render(false);
		}
    	public function lstAssessmentManager_Change($strFormId, $strControlId, $strParameter) {
			$lstAssessmentManager = $this->objForm->GetControl($strControlId);
			if ($lstAssessmentManager != null){
				if ($lstAssessmentManager->SelectedValue != 0) {
					$objGroupAssessment = GroupAssessmentList::Load($strParameter);
					$objUser = User::Load($lstAssessmentManager->SelectedValue);
					$objGroupAssessment->AssociateUserAsAssessmentManager($objUser);
					$objGroupAssessment->Save();
				}
			}
			$this->dtgGroupAssessments->Refresh();
		}
		
    	public function RenderUserLinkTenF($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='/resources/assessments/tenf/viewAssessment.php/%s' target='_blank' >%s %s</a>", $intUserId, $objUser->FirstName, $objUser->LastName);
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
	    
    	public function btnAddTenPAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTenPAssessment->Visible = true;
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
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
	        $pnlAddTenFView = new AddTenFAssessment($this->pnlAddTenFAssessment,'UpdateTenFAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateTenFAssessmentList($blnUpdatesMade) {
	    	$this->dtgTenFAssessments->PageNumber = 1;
			$this->dtgTenFAssessments->Refresh();
	    }
	    
    	public function btnAddLemonAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to Lemon Assessments
	        $this->pnlAddLemonAssessment->Visible = true;
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $pnlAddLemonView = new AddLemonAssessment($this->pnlAddLemonAssessment,'UpdateLemonAssessmentList',$this);	
		}
		
	    // Method Call back for the  panels 
	    public function UpdateLemonAssessmentList($blnUpdatesMade) {
	    	$this->dtgLemonAssessments->PageNumber = 1;
			$this->dtgLemonAssessments->Refresh();
	    }

    	public function btnAddGroupAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to Group Assessments
	        $this->pnlAddGroupAssessment->Visible = true;
	        $this->pnlAddGroupAssessment->RemoveChildControls(true);
	        $pnlAddGroupView = new AddGroupAssessment($this->pnlAddGroupAssessment,'UpdateGroupAssessmentList',$this);	
		}
		
	    // Method Call back for the  panels 
	    public function UpdateGroupAssessmentList($blnUpdatesMade) {
	    	$this->dtgGroupAssessments->PageNumber = 1;
			$this->dtgGroupAssessments->Refresh();
	    }
    }