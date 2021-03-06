<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
		
class ResourceForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardResource;
	protected $objScorecard;
	protected $lstIndividuals;
	
	protected $lblTitle;
	protected $lblStatistics;
	protected $lblStrategies;
	protected $dtgStrategies;
	protected $lblTotalActionItems;
	
	protected $lblZeroPct;
	protected $lblTwentyFivePct;
	protected $lblFiftyPct;
	protected $lblSeventyFivePct;
	protected $lblHundredPct;
	protected $lblRecurringPct;
	
	protected $dtgZeroPct;
	protected $dtgTwentyFivePct;
	protected $dtgFiftyPct;
	protected $dtgSeventyFivePct;
	protected $dtgHundredPct;
	protected $dtgRecurringPct;
		
	protected $lblPriorityHigh;
	protected $lblPriorityMedium;
	protected $lblPriorityLow;
	protected $lblPriorityNone;
	
	protected $dtgPriorityHigh;
	protected $dtgPriorityMedium;
	protected $dtgPriorityLow;
	protected $dtgPriorityNone;
	
	protected $lblOverdue;
	protected $dtgOverDueArray;
	protected $dtgOverdue;
	
	protected $lblForecast;
	protected $lblForecastTenDay;
	protected $dtgForecastTenDay;
	
	protected $lblForecastThirtyDay;
	protected $dtgForecastThirtyDay;
	
	protected $uniqueStrategyArray;
	protected $dtgZeroPctArray;
	protected $dtgTwentyFivePctArray;
	protected $dtgFiftyPctArray;
	protected $dtgSeventyFivePctArray;
	protected $dtgHundredPctArray;
	protected $dtgRecurringPctArray;
	protected $dtgPriorityHighArray;
	protected $dtgPriorityMediumArray;
	protected $dtgPriorityLowArray;
	protected $dtgPriorityNoneArray;
	protected $dtgForecastTenDayArray;
	protected $dtgForecastThirtyDayArray;
	
	protected $lblDebug;
	protected $btnTest;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		//xdebug_start_trace('/tmp/resources.xt');
		$this->lblDebug = new QLabel($this);
		$this->lblDebug->DisplayStyle = QDisplayStyle::Block;
		$this->lblDebug->HtmlEntities = false;
		
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		
		$this->initializeChart();
		
		$this->lstIndividuals = new QListBox($this);
		$this->lstIndividuals->HtmlBefore = 'Display Information On: ';
		$peopleArray = $this->objScorecard->GetUserArray();
		$this->lstIndividuals->AddItem('-None Selected-',0);
		foreach($peopleArray as $objUser) {
			$this->lstIndividuals->AddItem($objUser->FirstName.' '.$objUser->LastName, $objUser->Id);
		}
		$this->lstIndividuals->AddAction(new QChangeEvent(), new QAjaxAction('lstIndividuals_Clicked'));
		$this->lstIndividuals->CssClass = 'form-control';
		
		$this->lblTitle = new QLabel($this);
		$this->lblTitle->HtmlEntities = false;
		$this->lblTitle->Visible = false;
	 	$this->lblStatistics = new QLabel($this);
	 	$this->lblStatistics->HtmlEntities = false;
	 	$this->lblStatistics->Text = '<h3>Statistics</h3>';
	 	$this->lblStatistics->Visible = false;
	 	$this->lblStrategies  = new QLabel($this);
	 	$this->lblStrategies->CssClass = 'link';
	 	$this->lblStrategies->HtmlEntities = false;
	 	$this->lblStrategies->Visible = false;
	 	$this->lblStrategies->AddAction(new QClickEvent(), new QAjaxAction('lblStrategies_Clicked'));
		
	 	$this->dtgStrategies = new StrategyDataGrid($this);
		$this->dtgStrategies->Visible = false;
		$this->dtgStrategies->DataSource = null;
        
        $this->lblTotalActionItems = new QLabel($this);
        $this->lblTotalActionItems->HtmlEntities = false;
        $this->lblTotalActionItems->DisplayStyle = QDisplayStyle::Block;
        $this->lblTotalActionItems->Visible = false;
        
        $this->lblZeroPct  = new QLabel($this);
	 	$this->lblZeroPct->CssClass = 'link';
	 	$this->lblZeroPct->HtmlEntities = false;
	 	$this->lblZeroPct->Visible = false;
	 	$this->lblZeroPct->AddAction(new QClickEvent(), new QAjaxAction('lblZeroPct_Clicked'));
		
		$this->lblTwentyFivePct = new QLabel($this);
	 	$this->lblTwentyFivePct->CssClass = 'link';
	 	$this->lblTwentyFivePct->HtmlEntities = false;
	 	$this->lblTwentyFivePct->Visible = false;
	 	$this->lblTwentyFivePct->AddAction(new QClickEvent(), new QAjaxAction('lblTwentyFivePct_Clicked'));
		
		$this->lblFiftyPct = new QLabel($this);
	 	$this->lblFiftyPct->CssClass = 'link';
	 	$this->lblFiftyPct->HtmlEntities = false;
	 	$this->lblFiftyPct->Visible = false;
	 	$this->lblFiftyPct->AddAction(new QClickEvent(), new QAjaxAction('lblFiftyPct_Clicked'));
		
		$this->lblSeventyFivePct = new QLabel($this);
	 	$this->lblSeventyFivePct->CssClass = 'link';
	 	$this->lblSeventyFivePct->HtmlEntities = false;
	 	$this->lblSeventyFivePct->Visible = false;
	 	$this->lblSeventyFivePct->AddAction(new QClickEvent(), new QAjaxAction('lblSeventyFivePct_Clicked'));
		
		$this->lblHundredPct = new QLabel($this);
	 	$this->lblHundredPct->CssClass = 'link';
	 	$this->lblHundredPct->HtmlEntities = false;
	 	$this->lblHundredPct->Visible = false;
	 	$this->lblHundredPct->AddAction(new QClickEvent(), new QAjaxAction('lblHundredPct_Clicked'));
		
		$this->lblRecurringPct = new QLabel($this);
	 	$this->lblRecurringPct->CssClass = 'link';
	 	$this->lblRecurringPct->HtmlEntities = false;
	 	$this->lblRecurringPct->Visible = false;
	 	$this->lblRecurringPct->AddAction(new QClickEvent(), new QAjaxAction('lblRecurringPct_Clicked'));
		
        $this->dtgZeroPct = new ActionItemsDataGrid($this);
        $this->dtgZeroPct->Visible = false;
		$this->dtgZeroPct->DataSource = null;
        
		$this->dtgTwentyFivePct = new ActionItemsDataGrid($this);
		$this->dtgTwentyFivePct->Visible = false;
		$this->dtgTwentyFivePct->DataSource = null;
	
        $this->dtgFiftyPct = new ActionItemsDataGrid($this);
        $this->dtgFiftyPct->Visible = false;
		$this->dtgFiftyPct->DataSource = null;
	
        $this->dtgSeventyFivePct = new ActionItemsDataGrid($this);
        $this->dtgSeventyFivePct->DataSource = null;
		$this->dtgSeventyFivePct->Visible = false;  
		     
		$this->dtgHundredPct = new ActionItemsDataGrid($this);
		$this->dtgHundredPct->Visible = false;
		$this->dtgHundredPct->DataSource = null;
        
		$this->dtgRecurringPct = new ActionItemsDataGrid($this);
		$this->dtgRecurringPct->DataSource = null;
		$this->dtgRecurringPct->Visible = false;
      
        $this->lblOverdue  = new QLabel($this);
	 	$this->lblOverdue->CssClass = 'link';
	 	$this->lblOverdue->HtmlEntities = false;
	 	$this->lblOverdue->Visible = false;
	 	$this->lblOverdue->AddAction(new QClickEvent(), new QAjaxAction('lblOverdue_Clicked'));
	 	
	 	$this->dtgOverdue = new ActionItemsDataGrid($this);
		$this->dtgOverdue->DataSource = null;
		$this->dtgOverdue->Visible = false;
	 	       
        $this->lblPriorityHigh  = new QLabel($this);
        $this->lblPriorityHigh->Visible = false;
        $this->lblPriorityHigh->AddAction(new QClickEvent(), new QAjaxAction('lblPriorityHigh_Clicked'));
        
        $this->lblPriorityMedium  = new QLabel($this);
        $this->lblPriorityMedium->Visible = false;
        $this->lblPriorityMedium->AddAction(new QClickEvent(), new QAjaxAction('lblPriorityMedium_Clicked'));
        
        $this->lblPriorityLow  = new QLabel($this);
        $this->lblPriorityLow->Visible = false;
        $this->lblPriorityLow->AddAction(new QClickEvent(), new QAjaxAction('lblPriorityLow_Clicked'));
        
        $this->lblPriorityNone  = new QLabel($this);
        $this->lblPriorityNone->Visible = false;
        $this->lblPriorityNone->AddAction(new QClickEvent(), new QAjaxAction('lblPriorityNone_Clicked'));
        
        $this->dtgPriorityHigh = new ActionItemsDataGrid($this);
        $this->dtgPriorityHigh->Visible = false;
        
        $this->dtgPriorityMedium = new ActionItemsDataGrid($this);
        $this->dtgPriorityMedium->Visible = false;
        
        $this->dtgPriorityLow = new ActionItemsDataGrid($this);
        $this->dtgPriorityLow->Visible = false;
        
        $this->dtgPriorityNone = new ActionItemsDataGrid($this);
        $this->dtgPriorityNone->Visible = false;
        
        $this->lblForecast = new QLabel($this);
        $this->lblForecast->HtmlEntities = false;
	 	$this->lblForecast->Text = '<h3>Forecast</h3>';
	 	$this->lblForecast->Visible = false;
	 	
	 	$this->lblForecastTenDay  = new QLabel($this);
	 	$this->lblForecastTenDay->HtmlEntities = false;
	 	$this->lblForecastTenDay->Visible = false;
	 	$this->lblForecastTenDay->Text = '<h4>10 Day Forecast</h4>';

		$this->dtgForecastTenDay = new ActionItemsDataGrid($this);
		$this->lblForecastThirtyDay  = new QLabel($this);
	 	$this->lblForecastThirtyDay->HtmlEntities = false;
	 	$this->lblForecastThirtyDay->Visible = false;
	 	$this->lblForecastThirtyDay->Text = '<h4>30 Day Forecast</h4>';
	
	 	$this->dtgForecastThirtyDay = new ActionItemsDataGrid($this);
	 	//xdebug_stop_trace();
	}
	
	protected function initializeChart() {
		$associatedArray = array(); 
		$peopleArray = $this->objScorecard->GetUserArray();
		foreach($peopleArray as $objUser) {
			$objItem = new resourceArray();
			$objItem->name = $objUser->FirstName .' '. $objUser->LastName;
			$objItem->Actions = $this->objScorecard->CountActionItemByUser($objUser->Id);
			$associatedArray[] = $objItem;
			
		}
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
		
	protected function setupPriorityTables() {
		$this->lblPriorityHigh->CssClass = 'link';
	 	$this->lblPriorityHigh->HtmlEntities = false; 	
	 	       	
	 	$this->lblPriorityMedium->CssClass = 'link';
	 	$this->lblPriorityMedium->HtmlEntities = false;
	 	
	 	$this->lblPriorityLow->CssClass = 'link';
	 	$this->lblPriorityLow->HtmlEntities = false;
	 	
	 	$this->lblPriorityNone->CssClass = 'link';
	 	$this->lblPriorityNone->HtmlEntities = false;
	 	
		$this->dtgPriorityHigh->Width = 750;
		$this->dtgPriorityHigh->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
        $this->dtgPriorityHigh->MetaAddTypeColumn('CategoryId', 'CategoryType');
		$this->dtgPriorityHigh->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
		$this->dtgPriorityHigh->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
		$this->dtgPriorityHigh->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
		$this->dtgPriorityHigh->MetaAddTypeColumn('StatusType', 'StatusType');
		$this->dtgPriorityHigh->CellPadding = 5;
		$this->dtgPriorityHigh->CssClass = 'table table-bordered resourceTable ';
		$this->dtgPriorityHigh->UseAjax = true;
		$this->dtgPriorityHigh->NoDataHtml = 'No Actions found.';		
		$this->dtgPriorityHigh->GridLines = QGridLines::Both;
		$objStyle = $this->dtgPriorityHigh->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;	
        $objStyle = $this->dtgPriorityHigh->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';         
        $objStyle = $this->dtgPriorityHigh->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';
        
		$this->dtgPriorityMedium->Width = 750;
		$this->dtgPriorityMedium->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
        $this->dtgPriorityMedium->MetaAddTypeColumn('CategoryId', 'CategoryType');
		$this->dtgPriorityMedium->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
		$this->dtgPriorityMedium->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
		$this->dtgPriorityMedium->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
		$this->dtgPriorityMedium->MetaAddTypeColumn('StatusType', 'StatusType');		
		$this->dtgPriorityMedium->CellPadding = 5;
		$this->dtgPriorityMedium->CssClass = 'table table-bordered resourceTable ';
		$this->dtgPriorityMedium->DataSource = null;
		$this->dtgPriorityMedium->UseAjax = true;
		$this->dtgPriorityMedium->NoDataHtml = 'No Actions found.';		
		$this->dtgPriorityMedium->GridLines = QGridLines::Both;
		$objStyle = $this->dtgPriorityMedium->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;	
        $objStyle = $this->dtgPriorityMedium->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';         
        $objStyle = $this->dtgPriorityMedium->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';
        
		$this->dtgPriorityLow->Width = 750;
		$this->dtgPriorityLow->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
        $this->dtgPriorityLow->MetaAddTypeColumn('CategoryId', 'CategoryType');
		$this->dtgPriorityLow->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
		$this->dtgPriorityLow->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
		$this->dtgPriorityLow->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
		$this->dtgPriorityLow->MetaAddTypeColumn('StatusType', 'StatusType');
		$this->dtgPriorityLow->CellPadding = 5;
		$this->dtgPriorityLow->CssClass = 'table table-bordered resourceTable ';
		$this->dtgPriorityLow->UseAjax = true;
		$this->dtgPriorityLow->NoDataHtml = 'No Actions found.';		
		$this->dtgPriorityLow->GridLines = QGridLines::Both;
		$objStyle = $this->dtgPriorityLow->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;	
        $objStyle = $this->dtgPriorityLow->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';         
        $objStyle = $this->dtgPriorityLow->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';
        
		$this->dtgPriorityNone->Width = 750;
		$this->dtgPriorityNone->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
        $this->dtgPriorityNone->MetaAddTypeColumn('CategoryId', 'CategoryType');
		$this->dtgPriorityNone->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
		$this->dtgPriorityNone->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
		$this->dtgPriorityNone->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
		$this->dtgPriorityNone->MetaAddTypeColumn('StatusType', 'StatusType');		
		$this->dtgPriorityNone->CellPadding = 5;
		$this->dtgPriorityNone->CssClass = 'table table-bordered resourceTable ';
		$this->dtgPriorityNone->UseAjax = true;
		$this->dtgPriorityNone->DataSource = null;
		$this->dtgPriorityNone->NoDataHtml = 'No Actions found.';		
		$this->dtgPriorityNone->GridLines = QGridLines::Both;
		$objStyle = $this->dtgPriorityNone->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;	
        $objStyle = $this->dtgPriorityNone->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';         
        $objStyle = $this->dtgPriorityNone->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';
	}
	protected function setupForecastTable() {
		$this->dtgForecastTenDay->Width = 750;
		$this->dtgForecastTenDay->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
        $this->dtgForecastTenDay->MetaAddTypeColumn('CategoryId', 'CategoryType');
		$this->dtgForecastTenDay->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
		$this->dtgForecastTenDay->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
		$this->dtgForecastTenDay->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
		$this->dtgForecastTenDay->MetaAddTypeColumn('StatusType', 'StatusType');		
		$this->dtgForecastTenDay->AddColumn(new QDataGridColumn('When', '<?= $_FORM->RenderTenDayWhen($_ITEM) ?>', 'HtmlEntities=false', 'Width=80px',array('OrderByClause' => QQ::OrderBy(QQN::ActionItems()->When), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ActionItems()->When, false))  ));		
		$this->dtgForecastTenDay->Visible = false;
		$this->dtgForecastTenDay->CellPadding = 5;
		$this->dtgForecastTenDay->CssClass = 'table table-bordered resourceTable ';
		$this->dtgForecastTenDay->UseAjax = true;
		$this->dtgForecastTenDay->NoDataHtml = 'No Actions found.';		
		$this->dtgForecastTenDay->GridLines = QGridLines::Both;
		$objStyle = $this->dtgForecastTenDay->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;	

        $objStyle = $this->dtgForecastTenDay->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';         
        $objStyle = $this->dtgForecastTenDay->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';
	
		$this->dtgForecastThirtyDay->Width = 750;
		$this->dtgForecastThirtyDay->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
        $this->dtgForecastThirtyDay->MetaAddTypeColumn('CategoryId', 'CategoryType');
		$this->dtgForecastThirtyDay->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
		$this->dtgForecastThirtyDay->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
		$this->dtgForecastThirtyDay->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
		$this->dtgForecastThirtyDay->MetaAddTypeColumn('StatusType', 'StatusType');		
		$this->dtgForecastThirtyDay->AddColumn(new QDataGridColumn('When', '<?= $_FORM->RenderThirtyDayWhen($_ITEM) ?>', 'HtmlEntities=false', 'Width=80px',array('OrderByClause' => QQ::OrderBy(QQN::ActionItems()->When), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ActionItems()->When, false))  ));		
		$this->dtgForecastThirtyDay->Visible = false;
		$this->dtgForecastThirtyDay->CellPadding = 5;
		$this->dtgForecastThirtyDay->CssClass = 'table table-bordered resourceTable ';
		$this->dtgForecastThirtyDay->UseAjax = true;
		$this->dtgForecastThirtyDay->DataSource = null;
		$this->dtgForecastThirtyDay->NoDataHtml = 'No Actions found.';		
		$this->dtgForecastThirtyDay->GridLines = QGridLines::Both;
		$objStyle = $this->dtgForecastThirtyDay->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;	
        $objStyle = $this->dtgForecastThirtyDay->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';         
        $objStyle = $this->dtgForecastThirtyDay->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';
	}
	public function RenderWhen($objAction) {
		$strControlId = 'OverdueWhen' . $objAction->Id;
        $dtxActionWhen = $this->GetControl($strControlId);   
        if (!$dtxActionWhen) {
        	$dtxActionWhen = new QDateTimeTextBox($this->dtgOverdue);
        	$dtxActionWhen->ActionParameter = $objAction->Id;
			$dtxActionWhen->Name = 'When';
			$dtxActionWhen->Width = 80;
			$dtxActionWhen->Text = ($objAction->When) ? $objAction->When->__toString() : null;
			$calActionWhen = new QCalendar($this->dtgOverdue, $dtxActionWhen);			
            $dtxActionWhen->AddAction(new QChangeEvent(), new QAjaxAction('dtxActionWhen_KeyPressed'));
        }
        $strReturn = $dtxActionWhen->Render(false) . $calActionWhen->Render(false);
        return $strReturn;
	}
	
	public function RenderStrategyId($objAction) {
		if($objAction->Strategy) {
			return $objAction->Strategy->Count;
		} else {
			return 'N/A';
		}
	}
	
	public function RenderTenDayWhen($objAction) {
		$strControlId = 'ThirtyDayWhen' . $objAction->Id;
        $dtxActionWhen = $this->GetControl($strControlId);   
        if (!$dtxActionWhen) {
        	$dtxActionWhen = new QDateTimeTextBox($this->dtgForecastTenDay);
        	$dtxActionWhen->ActionParameter = $objAction->Id;
			$dtxActionWhen->Name = 'When';
			$dtxActionWhen->Width = 80;
			$dtxActionWhen->Text = ($objAction->When) ? $objAction->When->__toString() : null;
			$calActionWhen = new QCalendar($this->dtgForecastTenDay, $dtxActionWhen);			
            $dtxActionWhen->AddAction(new QChangeEvent(), new QAjaxAction('dtxActionWhen_KeyPressed'));
        }
        $strReturn = $dtxActionWhen->Render(false) . $calActionWhen->Render(false);
        return $strReturn;
	}
	public function RenderThirtyDayWhen($objAction) {
		$strControlId = 'ThirtyDayWhen' . $objAction->Id;
        $dtxActionWhen = $this->GetControl($strControlId);   
        if (!$dtxActionWhen) {
        	$dtxActionWhen = new QDateTimeTextBox($this->dtgForecastThirtyDay);
        	$dtxActionWhen->ActionParameter = $objAction->Id;
			$dtxActionWhen->Name = 'When';
			$dtxActionWhen->Width = 80;
			$dtxActionWhen->Text = ($objAction->When) ? $objAction->When->__toString() : null;
			$calActionWhen = new QCalendar($this->dtgForecastThirtyDay, $dtxActionWhen);			
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
        $objAction->Save();
	}

	protected function getStatistics() {
		$objUser = User::Load($this->lstIndividuals->SelectedValue);
		$strNiceName = $objUser->FirstName.' '.$objUser->LastName;
		$this->lblTitle->Visible = true;
		$this->lblTitle->Text = '<h2>Report for '.$strNiceName.'</h2>';
		$this->lblStatistics->Visible = true;

		$strategyArray = array();
		$this->uniqueStrategyArray = array();
		$this->dtgZeroPctArray = array();
		$this->dtgTwentyFivePctArray = array();
		$this->dtgFiftyPctArray = array();
		$this->dtgSeventyFivePctArray = array();
		$this->dtgHundredPctArray = array();
		$this->dtgRecurringPctArray = array();
		$this->dtgPriorityHighArray = array();
		$this->dtgPriorityMediumArray = array();
		$this->dtgPriorityLowArray = array();
		$this->dtgPriorityNoneArray = array();
		$this->dtgOverDueArray = array();
		$this->dtgForecastTenDayArray = array();
		$this->dtgForecastThirtyDayArray = array();
		$tUnixTime = time();
		$tenDay = time() - (10* 24 * 60 * 60); // 24 hours; 60 mins; 60secs = 1 day
		$thirtyDay = time() - (30* 24 * 60 * 60); // 24 hours; 60 mins; 60secs = 1 day
		
		$actionsArray = ActionItems::LoadArrayByScorecardIdAndUserId($this->objScorecard->Id, $objUser->Id);
		foreach($actionsArray as $objAction) {
			if ($objAction->Strategy) {
				// Get list of unique strategies user is involved with
				if(!in_array($objAction->StrategyId, $this->uniqueStrategyArray)) {
					$this->uniqueStrategyArray[] = $objAction->StrategyId;
				}
				switch ($objAction->StatusType) {
					case StatusType::_0:
						$this->dtgZeroPctArray[] = $objAction;
						break;
					case StatusType::_25:
						$this->dtgTwentyFivePctArray[] = $objAction;
						break;
					case StatusType::_50:
						$this->dtgFiftyPctArray[] = $objAction;
						break;
					case StatusType::_75:
						$this->dtgSeventyFivePctArray[] = $objAction;
						break;
					case StatusType::_100:
						$this->dtgHundredPctArray[] = $objAction;
						break;
					case StatusType::Recurring:
						$this->dtgRecurringPctArray[] = $objAction;
						break;
				}
				switch ($objAction->Strategy->Priority) {
					case 1:
						$this->dtgPriorityHighArray[] = $objAction;
						break;
					case 2:
						$this->dtgPriorityMediumArray[] = $objAction;
						break;
					case 3:
						$this->dtgPriorityLowArray[] = $objAction;
						break;
					default:
						$this->dtgPriorityNoneArray[] = $objAction;
						break;
				}
				if ((strtotime($objAction->When) < $tUnixTime) &&(($objAction->StatusType != StatusType::_100)&&($objAction->StatusType != StatusType::Recurring))) {
					$this->dtgOverDueArray[] = $objAction;
				}
				if ((strtotime($objAction->When) > $tenDay) && (strtotime($objAction->When) < $tUnixTime) &&(($objAction->StatusType != StatusType::_100)&&($objAction->StatusType != StatusType::Recurring))) {
					$this->dtgForecastTenDayArray[] = $objAction;
				}
				if ((strtotime($objAction->When) > $thirtyDay) && (strtotime($objAction->When) < $tUnixTime) &&(($objAction->StatusType != StatusType::_100)&&($objAction->StatusType != StatusType::Recurring))) {
					$this->dtgForecastThirtyDayArray[] = $objAction;
				}
			}
		}		
		$this->lblStrategies->Visible = true;
		$this->lblStrategies->Text = 'Total Strategies '.$strNiceName . ' is involved in:&nbsp; '. count($this->uniqueStrategyArray);
		$this->dtgStrategies->SetDataBinder('dtgStrategy_Bind',$this);
		
		$this->lblTotalActionItems->Visible = true;
		$this->lblTotalActionItems->Text = 'Total Action Items:&nbsp;&nbsp; '.count($actionsArray);
		$this->lblZeroPct->Visible = true;
		$this->lblZeroPct->Text = 'Action Items 0% Completed:&nbsp;&nbsp; '.count($this->dtgZeroPctArray);
		$this->dtgZeroPct->SetDataBinder('dtgZeroPct_Bind',$this);
		
		$this->lblTwentyFivePct->Visible = true;
		$this->lblTwentyFivePct->Text = 'Action Items 25% Completed:&nbsp;&nbsp; '.count($this->dtgTwentyFivePctArray);
		$this->dtgTwentyFivePct->SetDataBinder('dtgTwentyFive_Bind',$this);
		
		$this->lblFiftyPct->Visible = true;
		$this->lblFiftyPct->Text = 'Action Items 50% Completed:&nbsp;&nbsp; '.count($this->dtgFiftyPctArray);
		$this->dtgFiftyPct->SetDataBinder('dtgFifty_Bind',$this);
		
		$this->lblSeventyFivePct->Visible = true;
		$this->lblSeventyFivePct->Text = 'Action Items 75% Completed:&nbsp;&nbsp; '.count($this->dtgSeventyFivePctArray);
		$this->dtgSeventyFivePct->SetDataBinder('dtgSeventyFive_Bind',$this);
		
		$this->lblHundredPct->Visible = true;
		$this->lblHundredPct->Text = 'Action Items 100% Completed:&nbsp;&nbsp; '.count($this->dtgHundredPctArray);
		$this->dtgHundredPct->SetDataBinder('dtgHundred_Bind',$this);
		
		$this->lblRecurringPct->Visible = true;
		$this->lblRecurringPct->Text = 'Recurring Action Items:&nbsp;&nbsp; '.count($this->dtgRecurringPctArray);
		$this->dtgRecurringPct->SetDataBinder('dtgRecurring_Bind',$this);
		
		$this->lblPriorityHigh->Visible = true;
		$this->lblPriorityHigh->Text = 'Action Items with High Priority:&nbsp;&nbsp; '.count($this->dtgPriorityHighArray);
		$this->dtgPriorityHigh->SetDataBinder('dtgPriorityHigh_Bind',$this);
		
		$this->lblPriorityMedium->Visible = true;
		$this->lblPriorityMedium->Text = 'Action Items with Medium Priority:&nbsp;&nbsp; '.count($this->dtgPriorityMediumArray);
		$this->dtgPriorityMedium->SetDataBinder('dtgPriorityMedium_Bind',$this);
		$this->lblPriorityLow->Visible = true;
		$this->lblPriorityLow->Text = 'Action Items with Low Priority:&nbsp;&nbsp; '.count($this->dtgPriorityLowArray);
		$this->dtgPriorityLow->SetDataBinder('dtgPriorityLow_Bind',$this);
		
		$this->lblPriorityNone->Visible = true;
		$this->lblPriorityNone->Text = 'Action Items with No Priority:&nbsp;&nbsp; '.count($this->dtgPriorityNoneArray);
		$this->dtgPriorityNone->SetDataBinder('dtgPriorityNone_Bind',$this);
		
		$this->lblOverdue->Visible = true;
		$this->lblOverdue->Text = 'Overdue Action Items:&nbsp;&nbsp; '.count($this->dtgOverDueArray);
		$this->dtgOverdue->SetDataBinder('dtgOverDue_Bind',$this);
		
		$this->lblForecast->Visible = true;
		$this->lblForecastTenDay->Visible = true;
		$this->lblForecastThirtyDay->Visible = true;
		$this->dtgForecastTenDay->Visible = true;
		$this->dtgForecastThirtyDay->Visible = true;
		$this->dtgForecastTenDay->SetDataBinder('dtgForecastTenDay_Bind',$this);
		$this->dtgForecastThirtyDay->SetDataBinder('dtgForecastThirtyDay_Bind',$this);
	}
	
	public function dtgOverDue_Bind() {
		$this->dtgOverdue->DataSource = $this->dtgOverDueArray;
	}
	
	public function dtgZeroPct_Bind() {
		$this->dtgZeroPct->DataSource = $this->dtgZeroPctArray;
	}
	
	public function dtgTwentyFive_Bind() {
		$this->dtgTwentyFivePct->DataSource = $this->dtgTwentyFivePctArray;
	}
	
	public function dtgFifty_Bind() {
		$this->dtgFiftyPct->DataSource = $this->dtgFiftyPctArray;
	}
	
	public function dtgSeventyFive_Bind() {
		$this->dtgSeventyFivePct->DataSource = $this->dtgSeventyFivePctArray;
	}
	
	public function dtgHundred_Bind() {
		$this->dtgHundredPct->DataSource = $this->dtgHundredPctArray;
	}
	
	public function dtgRecurring_Bind() {
		$this->dtgRecurringPct->DataSource = $this->dtgRecurringPctArray;
	}
	public function dtgPriorityHigh_Bind() {
		$this->dtgPriorityHigh->DataSource = $this->dtgPriorityHighArray;
	}
	public function dtgPriorityMedium_Bind() {
		$this->dtgPriorityMedium->DataSource = $this->dtgPriorityMediumArray;
	}
	public function dtgPriorityLow_Bind() {
		$this->dtgPriorityLow->DataSource = $this->dtgPriorityLowArray;
	}
	public function dtgPriorityNone_Bind() {
		$this->dtgPriorityNone->DataSource = $this->dtgPriorityNoneArray;
	}
		
	public function dtgForecastTenDay_Bind() {
		$this->dtgForecastTenDay->DataSource = $this->dtgForecastTenDayArray;
	}
	
	public function dtgForecastThirtyDay_Bind() {
		$this->dtgForecastThirtyDay->DataSource = $this->dtgForecastThirtyDayArray;
	}
	
	public function dtgStrategy_Bind() {
		// Create Array of Associated strategies
		$strategyArray = array();
		$len = count($this->uniqueStrategyArray);
		for($i=0; $i<$len; $i++) {
			$objStrategy = Strategy::Load($this->uniqueStrategyArray[$i]);
			$strategyArray[$i] = $objStrategy;
		}
		$this->dtgStrategies->DataSource = $strategyArray;
	}
	
	protected function lblStrategies_Clicked() {
		if($this->dtgStrategies->Visible) {
			$this->dtgStrategies->Visible = false;
		} else {
			$this->dtgStrategies->Visible = true;
			$this->dtgStrategies->MetaAddTypeColumn('CategoryTypeId', 'CategoryType');
			$this->dtgStrategies->MetaAddColumn('Count', 'Html=<?=$_ITEM->Count; ?>','Width=20px');		
			$this->dtgStrategies->MetaAddColumn('Strategy', 'Html=<?=$_ITEM->Strategy; ?>','Width=600px');
			$this->dtgStrategies->CellPadding = 5;
			$this->dtgStrategies->CssClass = 'table table-bordered resourceTable ';
			$this->dtgStrategies->UseAjax = true;
			$this->dtgStrategies->NoDataHtml = 'No Strategies found.';		
			$this->dtgStrategies->GridLines = QGridLines::Both;
			$objStyle = $this->dtgStrategies->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;	
	        $objStyle = $this->dtgStrategies->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';         
	        $objStyle = $this->dtgStrategies->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';
		}
	}
	
	protected function lblZeroPct_Clicked() {
		if($this->dtgZeroPct->Visible) {
			$this->dtgZeroPct->Visible = false;
		} else {
			$this->dtgZeroPct->Visible = true;
			$this->dtgZeroPct->Width = 750;
			$this->dtgZeroPct->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
	        $this->dtgZeroPct->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgZeroPct->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			$this->dtgZeroPct->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));		
			$this->dtgZeroPct->MetaAddEditLinkColumn('<?= __SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?= $_ITEM->Action?>','Action');       	        
			$this->dtgZeroPct->CellPadding = 5;
			$this->dtgZeroPct->CssClass = 'table table-bordered resourceTable ';
			$this->dtgZeroPct->UseAjax = true;
			$this->dtgZeroPct->NoDataHtml = 'No Actions found.';		
			$this->dtgZeroPct->GridLines = QGridLines::Both;
			$objStyle = $this->dtgZeroPct->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;	
	        $objStyle = $this->dtgZeroPct->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';         
	        $objStyle = $this->dtgZeroPct->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';
			}
	}
	
	protected function lblTwentyFivePct_Clicked() {
		if($this->dtgTwentyFivePct->Visible) {
			$this->dtgTwentyFivePct->Visible = false;
		} else {
			$this->dtgTwentyFivePct->Visible = true;
			$this->dtgTwentyFivePct->Width = 750;
			$this->dtgTwentyFivePct->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
	        $this->dtgTwentyFivePct->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgTwentyFivePct->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			$this->dtgTwentyFivePct->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
			$this->dtgTwentyFivePct->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?= $_ITEM->Action?>','Action');
			$this->dtgTwentyFivePct->CellPadding = 5;
			$this->dtgTwentyFivePct->CssClass = 'table table-bordered resourceTable ';
			$this->dtgTwentyFivePct->UseAjax = true;
			$this->dtgTwentyFivePct->NoDataHtml = 'No Actions found.';		
			$this->dtgTwentyFivePct->GridLines = QGridLines::Both;
			$objStyle = $this->dtgTwentyFivePct->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;	
	        $objStyle = $this->dtgTwentyFivePct->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';         
	        $objStyle = $this->dtgTwentyFivePct->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';
		}
	}

	protected function lblFiftyPct_Clicked() {
		if($this->dtgFiftyPct->Visible) {
			$this->dtgFiftyPct->Visible = false;
		} else {
			$this->dtgFiftyPct->Visible = true;
			$this->dtgFiftyPct->Width = 750;
			$this->dtgFiftyPct->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
	        $this->dtgFiftyPct->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgFiftyPct->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			$this->dtgFiftyPct->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
			$this->dtgFiftyPct->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
			$this->dtgFiftyPct->CellPadding = 5;
			$this->dtgFiftyPct->CssClass = 'table table-bordered resourceTable ';
			$this->dtgFiftyPct->UseAjax = true;
			$this->dtgFiftyPct->NoDataHtml = 'No Actions found.';		
			$this->dtgFiftyPct->GridLines = QGridLines::Both;
			$objStyle = $this->dtgFiftyPct->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;	
	        $objStyle = $this->dtgFiftyPct->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';         
	        $objStyle = $this->dtgFiftyPct->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';
		}
	}

	protected function lblSeventyFivePct_Clicked() {
		if($this->dtgSeventyFivePct->Visible) {
			$this->dtgSeventyFivePct->Visible = false;
		} else {
			$this->dtgSeventyFivePct->Visible = true;
			$this->dtgSeventyFivePct->Width = 750;
			$this->dtgSeventyFivePct->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
	        $this->dtgSeventyFivePct->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgSeventyFivePct->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			$this->dtgSeventyFivePct->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
			$this->dtgSeventyFivePct->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
			$this->dtgSeventyFivePct->CellPadding = 5;
			$this->dtgSeventyFivePct->CssClass = 'table table-bordered resourceTable ';
			$this->dtgSeventyFivePct->UseAjax = true;
			$this->dtgSeventyFivePct->NoDataHtml = 'No Actions found.';		
			$this->dtgSeventyFivePct->GridLines = QGridLines::Both;
			$objStyle = $this->dtgSeventyFivePct->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;	
	        $objStyle = $this->dtgSeventyFivePct->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';         
	        $objStyle = $this->dtgSeventyFivePct->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';
		}
	}

	protected function lblHundredPct_Clicked() {
		if($this->dtgHundredPct->Visible) {
			$this->dtgHundredPct->Visible = false;
		} else {
			$this->dtgHundredPct->Visible = true;
			$this->dtgHundredPct->Width = 750;
			$this->dtgHundredPct->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
	        $this->dtgHundredPct->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgHundredPct->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			$this->dtgHundredPct->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
			$this->dtgHundredPct->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
			$this->dtgHundredPct->CellPadding = 5;
			$this->dtgHundredPct->CssClass = 'table table-bordered resourceTable ';
			$this->dtgHundredPct->UseAjax = true;
			$this->dtgHundredPct->NoDataHtml = 'No Actions found.';		
			$this->dtgHundredPct->GridLines = QGridLines::Both;
			$objStyle = $this->dtgHundredPct->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;	
	        $objStyle = $this->dtgHundredPct->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';         
	        $objStyle = $this->dtgHundredPct->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';
		}
	}
	protected function lblRecurringPct_Clicked() {
		if($this->dtgRecurringPct->Visible) {
			$this->dtgRecurringPct->Visible = false;
		} else {
			$this->dtgRecurringPct->Visible = true;
			$this->dtgRecurringPct->Width = 750;
			$this->dtgRecurringPct->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
	        $this->dtgRecurringPct->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgRecurringPct->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			$this->dtgRecurringPct->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
			$this->dtgRecurringPct->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__."/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
			$this->dtgRecurringPct->CellPadding = 5;
			$this->dtgRecurringPct->CssClass = 'table table-bordered resourceTable ';
			$this->dtgRecurringPct->UseAjax = true;			
			$this->dtgRecurringPct->NoDataHtml = 'No Actions found.';		
			$this->dtgRecurringPct->GridLines = QGridLines::Both;
			$objStyle = $this->dtgRecurringPct->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;	
	        $objStyle = $this->dtgRecurringPct->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';         
	        $objStyle = $this->dtgRecurringPct->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';
		}
	}
	protected function lblPriorityHigh_Clicked() {
		if($this->dtgPriorityHigh->Visible) {
			$this->dtgPriorityHigh->Visible = false;
		} else {
			$this->dtgPriorityHigh->Visible = true;
		}
	}
	protected function lblPriorityMedium_Clicked() {
		if($this->dtgPriorityMedium->Visible) {
			$this->dtgPriorityMedium->Visible = false;
		} else {
			$this->dtgPriorityMedium->Visible = true;
		}
	}
	protected function lblPriorityLow_Clicked() {
		if($this->dtgPriorityLow->Visible) {
			$this->dtgPriorityLow->Visible = false;
		} else {
			$this->dtgPriorityLow->Visible = true;
		}
	}
	protected function lblPriorityNone_Clicked() {
		if($this->dtgPriorityNone->Visible) {
			$this->dtgPriorityNone->Visible = false;
		} else {
			$this->dtgPriorityNone->Visible = true;
		}
	}
	
	protected function lblOverdue_Clicked() {
		if($this->dtgOverdue->Visible) {
			$this->dtgOverdue->Visible = false;
		} else {
			$this->dtgOverdue->Visible = true;
			$this->dtgOverdue->Width = 750;
			$this->dtgOverdue->AddColumn(new QDataGridColumn('Count', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
	        $this->dtgOverdue->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgOverdue->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
			$this->dtgOverdue->AddColumn(new QDataGridColumn('Action Index', '<?=$_ITEM->Count; ?>','Width=20px'));
			$this->dtgOverdue->MetaAddEditLinkColumn('<?= __SUBDIRECTORY__."/inst/scorecard/tenp/index.php/".$_ITEM->ScorecardId."/".$_ITEM->CategoryId?>', '<?=$_ITEM->Action?>','Action');
			$this->dtgOverdue->MetaAddTypeColumn('StatusType', 'StatusType');		
			$this->dtgOverdue->AddColumn(new QDataGridColumn('When', '<?= $_FORM->RenderWhen($_ITEM) ?>', 'HtmlEntities=false', 'Width=80px',array('OrderByClause' => QQ::OrderBy(QQN::ActionItems()->When), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ActionItems()->When, false))  ));		
			$this->dtgOverdue->CellPadding = 5;
			$this->dtgOverdue->CssClass = 'table table-bordered resourceTable ';
			$this->dtgOverdue->UseAjax = true;
			$this->dtgOverdue->NoDataHtml = 'No Actions found.';		
			$this->dtgOverdue->GridLines = QGridLines::Both;
			$objStyle = $this->dtgOverdue->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;	
	        $objStyle = $this->dtgOverdue->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';         
	        $objStyle = $this->dtgOverdue->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7';
		}
	}
	
	protected function setupAllocationChart($intUserId) {
		$actionCount = array(0,0,0,0,0,0,0,0,0,0);
		$colorArray = array('#FF0F00','#FF6600','#FF9E01','#FCD202','#F8FF01','#B0DE09','#04D215','#0D8ECF','#0D52D1','#2A0CD0');
		$actionsArray = ActionItems::LoadArrayByScorecardIdAndUserId($this->objScorecard->Id, $intUserId);
		foreach($actionsArray as $objAction) {
			$actionCount[$objAction->CategoryId - 1]++;	
		}				
		    
		$associatedArray = array(); 
		foreach(CategoryType::$NameArray as $key=>$value) {
			$objItem = new allocationArray();
			$objItem->P = $value;
			$objItem->Actions = $actionCount[$key - 1];
			$objItem->color = $colorArray[$key - 1];
			$associatedArray[] = $objItem;
			
		}		
		QApplication::ExecuteJavaScript('DisplayAllocation('.json_encode($associatedArray).');');
	}
	
	protected function lstIndividuals_Clicked($strFormId, $strControlId, $strParameter) {
		// Update the panel
		$this->lblTitle->Visible = false;
		$this->lblStatistics->Visible = false;
		$this->lblStrategies->Visible = false;
		$this->dtgStrategies->Visible = false;
		$this->lblTotalActionItems->Visible = false;
		$this->lblZeroPct->Visible = false;
		$this->dtgZeroPct->Visible = false;
		$this->lblTwentyFivePct->Visible = false;
		$this->dtgTwentyFivePct->Visible = false;
		$this->lblFiftyPct->Visible = false;
		$this->dtgFiftyPct->Visible = false;
		$this->lblSeventyFivePct->Visible = false;
		$this->dtgSeventyFivePct->Visible = false;
		$this->lblHundredPct->Visible = false;
		$this->dtgHundredPct->Visible = false;
		$this->lblRecurringPct->Visible = false;
		$this->dtgRecurringPct->Visible = false;
		$this->dtgPriorityHigh->Visible = false;
		$this->dtgPriorityMedium->Visible = false;
		$this->dtgPriorityLow->Visible = false;
		$this->dtgPriorityNone->Visible = false;
		$this->dtgOverdue->Visible = false;
		$this->lblForecast->Visible = false;
		$this->lblForecastTenDay->Visible = false;
		$this->lblForecastThirtyDay->Visible = false;
		$this->dtgForecastTenDay->Visible = false;
		$this->dtgForecastThirtyDay->Visible = false;
		if($this->lstIndividuals->SelectedValue != 0) {
			$this->getStatistics();	
			$this->setupPriorityTables();
			$this->setupForecastTable();
			$this->setupAllocationChart($this->lstIndividuals->SelectedValue);
		} 
	}
}
ResourceForm::Run('ResourceForm');

class resourceArray {
			public $name;
			public $Actions;
		}
		
class allocationArray {
			public $P;
			public $Actions;
			public $color;
		}
		
?>