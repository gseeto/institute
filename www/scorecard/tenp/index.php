<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ScorecardForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardTenP;
	protected $objScorecard;
	protected $btnCategoryArray;
	protected $dtgStrategySummary;
	protected $btnAddStrategy;
	protected $strCategory;
	protected $intCategoryTypeId;
	protected $dtgStrategyArray;
	protected $dtgActionItems;
	protected $btnAddAction;
	protected $dtgKPIs;
	protected $btnAddKPIs;
	protected $lblStatement;
	protected $txtStatement;
	protected $imgStatement;
	protected $btnSaveStatement;
	protected $btnCancelStatement;
	
	protected $intStatementId;
	protected $intUserId;
	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/resources/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		$this->intCategoryTypeId = QApplication::PathInfo(1);
		$this->strCategory = CategoryType::ToString($this->intCategoryTypeId);
		$userArray = QApplication::$Login->GetUserArray();
		$this->intUserId = $userArray[0]->Id;

		// Create a specific button for Summary and by default start there
		$btnCategory = new QButton($this);
		$btnCategory->Name = 'Summary';
		$btnCategory->Text = 'Summary';
		$btnCategory->CssClass = 'ptab';
		$btnCategory->ActionParameter = 'Summary';
		$btnCategory->AddAction(new QClickEvent(), new QAjaxAction('btnCategory_Clicked'));
		$this->btnCategoryArray[] = $btnCategory;
		// Then iterate through the Ps
		foreach(CategoryType::$NameArray as $key=>$objValue) {
			$btnCategory = new QButton($this);
			$btnCategory->Name = $objValue;
			$btnCategory->Text = $objValue;
			if ($this->strCategory == $objValue) {
				$btnCategory->CssClass = 'ptabSelected';
			} else {
				$btnCategory->CssClass = 'ptab';
			}
			$btnCategory->ActionParameter = $key;
			$btnCategory->AddAction(new QClickEvent(), new QAjaxAction('btnCategory_Clicked'));
			$this->btnCategoryArray[] = $btnCategory;
		}

		// Display Statement if Category is Purpose or Positioning
		$this->imgStatement = new QLabel($this);
		$this->imgStatement->HtmlEntities = false;
		$this->imgStatement->Visible = false;
		$this->imgStatement->Text = '<img style="position:relative; cursor:pointer; float:right; left:-180px; top:-20px;" src="/resources/assets/images/icons/page_edit.png" />';
		
		$this->lblStatement = new QLabel($this);
		$this->lblStatement->Width = 800;
		$this->lblStatement->CssClass = 'statement';
		$this->lblStatement->Cursor = 'pointer';
		$this->lblStatement->AddAction(new QMouseOverEvent(), new QAjaxAction('lblStatement_MouseOver'));
		$this->lblStatement->AddAction(new QMouseOutEvent(), new QAjaxAction('lblStatement_MouseOut'));
		
		$this->btnSaveStatement = new QButton($this);
        $this->btnSaveStatement->Text = 'Save';
        $this->btnSaveStatement->AddAction(new QClickEvent(), new QAjaxAction('btnSaveStatement_Click'));
        $this->btnSaveStatement->PrimaryButton = true;
        $this->btnSaveStatement->CausesValidation = true;
        $this->btnSaveStatement->CssClass = 'ui-theme-button';
        $this->btnSaveStatement->Visible = false;

        // Make sure we turn off validation on the Cancel button
        $this->btnCancelStatement = new QButton($this);
        $this->btnCancelStatement->Text = 'Cancel';
     	$this->btnCancelStatement->AddAction(new QClickEvent(), new QAjaxAction('btnCancelStatement_Click'));        
       	$this->btnCancelStatement->CausesValidation = false;
       	$this->btnCancelStatement->CssClass = 'ui-theme-button';
       	$this->btnCancelStatement->Visible = false;
            
		$this->txtStatement = new QTextBox($this);
		$this->txtStatement->CssClass = 'statement';
		$this->txtStatement->Width = 800;
		$this->txtStatement->TextMode = QTextMode::MultiLine;
        $this->txtStatement->Height = 50;
		$this->txtStatement->Columns = 5;
		$this->txtStatement->Visible = false;
 		if(($this->intCategoryTypeId == CategoryType::Purpose) ||($this->intCategoryTypeId == CategoryType::Positioning)) {
 			$objStatementArray = Statement::LoadArrayByScorecardId($this->objScorecard->Id);
 			foreach($objStatementArray as $objStatement) {
 				if($objStatement->IsPurpose && $this->intCategoryTypeId == CategoryType::Purpose) {
 					$this->lblStatement->Text = $objStatement->Value;
 					$this->txtStatement->Text = $objStatement->Value;
 					$this->intStatementId = $objStatement->Id;
 					break;
 				}
 				if(!($objStatement->IsPurpose) && $this->intCategoryTypeId == CategoryType::Positioning) {
 					$this->lblStatement->Text = $objStatement->Value;
 					$this->txtStatement->Text = $objStatement->Value;
 					$this->intStatementId = $objStatement->Id;
 					break;
 				}
 			}
 			$this->lblStatement->AddAction(new QClickEvent(), new QAjaxAction('lblStatement_Clicked'));
  		} else {
 			$this->lblStatement->Visible = false;
 		}
		// Generate a summary of the P Strategys
		$this->dtgStrategySummary = new StrategyDataGrid($this);
		$this->dtgStrategySummary->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=20px' ));
		$this->dtgStrategySummary->AddColumn(new QDataGridColumn($this->strCategory.' Strategy', '<?= $_ITEM->Strategy ?>', 'HtmlEntities=false', 'Width=700px' ));
		$this->dtgStrategySummary->AddColumn(new QDataGridColumn('KPI Rating', '<?= $_FORM->RenderKPIAverage($_ITEM->Id) ?>', 'HtmlEntities=false', 'Width=20px' ));
		$this->dtgStrategySummary->CellPadding = 5;
		$this->dtgStrategySummary->GridLines = 'both';	
		$this->dtgStrategySummary->SetDataBinder('dtgStrategySummary_Bind',$this);		
		
		$this->dtgStrategySummary->NoDataHtml = '<div style=\'padding:20px;\'><p><b>'.$this->strCategory.' Strategy</b></p>' .'No Strategies.<br></div>';
		$this->dtgStrategySummary->UseAjax = true;
		$objStyle = $this->dtgStrategySummary->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 	        
        $objStyle = $this->dtgStrategySummary->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 	

        $this->btnAddStrategy = new QButton($this);
        $this->btnAddStrategy->Name = 'Add Strategy';
        $this->btnAddStrategy->Text = 'Add Strategy';
        $this->btnAddStrategy->CssClass = 'primary';
        $this->btnAddStrategy->AddAction(new QClickEvent(), new QAjaxAction('btnAddStrategy_Clicked'));
        
        // Initialize the arrays
        $this->dtgStrategyArray = array();
        $this->dtgActionItems = array();
	 	$this->dtgKPIs = array();
	 	$this->btnAddAction = array();
        $strategyArray = Strategy::LoadArrayByScorecardIdAndCategoryTypeId($this->objScorecard->Id,$this->intCategoryTypeId);
        $i = 0;
        foreach($strategyArray as $objStrategy) {
        	$dtgStrategy = new StrategyDataGrid($this);
        	$dtgStrategy->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=20px' ));
			$dtgStrategy->AddColumn(new QDataGridColumn('Strategy', '<?= $_FORM->RenderStrategy($_ITEM) ?>', 'HtmlEntities=false', 'Width=750px' ));
			$dtgStrategy->AddColumn(new QDataGridColumn('Priority', '<?= $_FORM->RenderPriority($_ITEM) ?>', 'HtmlEntities=false', 'Width=20px' ));
			$dtgStrategy->AddColumn(new QDataGridColumn('Delete', '<?= $_FORM->RenderDeleteStrategy($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));			
			$dtgStrategy->CellPadding = 5;
			$dtgStrategy->GridLines = 'both';
			$dtgStrategy->DataSource = array($objStrategy);
			$dtgStrategy->NoDataHtml = '<div style=\'padding:20px;\'><p><b>'.$this->strCategory.' Strategy</b></p>' .'No Strategies.<br></div>';
			$dtgStrategy->UseAjax = true;
			$objStyle = $dtgStrategy->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 	        
	        $objStyle = $dtgStrategy->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        $this->dtgStrategyArray[] = $dtgStrategy;	        
	        
	        $dtgActionItem = new ActionItemsDataGrid($this);
	        $dtgActionItem->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=10px' ));
			$dtgActionItem->AddColumn(new QDataGridColumn('Action Items', '<?= $_FORM->RenderAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=450px' ));
			$dtgActionItem->AddColumn(new QDataGridColumn('Who', '<?= $_FORM->RenderWho($_ITEM) ?>', 'HtmlEntities=false', 'Width=110px' ));
			$dtgActionItem->AddColumn(new QDataGridColumn('When', '<?= $_FORM->RenderWhen($_ITEM) ?>', 'HtmlEntities=false', 'Width=80px' ));
			$dtgActionItem->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM) ?>', 'HtmlEntities=false', 'Width=60px' ));
			$dtgActionItem->AddColumn(new QDataGridColumn('Comments', '<?= $_FORM->RenderComments($_ITEM) ?>', 'HtmlEntities=false', 'Width=150px' ));
			$dtgActionItem->AddColumn(new QDataGridColumn('Delete', '<?= $_FORM->RenderDeleteAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			
			$dtgActionItem->CellPadding = 2;
			$dtgActionItem->DataSource = ActionItems::LoadArrayByStrategyId($objStrategy->Id);
			$dtgActionItem->NoDataHtml = '<div style=\'padding:20px;\'><p><b>Action Item Table</b></p>' .'No Actions.<br></div>';
			$dtgActionItem->UseAjax = true;
			$dtgActionItem->GridLines = 'both';
			$dtgActionItem->CssClass = 'scorecard_table';
			$objStyle = $dtgActionItem->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 	        
	        $objStyle = $dtgActionItem->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        $this->dtgActionItems[] = $dtgActionItem;
			
	        $btnAddAction = new QButton($this);
	        $btnAddAction->Name = 'Add Action Item';
	        $btnAddAction->Text = 'Add Action Item';
	        $btnAddAction->CssClass = 'primary';
	        $btnAddAction->ActionParameter = $objStrategy->Id;
	        $btnAddAction->AddAction(new QClickEvent(), new QAjaxAction('btnAddAction_Clicked'));	        
	        $this->btnAddAction[] = $btnAddAction;
	        
	        $dtgKPI = new KpisDataGrid($this);
	        $dtgKPI->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=10px' ));
			$dtgKPI->AddColumn(new QDataGridColumn('KPIs', '<?= $_FORM->RenderKPI($_ITEM) ?>', 'HtmlEntities=false', 'Width=450px' ));
			$dtgKPI->AddColumn(new QDataGridColumn('Rating', '<?= $_FORM->RenderRating($_ITEM) ?>', 'HtmlEntities=false', 'Width=40px' ));
			$dtgKPI->AddColumn(new QDataGridColumn('Comments', '<?= $_FORM->RenderKPIComments($_ITEM) ?>', 'HtmlEntities=false', 'Width=150px' ));
			$dtgKPI->AddColumn(new QDataGridColumn('Delete', '<?= $_FORM->RenderDeleteKpi($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			
			$dtgKPI->CellPadding = 2;
			$dtgKPI->DataSource = Kpis::LoadArrayByStrategyId($objStrategy->Id);
			$dtgKPI->NoDataHtml = '<div style=\'padding:20px;\'><p><b>KPI Table</b></p>' .'No KPIs.<br></div>';
			$dtgKPI->UseAjax = true;
			$dtgKPI->GridLines = 'both';
			$dtgKPI->CssClass = 'scorecard_table';
			$objStyle = $dtgKPI->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 	        
	        $objStyle = $dtgKPI->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        $this->dtgKPIs[] = $dtgKPI;
	        
	        $btnAddKpi = new QButton($this);
	        $btnAddKpi->Name = 'Add KPI';
	        $btnAddKpi->Text = 'Add KPI';
	        $btnAddKpi->CssClass = 'primary';
	        $btnAddKpi->ActionParameter = $objStrategy->Id;
	        $btnAddKpi->AddAction(new QClickEvent(), new QAjaxAction('btnAddKPI_Clicked'));	        
	        $this->btnAddKPIs[] = $btnAddKpi;
	        
	        $i++;
        }
	}

	public function lblStatement_MouseOver($strFormId, $strControlId, $strParameter) {
		$this->imgStatement->Visible = true;
	}
	public function lblStatement_MouseOut($strFormId, $strControlId, $strParameter) {
		$this->imgStatement->Visible = false;
	}
	public function lblStatement_Clicked($strFormId, $strControlId, $strParameter) {
		$this->lblStatement->Visible = false;
		$this->imgStatement->Visible = false;
		$this->btnCancelStatement->Visible = true;
		$this->btnSaveStatement->Visible = true;
		$this->txtStatement->Visible = true;
	}
	
	public function btnSaveStatement_Click($strFormId, $strControlId, $strParameter) {
		$objStatement = Statement::Load($this->intStatementId);
		if (null == $objStatement) {
			$objStatement = new Statement();	
			$objStatement->ScorecardId = $this->objScorecard->Id;
			$objStatement->IsPurpose = ($this->intCategoryTypeId == CategoryType::Purpose)? true : false;		
			$this->intStatementId = $objStatement->Save();
		}
		$objStatement->Value = $this->txtStatement->Text;
		$objStatement->ModifiedBy = $this->intUserId;
		$objStatement->Save();
		$this->lblStatement->Text =  $this->txtStatement->Text;
		$this->lblStatement->Visible = true;
		$this->txtStatement->Visible = false;
		$this->btnCancelStatement->Visible = false;
		$this->btnSaveStatement->Visible = false;
	}
	
	public function btnCancelStatement_Click($strFormId, $strControlId, $strParameter) {		
		$this->txtStatement->Text = $this->lblStatement->Text; // revert back
		$this->lblStatement->Visible = true;
		$this->txtStatement->Visible = false;
		$this->btnCancelStatement->Visible = false;
		$this->btnSaveStatement->Visible = false;
	}
	
	public function btnCategory_Clicked($strFormId, $strControlId, $strParameter) {
		if ($strParameter == 'Summary') {
			QApplication::Redirect('/resources/scorecard/scorecard.php/'.$this->objScorecard->Id);
		} else { 
			$intCategoryId = $strParameter;
			QApplication::Redirect('/resources/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$intCategoryId );
		}
    }
    
    public function dtgStrategySummary_Bind() {
    	$strategyArray = Strategy::LoadArrayByScorecardIdAndCategoryTypeId($this->objScorecard->Id,$this->intCategoryTypeId);
    	$this->dtgStrategySummary->DataSource = $strategyArray; 
    }
    
    public function RenderKPIAverage($intStrategyId) {
    	$kpiArray = Kpis::LoadArrayByStrategyId($intStrategyId);
    	$total = 0;
    	foreach($kpiArray as $objKPI) {
    		$total += $objKPI->Rating;
    	}
    	if (count($kpiArray) == 0)
    		return 0;
    	else 
    		return round($total/count($kpiArray),2);
    }
    
 	public function btnSubmit_Click() {
		// redirect to appropriate scorecard
		QApplication::Redirect('/resources/scorecard/scorecard.php/'.$this->rbnScorecards->SelectedValue);
	}
	
	public function btnAddAction_Clicked($strFormId, $strControlId, $strParameter) {
		$objStrategy = Strategy::Load($strParameter);
		$objActionItem = new ActionItems();
		$objActionItem->ScorecardId = $this->objScorecard->Id;
		$objActionItem->CategoryId = $this->intCategoryTypeId;
		$objActionItem->StrategyId = $strParameter;
		$objActionItem->Action = 'New action item';
		$objActionItem->StatusType = StatusType::_0;
		$objActionItem->Count = ActionItems::GetNextCount($this->objScorecard->Id,$this->intCategoryTypeId,$objStrategy->Id);
		$objActionItem->ModifiedBy = $this->intUserId;
		$objActionItem->Save();
		if($objStrategy != null) {
			$intIndex = $objStrategy->Count - 1;
			$this->dtgActionItems[$intIndex]->DataSource = ActionItems::LoadArrayByStrategyId($strParameter);
			$this->dtgActionItems[$intIndex]->Refresh();
			//QApplication::Redirect('/resources/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$this->intCategoryTypeId );
		}
	}
	
	public function btnAddKPI_Clicked($strFormId, $strControlId, $strParameter) {
		$objStrategy = Strategy::Load($strParameter);
		$objKpi = new Kpis();
		$objKpi->ScorecardId = $this->objScorecard->Id;
		$objKpi->StrategyId = $objStrategy->Id;
		$objKpi->Kpi = 'New KPI';
		$objKpi->Rating = 0;
		$objKpi->Count = Kpis::GetNextCount($objStrategy->Id);
		$objKpi->ModifiedBy = $this->intUserId;
		$objKpi->Save();
		$intIndex = $objStrategy->Count-1;
		$this->dtgKPIs[$intIndex]->DataSource = Kpis::LoadArrayByStrategyId($objStrategy->Id);
		$this->dtgKPIs[$intIndex]->Refresh();
	}
	
	public function btnAddStrategy_Clicked() {
		$objStrategy = new Strategy();
		$objStrategy->ScorecardId = $this->objScorecard->Id;
		$objStrategy->CategoryTypeId = $this->intCategoryTypeId;
		$objStrategy->Strategy = 'New Strategy';
		$objStrategy->Count = Strategy::GetNextCount( $this->objScorecard->Id,$this->intCategoryTypeId);
		$objStrategy->ModifiedBy = $this->intUserId;
		$objStrategy->Save();
		QApplication::Redirect('/resources/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$this->intCategoryTypeId );
	}

	public function RenderKPI($objKPI) {
		$strControlId = 'txtKpi' . $objKPI->Id;
		$objStrategy = Strategy::Load($objKPI->StrategyId);
        // Let's see if the KPI exists already
        $txtKPI = $this->GetControl($strControlId);     
        if (!$txtKPI) {
            $txtKPI = new QTextBox($this->dtgKPIs[$objStrategy->Count-1], $strControlId);
            $txtKPI->Text = $objKPI->Kpi;
            $txtKPI->ActionParameter = $objKPI->Id;
            $txtKPI->Width = 450;
            $txtKPI->TextMode = QTextMode::MultiLine;
            $txtKPI->Height = 50;
            $txtKPI->Visible = false;          
        }
		$strKpiSave = 'btnKpiSave' . $objKPI->Id;
        $btnSave = $this->GetControl($strKpiSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgKPIs[$objStrategy->Count-1],$strKpiSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objKPI->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveKpi_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-theme-button';
	        $btnSave->Visible = false;
        }
        
        $strKpiCancel = 'btnKpiCancel' . $objKPI->Id;
        $btnCancel = $this->GetControl($strKpiCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgKPIs[$objStrategy->Count-1],$strKpiCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objKPI->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelKpi_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-theme-button';
	       	$btnCancel->Visible = false;
        }
		$strImgEdit = 'imgEditKpi' . $objKPI->Id;
        $imgEdit = $this->GetControl($strImgEdit); 
        if(!$imgEdit) {
	        $imgEdit = new QLabel($this->dtgKPIs[$objStrategy->Count-1],$strImgEdit);
			$imgEdit->HtmlEntities = false;
			$imgEdit->Visible = false;
			$imgEdit->Text = '<img style="position:relative; cursor:pointer; float:right; left:0px; top:0px;" src="/resources/assets/images/icons/page_edit.png" />';
        }
        $strLblControlId = 'lblKpi' .  $objKPI->Id;
        $lblKpi = $this->GetControl($strLblControlId);     
        if (!$lblKpi) {
        	$lblKpi = new QLabel($this->dtgKPIs[$objStrategy->Count-1],$strLblControlId);
        	$lblKpi->Text = $objKPI->Kpi;
        	$lblKpi->ActionParameter = $objKPI->Id;
        	$lblKpi->CssClass = 'tablecell';
        	$lblKpi->Width = 450;
        	//$lblKpi->Height = 20;
        	$lblKpi->Cursor = 'pointer';
        	$lblKpi->AddAction(new QMouseOverEvent(), new QAjaxAction('lblKpi_MouseOver'));
        	$lblKpi->AddAction(new QMouseOutEvent(), new QAjaxAction('lblKpi_MouseOut'));
			$lblKpi->AddAction(new QClickEvent(), new QAjaxAction('lblKpi_Clicked'));
        }
        return ($txtKPI->Render(false) .$btnSave->Render(false). $btnCancel->Render(false). $lblKpi->Render(false). $imgEdit->Render(false));
	}
	
	public function lblKpi_Clicked($strFormId, $strControlId, $strParameter) {
		$strTextKpiId = 'txtKpi' . $strParameter;
		$txtKpi = $this->GetControl($strTextKpiId);
		$txtKpi->Visible = true; 
		$strKpiSave = 'btnKpiSave' . $strParameter;
        $btnSave = $this->GetControl($strKpiSave); 
        $btnSave->Visible = true;
        $strKpiCancel = 'btnKpiCancel' . $strParameter;
        $btnCancel = $this->GetControl($strKpiCancel); 
        $btnCancel->Visible = true;
       
		$lblKpi = $this->GetControl($strControlId);
		$lblKpi->Visible = false;
		$strImgEdit = 'imgEditKpi' . $strParameter;
		$imgEditKpi = $this->GetControl($strImgEdit);
		$imgEditKpi->Visible = false;
	}
	public function lblKpi_MouseOver($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditKpi' . $strParameter;
		$imgEditKpi = $this->GetControl($strImgEdit);
		$imgEditKpi->Visible = true;
	}
	public function lblKpi_MouseOut($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditKpi' . $strParameter;
		$imgEditKpi = $this->GetControl($strImgEdit);
		$imgEditKpi->Visible = false;
	}
	
	public function btnSaveKpi_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtKpi' . $KpiId;
        $txtKpi = $this->GetControl($strControlId);
        $objKPI = Kpis::Load($KpiId);
        $objKPI->Kpi = $txtKpi->Text;
        $objKPI->ModifiedBy = $this->intUserId;
        $objKPI->Save();
        $txtKpi->Visible = false;
        
        $strKpiSave = 'btnKpiSave' . $KpiId;
        $btnSave = $this->GetControl($strKpiSave); 
        $btnSave->Visible = false;
        $strKpiCancel = 'btnKpiCancel' . $KpiId;
        $btnCancel = $this->GetControl($strKpiCancel); 
        $btnCancel->Visible = false;
        
        $strLblControlId = 'lblKpi' .  $KpiId;
        $lblKpi = $this->GetControl($strLblControlId); 
        $lblKpi->Text = $txtKpi->Text;
        $lblKpi->Visible = true;
	}

	public function btnCancelKpi_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtKpi' . $KpiId;
        $txtKpi = $this->GetControl($strControlId);    
        $txtKpi->Visible = false;
        
        $strKpiSave = 'btnKpiSave' . $KpiId;
        $btnSave = $this->GetControl($strKpiSave); 
        $btnSave->Visible = false;
        $strKpiCancel = 'btnKpiCancel' . $KpiId;
        $btnCancel = $this->GetControl($strKpiCancel); 
        $btnCancel->Visible = false;
        
        $strLblControlId = 'lblKpi' .  $KpiId;
        $lblKpi = $this->GetControl($strLblControlId); 
        $lblKpi->Visible = true;
	}

	public function RenderRating($objKPI) {
		$strControlId = 'lstKPIRating' . $objKPI->Id;
        $lstKpiRating = $this->GetControl($strControlId);     
        if (!$lstKpiRating) {
        	$intIndex = Strategy::Load($objKPI->StrategyId)->Count -1;
            $lstKpiRating = new QListBox($this->dtgKPIs[$intIndex], $strControlId);  
            for($i=0;$i<6;$i++) {
            	if ($objKPI->Rating == $i) {
            		$lstKpiRating->AddItem($i, $i,true);	
            	} else {
            		$lstKpiRating->AddItem($i, $i);            	
            	}	
            }           
            $lstKpiRating->ActionParameter = $objKPI->Id;
            $lstKpiRating->Width = 40;
            $lstKpiRating->AddAction(new QChangeEvent(), new QAjaxAction('lstKpiRating_KeyPressed'));
        }
        return $lstKpiRating->Render(false);
	}
	
	public function lstKpiRating_KeyPressed($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;
        $objKpi = Kpis::Load($KpiId);
        $strControlId = 'lstKPIRating' . $KpiId;
        $lstKpiRating = $this->GetControl($strControlId);
        $objKpi->Rating = $lstKpiRating->SelectedValue;
        $objKpi->ModifiedBy = $this->intUserId;
        $objKpi->Save();
        $this->dtgStrategySummary->Refresh();
	}
	
	public function RenderKPIComments($objKpi) {
		$strControlId = 'txtKPIComment' . $objKpi->Id;
        $txtComment = $this->GetControl($strControlId);     
        if (!$txtComment) {
        	$intIndex = Strategy::Load($objKpi->StrategyId)->Count -1;
            $txtComment = new QTextBox($this->dtgKPIs[$intIndex], $strControlId);
            $txtComment->Text = $objKpi->Comments;
            $txtComment->ActionParameter = $objKpi->Id;
            $txtComment->Width = 150;
            $txtComment->Height = 50;
            $txtComment->TextMode = QTextMode::MultiLine;
            $txtComment->Visible = false;
        }
		$strCommentSave = 'btnKPICommentSave' . $objKpi->Id;
        $btnSave = $this->GetControl($strCommentSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgKPIs[$intIndex],$strCommentSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objKpi->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveKpiComment_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-theme-button';
	        $btnSave->Visible = false;
        }
        
        $strCommentCancel = 'btnKPICommentCancel' . $objKpi->Id;
        $btnCancel = $this->GetControl($strCommentCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgKPIs[$intIndex],$strCommentCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objKpi->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelKpiComment_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-theme-button';
	       	$btnCancel->Visible = false;
        }
		$strImgEdit = 'imgEditKPIComment' . $objKpi->Id;
        $imgEdit = $this->GetControl($strImgEdit); 
        if(!$imgEdit) {
	        $imgEdit = new QLabel($this->dtgActionItems[$intIndex],$strImgEdit);
			$imgEdit->HtmlEntities = false;
			$imgEdit->Visible = false;
			$imgEdit->Text = '<img style="position:relative; cursor:pointer; float:right; left:0px; top:0px;" src="/resources/assets/images/icons/page_edit.png" />';
        }
        $strLblControlId = 'lblKPIComment' .  $objKpi->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgKPIs[$intIndex],$strLblControlId);
        	$lblComment->Text = $objKpi->Comments;
        	$lblComment->ActionParameter = $objKpi->Id;
        	$lblComment->CssClass = 'tablecell';
        	$lblComment->Width = 150;
        	//$lblComment->Height = 20;
        	$lblComment->Cursor = 'pointer';
        	$lblComment->AddAction(new QMouseOverEvent(), new QAjaxAction('lblKpiComment_MouseOver'));
        	$lblComment->AddAction(new QMouseOutEvent(), new QAjaxAction('lblKpiComment_MouseOut'));
        	$lblComment->AddAction(new QClickEvent(), new QAjaxAction('lblKpiComment_Clicked'));
        }
        return ($txtComment->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblComment->Render(false) . $imgEdit->Render(false));
        
	}

	public function lblKpiComment_MouseOver($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditKPIComment' . $strParameter;
		$imgEditAction = $this->GetControl($strImgEdit);
		$imgEditAction->Visible = true;
	}
	public function lblKpiComment_MouseOut($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditKPIComment' . $strParameter;
		$imgEditStrategy = $this->GetControl($strImgEdit);
		$imgEditStrategy->Visible = false;
	}
	
	public function lblKpiComment_Clicked($strFormId, $strControlId, $strParameter) {
		$strCommentId = 'txtKPIComment' . $strParameter;
		$txtComment = $this->GetControl($strCommentId);
		$txtComment->Visible = true;
		$strCommentSave = 'btnKPICommentSave' . $strParameter;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Visible = true;
        $strCommentCancel = 'btnKPICommentCancel' . $strParameter;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Visible = true;
        
		$lblComment = $this->GetControl($strControlId);
		$lblComment->Visible = false;
		$strImgEdit = 'imgEditKPIComment' . $strParameter;
		$imgEditComment = $this->GetControl($strImgEdit);
		$imgEditComment->Visible = false;
	}
	public function btnSaveKpiComment_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtKPIComment' . $KpiId;
        $txtComment = $this->GetControl($strControlId);
        $objKpi = Kpis::Load($KpiId);
        $objKpi->Comments = $txtComment->Text;
        $objKpi->ModifiedBy = $this->intUserId;
        $objKpi->Save();
        $txtComment->Visible = false;
        
        $strCommentSave = 'btnKPICommentSave' . $KpiId;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Visible = false;
        $strCommentCancel = 'btnKPICommentCancel' . $KpiId;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Visible = false;
        
        $strLblControlId = 'lblKPIComment' .  $KpiId;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Text = $txtComment->Text;
        $lblComment->Visible = true;
	}

	public function btnCancelKpiComment_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtKPIComment' . $KpiId;
        $txtAction = $this->GetControl($strControlId);    
        $txtAction->Visible = false;
        
        $strCommentSave = 'btnKPICommentSave' . $KpiId;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Visible = false;
        $strCommentCancel = 'btnKPICommentCancel' . $KpiId;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Visible = false;
        
        $strLblControlId = 'lblKPIComment' .  $KpiId;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Visible = true;
	}
	
	public function RenderAction($objAction) {
		$strControlId = 'txtAction' . $objAction->Id;
		$objStrategy = Strategy::Load($objAction->StrategyId);
        // Let's see if the Action Item exists already
        $txtActionItem = $this->GetControl($strControlId);     
        if (!$txtActionItem) {
            $txtActionItem = new QTextBox($this->dtgActionItems[$objStrategy->Count-1], $strControlId);
            $txtActionItem->Text = $objAction->Action;
            $txtActionItem->ActionParameter = $objAction->Id;
            $txtActionItem->Width = 400;
            $txtActionItem->TextMode = QTextMode::MultiLine;
            $txtActionItem->Height = 50;
            $txtActionItem->Visible = false;
        }
		$strActionSave = 'btnActionSave' . $objAction->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgActionItems[$objStrategy->Count-1],$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objAction->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveAction_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-theme-button';
	        $btnSave->Visible = false;
        }
        
        $strActionCancel = 'btnActionCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgActionItems[$objStrategy->Count-1],$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelAction_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-theme-button';
	       	$btnCancel->Visible = false;
        }
		$strImgEdit = 'imgEditAction' . $objAction->Id;
        $imgEdit = $this->GetControl($strImgEdit); 
        if(!$imgEdit) {
	        $imgEdit = new QLabel($this->dtgActionItems[$objStrategy->Count-1],$strImgEdit);
			$imgEdit->HtmlEntities = false;
			$imgEdit->Visible = false;
			$imgEdit->Text = '<img style="position:relative; cursor:pointer; float:right; left:0px; top:0px;" src="/resources/assets/images/icons/page_edit.png" />';
        }
        $strLblControlId = 'lblAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgActionItems[$objStrategy->Count-1],$strLblControlId);
        	$lblAction->Text = $objAction->Action;
        	$lblAction->ActionParameter = $objAction->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 400;
        	//$lblAction->Height = 20;
        	$lblAction->AddAction(new QMouseOverEvent(), new QAjaxAction('lblAction_MouseOver'));
        	$lblAction->AddAction(new QMouseOutEvent(), new QAjaxAction('lblAction_MouseOut'));
			$lblAction->AddAction(new QClickEvent(), new QAjaxAction('lblAction_Clicked'));	
        }
        return ($txtActionItem->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->Render(false).$imgEdit->render(false));
	}
	
	public function lblAction_Clicked($strFormId, $strControlId, $strParameter) {
		$strTextActionId = 'txtAction' . $strParameter;
		$txtAction = $this->GetControl($strTextActionId);
		$txtAction->Visible = true;
		$strActionSave = 'btnActionSave' . $strParameter;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Visible = true;
        $strActionCancel = 'btnActionCancel' . $strParameter;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Visible = true;
        
		$lblAction = $this->GetControl($strControlId);
		$lblAction->Visible = false;
		$strImgEdit = 'imgEditAction' . $strParameter;
		$imgEditStrategy = $this->GetControl($strImgEdit);
		$imgEditStrategy->Visible = false;
	}
	public function lblAction_MouseOver($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditAction' . $strParameter;
		$imgEditAction = $this->GetControl($strImgEdit);
		$imgEditAction->Visible = true;
	}
	public function lblAction_MouseOut($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditAction' . $strParameter;
		$imgEditStrategy = $this->GetControl($strImgEdit);
		$imgEditStrategy->Visible = false;
	}
	
	public function btnSaveAction_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtAction' . $ActionId;
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Action = $txtAction->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtAction->Visible = false;
        
        $strActionSave = 'btnActionSave' . $ActionId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Visible = false;
        $strActionCancel = 'btnActionCancel' . $ActionId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Visible = false;
        
        $strLblControlId = 'lblAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtAction->Text;
        $lblAction->Visible = true;
	}

	public function btnCancelAction_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtAction' . $ActionId;
        $txtAction = $this->GetControl($strControlId);    
        $txtAction->Visible = false;
        
        $strActionSave = 'btnActionSave' . $ActionId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Visible = false;
        $strActionCancel = 'btnActionCancel' . $ActionId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Visible = false;
        
        $strLblControlId = 'lblAction' .  $ActionId;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Visible = true;
	}
	public function RenderPriority($objStrategy) {
		$intPriority = ($objStrategy->Priority!=null) ? $objStrategy->Priority : 0;
		$strImgPriorityCtrl = 'imgPriority' .$objStrategy->Id; 
		$imgPriority = new QImageControl($this->dtgStrategyArray[$objStrategy->Count -1],$strImgPriorityCtrl);
		$imgPriority->CssClass = 'priority-'.$intPriority;
		$imgPriority->Width = 25;
		$imgPriority->Height = 25;
		switch ($intPriority) {
			case 0:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-0.png'; 
				break;
			case 1:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-1.png';
				break;
			case 2:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-2.png';
				break;
			case 3:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-3.png';
				break;
			default:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-0.png'; 
				break;				
		}	
		$imgPriority->AddAction(new QClickEvent(), new QAjaxAction('imgPriority_Click'));
		$strLstPriorityCtrl = 'lstPriority' .$objStrategy->Id; 
		$imgPriority->ActionParameter = $strLstPriorityCtrl;
		
		$lstPriority = new QListBox($this->dtgStrategyArray[$objStrategy->Count -1],$strLstPriorityCtrl);
		$lstPriority->ActionParameter = $objStrategy->Id;
		$lstPriority->Width = 50;
		$lstPriority->AddItem('-None-',0);
		$lstPriority->AddItem('Top',1);
		$lstPriority->AddItem('Medium',2);
		$lstPriority->AddItem('Low',3);
		$lstPriority->Visible = false;
		$lstPriority->AddAction(new QChangeEvent(), new QAjaxAction('lstPriority_Change'));
		
		$strReturn = $imgPriority->Render(false) . $lstPriority->Render(false);
		return $strReturn;
	}
	public function imgPriority_Click($strFormId, $strControlId, $strParameter) {
		$lstPriority = $this->GetControl($strParameter); 
		$lstPriority->Visible = true;
		$imgPriority = $this->GetControl($strControlId);
		$imgPriority->Visible = false;	
	}
	
	public function lstPriority_Change($strFormId, $strControlId, $strParameter) {
		$objStrategy = Strategy::Load($strParameter);
		$lstPriority = $this->GetControl($strControlId);
		$objStrategy->Priority = $lstPriority->SelectedValue;
		$objStrategy->ModifiedBy = $this->intUserId;
		$objStrategy->Save();
		
		$lstPriority->Visible = false;
		$strImgCtrl = 'imgPriority' .$objStrategy->Id; 
		$imgPriority = $this->GetControl($strImgCtrl);
		switch ($lstPriority->SelectedValue) {
			case 0:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-0.png'; 
				break;
			case 1:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-1.png';
				break;
			case 2:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-2.png';
				break;
			case 3:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-3.png';
				break;
			default:
				$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-0.png'; 
				break;				
		}	
		$imgPriority->Visible = true;
		$imgPriority->Refresh();
	}
	
	public function RenderStrategy($objStrategy) {
		$strControlId = 'txtStrategy' . $objStrategy->Id;
        $txtStrategy = $this->GetControl($strControlId);     
        if (!$txtStrategy) {
            $txtStrategy = new QTextBox($this->dtgStrategyArray[$objStrategy->Count -1], $strControlId);
            $txtStrategy->Text = $objStrategy->Strategy;
            $txtStrategy->ActionParameter = $objStrategy->Id;
            $txtStrategy->Width = 700;
            $txtStrategy->Height = 50;
            $txtStrategy->TextMode = QTextMode::MultiLine;
            $txtStrategy->Visible = false;
        }
        $strStrategySave = 'btnStrategySave' . $objStrategy->Id;
        $btnSave = $this->GetControl($strStrategySave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgStrategyArray[$objStrategy->Count -1],$strStrategySave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objStrategy->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveStrategy_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-theme-button';
	        $btnSave->Visible = false;
        }
        
        $strStrategyCancel = 'btnStrategyCancel' . $objStrategy->Id;
        $btnCancel = $this->GetControl($strStrategyCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgStrategyArray[$objStrategy->Count -1],$strStrategyCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objStrategy->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelStrategy_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-theme-button';
	       	$btnCancel->Visible = false;
        }
		$strImgEdit = 'imgEditStrategy' . $objStrategy->Id;
        $imgEdit = $this->GetControl($strImgEdit); 
        if(!$imgEdit) {
	        $imgEdit = new QLabel($this->dtgStrategyArray[$objStrategy->Count -1],$strImgEdit);
			$imgEdit->HtmlEntities = false;
			$imgEdit->Visible = false;
			$imgEdit->Text = '<img style="position:relative; cursor:pointer; float:right; left:-40px; top:-20px;" src="/resources/assets/images/icons/page_edit.png" />';
        }
        $strLblControlId = 'lblStrategy' . $objStrategy->Id;
        $lblStrategy = $this->GetControl($strLblControlId);     
        if (!$lblStrategy) {
        	$lblStrategy = new QLabel($this->dtgStrategyArray[$objStrategy->Count -1],$strLblControlId);
        	$lblStrategy->Text = $objStrategy->Strategy;
        	$lblStrategy->ActionParameter = $objStrategy->Id;
        	$lblStrategy->Width = 700;
        	//$lblStrategy->Height = 20;
        	$lblStrategy->CssClass = 'tablecell';
        	$lblStrategy->Cursor = 'pointer';
        	$lblStrategy->AddAction(new QMouseOverEvent(), new QAjaxAction('lblStrategy_MouseOver'));
        	$lblStrategy->AddAction(new QMouseOutEvent(), new QAjaxAction('lblStrategy_MouseOut'));
			$lblStrategy->AddAction(new QClickEvent(), new QAjaxAction('lblStrategy_Clicked'));	
        }
        
        return ($txtStrategy->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblStrategy->Render(false). $imgEdit->Render(false));
	}
	
	public function lblStrategy_Clicked($strFormId, $strControlId, $strParameter) {
		$strTextStrategyId = 'txtStrategy' . $strParameter;
		$txtStrategy = $this->GetControl($strTextStrategyId);
		$txtStrategy->Visible = true;
		$strStrategySave = 'btnStrategySave' . $strParameter;
        $btnSave = $this->GetControl($strStrategySave); 
        $btnSave->Visible = true;
        $strStrategyCancel = 'btnStrategyCancel' . $strParameter;
        $btnCancel = $this->GetControl($strStrategyCancel); 
        $btnCancel->Visible = true;
        
		$lblStrategy = $this->GetControl($strControlId);
		$lblStrategy->Visible = false;
		$strImgEdit = 'imgEditStrategy' . $strParameter;
		$imgEditStrategy = $this->GetControl($strImgEdit);
		$imgEditStrategy->Visible = false;
	}
	public function lblStrategy_MouseOver($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditStrategy' . $strParameter;
		$imgEditStrategy = $this->GetControl($strImgEdit);
		$imgEditStrategy->Visible = true;
	}
	public function lblStrategy_MouseOut($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditStrategy' . $strParameter;
		$imgEditStrategy = $this->GetControl($strImgEdit);
		$imgEditStrategy->Visible = false;
	}
	
	public function btnSaveStrategy_Click($strFormId, $strControlId, $strParameter) {
		$StrategyId = $strParameter;
        $objStrategy = Strategy::Load($StrategyId);
        $strTextStrategyId = 'txtStrategy' . $strParameter;
		$txtStrategy = $this->GetControl($strTextStrategyId);		
        $objStrategy->Strategy = $txtStrategy->Text;
        $objStrategy->ModifiedBy = $this->intUserId;
        $objStrategy->Save();
        $txtStrategy->Visible = false;
        $strStrategySave = 'btnStrategySave' . $objStrategy->Id;
        $btnSave = $this->GetControl($strStrategySave); 
        $btnSave->Visible = false;
        $strStrategyCancel = 'btnStrategyCancel' . $objStrategy->Id;
        $btnCancel = $this->GetControl($strStrategyCancel); 
        $btnCancel->Visible = false;
        $strLblControlId = 'lblStrategy' . $objStrategy->Id;
        $lblStrategy = $this->GetControl($strLblControlId); 
        $lblStrategy->Text = $txtStrategy->Text;
        $lblStrategy->Visible = true;
        $this->dtgStrategySummary->Refresh();
	}
	
	public function btnCancelStrategy_Click($strFormId, $strControlId, $strParameter) {
		$StrategyId = $strParameter;
        $objStrategy = Strategy::Load($StrategyId);
        
        $strStrategySave = 'btnStrategySave' . $strParameter;
        $btnSave = $this->GetControl($strStrategySave); 
        $btnSave->Visible = false;
        $strStrategyCancel = 'btnStrategyCancel' . $strParameter;
        $btnCancel = $this->GetControl($strStrategyCancel); 
        $btnCancel->Visible = false;
        $strLblControlId = 'lblStrategy' . $strParameter;
        $lblStrategy = $this->GetControl($strLblControlId); 
        $lblStrategy->Visible = true;
        
        $strTextStrategyId = 'txtStrategy' . $strParameter;
		$txtStrategy = $this->GetControl($strTextStrategyId);	
        $txtStrategy->Text = $lblStrategy->Text;
        $txtStrategy->Visible = false;
        
        $this->dtgStrategySummary->Refresh();
	}
	
	public function RenderWho($objAction) {
		$objWho = User::Load($objAction->Who);
		$strControlId = 'lstActionWho' . $objAction->Id;
        $lstActionWho = $this->GetControl($strControlId);     
        if (!$lstActionWho) {
        	$intIndex = Strategy::Load($objAction->StrategyId)->Count -1;
            $lstActionWho = new QListBox($this->dtgActionItems[$intIndex], $strControlId);   
            $lstActionWho->AddItem('-None-',0);         
            $userArray = $this->objScorecard->GetUserArray();
            foreach($userArray as $objUser) {
            	if ($objWho != null) {
	            	if ($objWho->Id == $objUser->Id)
	            		$lstActionWho->AddItem($objUser->FirstName.' '.$objUser->LastName, $objUser->Id, true);
	            	else 
	            		$lstActionWho->AddItem($objUser->FirstName.' '.$objUser->LastName, $objUser->Id);
            	} else {
            		$lstActionWho->AddItem($objUser->FirstName.' '.$objUser->LastName, $objUser->Id);
            	}
            }
            
            $lstActionWho->ActionParameter = $objAction->Id;
            $lstActionWho->Width = 110;
            $lstActionWho->AddAction(new QChangeEvent(), new QAjaxAction('lstActionWho_KeyPressed'));
        }
        return $lstActionWho->Render(false);
	}
	
	public function lstActionWho_KeyPressed($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $strControlId = 'lstActionWho' . $ActionId;
        $lstActionWho = $this->GetControl($strControlId);
        $objAction->Who = $lstActionWho->SelectedValue;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
	}
	
	public function RenderComments($objAction) {
		$strControlId = 'txtComment' . $objAction->Id;
        $txtComment = $this->GetControl($strControlId);     
        if (!$txtComment) {
        	$intIndex = Strategy::Load($objAction->StrategyId)->Count -1;
            $txtComment = new QTextBox($this->dtgActionItems[$intIndex], $strControlId);
            $txtComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
            $txtComment->ActionParameter = $objAction->Id;
            $txtComment->Width = 150;
            $txtComment->Visible = false;
            $txtComment->Height = 50;
            $txtComment->TextMode = QTextMode::MultiLine;
        }
		$strCommentSave = 'btnCommentSave' . $objAction->Id;
        $btnSave = $this->GetControl($strCommentSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgActionItems[$intIndex],$strCommentSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objAction->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveComment_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-theme-button';
	        $btnSave->Visible = false;
        }
        
        $strCommentCancel = 'btnCommentCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strCommentCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgActionItems[$intIndex],$strCommentCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancelComment_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-theme-button';
	       	$btnCancel->Visible = false;
        }
		$strImgEdit = 'imgEditComment' . $objAction->Id;
        $imgEdit = $this->GetControl($strImgEdit); 
        if(!$imgEdit) {
	        $imgEdit = new QLabel($this->dtgActionItems[$intIndex],$strImgEdit);
			$imgEdit->HtmlEntities = false;
			$imgEdit->Visible = false;
			$imgEdit->Text = '<img style="position:relative; cursor:pointer; float:right; left:0px; top:0px;" src="/resources/assets/images/icons/page_edit.png" />';
        }
        $strLblControlId = 'lblComment' . $objAction->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgActionItems[$intIndex],$strLblControlId);
        	$lblComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
        	$lblComment->ActionParameter = $objAction->Id;
        	$lblComment->Width = 150;
        	//$lblComment->Height = 20;
        	$lblComment->CssClass = 'tablecell';
        	$lblComment->Cursor = 'pointer';
        	$lblComment->AddAction(new QMouseOverEvent(), new QAjaxAction('lblComment_MouseOver'));
        	$lblComment->AddAction(new QMouseOutEvent(), new QAjaxAction('lblComment_MouseOut'));
        	$lblComment->AddAction(new QClickEvent(), new QAjaxAction('lblComment_Clicked'));
        }
        return ($txtComment->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblComment->Render(false) . $imgEdit->Render(false));
	}
	
	public function lblComment_MouseOver($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditComment' . $strParameter;
		$imgEditAction = $this->GetControl($strImgEdit);
		$imgEditAction->Visible = true;
	}
	public function lblComment_MouseOut($strFormId, $strControlId, $strParameter) {
		$strImgEdit = 'imgEditComment' . $strParameter;
		$imgEditStrategy = $this->GetControl($strImgEdit);
		$imgEditStrategy->Visible = false;
	}
	
	public function lblComment_Clicked($strFormId, $strControlId, $strParameter) {
		$strCommentId = 'txtComment' . $strParameter;
		$txtComment = $this->GetControl($strCommentId);
		$txtComment->Visible = true;
		$strCommentSave = 'btnCommentSave' . $strParameter;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Visible = true;
        $strCommentCancel = 'btnCommentCancel' . $strParameter;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Visible = true;
        
		$lblComment = $this->GetControl($strControlId);
		$lblComment->Visible = false;
		$strImgEdit = 'imgEditComment' . $strParameter;
		$imgEditComment = $this->GetControl($strImgEdit);
		$imgEditComment->Visible = false;
	}
	public function btnSaveComment_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtComment' . $ActionId;
        $txtComment = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Comments = $txtComment->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtComment->Visible = false;
        
        $strCommentSave = 'btnCommentSave' . $ActionId;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Visible = false;
        $strCommentCancel = 'btnCommentCancel' . $ActionId;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Visible = false;
        
        $strLblControlId = 'lblComment' .  $ActionId;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Text = $txtComment->Text;
        $lblComment->Visible = true;
	}

	public function btnCancelComment_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtComment' . $ActionId;
        $txtAction = $this->GetControl($strControlId);    
        $txtAction->Visible = false;
        
        $strCommentSave = 'btnCommentSave' . $ActionId;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Visible = false;
        $strCommentCancel = 'btnCommentCancel' . $ActionId;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Visible = false;
        
        $strLblControlId = 'lblComment' .  $ActionId;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Visible = true;
	}
		
	public function RenderStatus($objAction) {
		$strControlId = 'lstActionStatus' . $objAction->Id;
        $lstActionStatus = $this->GetControl($strControlId);     
        if (!$lstActionStatus) {
        	$intIndex = Strategy::Load($objAction->StrategyId)->Count -1;
            $lstActionStatus = new QListBox($this->dtgActionItems[$intIndex], $strControlId);  
            foreach(StatusType::$NameArray as $key=> $value) {
            	if($objAction->StatusType == $key) {
            		$lstActionStatus->AddItem($value, $key,true);
            	} else {
            		$lstActionStatus->AddItem($value, $key);
            	}	
            }           
            $lstActionStatus->ActionParameter = $objAction->Id;
            $lstActionStatus->Width = 60;
            $lstActionStatus->AddAction(new QChangeEvent(), new QAjaxAction('lstActionStatus_Changed'));
        }
        return $lstActionStatus->Render(false);
	}
	
	public function lstActionStatus_Changed($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $strControlId = 'lstActionStatus' . $ActionId;
        $lstActionStatus = $this->GetControl($strControlId);
        $objAction->StatusType = $lstActionStatus->SelectedValue;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
	}
	
	public function RenderWhen($objAction) {
		$strControlId = 'dtxActionWhen' . $objAction->Id;
        $dtxActionWhen = $this->GetControl($strControlId);   
        if (!$dtxActionWhen) {
        	$intIndex = Strategy::Load($objAction->StrategyId)->Count -1;	
        	$dtxActionWhen = new QDateTimeTextBox($this->dtgActionItems[$intIndex]);
        	$dtxActionWhen->ActionParameter = $objAction->Id;
			$dtxActionWhen->Name = 'When';
			$dtxActionWhen->Width = 80;
			$dtxActionWhen->Text = ($objAction->When) ? $objAction->When->__toString() : null;
			$calActionWhen = new QCalendar($this->dtgActionItems[$intIndex], $dtxActionWhen);			
            $dtxActionWhen->AddAction(new QChangeEvent(), new QAjaxAction('dtxActionWhen_KeyPressed'));
        }
        $strReturn = $dtxActionWhen->Render(false) . $calActionWhen->Render(false);
        return $strReturn;
	}
	
	public function dtxActionWhen_KeyPressed($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $dtxActionWhen = $this->GetControl($strControlId);
        $objAction->When = $dtxActionWhen->DateTime;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
	}
	
	public function RenderDeleteStrategy(Strategy $objStrategy) {
		$intIndex = $objStrategy->Count-1;
		$btnDelete = new QButton($this->dtgStrategyArray[$intIndex]);
		$btnDelete->ActionParameter = $objStrategy->Id;
		$btnDelete->CssClass = 'deleteButton';
		$btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Deleting this Strategy will also delete all associated Action Items and KPIs. Are you SURE you want to delete this Strategy?'));
		$btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDeleteStrategy_Clicked'));
		return $btnDelete->Render(false);
	}
	
	public function btnDeleteStrategy_Clicked($strFormId, $strControlId, $strParameter) {
        $objStrategy = Strategy::Load($strParameter);
		$intIndex = $objStrategy->Count-1;
		$objStrategy->UnassociateAllActionItemses();
		$objStrategy->UnassociateAllKpises();
		$objStrategy->UnassociateAllGiantsesAsGiant();
		$objStrategy->UnassociateAllSpheresesAsSphere();
		
        foreach(ActionItems::LoadArrayByStrategyId($objStrategy->Id) as $objAction)	
			$objAction->Delete();
			
		foreach(Kpis::LoadArrayByStrategyId($objStrategy->Id) as $objKpi) 
			$objKpi->Delete();

		$objStrategy->Delete();
		
		$strategyArray = Strategy::LoadArrayByScorecardIdAndCategoryTypeId($this->objScorecard->Id,$this->intCategoryTypeId);        
		$i = 1;
        foreach($strategyArray as $obStrategy) {
			$obStrategy->Count = $i;
			$obStrategy->Save();
			$i++;
		}
		// Then refresh the page
		QApplication::Redirect('/resources/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$this->intCategoryTypeId );
	}
	
	public function RenderDeleteAction(ActionItems $objAction) {
		$objStrategy = $objAction->Strategy;
		$intIndex = $objStrategy->Count-1;
		$btnDelete = new QButton($this->dtgActionItems[$intIndex]);
		$btnDelete->ActionParameter = $objAction->Id;
		$btnDelete->CssClass = 'deleteButton';
		$btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDeleteAction_Clicked'));
		return $btnDelete->Render(false);		
	}

	public function btnDeleteAction_Clicked($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $objStrategy = $objAction->Strategy;
		$intIndex = $objStrategy->Count-1;
        $objAction->Delete();
        //Resort the indexes
        $actionArray = ActionItems::LoadArrayByStrategyId($objStrategy->Id,QQ::Clause(QQ::OrderBy(QQN::ActionItems()->Count)));        
		$i = 1;
        foreach($actionArray as $objAction) {
			$objAction->Count = $i;
			$objAction->Save();
			$i++;
		}
		// Then refresh
		$this->dtgActionItems[$intIndex]->DataSource = ActionItems::LoadArrayByStrategyId($objStrategy->Id);
		$this->dtgActionItems[$intIndex]->Refresh();
		//QApplication::Redirect('/resources/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$this->intCategoryTypeId );
	}
	
	public function RenderDeleteKpi(Kpis $objKpi) {
		$objStrategy = $objKpi->Strategy;
		$intIndex = $objStrategy->Count-1;
		$btnDelete = new QButton($this->dtgKPIs[$intIndex]);
		$btnDelete->ActionParameter = $objKpi->Id;
		$btnDelete->CssClass = 'deleteButton';
		$btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDeleteKpi_Clicked'));
		return $btnDelete->Render(false);		
	}
	
	public function btnDeleteKpi_Clicked($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;
        $objKpi = Kpis::Load($KpiId);
        $objStrategy = $objKpi->Strategy;
		$intIndex = $objStrategy->Count-1;
        $objKpi->Delete();
        //Resort the indexes
        $kpiArray = Kpis::LoadArrayByStrategyId($objStrategy->Id,QQ::Clause(QQ::OrderBy(QQN::Kpis()->Count)));        
		$i = 1;
        foreach($kpiArray as $objKpi) {
			$objKpi->Count = $i;
			$objKpi->Save();
			$i++;
		}
		// Then refresh
		$this->dtgKPIs[$intIndex]->DataSource = Kpis::LoadArrayByStrategyId($objStrategy->Id);
		$this->dtgKPIs[$intIndex]->Refresh();
	}
}

ScorecardForm::Run('ScorecardForm');
?>