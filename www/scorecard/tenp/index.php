<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
class TenPForm extends InstituteForm {
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
	
	protected $mylblStatement;
	
	protected $intStatementId;
	protected $intUserId;
	protected $lblDebug;
protected $mydebug;
protected $myFile;
protected $fh;
public function writeToLogFile($stringData) {
	if($this->mydebug) {
		fwrite($this->fh, $stringData);
	}
}
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		$this->mydebug = false;
		$this->myFile = "logFile.txt";
		$this->fh = fopen($this->myFile, 'a') or die("can't open file");
		
		$this->writeToLogFile("logfile initialized.\n");
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
		$this->lblStatement = new QLabel($this,'lblStatement');
		//$this->lblStatement->Width = 840;
		$this->lblStatement->Padding = '10px 30px';
		$this->lblStatement->CssClass = 'statement editIcon';
		$this->lblStatement->Cursor = 'pointer';
		$this->lblStatement->HtmlEntities = false;
		
		$this->btnSaveStatement = new QButton($this,'btnSaveStatement');
        $this->btnSaveStatement->Text = 'Save';
        $this->btnSaveStatement->AddAction(new QClickEvent(), new QAjaxAction('btnSaveStatement_Click'));
        $this->btnSaveStatement->PrimaryButton = true;
        $this->btnSaveStatement->CausesValidation = true;
        $this->btnSaveStatement->CssClass = 'btn btn-default';
        $this->btnSaveStatement->Display = false;
        // Make sure we turn off validation on the Cancel button
        $this->btnCancelStatement = new QButton($this,'btnCancelStatement');
        $this->btnCancelStatement->Text = 'Cancel';
     	$this->btnCancelStatement->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelStatement_Click(this)'));        
       	$this->btnCancelStatement->CausesValidation = false;
       	$this->btnCancelStatement->CssClass = 'btn btn-default';
        $this->btnCancelStatement->Display = false;
            
