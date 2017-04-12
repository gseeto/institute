<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminGroupAssessmentsForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Group Assessments';
	protected  $dtgGroupAssessments;
	protected  $btnAddGroupAssessment;
	protected  $pnlAddGroupAssessment;
	protected  $strKeycode;
	protected  $lstSearchAssessmentType;
	protected  $btnSearch;
	protected  $txtKeyCode;
	protected  $lblKeyCode;
	protected  $txtDescription;
	protected  $lblDescription;
	protected  $txtTotalKeys;
	protected  $lblTotalKeys;
	protected  $txtKeysLeft;
	protected  $lblKeysLeft;
	protected  $lstAssessmentType;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
		QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-group').className = 'active';"); 
	}
	
	protected function Form_Create() {			
		$this->strKeycode = new QTextBox($this);
		$this->strKeycode->Name = 'KeyCode';
		$this->strKeycode->CssClass = 'form-control';
		$this->strKeycode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strKeycode->Focus();
			
		$this->lstSearchAssessmentType = new QListBox($this);
		$this->lstSearchAssessmentType->CssClass = 'form-control';
		foreach(Resource::LoadAll() as $objResource) {
			if($objResource->Name != 'Scorecard') {
					$this->lstSearchAssessmentType->AddItem($objResource->Name, $objResource->Id);
			}
		}
	    $this->lstSearchAssessmentType->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	        
		$this->btnSearch = new QButton($this);
		$this->btnSearch->Text = 'Search';
		$this->btnSearch->AddAction(new QClickEvent(), new QAjaxAction('dtgGroupAssessments_Refresh'));
        $this->btnSearch->PrimaryButton = true;
        $this->btnSearch->CssClass = 'btn btn-default';
			
	    $this->dtgGroupAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgGroupAssessments->Paginator = new QPaginator($this->dtgGroupAssessments);
        $this->dtgGroupAssessments->MetaAddColumn('KeyCode','Html=<?=$_FORM->RenderKeyCode($_ITEM); ?>', 'HtmlEntities=false');
        $this->dtgGroupAssessments->MetaAddColumn('Description','Html=<?=$_FORM->RenderDescription($_ITEM); ?>', 'HtmlEntities=false');
        $this->dtgGroupAssessments->MetaAddColumn('TotalKeys','Html=<?=$_FORM->RenderTotalKeys($_ITEM); ?>', 'HtmlEntities=false', 'Width=50px');
        $this->dtgGroupAssessments->MetaAddColumn('KeysLeft','Html=<?=$_FORM->RenderKeysLeft($_ITEM); ?>', 'HtmlEntities=false', 'Width=50px');
        $this->dtgGroupAssessments->MetaAddColumn('ResourceId','Html=<?=$_FORM->RenderAssessmentType($_ITEM); ?>', 'HtmlEntities=false', 'Width=300px');
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Assessment Manager', '<?= $_FORM->RenderAssessmentManager($_ITEM) ?>', 'HtmlEntities=false' ));
        /*$this->dtgGroupAssessments->MetaAddColumn('AssessmentManager','Html=<?=$_FORM->RenderAssessmentManager($_ITEM); ?>', 'HtmlEntities=false');*/
        
      /*  $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_FORM->RenderKeyCode($_ITEM) ?>', 'HtmlEntities=false',
            	array('OrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode, false))));
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_FORM->RenderDescription($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_FORM->RenderTotalKeys($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_FORM->RenderKeysLeft($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Assessment Type', '<?= $_FORM->RenderAssessmentType($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' )); 
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Assessment Manager', '<?= $_FORM->RenderAssessmentManager($_ITEM) ?>', 'HtmlEntities=false' )); 
      */
        $this->dtgGroupAssessments->CellPadding = 5;		
		$this->dtgGroupAssessments->NoDataHtml = 'No Group Assessments have been assigned.';
		$this->dtgGroupAssessments->UseAjax = true;
		$this->dtgGroupAssessments->CssClass = 'table table-striped table-hover';
			
		$this->dtgGroupAssessments->SortColumnIndex = 1;
		$this->dtgGroupAssessments->ItemsPerPage = 20;
		$this->dtgGroupAssessments->SetDataBinder('dtgGroupAssessments_Bind',$this);
							
        $objStyle = $this->dtgGroupAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgGroupAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
	    $this->btnAddGroupAssessment = new QButton($this);
	    $this->btnAddGroupAssessment->Text = 'Add Group Assessment';
	    $this->btnAddGroupAssessment->CssClass = 'btn btn-default';
	    $this->btnAddGroupAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddGroupAssessment_Click'));
	    $this->pnlAddGroupAssessment = new QPanel($this);
	    $this->pnlAddGroupAssessment->Position = QPosition::Relative;
	    $this->pnlAddGroupAssessment->Visible = false;
	    $this->pnlAddGroupAssessment->AutoRenderChildren = true;		
	}
	
