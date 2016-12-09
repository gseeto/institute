<?php
	/** PHPExcel */
	require_once __INCLUDES__.'/Classes/PHPExcel.php';
	require_once __INCLUDES__.'/Classes/PHPExcel/IOFactory.php';
		
    class AdminGroupView extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
		
		public $dtgGroupAssessments;
		public $btnAddGroupAssessment;
		public $pnlAddGroupAssessment;
		public $strKeycode;
		public $lstSearchAssessmentType;
		public $btnSearch;
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
        protected $strTemplate = 'panels/AdminGroupView.tpl.php';

 
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
            
 	        /***************************************************************/
	        
	        $this->strKeycode = new QTextBox($this);
			$this->strKeycode->Name = 'KeyCode';
		//	$this->strKeycode->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgGroupAssessments_Refresh'));
		//	$this->strKeycode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgGroupAssessments_Refresh'));
			$this->strKeycode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strKeycode->Focus();
			
			$this->lstSearchAssessmentType = new QListBox($this);
			foreach(Resource::LoadAll() as $objResource) {
				if($objResource->Name != 'Scorecard') {
						$this->lstSearchAssessmentType->AddItem($objResource->Name, $objResource->Id);
				}
			}
	        $this->lstSearchAssessmentType->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	        
			$this->btnSearch = new QButton($this);
			$this->btnSearch->Text = 'Search';
			$this->btnSearch->AddAction(new QClickEvent(), new QAjaxControlAction($this,'dtgGroupAssessments_Refresh'));
	        $this->btnSearch->PrimaryButton = true;
			
	        $this->dtgGroupAssessments = new GroupAssessmentListDataGrid($this);
            $this->dtgGroupAssessments->Paginator = new QPaginator($this->dtgGroupAssessments);
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_CONTROL->ParentControl->RenderKeyCode($_ITEM) ?>', 'HtmlEntities=false', 'Width=350px',
            	array('OrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode, false))));
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_CONTROL->ParentControl->RenderDescription($_ITEM) ?>', 'HtmlEntities=false', 'Width=350px' ));
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
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgGroupAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
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
        $txtKeyCode = $this->objForm->GetControl('txtKeyCode' . $objGroupAssessment->Id);     
        if (!$txtKeyCode) {
        	$txtKeyCode = new QTextBox($this->dtgGroupAssessments,'txtKeyCode' . $objGroupAssessment->Id);
			$txtKeyCode->Name = 'Key Code';
            $txtKeyCode->Text = $objGroupAssessment->KeyCode;
            $txtKeyCode->ActionParameter = $objGroupAssessment->Id;
            $txtKeyCode->Width = 100;
            $txtKeyCode->Display = false;
           
        }
        $btnSave = $this->objForm->GetControl('btnKeyCodeSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnKeyCodeSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSaveKeyCode_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        //$btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->objForm->GetControl('btnKeyCodeCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnKeyCodeCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancelKeyCode_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	//$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
        $lblKeyCode = $this->objForm->GetControl('lblKeyCode' . $objGroupAssessment->Id);     
        if (!$lblKeyCode) {
        	$lblKeyCode = new QLabel($this->dtgGroupAssessments,'lblKeyCode' . $objGroupAssessment->Id);
        	$lblKeyCode->Text = $objGroupAssessment->KeyCode;
        	$lblKeyCode->ActionParameter = $objGroupAssessment->Id;
        	$lblKeyCode->Cursor = 'pointer';
        	$lblKeyCode->AddAction(new QClickEvent(), new QAjaxControlAction($this,'lblKeyCode_Clicked'));
        }
        return ($txtKeyCode->Render(false) . $btnSave->Render(false). $btnCancel->Render(false) . $lblKeyCode->Render(false));
	}
	
	public function lblKeyCode_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->objForm->GetControl('lblKeyCode'.$strParameter); 
        $lblKeyCode->Display = false;
		
        $txtKeyCode = $this->objForm->GetControl('txtKeyCode' . $strParameter); 
        $txtKeyCode->Display = true;
        
        $btnSave = $this->objForm->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = true;
        
        $btnCancel = $this->objForm->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
	public function btnCancelKeyCode_Click($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->objForm->GetControl('lblKeyCode' . $strParameter); 
        $lblKeyCode->Display = true;
		
        $txtKeyCode = $this->objForm->GetControl('txtKeyCode' . $strParameter); 
        $txtKeyCode->Display = false;
        $txtKeyCode->Text = $lblKeyCode->Text;
        
        $btnSave = $this->objForm->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->objForm->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveKeyCode_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtKeyCode = $this->objForm->GetControl('txtKeyCode' . $strParameter);
        $objGroupAssessment->KeyCode = $txtKeyCode->Text;
        $objGroupAssessment->Save();
        $txtKeyCode->Display = false;
        
        $btnSave = $this->objForm->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->objForm->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = false;
        
        $lblAction = $this->objForm->GetControl('lblKeyCode' .  $strParameter); 
        $lblAction->Text = $txtKeyCode->Text;
        $lblAction->Display = true;
	}
  
    public function RenderDescription($objGroupAssessment) {
        $txtDescription = $this->objForm->GetControl('txtDescription' . $objGroupAssessment->Id);     
        if (!$txtDescription) {
        	$txtDescription = new QTextBox($this->dtgGroupAssessments,'txtDescription' . $objGroupAssessment->Id);
			$txtDescription->Name = 'Description';
            $txtDescription->Text = $objGroupAssessment->Description;
            $txtDescription->ActionParameter = $objGroupAssessment->Id;
            $txtDescription->Width = 200;
            $txtDescription->Display = false;
        }
 
        $btnSave = $this->objForm->GetControl('btnDescriptionSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnDescriptionSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSaveDescription_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        //$btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->objForm->GetControl('btnDescriptionCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnDescriptionCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelDescription_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	//$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }

        $lblDescription = $this->objForm->GetControl('lblDescription' . $objGroupAssessment->Id);     
        if (!$lblDescription) {
        	$lblDescription = new QLabel($this->dtgGroupAssessments,'lblDescription' . $objGroupAssessment->Id);
        	$lblDescription->Text = (strlen($objGroupAssessment->Description) != 0)? $objGroupAssessment->Description : 'Enter a Description';
        	$lblDescription->ActionParameter = $objGroupAssessment->Id;
        	$lblDescription->Cursor = 'pointer';
        	$lblDescription->AddAction(new QClickEvent(), new QJavaScriptAction('lblDescription_Clicked(this)'));
        }
        return ($txtDescription->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblDescription->Render(false));
	}
    public function btnSaveDescription_Click($strFormId, $strControlId, $strParameter) {
		$GroupAssessmentId = $strParameter;	
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtDescription = $this->objForm->GetControl('txtDescription' . $strParameter);
        $objGroupAssessment->Description = $txtDescription->Text;
        $objGroupAssessment->Save();
        $txtDescription->Display = false;
        
        $btnSave = $this->objForm->GetControl('btnDescriptionSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->objForm->GetControl('btnDescriptionCancel' . $strParameter); 
        $btnCancel->Display = false;

        $lblAction = $this->objForm->GetControl('lblDescription' .  $strParameter); 
        $lblAction->Text = $txtDescription->Text;
        $lblAction->Display = true;
	}
	
     public function RenderTotalKeys($objGroupAssessment) {
        $txtTotalKeys = $this->objForm->GetControl('txtTotalKeys' . $objGroupAssessment->Id);     
        if (!$txtTotalKeys) {
        	$txtTotalKeys = new QIntegerTextBox($this->dtgGroupAssessments,'txtTotalKeys' . $objGroupAssessment->Id);
			$txtTotalKeys->Name = 'Total Keys';
            $txtTotalKeys->Text = $objGroupAssessment->TotalKeys;
            $txtTotalKeys->ActionParameter = $objGroupAssessment->Id;
            $txtTotalKeys->Width = 50;
            $txtTotalKeys->Display = false;
        }
 
        $btnSave = $this->objForm->GetControl('btnTotalKeysSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnTotalKeysSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSaveTotalKeys_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        //$btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->objForm->GetControl('btnTotalKeysCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnTotalKeysCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancelTotalKeys_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	//$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }

        $lblTtotalKeys = $this->objForm->GetControl('lblTotalKeys' . $objGroupAssessment->Id);     
        if (!$lblTtotalKeys) {
        	$lblTtotalKeys = new QLabel($this->dtgGroupAssessments,'lblTotalKeys' . $objGroupAssessment->Id);
        	$lblTtotalKeys->Text = $objGroupAssessment->TotalKeys;
        	$lblTtotalKeys->ActionParameter = $objGroupAssessment->Id;
			$lblTtotalKeys->Cursor = 'pointer';
        	$lblTtotalKeys->AddAction(new QClickEvent(), new QAjaxControlAction($this,'lblTotalKeys_Clicked'));
        }
        return ($txtTotalKeys->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblTtotalKeys->Render(false));
	}
	
    public function lblTotalKeys_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->objForm->GetControl('lblTotalKeys' . $strParameter); 
        $lblKeyCode->Display = false;

        $txtTotalKeys = $this->objForm->GetControl('txtTotalKeys' . $strParameter); 
        $txtTotalKeys->Display = true;

        $btnSave = $this->objForm->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = true;
 
        $btnCancel = $this->objForm->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
    public function btnCancelTotalKeys_Click($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->objForm->GetControl('lblTotalKeys' . $strParameter); 
        $lblKeyCode->Display = true;
		
        $txtTotalKeys = $this->objForm->GetControl('txtTotalKeys' . $strParameter); 
        $txtTotalKeys->Display = false;
        $txtTotalKeys->Text = $lblKeyCode->Text;

        $btnSave = $this->objForm->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->objForm->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveTotalKeys_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtTotalKeys = $this->objForm->GetControl('txtTotalKeys' . $strParameter);
        $objGroupAssessment->TotalKeys = $txtTotalKeys->Text;
        $objGroupAssessment->Save();
        $txtTotalKeys->Display = false;
        
        $btnSave = $this->objForm->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->objForm->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = false;
        
        $lblAction = $this->objForm->GetControl('lblTotalKeys' .  $strParameter); 
        $lblAction->Text = $txtTotalKeys->Text;
        $lblAction->Display = true;
	}
	
    public function RenderKeysLeft($objGroupAssessment) {
        $txtKeysLeft = $this->objForm->GetControl('txtKeysLeft' . $objGroupAssessment->Id);     
        if (!$txtKeysLeft) {
        	$txtKeysLeft = new QIntegerTextBox($this->dtgGroupAssessments,'txtKeysLeft' . $objGroupAssessment->Id);
			$txtKeysLeft->Name = 'Keys Left';
            $txtKeysLeft->Text = $objGroupAssessment->KeysLeft;
            $txtKeysLeft->ActionParameter = $objGroupAssessment->Id;
            $txtKeysLeft->Width = 50;
            $txtKeysLeft->Display = false;
        }
        $btnSave = $this->objForm->GetControl('btnKeysLeftSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnKeysLeftSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSaveKeysLeft_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	       // $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        $btnCancel = $this->objForm->GetControl('btnKeysLeftCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnKeysLeftCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancelKeysLeft_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	//$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
        $lblKeysLeft = $this->objForm->GetControl('lblKeysLeft' . $objGroupAssessment->Id);     
        if (!$lblKeysLeft) {
        	$lblKeysLeft = new QLabel($this->dtgGroupAssessments,'lblKeysLeft' . $objGroupAssessment->Id);
        	$lblKeysLeft->Text = $objGroupAssessment->KeysLeft;
        	$lblKeysLeft->ActionParameter = $objGroupAssessment->Id;
			$lblKeysLeft->Cursor = 'pointer';
        	$lblKeysLeft->AddAction(new QClickEvent(), new QAjaxControlAction($this,'lblKeysLeft_Clicked'));
        }
        return ($txtKeysLeft->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblKeysLeft->Render(false));
	}
	
	public function lblKeysLeft_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeysLeft = $this->objForm->GetControl('lblKeysLeft' . $strParameter); 
        $lblKeysLeft->Display = false;

        $txtKeysLeft = $this->objForm->GetControl('txtKeysLeft' . $strParameter); 
        $txtKeysLeft->Display = true;
        
        $btnSave = $this->objForm->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = true;
        
        $btnCancel = $this->objForm->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
    public function btnCancelKeysLeft_Click($strFormId, $strControlId, $strParameter) {
        $lblKeysLeft = $this->objForm->GetControl('lblKeysLeft' . $strParameter); 
        $lblKeysLeft->Display = true;
		
        $txtKeysLeft = $this->objForm->GetControl('txtKeysLeft' . $strParameter); 
        $txtKeysLeft->Display = false;
        $txtKeysLeft->Text = $lblKeysLeft->Text;

        $btnSave = $this->objForm->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->objForm->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveKeysLeft_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtKeysLeft = $this->objForm->GetControl('txtKeysLeft' . $strParameter);
        $objGroupAssessment->KeysLeft = $txtKeysLeft->Text;
        $objGroupAssessment->Save();
        $txtKeysLeft->Display = false;

        $btnSave = $this->objForm->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->objForm->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = false;

        $lblKeysLeft = $this->objForm->GetControl('lblKeysLeft' .  $strParameter); 
        $lblKeysLeft->Text = $txtKeysLeft->Text;
        $lblKeysLeft->Display = true;
	}
    	public function dtgLemonAssessments_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgLemonAssessments->PageNumber = 1;
			$this->dtgLemonAssessments->Refresh();
		}
		public function dtgLemonAssessments_Bind() {
			$this->dtgLemonAssessments->TotalItemCount = LemonAssessment::CountAll();
            $objConditions = QQ::All(); 
			if ($strName = trim($this->strFirstNameLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->User->FirstName, $strName . '%')
				);
			}
		
			if ($strName = trim($this->strLastNameLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->User->LastName, $strName . '%')
				);
			}
				
			if ($strName = trim($this->strGroupLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->Group->KeyCode, $strName . '%')
				);
			} 
			if ($strName = trim($this->strCompanyLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->Company->Name, $strName . '%')
				);
			} 
			  
            $objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgLemonAssessments->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgLemonAssessments->OrderByClause) $objClauses[] = $objClause;

			$this->dtgLemonAssessments->DataSource = LemonAssessment::QueryArray($objConditions, $objClauses);
		}
		
    	public function dtgGroupAssessments_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgGroupAssessments->PageNumber = 1;
			$this->dtgGroupAssessments->Refresh();
		}
		public function dtgGroupAssessments_Bind() {
			$this->dtgGroupAssessments->TotalItemCount = GroupAssessmentList::CountAll();
			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgGroupAssessments->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgGroupAssessments->OrderByClause) $objClauses[] = $objClause;
			
		    $objConditions = QQ::All(); 
			if ($strName = trim($this->strKeycode->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::GroupAssessmentList()->KeyCode, $strName . '%')
				);
			}
			if ($this->lstSearchAssessmentType->SelectedValue) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::GroupAssessmentList()->ResourceId, $this->lstSearchAssessmentType->SelectedValue)
				);
			}
			$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);		
			$this->dtgGroupAssessments->DataSource = $groupArray; 
		}
		
		public function RenderGroupKeyCode(LemonAssessment $objAssessment) {
			$strControlId = 'lstLemonGroup' . $objAssessment->Id;
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgLemonAssessments,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- No Group KeyCode --', 0,true);
				foreach(GroupAssessmentList::LoadArrayByResourceId(5) as $objGroup) {					
						if($objAssessment->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objAssessment->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstLemonGroup_Change'));
			}
			return $lstGroupType->Render(false);
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
				return sprintf("<a href='%s/assessments/tenf/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
		public function RenderUserLinkLRA($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/lra/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderUserLinkUpward($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/upward/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderUserLinkIntegration($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/integration/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
    	public function btnAddLemonAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to Lemon Assessments
	        $this->pnlAddLemonAssessment->Visible = true;
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
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
	    
    	// For any JavaScript calls that need to be made whenever this control is rendered or re-rendered
    	// Need to initialize the jquery tab here.
		public function GetEndScript() {
			$strToReturn = parent::GetEndScript();
			$strToReturn .= '$( "#tabs" ).tabs();';
			return $strToReturn;
		}
    }