		$this->txtStatement = new QTextBox($this,'txtStatement');
		$this->txtStatement->CssClass = 'statement';
		//$this->txtStatement->Width = 940;
		$this->txtStatement->TextMode = QTextMode::MultiLine;
        //$this->txtStatement->Height = 50;
		//$this->txtStatement->Columns = 5;
		$this->txtStatement->Display = false;
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
 			$this->lblStatement->AddAction(new QClickEvent(), new QJavaScriptAction('lblStatement_Clicked()'));
  		} else {
 			$this->lblStatement->Display = false;
 		}
		// Generate a summary of the P Strategys
		$this->dtgStrategySummary = new StrategyDataGrid($this);
		$this->dtgStrategySummary->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->Count ?>', 'HtmlEntities=false' ));
		$this->dtgStrategySummary->AddColumn(new QDataGridColumn($this->strCategory.' Strategy', '<?= $_ITEM->Strategy ?>', 'HtmlEntities=false' ));
		$this->dtgStrategySummary->AddColumn(new QDataGridColumn('KPI Rating', '<?= $_FORM->RenderKPIAverage($_ITEM->Id) ?>', 'HtmlEntities=false' ));
		$this->dtgStrategySummary->CssClass = 'table table-bordered  scorecard_table';
		$this->dtgStrategySummary->CellPadding = 7;
		$this->dtgStrategySummary->SetDataBinder('dtgStrategySummary_Bind',$this);		
		
		$this->dtgStrategySummary->NoDataHtml = '<div style=\'padding:20px;\'><p><b>'.$this->strCategory.' Strategy</b></p>' .'No Strategies.<br></div>';
		$this->dtgStrategySummary->UseAjax = true;
		$objStyle = $this->dtgStrategySummary->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 	        
        $objStyle = $this->dtgStrategySummary->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 	
        $this->btnAddStrategy = new QButton($this);
        $this->btnAddStrategy->Name = 'Add Strategy';
        $this->btnAddStrategy->Text = 'Add Strategy';
        $this->btnAddStrategy->CssClass = 'btn btn-default';
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
        	$dtgStrategy->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false'));
			$dtgStrategy->AddColumn(new QDataGridColumn('Strategy', '<?= $_FORM->RenderStrategy($_ITEM) ?>', 'HtmlEntities=false' ));
			$dtgStrategy->AddColumn(new QDataGridColumn('Priority', '<?= $_FORM->RenderPriority($_ITEM) ?>', 'HtmlEntities=false'));
			$dtgStrategy->AddColumn(new QDataGridColumn('Delete', '<?= $_FORM->RenderDeleteStrategy($_ITEM) ?>', 'HtmlEntities=false' ));			
			$dtgStrategy->CellPadding = 7;
			$dtgStrategy->GridLines = 'both';
			$dtgStrategy->CssClass = 'table table-bordered  scorecard_table';
			$dtgStrategy->DataSource = array($objStrategy);
			$dtgStrategy->NoDataHtml = '<div style=\'padding:20px;\'><p><b>'.$this->strCategory.' Strategy</b></p>' .'No Strategies.<br></div>';
			$dtgStrategy->UseAjax = true;
			$objStyle = $dtgStrategy->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 	        
	        $objStyle = $dtgStrategy->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        $this->dtgStrategyArray[] = $dtgStrategy;	        
	        
	        $dtgActionItem = new ActionItemsDataGrid($this);
	        $dtgActionItem->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false'));
			$dtgActionItem->AddColumn(new QDataGridColumn('Action Items', '<?= $_FORM->RenderAction($_ITEM) ?>', 'HtmlEntities=false'));
			$dtgActionItem->AddColumn(new QDataGridColumn('Who', '<?= $_FORM->RenderWho($_ITEM) ?>', 'HtmlEntities=false' ));
			$dtgActionItem->AddColumn(new QDataGridColumn('When', '<?= $_FORM->RenderWhen($_ITEM) ?>', 'HtmlEntities=false'));
			$dtgActionItem->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM) ?>', 'HtmlEntities=false'));
			$dtgActionItem->AddColumn(new QDataGridColumn('Comments', '<?= $_FORM->RenderComments($_ITEM) ?>', 'HtmlEntities=false'));
			$dtgActionItem->AddColumn(new QDataGridColumn('Delete', '<?= $_FORM->RenderDeleteAction($_ITEM) ?>', 'HtmlEntities=false'));
			
			$dtgActionItem->CellPadding = 7;
			$dtgActionItem->DataSource = ActionItems::LoadArrayByStrategyId($objStrategy->Id);
			$dtgActionItem->NoDataHtml = '<div style=\'padding:20px;\'><p><b>Action Item Table</b></p>' .'No Actions.<br></div>';
			$dtgActionItem->UseAjax = true;
			$dtgActionItem->GridLines = 'both';
			$dtgActionItem->CssClass = 'table table-bordered  scorecard_table';
			$objStyle = $dtgActionItem->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 	        
	        $objStyle = $dtgActionItem->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        $this->dtgActionItems[] = $dtgActionItem;
			
	        $btnAddAction = new QButton($this);
	        $btnAddAction->Name = 'Add Action Item';
	        $btnAddAction->Text = 'Add Action Item';
	        $btnAddAction->CssClass = 'btn btn-default';
	        $btnAddAction->ActionParameter = $objStrategy->Id;
	        $btnAddAction->AddAction(new QClickEvent(), new QAjaxAction('btnAddAction_Clicked'));	        
	        $this->btnAddAction[] = $btnAddAction;
	        
	        $dtgKPI = new KpisDataGrid($this);
	        $dtgKPI->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=10px' ));
			$dtgKPI->AddColumn(new QDataGridColumn('KPIs', '<?= $_FORM->RenderKPI($_ITEM) ?>', 'HtmlEntities=false', 'Width=550px' ));
			$dtgKPI->AddColumn(new QDataGridColumn('Rating', '<?= $_FORM->RenderRating($_ITEM) ?>', 'HtmlEntities=false', 'Width=40px' ));
			$dtgKPI->AddColumn(new QDataGridColumn('Comments', '<?= $_FORM->RenderKPIComments($_ITEM) ?>', 'HtmlEntities=false', 'Width=260px' ));
			$dtgKPI->AddColumn(new QDataGridColumn('Delete', '<?= $_FORM->RenderDeleteKpi($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			
			$dtgKPI->CellPadding = 7;
			$dtgKPI->DataSource = Kpis::LoadArrayByStrategyId($objStrategy->Id);
			$dtgKPI->NoDataHtml = '<div style=\'padding:20px;\'><p><b>KPI Table</b></p>' .'No KPIs.<br></div>';
			$dtgKPI->UseAjax = true;
			$dtgKPI->GridLines = 'both';
			$dtgKPI->CssClass = 'table table-bordered  scorecard_table';
			$objStyle = $dtgKPI->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 	        
	        $objStyle = $dtgKPI->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        $this->dtgKPIs[] = $dtgKPI;
	        
	        $btnAddKpi = new QButton($this);
	        $btnAddKpi->Name = 'Add KPI';
	        $btnAddKpi->Text = 'Add KPI';
	        $btnAddKpi->CssClass = 'btn btn-default';
	        $btnAddKpi->ActionParameter = $objStrategy->Id;
	        $btnAddKpi->AddAction(new QClickEvent(), new QAjaxAction('btnAddKPI_Clicked'));	        
	        $this->btnAddKPIs[] = $btnAddKpi;
	        
	        $i++;
        }
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
		$this->lblStatement->Display = true;
		$this->txtStatement->Display = false;
		$this->btnCancelStatement->Display = false;
		$this->btnSaveStatement->Display = false;
	}
	
	public function btnCategory_Clicked($strFormId, $strControlId, $strParameter) {
		if ($strParameter == 'Summary') {
			QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/scorecard.php/'.$this->objScorecard->Id);
		} else { 
			$intCategoryId = $strParameter;
			QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$intCategoryId );
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
		QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/scorecard.php/'.$this->rbnScorecards->SelectedValue);
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
		if($objStrategy != null) {
			$intIndex = $objStrategy->Count-1;
			$this->dtgKPIs[$intIndex]->DataSource = Kpis::LoadArrayByStrategyId($objStrategy->Id);
			$this->dtgKPIs[$intIndex]->Refresh();
		}
	}
	
	public function btnAddStrategy_Clicked() {
		$objStrategy = new Strategy();
		$objStrategy->ScorecardId = $this->objScorecard->Id;
		$objStrategy->CategoryTypeId = $this->intCategoryTypeId;
		$objStrategy->Strategy = 'New Strategy';
		$objStrategy->Count = Strategy::GetNextCount( $this->objScorecard->Id,$this->intCategoryTypeId);
		$objStrategy->ModifiedBy = $this->intUserId;
		$objStrategy->Save();
		QApplication::Redirect('/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$this->intCategoryTypeId );
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
            $txtKPI->CssClass = 'form-control';
            $txtKPI->TextMode = QTextMode::MultiLine;
            $txtKPI->Height = 50;
            $txtKPI->Display = false;          
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
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        
        $strKpiCancel = 'btnKpiCancel' . $objKPI->Id;
        $btnCancel = $this->GetControl($strKpiCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgKPIs[$objStrategy->Count-1],$strKpiCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objKPI->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelKpi_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }
        $strLblControlId = 'lblKpi' .  $objKPI->Id;
        $lblKpi = $this->GetControl($strLblControlId);     
        if (!$lblKpi) {
        	$lblKpi = new QLabel($this->dtgKPIs[$objStrategy->Count-1],$strLblControlId);
        	$lblKpi->Text = $objKPI->Kpi;
        	$lblKpi->ActionParameter = $objKPI->Id;        	
        	$lblKpi->Cursor = 'pointer';
        	$lblKpi->HtmlEntities = false;
        	$lblKpi->Padding = '10px 30px';
        	$lblKpi->CssClass = 'editIcon tablecell'; 
   			$lblKpi->AddAction(new QClickEvent(), new QJavaScriptAction('lblKpi_Clicked(this)'));
        }
        return ($txtKPI->Render(false) .$btnSave->Render(false). $btnCancel->Render(false). $lblKpi->RenderWithName(false));
	}
	
	public function btnSaveKpi_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtKpi' . $KpiId;
        $txtKpi = $this->GetControl($strControlId);
        $objKPI = Kpis::Load($KpiId);
        $objKPI->Kpi = $txtKpi->Text;
        $objKPI->ModifiedBy = $this->intUserId;
        $objKPI->Save();
        $txtKpi->Display = false;
        
        $strKpiSave = 'btnKpiSave' . $KpiId;
        $btnSave = $this->GetControl($strKpiSave); 
        $btnSave->Display = false;
        $strKpiCancel = 'btnKpiCancel' . $KpiId;
        $btnCancel = $this->GetControl($strKpiCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblKpi' .  $KpiId;
        $lblKpi = $this->GetControl($strLblControlId); 
        $lblKpi->Text = $txtKpi->Text;
        $lblKpi->Display = true;
	}
	public function btnCancelKpi_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtKpi' . $KpiId;
        $txtKpi = $this->GetControl($strControlId);    
        $txtKpi->Display = false;
        
        $strKpiSave = 'btnKpiSave' . $KpiId;
        $btnSave = $this->GetControl($strKpiSave); 
        $btnSave->Display = false;
        $strKpiCancel = 'btnKpiCancel' . $KpiId;
        $btnCancel = $this->GetControl($strKpiCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblKpi' .  $KpiId;
        $lblKpi = $this->GetControl($strLblControlId); 
        $lblKpi->Display = true;
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
            $lstKpiRating->CssClass = 'form-control';
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
            $txtComment->CssClass = 'form-control';
            $txtComment->TextMode = QTextMode::MultiLine;
            $txtComment->Display = false;
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
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        
        $strCommentCancel = 'btnKPICommentCancel' . $objKpi->Id;
        $btnCancel = $this->GetControl($strCommentCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgKPIs[$intIndex],$strCommentCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objKpi->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelKpiComment_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditKPIComment' . $objKpi->Id;
        $strLblControlId = 'lblKPIComment' .  $objKpi->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgKPIs[$intIndex],$strLblControlId);
        	$lblComment->Text = $objKpi->Comments;
        	$lblComment->ActionParameter = $objKpi->Id;
        	$lblComment->CssClass = 'tablecell';
        	//$lblComment->Width = 150;
        	//$lblComment->Height = 20;
        	$lblComment->Cursor = 'pointer';
        	$lblComment->HtmlEntities = false;
        	$lblComment->Padding = '10px 20px';
        	$lblComment->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin-right:10px; cursor:pointer; position:relative; top:25px; left:5px;" src="/assets/images/icons/page_edit.png" />';
          	$lblComment->AddAction(new QClickEvent(), new QJavaScriptAction('lblKpiComment_Clicked(this)'));
        }
        return ($txtComment->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblComment->RenderWithName(false));
        
	}
	public function btnSaveKpiComment_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtKPIComment' . $KpiId;
        $txtComment = $this->GetControl($strControlId);
        $objKpi = Kpis::Load($KpiId);
        $objKpi->Comments = $txtComment->Text;
        $objKpi->ModifiedBy = $this->intUserId;
        $objKpi->Save();
        $txtComment->Display = false;
        
        $strCommentSave = 'btnKPICommentSave' . $KpiId;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Display = false;
        $strCommentCancel = 'btnKPICommentCancel' . $KpiId;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblKPIComment' .  $KpiId;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Text = $txtComment->Text;
        $lblComment->Display = true;
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
            $txtActionItem->CssClass = 'form-control';
            $txtActionItem->TextMode = QTextMode::MultiLine;
            $txtActionItem->Height = 50;
            $txtActionItem->Display = false;
        }
		$strActionSave = 'btnActionSave' . $objAction->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgActionItems[$objStrategy->Count-1],$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objAction->Id;
	        $btnSave->AddAction(new QClickEvent(), new  QAjaxAction('btnSaveAction_Click')); 
	        $btnSave->PrimaryButton = true;
	        //$btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnActionCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgActionItems[$objStrategy->Count-1],$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelAction_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }
        $strLblControlId = 'lblAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgActionItems[$objStrategy->Count-1],$strLblControlId);
        	$lblAction->Text = $objAction->Action;
        	$lblAction->ActionParameter = $objAction->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '10px 30px';
        	$lblAction->CssClass = 'editIcon';        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblAction_Clicked(this)'));	
        }
        return ($txtActionItem->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	protected function btnSaveAction_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strTxtControlId = 'txtAction' . $ActionId;
        $txtAction = $this->GetControl($strTxtControlId);
       
        $objAction = ActionItems::Load($ActionId);
        if(($objAction)&&($txtAction)) {
	        $objAction->Action = $txtAction->Text;
	        $objAction->ModifiedBy = $this->intUserId;
	        $objAction->Save();
	        $txtAction->Display = false;  
        } 
        
        $strActionSave = 'btnActionSave' . $ActionId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnActionCancel' . $ActionId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        if(($lblAction)&&($txtAction)) {
        	$lblAction->Text = $txtAction->Text;
        	$lblAction->Display = true;
        }  
        
	}
	public function RenderPriority($objStrategy) {
		$intPriority = ($objStrategy->Priority!=null) ? $objStrategy->Priority : 0;
		$strImgPriorityCtrl = 'imgPriority' .$objStrategy->Id; 
		$imgPriority = new QImageControl($this->dtgStrategyArray[$objStrategy->Count -1],$strImgPriorityCtrl);
		$imgPriority->CssClass = 'priority';
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
		$lstPriority->CssClass = 'form-control';
		$lstPriority->AddItem('-None-',0);
		$lstPriority->AddItem('Top',1);
		$lstPriority->AddItem('Medium',2);
		$lstPriority->AddItem('Low',3);
		$lstPriority->Display = false;
		$lstPriority->AddAction(new QChangeEvent(), new QAjaxAction('lstPriority_Change'));
		
		$strReturn = $imgPriority->Render(false) . $lstPriority->Render(false);
		return $strReturn;
	}
	public function imgPriority_Click($strFormId, $strControlId, $strParameter) {
		$lstPriority = $this->GetControl($strParameter); 
		$lstPriority->Display = true;
		$imgPriority = $this->GetControl($strControlId);
		$imgPriority->Display = false;	
	}
	
	public function lstPriority_Change($strFormId, $strControlId, $strParameter) {
		$objStrategy = Strategy::Load($strParameter);
		$lstPriority = $this->GetControl($strControlId);
		$objStrategy->Priority = $lstPriority->SelectedValue;
		$objStrategy->ModifiedBy = $this->intUserId;
		$objStrategy->Save();
		
		$lstPriority->Display = false;
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
		$imgPriority->Display = true;
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
            $txtStrategy->CssClass = 'form-control';
            $txtStrategy->TextMode = QTextMode::MultiLine;
            $txtStrategy->Display = false;
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
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        
        $strStrategyCancel = 'btnStrategyCancel' . $objStrategy->Id;
        $btnCancel = $this->GetControl($strStrategyCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgStrategyArray[$objStrategy->Count -1],$strStrategyCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objStrategy->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelStrategy_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }
        $strLblControlId = 'lblStrategy' . $objStrategy->Id;
        $lblStrategy = $this->GetControl($strLblControlId);     
        if (!$lblStrategy) {
        	$lblStrategy = new QLabel($this->dtgStrategyArray[$objStrategy->Count -1],$strLblControlId);
        	$lblStrategy->Text = $objStrategy->Strategy;
        	$lblStrategy->ActionParameter = $objStrategy->Id;
        	$lblStrategy->Cursor = 'pointer';
        	$lblStrategy->Padding = '10px 30px';
        	$lblStrategy->HtmlEntities = false;
        	$lblStrategy->CssClass = 'editIcon tablecell'; 
			$lblStrategy->AddAction(new QClickEvent(), new QJavaScriptAction('lblStrategy_Clicked(this)'));	
        }
        
        return ($txtStrategy->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblStrategy->RenderWithName(false));
	}
	
	public function btnSaveStrategy_Click($strFormId, $strControlId, $strParameter) {
		$StrategyId = $strParameter;
        $objStrategy = Strategy::Load($StrategyId);
        $strTextStrategyId = 'txtStrategy' . $strParameter;
		$txtStrategy = $this->GetControl($strTextStrategyId);
		if(null != $txtStrategy) {		
	        $objStrategy->Strategy = $txtStrategy->Text;
	        $objStrategy->ModifiedBy = $this->intUserId;
	        $objStrategy->Save();
	        $txtStrategy->Display = false;
		}
        $strStrategySave = 'btnStrategySave' . $objStrategy->Id;
        $btnSave = $this->GetControl($strStrategySave); 
        $btnSave->Display = false;
        $strStrategyCancel = 'btnStrategyCancel' . $objStrategy->Id;
        $btnCancel = $this->GetControl($strStrategyCancel); 
        $btnCancel->Display = false;
        $strLblControlId = 'lblStrategy' . $objStrategy->Id;
        $lblStrategy = $this->GetControl($strLblControlId); 
        $lblStrategy->Text = $txtStrategy->Text;
        $lblStrategy->Display = true;
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
            $lstActionWho->Width = 180;
            $lstActionWho->CssClass = 'form-control paddedControl';
            $lstActionWho->AddAction(new QChangeEvent(), new QAjaxAction('lstActionWho_KeyPressed'));
        }
        return $lstActionWho->Render(false);
	}
	
	public function lstActionWho_KeyPressed($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $strControlId = 'lstActionWho' . $ActionId;
        $lstActionWho = $this->GetControl($strControlId);
        $objAction->Who = ($lstActionWho->SelectedValue !=0)? $lstActionWho->SelectedValue : null;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        if(($this->intUserId != $lstActionWho->SelectedValue) && ($lstActionWho->SelectedValue !=0)) {
        	// notify someone if they have something assigned to them by somebody else
        	$this->NotifyUser($lstActionWho->SelectedValue,$ActionId);
        }
	}
	
	function NotifyUser($userId, $actionId) {
		$objUser = User::Load($userId);
		$objAction = ActionItems::Load($actionId);
		if(($objUser)&&($objUser->Email != null)) {
			$strategy = ($objAction->Strategy)? $objAction->Strategy->Strategy:'No Straegy';
			$action = $objAction->Action;
			$due = ($objAction->When!=null)?$objAction->When->__toString() : '';
			$objMessage = new QEmailMessage();
			QEmailServer::$TestMode = true;
			QEmailServer::$TestModeDirectory = '/tmp/';
			//QEmailServer::$SmtpPassword = 'lASgZ357lk';
			//QEmailServer::$SmtpPort = 2525;
			QEmailServer::$SmtpServer = MAIL_SERVER;
			QEmailServer::$AuthLogin = false;			
			QEmailServer::$SmtpUsername = 'scorecard@inst.net';
			
	    	$objMessage->From = 'Scorecard Administrator <scorecard@inst.net>';
		    $objMessage->To = $objUser->Email;
		    $objMessage->Subject = 'Action Item assigned ';
		    $objMessage->HtmlBody = sprintf("<br>The following has been assigned to you:<br><br><b>Under Strategy:</b><br>%s<br><br><b>Action Item:</b><br>%s<br><br><b>Due:</b><br>%s<br>",$strategy, $action,$due);
		    $objMessage->Body = sprintf("\nThe following has been assigned to you:\n\nUnder Strategy: %s\nAction Item: %s\nDue:%s\n",$strategy, $action,$due);
		    if (QEmailServer::IsEmailValid($objUser->Email)) {
		    	QEmailServer::Send($objMessage);
		    }
		}
	}
	
	public function RenderComments($objAction) {
		$strControlId = 'txtComment' . $objAction->Id;
        $txtComment = $this->GetControl($strControlId);     
        if (!$txtComment) {
        	$intIndex = Strategy::Load($objAction->StrategyId)->Count -1;
            $txtComment = new QTextBox($this->dtgActionItems[$intIndex], $strControlId);
            $txtComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
            $txtComment->ActionParameter = $objAction->Id;
            $txtComment->CssClass = 'form-control';
            $txtComment->Display = false;
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
	        $btnSave->CssClass = 'btn btn-default';
	        $btnSave->Display = false;
        }
        
        $strCommentCancel = 'btnCommentCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strCommentCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgActionItems[$intIndex],$strCommentCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelComment_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'btn btn-default';
	       	$btnCancel->Display = false;
        }
	 
        $strLblControlId = 'lblComment' . $objAction->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgActionItems[$intIndex],$strLblControlId);
        	$lblComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
        	$lblComment->ActionParameter = $objAction->Id;  
        	$lblComment->Cursor = 'pointer';
        	$lblComment->HtmlEntities = false;
        	$lblComment->Padding = '10px 30px';
        	$lblComment->CssClass = 'editIcon tablecell';        	
         	$lblComment->AddAction(new QClickEvent(), new QJavaScriptAction('lblComment_Clicked(this)'));
        }
        return ($txtComment->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblComment->RenderWithName(false));
	}
	
	public function btnSaveComment_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtComment' . $ActionId;
        $txtComment = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Comments = $txtComment->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtComment->Display = false;
        
        $strCommentSave = 'btnCommentSave' . $ActionId;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Display = false;
        $strCommentCancel = 'btnCommentCancel' . $ActionId;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblComment' .  $ActionId;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Text = $txtComment->Text;
        $lblComment->Display = true;
	}
	public function btnCancelComment_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtComment' . $ActionId;
        $txtAction = $this->GetControl($strControlId);    
        $txtAction->Display = false;
        
        $strCommentSave = 'btnCommentSave' . $ActionId;
        $btnSave = $this->GetControl($strCommentSave); 
        $btnSave->Display = false;
        $strCommentCancel = 'btnCommentCancel' . $ActionId;
        $btnCancel = $this->GetControl($strCommentCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblComment' .  $ActionId;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Display = true;
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
            $lstActionStatus->CssClass = 'form-control';
            $lstActionStatus->Width = 80;
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
			$dtxActionWhen->Width = 110;
			$dtxActionWhen->CssClass = 'form-control paddedControl tweak';
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
		QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$this->intCategoryTypeId );
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
TenPForm::Run('TenPForm');
?>