public function RenderKeyCode($objGroupAssessment) {
        $txtKeyCode = $this->GetControl('txtKeyCode' . $objGroupAssessment->Id);     
        if (!$txtKeyCode) {
        	$txtKeyCode = new QTextBox($this->dtgGroupAssessments,'txtKeyCode' . $objGroupAssessment->Id);
			$txtKeyCode->Name = 'Key Code';
            $txtKeyCode->Text = $objGroupAssessment->KeyCode;
            $txtKeyCode->CssClass = 'form-control';
            $txtKeyCode->ActionParameter = $objGroupAssessment->Id;
            $txtKeyCode->Width = 100;
            $txtKeyCode->Display = false;
           
        }
        $btnSave = $this->GetControl('btnKeyCodeSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnKeyCodeSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveKeyCode_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->GetControl('btnKeyCodeCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnKeyCodeCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelKeyCode_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }
        $lblKeyCode = $this->GetControl('lblKeyCode' . $objGroupAssessment->Id);     
        if (!$lblKeyCode) {
        	$lblKeyCode = new QLabel($this->dtgGroupAssessments,'lblKeyCode' . $objGroupAssessment->Id);
        	$lblKeyCode->Text = $objGroupAssessment->KeyCode;
        	$lblKeyCode->ActionParameter = $objGroupAssessment->Id;
        	$lblKeyCode->Cursor = 'pointer';
        	$lblKeyCode->AddAction(new QClickEvent(), new QAjaxAction('lblKeyCode_Clicked'));
        }
        return ($txtKeyCode->Render(false) . $btnSave->Render(false). $btnCancel->Render(false) . $lblKeyCode->Render(false));
	}
	
	public function lblKeyCode_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->GetControl('lblKeyCode'.$strParameter); 
        $lblKeyCode->Display = false;
		
        $txtKeyCode = $this->GetControl('txtKeyCode' . $strParameter); 
        $txtKeyCode->Display = true;
        
        $btnSave = $this->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = true;
        
        $btnCancel = $this->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
	public function btnCancelKeyCode_Click($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->GetControl('lblKeyCode' . $strParameter); 
        $lblKeyCode->Display = true;
		
        $txtKeyCode = $this->GetControl('txtKeyCode' . $strParameter); 
        $txtKeyCode->Display = false;
        $txtKeyCode->Text = $lblKeyCode->Text;
        
        $btnSave = $this->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveKeyCode_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtKeyCode = $this->GetControl('txtKeyCode' . $strParameter);
        $objGroupAssessment->KeyCode = $txtKeyCode->Text;
        $objGroupAssessment->Save();
        $txtKeyCode->Display = false;
        
        $btnSave = $this->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = false;
        
        $lblAction = $this->GetControl('lblKeyCode' .  $strParameter); 
        $lblAction->Text = $txtKeyCode->Text;
        $lblAction->Display = true;
	}
  
    public function RenderDescription($objGroupAssessment) {
        $txtDescription = $this->GetControl('txtDescription' . $objGroupAssessment->Id);     
        if (!$txtDescription) {
        	$txtDescription = new QTextBox($this->dtgGroupAssessments,'txtDescription' . $objGroupAssessment->Id);
			$txtDescription->Name = 'Description';
            $txtDescription->Text = $objGroupAssessment->Description;
            $txtDescription->CssClass = 'form-control';
            $txtDescription->ActionParameter = $objGroupAssessment->Id;
            $txtDescription->Width = 200;
            $txtDescription->Display = false;
        }
 
        $btnSave = $this->GetControl('btnDescriptionSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnDescriptionSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveDescription_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->GetControl('btnDescriptionCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnDescriptionCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	//$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelDescription_Click(this)'));  
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelDescription_Click'));      
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }

        $lblDescription = $this->GetControl('lblDescription' . $objGroupAssessment->Id);     
        if (!$lblDescription) {
        	$lblDescription = new QLabel($this->dtgGroupAssessments,'lblDescription' . $objGroupAssessment->Id);
        	$lblDescription->Text = (strlen($objGroupAssessment->Description) != 0)? $objGroupAssessment->Description : 'Enter a Description';
        	$lblDescription->ActionParameter = $objGroupAssessment->Id;
        	$lblDescription->Cursor = 'pointer';
        	$lblDescription->AddAction(new QClickEvent(), new QAjaxAction('lblDescription_Clicked'));
        }
        return ($txtDescription->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblDescription->Render(false));
	}
	
	public function lblDescription_Clicked($strFormId, $strControlId, $strParameter) {
        $lblDescription = $this->GetControl('lblDescription'.$strParameter); 
        $lblDescription->Display = false;
		
        $txtDescription = $this->GetControl('txtDescription' . $strParameter); 
        $txtDescription->Display = true;
        
        $btnSave = $this->GetControl('btnDescriptionSave' . $strParameter); 
        $btnSave->Display = true;
        
        $btnCancel = $this->GetControl('btnDescriptionCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
    public function btnSaveDescription_Click($strFormId, $strControlId, $strParameter) {
		$GroupAssessmentId = $strParameter;	
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtDescription = $this->GetControl('txtDescription' . $strParameter);
        $objGroupAssessment->Description = $txtDescription->Text;
        $objGroupAssessment->Save();
        $txtDescription->Display = false;
        
        $btnSave = $this->GetControl('btnDescriptionSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->GetControl('btnDescriptionCancel' . $strParameter); 
        $btnCancel->Display = false;

        $lblAction = $this->GetControl('lblDescription' .  $strParameter); 
        $lblAction->Text = $txtDescription->Text;
        $lblAction->Display = true;
	}
	
	public function btnCancelDescription_Click($strFormId, $strControlId, $strParameter) {
        $lblDescription = $this->GetControl('lblDescription'.$strParameter); 
        $lblDescription->Display = true;
		
        $txtDescription = $this->GetControl('txtDescription' . $strParameter); 
        $txtDescription->Display = false;
        
        $btnSave = $this->GetControl('btnDescriptionSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->GetControl('btnDescriptionCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
     public function RenderTotalKeys($objGroupAssessment) {
        $txtTotalKeys = $this->GetControl('txtTotalKeys' . $objGroupAssessment->Id);     
        if (!$txtTotalKeys) {
        	$txtTotalKeys = new QIntegerTextBox($this->dtgGroupAssessments,'txtTotalKeys' . $objGroupAssessment->Id);
			$txtTotalKeys->Name = 'Total Keys';
            $txtTotalKeys->Text = $objGroupAssessment->TotalKeys;
            $txtTotalKeys->ActionParameter = $objGroupAssessment->Id;
            $txtTotalKeys->Width = 50;
            $txtTotalKeys->CssClass = 'form-control';
            $txtTotalKeys->Display = false;
        }
 
        $btnSave = $this->GetControl('btnTotalKeysSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnTotalKeysSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveTotalKeys_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->GetControl('btnTotalKeysCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnTotalKeysCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelTotalKeys_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }

        $lblTtotalKeys = $this->GetControl('lblTotalKeys' . $objGroupAssessment->Id);     
        if (!$lblTtotalKeys) {
        	$lblTtotalKeys = new QLabel($this->dtgGroupAssessments,'lblTotalKeys' . $objGroupAssessment->Id);
        	$lblTtotalKeys->Text = $objGroupAssessment->TotalKeys;
        	$lblTtotalKeys->ActionParameter = $objGroupAssessment->Id;
			$lblTtotalKeys->Cursor = 'pointer';
        	$lblTtotalKeys->AddAction(new QClickEvent(), new QAjaxAction('lblTotalKeys_Clicked'));
        }
        return ($txtTotalKeys->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblTtotalKeys->Render(false));
	}
	
    public function lblTotalKeys_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->GetControl('lblTotalKeys' . $strParameter); 
        $lblKeyCode->Display = false;

        $txtTotalKeys = $this->GetControl('txtTotalKeys' . $strParameter); 
        $txtTotalKeys->Display = true;

        $btnSave = $this->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = true;
 
        $btnCancel = $this->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
    public function btnCancelTotalKeys_Click($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->GetControl('lblTotalKeys' . $strParameter); 
        $lblKeyCode->Display = true;
		
        $txtTotalKeys = $this->GetControl('txtTotalKeys' . $strParameter); 
        $txtTotalKeys->Display = false;
        $txtTotalKeys->Text = $lblKeyCode->Text;

        $btnSave = $this->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveTotalKeys_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtTotalKeys = $this->GetControl('txtTotalKeys' . $strParameter);
        $objGroupAssessment->TotalKeys = $txtTotalKeys->Text;
        $objGroupAssessment->Save();
        $txtTotalKeys->Display = false;
        
        $btnSave = $this->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = false;
        
        $lblAction = $this->GetControl('lblTotalKeys' .  $strParameter); 
        $lblAction->Text = $txtTotalKeys->Text;
        $lblAction->Display = true;
	}
	
    public function RenderKeysLeft($objGroupAssessment) {
        $txtKeysLeft = $this->GetControl('txtKeysLeft' . $objGroupAssessment->Id);     
        if (!$txtKeysLeft) {
        	$txtKeysLeft = new QIntegerTextBox($this->dtgGroupAssessments,'txtKeysLeft' . $objGroupAssessment->Id);
			$txtKeysLeft->Name = 'Keys Left';
            $txtKeysLeft->Text = $objGroupAssessment->KeysLeft;
            $txtKeysLeft->ActionParameter = $objGroupAssessment->Id;
            $txtKeysLeft->Width = 50;
            $txtKeysLeft->CssClass = 'form-control';
            $txtKeysLeft->Display = false;
        }
        $btnSave = $this->GetControl('btnKeysLeftSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnKeysLeftSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveKeysLeft_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        $btnCancel = $this->GetControl('btnKeysLeftCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnKeysLeftCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelKeysLeft_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }
        $lblKeysLeft = $this->GetControl('lblKeysLeft' . $objGroupAssessment->Id);     
        if (!$lblKeysLeft) {
        	$lblKeysLeft = new QLabel($this->dtgGroupAssessments,'lblKeysLeft' . $objGroupAssessment->Id);
        	$lblKeysLeft->Text = $objGroupAssessment->KeysLeft;
        	$lblKeysLeft->ActionParameter = $objGroupAssessment->Id;
			$lblKeysLeft->Cursor = 'pointer';
        	$lblKeysLeft->AddAction(new QClickEvent(), new QAjaxAction('lblKeysLeft_Clicked'));
        }
        return ($txtKeysLeft->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblKeysLeft->Render(false));
	}
	
	public function lblKeysLeft_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeysLeft = $this->GetControl('lblKeysLeft' . $strParameter); 
        $lblKeysLeft->Display = false;

        $txtKeysLeft = $this->GetControl('txtKeysLeft' . $strParameter); 
        $txtKeysLeft->Display = true;
        
        $btnSave = $this->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = true;
        
        $btnCancel = $this->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
    public function btnCancelKeysLeft_Click($strFormId, $strControlId, $strParameter) {
        $lblKeysLeft = $this->GetControl('lblKeysLeft' . $strParameter); 
        $lblKeysLeft->Display = true;
		
        $txtKeysLeft = $this->GetControl('txtKeysLeft' . $strParameter); 
        $txtKeysLeft->Display = false;
        $txtKeysLeft->Text = $lblKeysLeft->Text;

        $btnSave = $this->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveKeysLeft_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtKeysLeft = $this->GetControl('txtKeysLeft' . $strParameter);
        $objGroupAssessment->KeysLeft = $txtKeysLeft->Text;
        $objGroupAssessment->Save();
        $txtKeysLeft->Display = false;

        $btnSave = $this->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = false;

        $lblKeysLeft = $this->GetControl('lblKeysLeft' .  $strParameter); 
        $lblKeysLeft->Text = $txtKeysLeft->Text;
        $lblKeysLeft->Display = true;
	}

    	public function dtgGroupAssessments_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgGroupAssessments->PageNumber = 1;
			$this->dtgGroupAssessments->Refresh();
		}
		public function dtgGroupAssessments_Bind() {
			$this->dtgGroupAssessments->TotalItemCount = GroupAssessmentList::CountAll();
			$objClauses = array();
			
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
			$this->dtgGroupAssessments->MetaDataBinder($objConditions,$objClauses);
		}
		
		public function RenderGroupKeyCode(LemonAssessment $objAssessment) {
			$strControlId = 'lstLemonGroup' . $objAssessment->Id;
			$lstGroupType = $this->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgLemonAssessments,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->CssClass = 'form-control';
				$lstGroupType->AddItem('-- No Group KeyCode --', 0,true);
				foreach(GroupAssessmentList::LoadArrayByResourceId(5) as $objGroup) {					
						if($objAssessment->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objAssessment->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstLemonGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
				
		public function RenderAssessmentType($objGroupAssessment) {
			$intResourceId = $objGroupAssessment->ResourceId;
			$strControlId = 'lstAssessmentType' . $objGroupAssessment->Id;
			$lstAssessmentType = $this->GetControl($strControlId);
			if(!$lstAssessmentType) {
				$lstAssessmentType = new QListBox($this->dtgGroupAssessments,$strControlId);
				$lstAssessmentType->Name = 'AssessmentType';
				$lstAssessmentType->CssClass = 'form-control';
				foreach(Resource::LoadAll() as $objResource) {
					if($objResource->Name != 'Scorecard') {
						if($intResourceId == $objResource->Id)
							$lstAssessmentType->AddItem($objResource->Name, $objResource->Id,true);
						else 
							$lstAssessmentType->AddItem($objResource->Name, $objResource->Id);
					}
				}			
				$lstAssessmentType->ActionParameter = $objGroupAssessment->Id;
				$lstAssessmentType->AddAction(new QChangeEvent(), new QAjaxAction('lstAssessmentType_Change'));
			}
			return $lstAssessmentType->Render(false);
		}
		public function lstAssessmentType_Change($strFormId, $strControlId, $strParameter) {
			$lstAssessmentType = $this->GetControl($strControlId);
			if ($lstAssessmentType != null){
				$objGroupAssessment = GroupAssessmentList::Load($strParameter);
				$objGroupAssessment->ResourceId = $lstAssessmentType->SelectedValue;
				$objGroupAssessment->Save();
			}
			$this->dtgGroupAssessments->Refresh();
		}
		public function RenderAssessmentManager(GroupAssessmentList $objGroupAssessment) {
			$strControlId = 'lstAssessmentManager' . $objGroupAssessment->Id;
			$lstAssessmentManager = $this->GetControl($strControlId);
			if(!$lstAssessmentManager) {
				$lstAssessmentManager = new QListBox($this->dtgGroupAssessments,$strControlId);
				$lstAssessmentManager->Name = 'AssessmentManager';
				$lstAssessmentManager->CssClass = 'form-control';
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
				$lstAssessmentManager->AddAction(new QChangeEvent(), new QAjaxAction('lstAssessmentManager_Change'));
			}
			return $lstAssessmentManager->Render(false);
		}
    	public function lstAssessmentManager_Change($strFormId, $strControlId, $strParameter) {
			$lstAssessmentManager = $this->GetControl($strControlId);
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

    	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
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

AdminGroupAssessmentsForm::Run('AdminGroupAssessmentsForm');
?>