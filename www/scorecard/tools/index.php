<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ToolslForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardTools;
	protected $objScorecard;
	protected $chkUnassignedAction;
	protected $chkUndatedAction;
	protected $dtgUnassigned;
	protected $lstUser;
	protected $dtgUserActions;
	protected $lstLatest;
	protected $dtgLatestStrategy;
	protected $dtgLatestAction;
	protected $dtgLatestKpi;
	protected $lblDebug;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/resources/index.php');
	}
	
	protected function Form_Create() {
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		
		$this->chkUnassignedAction = new QCheckBox($this);
		$this->chkUnassignedAction->Text = 'Unassigned Action Items';
		$this->chkUnassignedAction->AddAction(new QChangeEvent(), new QAjaxAction('dtgUnassigned_Refresh'));
		
		$this->chkUndatedAction = new QCheckBox($this);
		$this->chkUndatedAction->Text = 'Action Items without a \'Complete By\' date';
		$this->chkUndatedAction->AddAction(new QChangeEvent(), new QAjaxAction('dtgUnassigned_Refresh'));
		
		$this->dtgUnassigned = new ActionItemsDataGrid($this);
		$this->dtgUnassigned->Paginator = new QPaginator($this->dtgUnassigned);
		$this->dtgUnassigned->MetaAddTypeColumn('CategoryId','CategoryType');
		$this->dtgUnassigned->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_ITEM->Strategy->Id ?>', 'HtmlEntities=false', 'Width=10px' ));
        $this->dtgUnassigned->AddColumn(new QDataGridColumn('Action Index', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgUnassigned->AddColumn(new QDataGridColumn('Action Items', '<?= $_FORM->RenderAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=450px' ));
		$this->dtgUnassigned->AddColumn(new QDataGridColumn('Who', '<?= $_FORM->RenderWho($_ITEM) ?>', 'HtmlEntities=false', 'Width=110px' ));
		$this->dtgUnassigned->AddColumn(new QDataGridColumn('When', '<?= $_FORM->RenderWhen($_ITEM) ?>', 'HtmlEntities=false', 'Width=80px' ));
		
		$this->dtgUnassigned->CellPadding = 2;
		$this->dtgUnassigned->SetDataBinder('dtgUnassigned_Bind');
		$this->dtgUnassigned->NoDataHtml = '';
		$this->dtgUnassigned->SortColumnIndex = 1;
		$this->dtgUnassigned->ItemsPerPage = 20;
		$this->dtgUnassigned->UseAjax = true;
		$this->dtgUnassigned->GridLines = 'both';
		$this->dtgUnassigned->CssClass = 'scorecard_table';
		$objStyle = $this->dtgUnassigned->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 	        
        $objStyle = $this->dtgUnassigned->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
		
        $this->lstUser = new QListBox($this);
        $this->lstUser->Name = 'UserList';
        $objUserArray = $this->objScorecard->GetUserArray();
        $this->lstUser->AddItem('-None-',0);
        foreach($objUserArray as $objUser) {
        	$this->lstUser->AddItem($objUser->FirstName .' '. $objUser->LastName,$objUser->Id);
        }
        $this->lstUser->AddAction(new QChangeEvent(), new QAjaxAction('dtgUserActions_Refresh'));
        
        $this->dtgUserActions = new ActionItemsDataGrid($this);
		$this->dtgUserActions->Paginator = new QPaginator($this->dtgUserActions);
		$this->dtgUserActions->MetaAddTypeColumn('CategoryId','CategoryType');	
        $this->dtgUserActions->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_ITEM->Strategy->Id ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgUserActions->AddColumn(new QDataGridColumn('Action Index', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgUserActions->AddColumn(new QDataGridColumn('Action Items', '<?= $_FORM->RenderUserAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
		$this->dtgUserActions->AddColumn(new QDataGridColumn('When', '<?= $_FORM->RenderUserWhen($_ITEM) ?>', 'HtmlEntities=false', 'Width=80px',array('OrderByClause' => QQ::OrderBy(QQN::ActionItems()->When), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ActionItems()->When, false))  ));
		$this->dtgUserActions->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderUserStatus($_ITEM) ?>', 'HtmlEntities=false', 'Width=60px',array('OrderByClause' => QQ::OrderBy(QQN::ActionItems()->StatusType), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ActionItems()->StatusType, false)) ));
		$this->dtgUserActions->AddColumn(new QDataGridColumn('Comments', '<?= $_FORM->RenderUserComments($_ITEM) ?>', 'HtmlEntities=false', 'Width=130px' ));
		$this->dtgUserActions->AddColumn(new QDataGridColumn('Priority', '<?= $_FORM->RenderUserPriority($_ITEM) ?>', 'HtmlEntities=false', 'Width=60px',array('OrderByClause' => QQ::OrderBy(QQN::ActionItems()->Strategy->Priority), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ActionItems()->Strategy->Priority, false)) ));		
		
		$this->dtgUserActions->CellPadding = 2;
		$this->dtgUserActions->SetDataBinder('dtgUserActions_Bind');
		$this->dtgUserActions->NoDataHtml = '';
		$this->dtgUserActions->SortColumnIndex = 1;
		$this->dtgUserActions->ItemsPerPage = 20;
		$this->dtgUserActions->UseAjax = true;
		$this->dtgUserActions->GridLines = 'both';
		$this->dtgUserActions->CssClass = 'scorecard_table';
		$objStyle = $this->dtgUserActions->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 	        
        $objStyle = $this->dtgUserActions->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
        
        $this->lstLatest = new QListBox($this);
        $this->lstLatest->Name = 'LatestList';
        $this->lstLatest->AddItem('-None-','None');
        $this->lstLatest->AddItem('Day','Day');
        $this->lstLatest->AddItem('Week','Week');
        $this->lstLatest->AddItem('Month','Month');
        $this->lstLatest->AddAction(new QChangeEvent(), new QAjaxAction('dtgLatest_Refresh'));
	
        $this->dtgLatestStrategy = new StrategyDataGrid($this);
        $this->dtgLatestStrategy->Paginator = new QPaginator($this->dtgLatestStrategy);
        $this->dtgLatestStrategy->MetaAddTypeColumn('CategoryTypeId','CategoryType');		
        $this->dtgLatestStrategy->AddColumn(new QDataGridColumn('Index', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgLatestStrategy->AddColumn(new QDataGridColumn('Strategy', '<?= $_FORM->RenderLatestStrategy($_ITEM) ?>', 'HtmlEntities=false', 'Width=200px' ));
		$this->dtgLatestStrategy->AddColumn(new QDataGridColumn('Priority', '<?= $_FORM->RenderLatestPriority($_ITEM) ?>', 'HtmlEntities=false', 'Width=60px',array('OrderByClause' => QQ::OrderBy(QQN::Strategy()->Priority), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Strategy()->Priority, false)) ));		
		$this->dtgLatestStrategy->AddColumn(new QDataGridColumn('Date Modified', '<?= $_ITEM->Modified ?>', 'HtmlEntities=false', 'Width=80px',array('OrderByClause' => QQ::OrderBy(QQN::Strategy()->Modified), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Strategy()->Modified, false)) ));		
		$this->dtgLatestStrategy->AddColumn(new QDataGridColumn('Modified By', '<?= $_FORM->RenderLatestModifiedBy($_ITEM->ModifiedBy) ?>', 'HtmlEntities=false', 'Width=60px',array('OrderByClause' => QQ::OrderBy(QQN::Strategy()->ModifiedBy), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Strategy()->ModifiedBy, false)) ));		
		
		$this->dtgLatestStrategy->HtmlBefore = '<h4>Modified Strategies</h4>';
		$this->dtgLatestStrategy->CellPadding = 2;
		$this->dtgLatestStrategy->SetDataBinder('dtgLatestStrategy_Bind');
		$this->dtgLatestStrategy->NoDataHtml = '';
		$this->dtgLatestStrategy->SortColumnIndex = 1;
		$this->dtgLatestStrategy->ItemsPerPage = 20;
		$this->dtgLatestStrategy->UseAjax = true;
		$this->dtgLatestStrategy->GridLines = 'both';
		$this->dtgLatestStrategy->CssClass = 'scorecard_table';
		$objStyle = $this->dtgLatestStrategy->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 	        
        $objStyle = $this->dtgLatestStrategy->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
        
		$this->dtgLatestAction = new ActionItemsDataGrid($this);
		$this->dtgLatestAction->Paginator = new QPaginator($this->dtgLatestAction);
		$this->dtgLatestAction->MetaAddTypeColumn('CategoryId','CategoryType');	
        $this->dtgLatestAction->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_ITEM->Strategy->Id ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgLatestAction->AddColumn(new QDataGridColumn('Action Index', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgLatestAction->AddColumn(new QDataGridColumn('Action Items', '<?= $_FORM->RenderLatestAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
		$this->dtgLatestAction->AddColumn(new QDataGridColumn('When', '<?= $_FORM->RenderLatestWhen($_ITEM) ?>', 'HtmlEntities=false', 'Width=80px',array('OrderByClause' => QQ::OrderBy(QQN::ActionItems()->When), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ActionItems()->When, false))  ));
		$this->dtgLatestAction->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderLatestStatus($_ITEM) ?>', 'HtmlEntities=false', 'Width=60px',array('OrderByClause' => QQ::OrderBy(QQN::ActionItems()->StatusType), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ActionItems()->StatusType, false)) ));
		$this->dtgLatestAction->AddColumn(new QDataGridColumn('Comments', '<?= $_FORM->RenderLatestComments($_ITEM) ?>', 'HtmlEntities=false', 'Width=130px' ));
		$this->dtgLatestAction->AddColumn(new QDataGridColumn('Date Modified', '<?= $_ITEM->Modified ?>', 'HtmlEntities=false', 'Width=80px',array('OrderByClause' => QQ::OrderBy(QQN::Strategy()->Modified), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Strategy()->Modified, false)) ));		
		$this->dtgLatestAction->AddColumn(new QDataGridColumn('Modified By', '<?= $_FORM->RenderLatestModifiedBy($_ITEM->ModifiedBy) ?>', 'HtmlEntities=false', 'Width=60px',array('OrderByClause' => QQ::OrderBy(QQN::Strategy()->ModifiedBy), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Strategy()->ModifiedBy, false)) ));		
		
		$this->dtgLatestAction->HtmlBefore = '<h4>Modified Action Items</h4>';
		$this->dtgLatestAction->CellPadding = 2;
		$this->dtgLatestAction->SetDataBinder('dtgLatestAction_Bind');
		$this->dtgLatestAction->NoDataHtml = '';
		$this->dtgLatestAction->SortColumnIndex = 1;
		$this->dtgLatestAction->ItemsPerPage = 20;
		$this->dtgLatestAction->UseAjax = true;
		$this->dtgLatestAction->GridLines = 'both';
		$this->dtgLatestAction->CssClass = 'scorecard_table';
		$objStyle = $this->dtgLatestAction->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 	        
        $objStyle = $this->dtgLatestAction->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
        
		$this->dtgLatestKpi = new KpisDataGrid($this);
		$this->dtgLatestKpi->Paginator = new QPaginator($this->dtgLatestKpi);	
		$this->dtgLatestKpi->AddColumn(new QDataGridColumn('KPI', '<?= $_FORM->RenderLatestKPI($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
		$this->dtgLatestKpi->AddColumn(new QDataGridColumn('Rating', '<?= $_FORM->RenderLatestRating($_ITEM) ?>', 'HtmlEntities=false', 'Width=80px'));
		$this->dtgLatestKpi->AddColumn(new QDataGridColumn('Comments', '<?= $_FORM->RenderLatestKpiComments($_ITEM) ?>', 'HtmlEntities=false', 'Width=130px' ));
		$this->dtgLatestKpi->AddColumn(new QDataGridColumn('Date Modified', '<?= $_ITEM->Modified ?>', 'HtmlEntities=false', 'Width=80px'));		
		$this->dtgLatestKpi->AddColumn(new QDataGridColumn('Modified By', '<?= $_FORM->RenderLatestModifiedBy($_ITEM->ModifiedBy) ?>', 'HtmlEntities=false', 'Width=60px'));		
		
		$this->dtgLatestKpi->HtmlBefore = '<h4>Modified KPIs</h4>';
		$this->dtgLatestKpi->CellPadding = 2;
		$this->dtgLatestKpi->SetDataBinder('dtgLatestKpi_Bind');
		$this->dtgLatestKpi->NoDataHtml = ' ';
		$this->dtgLatestKpi->SortColumnIndex = 1;
		$this->dtgLatestKpi->ItemsPerPage = 20;
		$this->dtgLatestKpi->UseAjax = true;
		$this->dtgLatestKpi->GridLines = 'both';
		$this->dtgLatestKpi->CssClass = 'scorecard_table';
		$objStyle = $this->dtgLatestKpi->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 	        
        $objStyle = $this->dtgLatestKpi->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
	}

	public function dtgLatestKpi_Bind() {
		$objConditions = QQ::All(); 
		$objClauses = array();
		if($this->lstLatest->SelectedValue){
			$timecheck = 0;
			switch($this->lstLatest->SelectedValue) {
				case "Day":
					$timecheck = time() - (24 * 60 * 60); // 24 hours; 60 mins; 60secs = 1 day
					break;
				case "Week":
					$timecheck = time() - (7 * 24 * 60 * 60); // 7 days; 24 hours; 60 mins; 60secs = 1 week
					break;
				case "Month":
					$timecheck = time() - (31 * 24 * 60 * 60); // 7 days; 24 hours; 60 mins; 60secs = 1 month
					break;	
			}
			$sGMTMySqlString = gmdate("Y-m-d H:i:s", $timecheck);
			$objConditions = QQ::AndCondition($objConditions,
			QQ::GreaterOrEqual( QQN::Kpis()->Modified, $sGMTMySqlString)
			);
		}
		// If nothing selected, don't populate the table.
		if((!$this->lstLatest->SelectedValue) || ($this->lstLatest->SelectedValue == 'None')) {
			return;
		} else {
			$kpiArray = Kpis::LoadAll();
			$this->dtgLatestKpi->MetaDataBinder($objConditions,$objClauses);
		}
	}
	
	public function dtgLatestAction_Bind() {
		$objConditions = QQ::All(); 
		$objClauses = array();

		if($this->lstLatest->SelectedValue){
			$timecheck = 0;
			switch($this->lstLatest->SelectedValue) {
				case "Day":
					$timecheck = time() - (24 * 60 * 60); // 24 hours; 60 mins; 60secs = 1 day
					break;
				case "Week":
					$timecheck = time() - (7 * 24 * 60 * 60); // 7 days; 24 hours; 60 mins; 60secs = 1 week
					break;
				case "Month":
					$timecheck = time() - (31 * 24 * 60 * 60); // 7 days; 24 hours; 60 mins; 60secs = 1 month
					break;
					
			}
			$sGMTMySqlString = gmdate("Y-m-d H:i:s", $timecheck);
			$objConditions = QQ::AndCondition($objConditions,
			QQ::GreaterOrEqual( QQN::ActionItems()->Modified, $sGMTMySqlString)
			);
		}
		// If nothing selected, don't populate the table.
		if((!$this->lstLatest->SelectedValue) || ($this->lstLatest->SelectedValue == 'None')) {
			return;
		} else {
			$this->dtgLatestAction->MetaDataBinder($objConditions, QQ::Clause($this->dtgLatestAction->OrderByClause));
		}
	}
	
	protected function dtgLatestStrategy_Bind() {
		$objConditions = QQ::All(); 
		$objClauses = array();

		if($this->lstLatest->SelectedValue){
			$timecheck = 0;
			switch($this->lstLatest->SelectedValue) {
				case "Day":
					$timecheck = time() - (24 * 60 * 60); // 24 hours; 60 mins; 60secs = 1 day
					break;
				case "Week":
					$timecheck = time() - (7 * 24 * 60 * 60); // 7 days; 24 hours; 60 mins; 60secs = 1 week
					break;
				case "Month":
					$timecheck = time() - (31 * 24 * 60 * 60); // 7 days; 24 hours; 60 mins; 60secs = 1 month
					break;
					
			}
			$sGMTMySqlString = gmdate("Y-m-d H:i:s", $timecheck);
			$objConditions = QQ::AndCondition($objConditions,
			QQ::GreaterOrEqual( QQN::Strategy()->Modified, $sGMTMySqlString)
			);
		}
		// If nothing selected, don't populate the table.
		if((!$this->lstLatest->SelectedValue) || ($this->lstLatest->SelectedValue == 'None')) {
			return;
		} else {
			$this->dtgLatestStrategy->MetaDataBinder($objConditions, QQ::Clause($this->dtgLatestStrategy->OrderByClause));
		}
	}
	
	protected function dtgLatest_Refresh() {
		// Update All three tables eventually
		$this->dtgLatestStrategy->PageNumber = 1;
		$this->dtgLatestStrategy->Refresh();
		
		$this->dtgLatestAction->PageNumber = 1;
		$this->dtgLatestAction->Refresh();
		$this->dtgLatestKpi->PageNumber = 1;
		$this->dtgLatestKpi->Refresh();
	}
	protected function dtgUserActions_Refresh() {
		$this->dtgUserActions->PageNumber = 1;
		$this->dtgUserActions->Refresh();
	}
	
	public function dtgUserActions_Bind() {
		$objConditions = QQ::All(); 
		$objClauses = array();

		if($this->lstUser->SelectedValue){
			$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::ActionItems()->Who, $this->lstUser->SelectedValue)
			);
		}

		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::ActionItems()->ScorecardId, (int)$this->objScorecard->Id)
		);
		
		// If nothing selected, don't populate the table.
		if((!$this->lstUser->SelectedValue) || ($this->lstUser->SelectedValue == 0)) {
			return;
		} else {
			$this->dtgUserActions->MetaDataBinder($objConditions, QQ::Clause($this->dtgUserActions->OrderByClause));
		}
	}
	
	protected function dtgUnassigned_Refresh() {
		$this->dtgUnassigned->PageNumber = 1;
		$this->dtgUnassigned->Refresh();
	}
	
	public function dtgUnassigned_Bind() {
		$objConditions = QQ::None(); //QQ::All(); 
		$objClauses = array();

		if($this->chkUnassignedAction->Checked){
			$objConditions = QQ::OrCondition($objConditions,
			QQ::Equal( QQN::ActionItems()->Who, null)
			);
		}
		if($this->chkUndatedAction->Checked){
			$objConditions = QQ::OrCondition($objConditions,
			QQ::Equal( QQN::ActionItems()->When, null)
			);
		}
		
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::ActionItems()->ScorecardId, (int)$this->objScorecard->Id)
		);
		
		// If nothing selected, don't populate the table.
		if((!$this->chkUndatedAction->Checked)&& (!$this->chkUnassignedAction->Checked)) {
			return;
		} else {
			$this->dtgUnassigned->MetaDataBinder($objConditions, $objClauses);
		}
	}
	
	public function RenderWho($objAction) {
		$objWho = User::Load($objAction->Who);
		$strControlId = 'lstActionWho' . $objAction->Id;
        $lstActionWho = $this->GetControl($strControlId);     
        if (!$lstActionWho) {
            $lstActionWho = new QListBox($this->dtgUnassigned, $strControlId);   
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
        $lstActionWho = $this->GetControl($strControlId);
        $objAction->Who = $lstActionWho->SelectedValue;
        $objAction->Save();
	}

	public function RenderLatestKpiComments($objKpi) {
		$strControlId = 'txtLatestKpiComment' . $objKpi->Id;
        $txtLatestComment = $this->GetControl($strControlId);     
        if (!$txtLatestComment) {
            $txtLatestComment = new QTextBox($this->dtgLatestKpi, $strControlId);
            $txtLatestComment->Text = ($objKpi->Comments != null)? $objKpi->Comments : ' ';
            $txtLatestComment->ActionParameter = $objKpi->Id;
            $txtLatestComment->Width = 130;
            $txtLatestComment->TextMode = QTextMode::MultiLine;
            $txtLatestComment->Height = 30;
            $txtLatestComment->Visible = false;
            $txtLatestComment->AddAction(new QMouseOutEvent(), new QAjaxAction('txtLatestKpiComment_MouseOut'));
        }
		$strLblControlId = 'lblLatestKpiComment' . $objKpi->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgLatestKpi, $strLblControlId);
        	$lblComment->DisplayStyle = QDisplayStyle::Block;
        	$lblComment->CssClass = 'tablecell';
        	$lblComment->Text = ($objKpi->Comments != null)? $objKpi->Comments : ' ';
        	$lblComment->Width = 130;
        	$lblComment->ActionParameter = $strControlId;
        	$lblComment->AddAction(new QMouseOverEvent(), new QAjaxAction('lblLatestKpiComment_Clicked'));
        }
        return ($txtLatestComment->Render(false) . $lblComment->Render(false));
	}
	
	public function lblLatestKpiComment_Clicked($strFormId, $strControlId, $strParameter) {
		$lblComment = $this->GetControl($strControlId);
		$lblComment->Visible = false;
		$txtComment = $this->GetControl($strParameter);
		$txtComment->Visible = true;
	}
	
	public function txtLatestKpiComment_MouseOut($strFormId, $strControlId, $strParameter) {
        $objKpi = Kpis::Load($strParameter);
        $txtComment = $this->GetControl($strControlId);
        $objKpi->Comments = $txtComment->Text;
        $objKpi->Save();
        $txtComment->Visible = false;
        $strLblControlId = 'lblLatestKpiComment' . $strParameter;
        $lblComment = $this->GetControl($strLblControlId);   
        $lblComment->Text = $txtComment->Text;
        $lblComment->Visible = true;
	}
	
	public function RenderLatestComments($objAction) {
		$strControlId = 'txtLatestComment' . $objAction->Id;
        $txtLatestComment = $this->GetControl($strControlId);     
        if (!$txtLatestComment) {
            $txtLatestComment = new QTextBox($this->dtgLatestAction, $strControlId);
            $txtLatestComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
            $txtLatestComment->ActionParameter = $objAction->Id;
            $txtLatestComment->Width = 130;
            $txtLatestComment->TextMode = QTextMode::MultiLine;
            $txtLatestComment->Height = 30;
            $txtLatestComment->Visible = false;
            $txtLatestComment->AddAction(new QMouseOutEvent(), new QAjaxAction('txtLatestComment_MouseOut'));
        }
		$strLblControlId = 'lblLatestComment' . $objAction->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgLatestAction, $strLblControlId);
        	$lblComment->DisplayStyle = QDisplayStyle::Block;
        	$lblComment->CssClass = 'tablecell';
        	$lblComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
        	$lblComment->Width = 130;
        	$lblComment->ActionParameter = $strControlId;
        	$lblComment->AddAction(new QMouseOverEvent(), new QAjaxAction('lblLatestComment_Clicked'));
        }
        return ($txtLatestComment->Render(false) . $lblComment->Render(false));
	}
	
	public function lblLatestComment_Clicked($strFormId, $strControlId, $strParameter) {
		$lblComment = $this->GetControl($strControlId);
		$lblComment->Visible = false;
		$txtComment = $this->GetControl($strParameter);
		$txtComment->Visible = true;
	}
	
	public function txtLatestComment_MouseOut($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $txtComment = $this->GetControl($strControlId);
        $objAction->Comments = $txtComment->Text;
        $objAction->Save();
        $txtComment->Visible = false;
        $strLblControlId = 'lblLatestComment' . $ActionId;
        $lblComment = $this->GetControl($strLblControlId);   
        $lblComment->Text = $txtComment->Text;
        $lblComment->Visible = true;
	}
	
	public function RenderUserComments($objAction) {
		$strControlId = 'txtUserComment' . $objAction->Id;
        $txtUserComment = $this->GetControl($strControlId);     
        if (!$txtUserComment) {
            $txtUserComment = new QTextBox($this->dtgUserActions, $strControlId);
            $txtUserComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
            $txtUserComment->ActionParameter = $objAction->Id;
            $txtUserComment->Width = 130;
            $txtUserComment->TextMode = QTextMode::MultiLine;
            $txtUserComment->Height = 30;
            $txtUserComment->Visible = false;
            $txtUserComment->AddAction(new QMouseOutEvent(), new QAjaxAction('txtUserComment_MouseOut'));
        }
		$strLblControlId = 'lblUserComment' . $objAction->Id;
        $lblComment = $this->GetControl($strLblControlId);     
        if (!$lblComment) {
        	$lblComment = new QLabel($this->dtgUserActions, $strLblControlId);
        	$lblComment->DisplayStyle = QDisplayStyle::Block;
        	$lblComment->CssClass = 'tablecell';
        	$lblComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
        	$lblComment->Width = 130;
        	$lblComment->ActionParameter = $strControlId;
        	$lblComment->AddAction(new QMouseOverEvent(), new QAjaxAction('lblUserComment_Clicked'));
        }
        return ($txtUserComment->Render(false) . $lblComment->Render(false));
	}
	
	public function lblUserComment_Clicked($strFormId, $strControlId, $strParameter) {
		$lblComment = $this->GetControl($strControlId);
		$lblComment->Visible = false;
		$txtComment = $this->GetControl($strParameter);
		$txtComment->Visible = true;
	}
	
	public function txtUserComment_MouseOut($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $txtComment = $this->GetControl($strControlId);
        $objAction->Comments = $txtComment->Text;
        $objAction->Save();
        $txtComment->Visible = false;
        $strLblControlId = 'lblUserComment' . $ActionId;
        $lblComment = $this->GetControl($strLblControlId);   
        $lblComment->Text = $txtComment->Text;
        $lblComment->Visible = true;
	}
	
	
	public function RenderLatestStatus($objAction) {
		$strControlId = 'lstLatestActionStatus' . $objAction->Id;
        $lstActionStatus = $this->GetControl($strControlId);     
        if (!$lstActionStatus) {
            $lstActionStatus = new QListBox($this->dtgLatestAction, $strControlId);  
            foreach(StatusType::$NameArray as $key=> $value) {
            	if($objAction->StatusType == $key) {
            		$lstActionStatus->AddItem($value, $key,true);
            	} else {
            		$lstActionStatus->AddItem($value, $key);
            	}		
            }           
            $lstActionStatus->ActionParameter = $objAction->Id;
            $lstActionStatus->Width = 60;
            $lstActionStatus->AddAction(new QChangeEvent(), new QAjaxAction('lstActionStatus_KeyPressed'));
        }
        return $lstActionStatus->Render(false);
	}
	
	public function RenderLatestRating($objKpi) {
		$strControlId = 'lstKpiRating' . $objKpi->Id;
        $lstKpiRating = $this->GetControl($strControlId);     
        if (!$lstKpiRating) {
            $lstKpiRating = new QListBox($this->dtgLatestKpi, $strControlId);  
            for($i=0; $i<6; $i++) {
            	if($objKpi->Rating == $i) {
            		$lstKpiRating->AddItem($i, $i,true);
            	} else {
            		$lstKpiRating->AddItem($i, $i);
            	}		
            }           
            $lstKpiRating->ActionParameter = $objKpi->Id;
            $lstKpiRating->Width = 60;
            $lstKpiRating->AddAction(new QChangeEvent(), new QAjaxAction('lstKpiRating_Change'));
        }
        return $lstKpiRating->Render(false);
	}
	
	public function lstKpiRating_Change($strFormId, $strControlId, $strParameter) {
        $objKpi = Kpis::Load($strParameter);
        $lstKpiRating = $this->GetControl($strControlId);
        $objKpi->Rating = $lstKpiRating->SelectedValue;
        $objKpi->Save();
	}
	
	public function RenderUserStatus($objAction) {
		$strControlId = 'lstActionStatus' . $objAction->Id;
        $lstActionStatus = $this->GetControl($strControlId);     
        if (!$lstActionStatus) {
            $lstActionStatus = new QListBox($this->dtgUserActions, $strControlId);  
            foreach(StatusType::$NameArray as $key=> $value) {
            	if($objAction->StatusType == $key) {
            		$lstActionStatus->AddItem($value, $key,true);
            	} else {
            		$lstActionStatus->AddItem($value, $key);
            	}		
            }           
            $lstActionStatus->ActionParameter = $objAction->Id;
            $lstActionStatus->Width = 60;
            $lstActionStatus->AddAction(new QChangeEvent(), new QAjaxAction('lstActionStatus_Change'));
        }
        return $lstActionStatus->Render(false);
	}
	
	public function lstActionStatus_Change($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $lstActionStatus = $this->GetControl($strControlId);
        $objAction->StatusType = $lstActionStatus->SelectedValue;
        $objAction->Save();
	}
	
	public function RenderLatestWhen($objAction) {
		$strControlId = 'latestWhen' . $objAction->Id;
        $dtxActionWhen = $this->GetControl($strControlId);   
        if (!$dtxActionWhen) {
        	$dtxActionWhen = new QDateTimeTextBox($this->dtgLatestAction);
        	$dtxActionWhen->ActionParameter = $objAction->Id;
			$dtxActionWhen->Name = 'When';
			$dtxActionWhen->Width = 80;
			$dtxActionWhen->Text = ($objAction->When) ? $objAction->When->__toString() : null;
			$calActionWhen = new QCalendar($this->dtgLatestAction, $dtxActionWhen);			
            $dtxActionWhen->AddAction(new QChangeEvent(), new QAjaxAction('dtxActionWhen_KeyPressed'));
        }
        $strReturn = $dtxActionWhen->Render(false) . $calActionWhen->Render(false);
        return $strReturn;
	}
	
	public function RenderWhen($objAction) {
		$strControlId = 'dtxActionWhen' . $objAction->Id;
        $dtxActionWhen = $this->GetControl($strControlId);   
        if (!$dtxActionWhen) {
        	$dtxActionWhen = new QDateTimeTextBox($this->dtgUnassigned);
        	$dtxActionWhen->ActionParameter = $objAction->Id;
			$dtxActionWhen->Name = 'When';
			$dtxActionWhen->Width = 80;
			$dtxActionWhen->Text = ($objAction->When) ? $objAction->When->__toString() : null;
			$calActionWhen = new QCalendar($this->dtgUnassigned, $dtxActionWhen);			
            $dtxActionWhen->AddAction(new QChangeEvent(), new QAjaxAction('dtxActionWhen_KeyPressed'));
        }
        $strReturn = $dtxActionWhen->Render(false) . $calActionWhen->Render(false);
        return $strReturn;
	}
	
	public function RenderUserWhen($objAction) {
		$strControlId = 'dtxUserWhen' . $objAction->Id;
        $dtxUserWhen = $this->GetControl($strControlId);   
        if (!$dtxUserWhen) {
        	$dtxUserWhen = new QDateTimeTextBox($this->dtgUserActions);
        	$dtxUserWhen->ActionParameter = $objAction->Id;
			$dtxUserWhen->Name = 'When';
			$dtxUserWhen->Width = 80;
			$dtxUserWhen->Text = ($objAction->When) ? $objAction->When->__toString() : null;
			$calUserWhen = new QCalendar($this->dtgUserActions, $dtxUserWhen);			
            $dtxUserWhen->AddAction(new QChangeEvent(), new QAjaxAction('dtxActionWhen_KeyPressed'));
        }
        $strReturn = $dtxUserWhen->Render(false) . $calUserWhen->Render(false);
        return $strReturn;
	}
	
	public function dtxActionWhen_KeyPressed($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;
        $objAction = ActionItems::Load($ActionId);
        $dtxActionWhen = $this->GetControl($strControlId);
        $objAction->When = $dtxActionWhen->DateTime;
        $objAction->Save();
	}
	
	public function RenderLatestKPI($objKpi) {
		$objStrategy = Strategy::Load($objKpi->StrategyId);
		$strControlId = 'txtLatestKpi' . $objKpi->Id;
        $txtKpiItem = $this->GetControl($strControlId);     
        if (!$txtKpiItem) {
            $txtKpiItem = new QTextBox($this->dtgLatestKpi, $strControlId);
            $txtKpiItem->Text = $objKpi->Kpi;
            $txtKpiItem->ActionParameter = $objKpi->Id;
            $txtKpiItem->Width = 300;
            $txtKpiItem->TextMode = QTextMode::MultiLine;
            $txtKpiItem->Height = 20;
            $txtKpiItem->AddAction(new QMouseOutEvent(), new QAjaxAction('txtLatestKpiItem_MouseOut'));
            $txtKpiItem->Visible = false;
        }
        
        $strLblControlId = 'lblLatestKpi' . $objKpi->Id;
        $lblKpiItem = $this->GetControl($strLblControlId);     
        if (!$lblKpiItem) {
        	$lblKpiItem = new QLabel($this->dtgLatestKpi, $strLblControlId);
        	$lblKpiItem->Text = $objKpi->Kpi;
        	$lblKpiItem->ActionParameter = $strControlId;
        	$lblKpiItem->AddAction(new QMouseOverEvent(), new QAjaxAction('lblLatestKpiItem_Clicked'));
        }
        return ($txtKpiItem->Render(false) .$lblKpiItem->Render(false));
	}
	
	public function lblLatestKpiItem_Clicked($strFormId, $strControlId, $strParameter) {
		$lblKpiItem = $this->GetControl($strControlId);
		$lblKpiItem->Visible = false;
		$txtKpiItem = $this->GetControl($strParameter);
		$txtKpiItem->Visible = true;
	}
	
	public function txtLatestKpiItem_MouseOut($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
        $txtKpi = $this->GetControl($strControlId);
        $objKpi = Kpis::Load($KpiId);
        $objKpi->Kpi = $txtKpi->Text;
        $objKpi->Save();
        $txtKpi->Visible = false;
        $strLblControlId = 'lblLatestKpi' . $objKpi->Id;
        $lblKpi = $this->GetControl($strLblControlId);
        $lblKpi->Text = $txtKpi->Text;
        $lblKpi->Visible = true;
	}
	
	public function RenderLatestAction($objAction) {
		$objStrategy = Strategy::Load($objAction->StrategyId);
		$strControlId = 'txtLatestAction' . $objAction->Id;
        $txtActionItem = $this->GetControl($strControlId);     
        if (!$txtActionItem) {
            $txtActionItem = new QTextBox($this->dtgLatestAction, $strControlId);
            $txtActionItem->Text = $objAction->Action;
            $txtActionItem->ActionParameter = $objAction->Id;
            $txtActionItem->Width = 300;
            $txtActionItem->TextMode = QTextMode::MultiLine;
            $txtActionItem->Height = 20;
            $txtActionItem->AddAction(new QMouseOutEvent(), new QAjaxAction('txtLatestActionItem_MouseOut'));
            $txtActionItem->Visible = false;
        }
        
        $strLblControlId = 'lblLatestAction' . $objAction->Id;
        $lstActionItem = $this->GetControl($strLblControlId);     
        if (!$lstActionItem) {
        	$lstActionItem = new QLabel($this->dtgLatestAction, $strLblControlId);
        	$lstActionItem->Text = $objAction->Action;
        	$lstActionItem->ActionParameter = $strControlId;
        	$lstActionItem->AddAction(new QMouseOverEvent(), new QAjaxAction('lblLatestActionItem_Clicked'));
        }
        return ($txtActionItem->Render(false) .$lstActionItem->Render(false));
	}
	
	public function lblLatestActionItem_Clicked($strFormId, $strControlId, $strParameter) {
		$lblActionItem = $this->GetControl($strControlId);
		$lblActionItem->Visible = false;
		$txtActionItem = $this->GetControl($strParameter);
		$txtActionItem->Visible = true;
	}
	
	public function txtLatestActionItem_MouseOut($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Action = $txtAction->Text;
        $objAction->Save();
        $txtAction->Visible = false;
        $strLblControlId = 'lblLatestAction' . $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);
        $lblAction->Text = $txtAction->Text;
        $lblAction->Visible = true;
	}
	
	public function RenderAction($objAction) {
		$objStrategy = Strategy::Load($objAction->StrategyId);
		$strControlId = 'txtAction' . $objAction->Id;
        $txtActionItem = $this->GetControl($strControlId);     
        if (!$txtActionItem) {
            $txtActionItem = new QTextBox($this->dtgUnassigned, $strControlId);
            $txtActionItem->Text = $objAction->Action;
            $txtActionItem->ActionParameter = $objAction->Id;
            $txtActionItem->Width = 450;
            $txtActionItem->TextMode = QTextMode::MultiLine;
            $txtActionItem->Height = 20;
            $txtActionItem->AddAction(new QMouseOutEvent(), new QAjaxAction('txtUnassignedActionItem_MouseOut'));
            $txtActionItem->Visible = false;
        }
        
        $strLblControlId = 'lblAction' . $objAction->Id;
        $lstActionItem = $this->GetControl($strLblControlId);     
        if (!$lstActionItem) {
        	$lstActionItem = new QLabel($this->dtgUnassigned, $strLblControlId);
        	$lstActionItem->Text = $objAction->Action;
        	$lstActionItem->ActionParameter = $strControlId;
        	$lstActionItem->AddAction(new QMouseOverEvent(), new QAjaxAction('lblActionItem_Clicked'));
        }
        return ($txtActionItem->Render(false) .$lstActionItem->Render(false));
	}
	
	public function lblActionItem_Clicked($strFormId, $strControlId, $strParameter) {
		$lblActionItem = $this->GetControl($strControlId);
		$lblActionItem->Visible = false;
		$txtActionItem = $this->GetControl($strParameter);
		$txtActionItem->Visible = true;
	}
	
	public function txtUnassignedActionItem_MouseOut($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Action = $txtAction->Text;
        $objAction->Save();
        $txtAction->Visible = false;
        $strLblControlId = 'lblAction' . $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);
        $lblAction->Text = $txtAction->Text;
        $lblAction->Visible = true;
	}
	
	public function RenderUserAction($objAction) {
		$strControlId = 'txtUserAction' . $objAction->Id;
		$objStrategy = Strategy::Load($objAction->StrategyId);
        $txtActionItem = $this->GetControl($strControlId);     
        if (!$txtActionItem) {
            $txtActionItem = new QTextBox($this->dtgUserActions, $strControlId);
            $txtActionItem->Text = $objAction->Action;
            $txtActionItem->ActionParameter = $objAction->Id;
            $txtActionItem->Width = 300;
            $txtActionItem->TextMode = QTextMode::MultiLine;
            $txtActionItem->Height = 20;
            $txtActionItem->AddAction(new QMouseOutEvent(), new QAjaxAction('txtUserActionItem_MouseOut'));
            $txtActionItem->Visible = false;
        }
		$strLblControlId = 'lblUserAction' . $objAction->Id;
        $lstActionItem = $this->GetControl($strLblControlId);     
        if (!$lstActionItem) {
        	$lstActionItem = new QLabel($this->dtgUserActions, $strLblControlId);
        	$lstActionItem->Text = $objAction->Action;
        	$lstActionItem->ActionParameter = $strControlId;
        	$lstActionItem->AddAction(new QMouseOverEvent(), new QAjaxAction('lblUserActionItem_Clicked'));
        }
        return ($txtActionItem->Render(false) . $lstActionItem->Render(false));
	}
	
	public function lblUserActionItem_Clicked($strFormId, $strControlId, $strParameter) {
		$lblActionItem = $this->GetControl($strControlId);
		$lblActionItem->Visible = false;
		$txtActionItem = $this->GetControl($strParameter);
		$txtActionItem->Visible = true;
	}
	
	public function txtUserActionItem_MouseOut($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Action = $txtAction->Text;
        $objAction->Save();
        $txtAction->Visible = false;
        $strLblControlId = 'lblUserAction' . $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);
        $lblAction->Text = $txtAction->Text;
        $lblAction->Visible = true;
	}

	public function RenderUserPriority($objAction) {
		$intPriority = ($objAction->Strategy->Priority!=null) ? $objAction->Strategy->Priority : 0;
		$strImgPriorityCtrl = 'imgPriority' .$objAction->Id; 
		$imgPriority = $this->GetControl($strImgPriorityCtrl);    
		if (!$imgPriority) {
			$imgPriority = new QImageControl($this->dtgUserActions,$strImgPriorityCtrl);
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
		}
		return $imgPriority->Render(false);
	}
	
	public function RenderLatestStrategy($objStrategy) {
		$strTxtControlId = 'txtLatestStrategy' . $objStrategy->Id;
        $txtLatestStrategy = $this->GetControl($strTxtControlId);     
        if (!$txtLatestStrategy) {
            $txtLatestStrategy = new QTextBox($this->dtgLatestStrategy, $strTxtControlId);
            $txtLatestStrategy->Text = $objStrategy->Strategy;
            $txtLatestStrategy->ActionParameter = $objStrategy->Id;
            $txtLatestStrategy->Width = 200;
            $txtLatestStrategy->Height = 100;
            $txtLatestStrategy->TextMode = QTextMode::MultiLine;
            $txtLatestStrategy->Visible = false;
            $txtLatestStrategy->AddAction(new QMouseOutEvent(), new QAjaxAction('txtLatestStrategy_MouseOut'));
        }
        $strControlId = 'lblLatestStrategy' . $objStrategy->Id;
        $lblLatestStrategy = $this->GetControl($strControlId);     
        if (!$lblLatestStrategy) {
        	$lblLatestStrategy = new QLabel($this->dtgLatestStrategy, $strControlId);
        	$lblLatestStrategy->Text = $objStrategy->Strategy;
        	$lblLatestStrategy->ActionParameter = $strTxtControlId;
            $lblLatestStrategy->Width = 400;
            $lblLatestStrategy->AddAction(new QMouseOverEvent(),new QAjaxAction('lblLatestStrategy_Clicked'));
        }
        return ($txtLatestStrategy->Render(false) . $lblLatestStrategy->Render(false));
	}
	
	public function lblLatestStrategy_Clicked($strFormId, $strControlId, $strParameter) {
		$lblLatestStrategy = $this->GetControl($strControlId); 
		$lblLatestStrategy->Visible = false;
		$txtLatestStrategy = $this->GetControl($strParameter); 
		$txtLatestStrategy->Visible = true;
	}
	
	public function txtLatestStrategy_MouseOut($strFormId, $strControlId, $strParameter) {
		$txtLatestStrategy = $this->GetControl($strControlId); 
		$objStrategy = Strategy::Load($strParameter);
		$objStrategy->Strategy = $txtLatestStrategy->Text;
		$objStrategy->Save();
		$txtLatestStrategy->Visible = false;
		$strLblControlId = 'lblLatestStrategy' . $objStrategy->Id;
		$lblLatestStrategy = $this->GetControl($strLblControlId);
		$lblLatestStrategy->Text = $txtLatestStrategy->Text;
		$lblLatestStrategy->Visible = true;
	}
	
	public function RenderLatestPriority($objStrategy) {
		$intPriority = ($objStrategy->Priority!=null) ? $objStrategy->Priority : 0;
		
		$strLstPriorityCtrl = 'lstLatestPriority' .$objStrategy->Id; 
		$lstPriority = $this->GetControl($strLstPriorityCtrl);    
		if (!$lstPriority) {
			$lstPriority = new QListBox($this->dtgLatestStrategy,$strLstPriorityCtrl);
			$lstPriority->AddItem('-No Priority-',0);
			$lstPriority->AddItem('Top',1);
			$lstPriority->AddItem('Medium',2);
			$lstPriority->AddItem('Low',3);
			$lstPriority->AddAction(new QChangeEvent(), new QAjaxAction('lstLatestPriority_Change'));
			$lstPriority->Visible = false;
			$lstPriority->ActionParameter = $objStrategy->Id;
			$lstPriority->SelectedValue = $intPriority;
			$lstPriority->Width = 60;
		}		
		$strImgPriorityCtrl = 'imgLatestPriority' .$objStrategy->Id; 
		$imgPriority = $this->GetControl($strImgPriorityCtrl);    
		if (!$imgPriority) {
			$imgPriority = new QImageControl($this->dtgLatestStrategy,$strImgPriorityCtrl);
			$imgPriority->CssClass = 'priority-'.$intPriority;
			$imgPriority->Width = 25;
			$imgPriority->Height = 25;
			$imgPriority->ActionParameter = $strLstPriorityCtrl;
			$imgPriority->AddAction(new QMouseOverEvent(), new QAjaxAction('imgLatestPriority_Clicked'));
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
		}
		
		return ($imgPriority->Render(false) . $lstPriority->render(false));
	}
	
	public function imgLatestPriority_Clicked($strFormId, $strControlId, $strParameter) {
		$imgLatestPriority = $this->GetControl($strControlId); 
		$imgLatestPriority->Visible = false;
		$lstLatestPriority = $this->GetControl($strParameter); 
		$lstLatestPriority->Visible = true;
	}
	
	public function lstLatestPriority_Change($strFormId, $strControlId, $strParameter) {
		$lstLatestPriority = $this->GetControl($strControlId); 
		$objStrategy = Strategy::Load($strParameter);
		$objStrategy->Priority = $lstLatestPriority->SelectedValue;
		$objStrategy->Save();
		$lstLatestPriority->Visible = false;
		$strImgControlId = 'imgLatestPriority' . $objStrategy->Id;
		$imgLatestPriority = $this->GetControl($strImgControlId);	
		switch ($lstLatestPriority->SelectedValue) {
				case 0:
					$imgLatestPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-0.png'; 
					break;
				case 1:
					$imgLatestPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-1.png';
					break;
				case 2:
					$imgLatestPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-2.png';
					break;
				case 3:
					$imgLatestPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-3.png';
					break;
				default:
					$imgLatestPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-0.png'; 
					break;				
			}	
		$imgLatestPriority->Visible = true; 
	}
	
	public function RenderLatestModifiedBy($intUserId) {
		$objUser = User::Load($intUserId);
		return $objUser->FirstName . ' ' . $objUser->LastName;
	}
}

ToolslForm::Run('ToolslForm');
?>