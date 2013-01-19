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
		$this->lblStatement = new QLabel($this);
		$this->lblStatement->Width = 800;
		$this->lblStatement->CssClass = 'statement';
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

	public function lblStatement_Clicked($strFormId, $strControlId, $strParameter) {
		$this->lblStatement->Visible = false;
		$this->txtStatement->Visible = true;
		$this->txtStatement->AddAction(new QMouseOutEvent(), new QAjaxAction('txtStatement_MouseOut'));
	}
	
	public function txtStatement_MouseOut($strFormId, $strControlId, $strParameter) {
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
		$strControlId = 'txtKPI' . $objKPI->Id;
		$objStrategy = Strategy::Load($objKPI->StrategyId);
        // Let's see if the KPI exists already
        $txtKPI = $this->GetControl($strControlId);     
        if (!$txtKPI) {
            $txtKPI = new QTextBox($this->dtgKPIs[$objStrategy->Count-1], $strControlId);
            $txtKPI->Text = $objKPI->Kpi;
            $txtKPI->ActionParameter = $objKPI->Id;
            $txtKPI->Width = 450;
            $txtKPI->TextMode = QTextMode::MultiLine;
            $txtKPI->Height = 20;
            $txtKPI->Visible = false;
            $txtKPI->AddAction(new QMouseOutEvent(), new QAjaxAction('txtKPI_MouseOut'));           
        }
        $strLblControlId = 'lblKpi' .  $objKPI->Id;
        $lblKpi = $this->GetControl($strLblControlId);     
        if (!$lblKpi) {
        	$lblKpi = new QLabel($this->dtgKPIs[$objStrategy->Count-1],$strLblControlId);
        	$lblKpi->Text = $objKPI->Kpi;
        	$lblKpi->ActionParameter = $strControlId;
        	$lblKpi->CssClass = 'tablecell';
        	$lblKpi->Width = 450;
        	$lblKpi->AddAction(new QMouseOverEvent(), new QAjaxAction('lblKpi_MouseOver'));
        }
        return ($txtKPI->Render(false) . $lblKpi->Render(false));
	}
	
	public function lblKpi_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblKpi = $this->GetControl($strControlId);
		$lblKpi->Visible = false;
		$txtKpi = $this->GetControl($strParameter);
		$txtKpi->Visible = true;
	}
	public function txtKPI_MouseOut($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtKPI' . $KpiId;
        $txtKPI = $this->GetControl($strControlId);
        $objKPI = Kpis::Load($KpiId);
        $objKPI->Kpi = $txtKPI->Text;
        $objKPI->ModifiedBy = $this->intUserId;
        $objKPI->Save();
        $txtKPI->Visible = false;
        $strLblControlId = 'lblKpi' .  $objKPI->Id;
        $lblKpi = $this->GetControl($strLblControlId);  
        $lblKpi->Text = $txtKPI->Text;
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
            $txtComment->Height = 20;
            $txtComment->TextMode = QTextMode::MultiLine;
            $txtComment->AddAction(new QMouseOutEvent(), new QAjaxAction('txtKPIComment_MouseOut'));
            $txtComment->Visible = false;
        }
        $strLblControlId = 'lblKpiComment' .  $objKpi->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgKPIs[$intIndex],$strLblControlId);
        	$lblComment->Text = $objKpi->Comments;
        	$lblComment->ActionParameter = $strControlId;
        	$lblComment->CssClass = 'tablecell';
        	$lblComment->Width = 150;
        	$lblComment->AddAction(new QMouseOverEvent(), new QAjaxAction('lblKpiComment_MouseOver'));
        }
        return ($txtComment->Render(false) . $lblComment->Render(false));
	}

	public function lblKpiComment_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblComment = $this->GetControl($strControlId);
		$lblComment->Visible = false;
		$txtComment = $this->GetControl($strParameter);
		$txtComment->Visible = true;
	}
	
	public function txtKPIComment_MouseOut($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;
        $objKpi = Kpis::Load($KpiId);
        $txtComment = $this->GetControl($strControlId);
        $objKpi->Comments = $txtComment->Text;
        $objKpi->ModifiedBy = $this->intUserId;
        $objKpi->Save();
        $txtComment->Visible = false;
 		$strLblControlId = 'lblKpiComment' .  $objKpi->Id;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Text = $txtComment->Text;   
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
            $txtActionItem->Width = 450;
            $txtActionItem->TextMode = QTextMode::MultiLine;
            $txtActionItem->Height = 30;
            $txtActionItem->Visible = false;
            $txtActionItem->AddAction(new QMouseOutEvent(), new QAjaxAction('txtActionItem_MouseOut'));
        }
        $strLblControlId = 'lblAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgActionItems[$objStrategy->Count-1],$strLblControlId);
        	$lblAction->Text = $objAction->Action;
        	$lblAction->ActionParameter = $strControlId;
        	$lblAction->AddAction(new QMouseOverEvent(), new QAjaxAction('lblAction_MouseOver'));
        }
        return ($txtActionItem->Render(false) . $lblAction->Render(false));
	}
	
	public function lblAction_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblAction = $this->GetControl($strControlId); 
		$lblAction->Visible = false;
		$txtAction = $this->GetControl($strParameter); 
		$txtAction->Visible = true;
	}
	public function txtActionItem_MouseOut($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtAction' . $ActionId;
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Action = $txtAction->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtAction->Visible = false;
        $strLblControlId = 'lblAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtAction->Text;
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
            $txtStrategy->Height = 20;
            $txtStrategy->TextMode = QTextMode::MultiLine;
            $txtStrategy->Visible = false;
            $txtStrategy->AddAction(new QMouseOutEvent(), new QAjaxAction('txtStrategy_MouseOut'));
        }
        $strLblControlId = 'lblStrategy' . $objStrategy->Id;
        $lblStrategy = $this->GetControl($strLblControlId);     
        if (!$lblStrategy) {
        	$lblStrategy = new QLabel($this->dtgStrategyArray[$objStrategy->Count -1],$strLblControlId);
        	$lblStrategy->Text = $objStrategy->Strategy;
        	$lblStrategy->ActionParameter = $strControlId;
        	$lblStrategy->Width = 700;
        	$lblStrategy->CssClass = 'tablecell';
        	$lblStrategy->AddAction(new QMouseOverEvent(), new QAjaxAction('lblStrategy_MouseOver'));
        }
        return ($txtStrategy->Render(false) . $lblStrategy->Render(false));
	}
	
	public function lblStrategy_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblStrategy = $this->GetControl($strControlId);
		$lblStrategy->Visible = false;
		$txtStrategy = $this->GetControl($strParameter);
		$txtStrategy->Visible = true;
	}
	
	public function txtStrategy_MouseOut($strFormId, $strControlId, $strParameter) {
		$StrategyId = $strParameter;
        $objStrategy = Strategy::Load($StrategyId);
        $txtStrategy = $this->GetControl($strControlId);
        $objStrategy->Strategy = $txtStrategy->Text;
        $objStrategy->ModifiedBy = $this->intUserId;
        $objStrategy->Save();
        $txtStrategy->Visible = false;
        $strLblControlId = 'lblStrategy' . $objStrategy->Id;
        $lblStrategy = $this->GetControl($strLblControlId); 
        $lblStrategy->Text = $txtStrategy->Text;
        $lblStrategy->Visible = true;
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
            $txtComment->Height = 20;
            $txtComment->TextMode = QTextMode::MultiLine;
            $txtComment->AddAction(new QMouseOutEvent(), new QAjaxAction('txtComment_MouseOut'));
        }
        $strLblControlId = 'lblComment' . $objAction->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgActionItems[$intIndex],$strLblControlId);
        	$lblComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
        	$lblComment->ActionParameter = $strControlId;
        	$lblComment->Width = 150;
        	$lblComment->CssClass = 'tablecell';
        	$lblComment->AddAction(new QMouseOverEvent(), new QAjaxAction('lblComment_MouseOver'));
        }
        return ($txtComment->Render(false) . $lblComment->Render(false));
	}
	
	public function lblComment_MouseOver($strFormId, $strControlId, $strParameter) {
		$lblComment = $this->GetControl($strControlId); 
		$lblComment->Visible = false;
		$txtComment = $this->GetControl($strParameter); 
		$txtComment->Visible = true;	
	}
	
	public function txtComment_MouseOut($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $strControlId = 'txtComment' . $ActionId;
        $txtComment = $this->GetControl($strControlId);
        $objAction->Comments = $txtComment->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtComment->Visible = false;
 		$strLblControlId = 'lblComment' . $objAction->Id;
        $lblComment = $this->GetControl($strLblControlId); 
        $lblComment->Text = $txtComment->Text;
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