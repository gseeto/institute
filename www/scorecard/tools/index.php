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
	protected $intUserId;
	protected $lblDebug;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		$userArray = QApplication::$Login->GetUserArray();
		$this->intUserId = $userArray[0]->Id;
		
		$this->chkUnassignedAction = new QCheckBox($this);
		$this->chkUnassignedAction->Text = 'Unassigned Action Items';
		$this->chkUnassignedAction->AddAction(new QChangeEvent(), new QAjaxAction('dtgUnassigned_Refresh'));
		
		$this->chkUndatedAction = new QCheckBox($this);
		$this->chkUndatedAction->Text = 'Action Items without a \'Complete By\' date';
		$this->chkUndatedAction->AddAction(new QChangeEvent(), new QAjaxAction('dtgUnassigned_Refresh'));
		
		$this->dtgUnassigned = new ActionItemsDataGrid($this);
		$this->dtgUnassigned->Paginator = new QPaginator($this->dtgUnassigned);
		$this->dtgUnassigned->MetaAddTypeColumn('CategoryId','CategoryType');
		$this->dtgUnassigned->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=10px' ));
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
        $objStyle->BackColor = '#0098c3'; 	        
        $objStyle = $this->dtgUnassigned->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
		
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
        $this->dtgUserActions->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderUserStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=10px' ));
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
        $objStyle->BackColor = '#0098c3'; 	        
        $objStyle = $this->dtgUserActions->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
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
		$this->dtgLatestStrategy->AddColumn(new QDataGridColumn('Strategy', '<?= $_FORM->RenderLatestStrategy($_ITEM) ?>', 'HtmlEntities=false', 'Width=500px' ));
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
        $objStyle->BackColor = '#0098c3'; 	        
        $objStyle = $this->dtgLatestStrategy->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
		$this->dtgLatestAction = new ActionItemsDataGrid($this);
		$this->dtgLatestAction->Paginator = new QPaginator($this->dtgLatestAction);
		$this->dtgLatestAction->MetaAddTypeColumn('CategoryId','CategoryType');	
        $this->dtgLatestAction->AddColumn(new QDataGridColumn('Strategy Index', '<?= $_FORM->RenderLatestStrategyId($_ITEM) ?>', 'HtmlEntities=false', 'Width=10px' ));
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
        $objStyle->BackColor = '#0098c3'; 	        
        $objStyle = $this->dtgLatestAction->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
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
        $objStyle->BackColor = '#0098c3'; 	        
        $objStyle = $this->dtgLatestKpi->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
	}

	public function dtgLatestKpi_Bind() {
		$objConditions = QQ::All(); 
		$objClauses = array();
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Kpis()->ScorecardId, $this->objScorecard->Id)
			);
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
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::ActionItems()->ScorecardId, (int)$this->objScorecard->Id)
			);
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

		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->ScorecardId, (int)$this->objScorecard->Id)
			);
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
	
	public function RenderStrategyId($objAction) {
		if($objAction->Strategy) {
			return $objAction->Strategy->Count;
		} else {
			return "N/A";
		}
	}
	public function RenderUserStrategyId($objAction) {
		if($objAction->Strategy) {
			return $objAction->Strategy->Count;
		} else {
			return "N/A";
		}
	}
	public function RenderLatestStrategyId($objAction) {
		if($objAction->Strategy) {
			return $objAction->Strategy->Count;
		} else {
			return "N/A";
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
		if(($this->intUserId != $lstActionWho->SelectedValue) && ($lstActionWho->SelectedValue !=0)) {
        	// notify someone if they have something assigned to them by somebody else
        	$this->NotifyUser($lstActionWho->SelectedValue,$ActionId);
        }
	}

	function NotifyUser($userId, $actionId) {
		$objUser = User::Load($userId);
		$objAction = ActionItems::Load($actionId);
		if(($objUser)&&($objUser->Email != null)) {
			$strategy = $objAction->Strategy->Strategy;
			$action = $objAction->Action;
			$due = ($objAction->When!=null)?$objAction->When->__toString() : '';
			$objMessage = new QEmailMessage();
			//QEmailServer::$TestMode = true;
			//QEmailServer::$TestModeDirectory = '/tmp/';
			QEmailServer::$SmtpServer = MAIL_SERVER;
			QEmailServer::$AuthLogin = false;
			//QEmailServer::$SmtpPassword = 'lASgZ357lk';
			//QEmailServer::$SmtpPort = 2525;
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
	
	public function RenderLatestKpiComments($objKpi) {
		$strControlId = 'txtLatestKpiComment' . $objKpi->Id;
        $txtLatestComment = $this->GetControl($strControlId);     
        if (!$txtLatestComment) {
            $txtLatestComment = new QTextBox($this->dtgLatestKpi, $strControlId);
            $txtLatestComment->Text = ($objKpi->Comments != null)? $objKpi->Comments : ' ';
            $txtLatestComment->ActionParameter = $objKpi->Id;
            $txtLatestComment->Width = 400;
            $txtLatestComment->TextMode = QTextMode::MultiLine;
            $txtLatestComment->Height = 30;
            $txtLatestComment->Display = false;
        }
        $strActionSave = 'btnLatestKpiCommentSave' . $objKpi->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgLatestKpi,$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objKpi->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveLatestKpiComment_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnLatestKpiCommentCancel' . $objKpi->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgLatestKpi,$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objKpi->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelLatestKpiComment_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditLatestKpiComment' . $objKpi->Id;
        $strLblControlId = 'lblLatestKpiComment' .  $objKpi->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgLatestKpi,$strLblControlId);
        	$lblAction->Text = ($objKpi->Comments != null)? $objKpi->Comments : '<span style="color:#aaaaaa;">Add a Comment</span>';
        	$lblAction->ActionParameter = $objKpi->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 400;
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '5px 15px';
        	$lblAction->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin:10px; cursor:pointer; position:relative; top:5px; left:2px;" src="/assets/images/icons/page_edit.png" />';
        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblLatestKpiComment_Clicked(this)'));	
        }
        return ($txtLatestComment->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	public function btnSaveLatestKpiComment_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtLatestKpiComment' . $KpiId;
        $txtKpiComment = $this->GetControl($strControlId);
        $objKpi = Kpis::Load($KpiId);
        $objKpi->Comments = $txtKpiComment->Text;
        $objKpi->ModifiedBy = $this->intUserId;
        $objKpi->Save();
        $txtKpiComment->Display = false;
        
        $strActionSave = 'btnLatestKpiCommentSave' . $KpiId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnLatestKpiCommentCancel' . $KpiId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblLatestKpiComment' .  $objKpi->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtKpiComment->Text;
        $lblAction->Display = true;
	}
	
	
	public function RenderLatestComments($objAction) {
		$strControlId = 'txtLatestComment' . $objAction->Id;
        $txtLatestComment = $this->GetControl($strControlId);     
        if (!$txtLatestComment) {
            $txtLatestComment = new QTextBox($this->dtgLatestAction, $strControlId);
            $txtLatestComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
            $txtLatestComment->ActionParameter = $objAction->Id;
            $txtLatestComment->Width = 200;
            $txtLatestComment->TextMode = QTextMode::MultiLine;
            $txtLatestComment->Height = 50;
            $txtLatestComment->Display = false;
        }
        $strActionSave = 'btnLatestCommentSave' . $objAction->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgLatestAction,$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objAction->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveLatestComment_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnLatestCommentCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgLatestAction,$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelLatestComment_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditLatestComment' . $objAction->Id;
        $strLblControlId = 'lblLatestComment' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgLatestAction,$strLblControlId);
        	$lblAction->Text = ($objAction->Comments != null)? $objAction->Comments : '<span style="color:#aaaaaa;">Add a comment</span>';
        	$lblAction->ActionParameter = $objAction->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 200;
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '5px 15px';
        	$lblAction->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin:10px; cursor:pointer; position:relative; top:5px; left:2px;" src="/assets/images/icons/page_edit.png" />';
        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblLatestComment_Clicked(this)'));	
        }
        return ($txtLatestComment->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	public function btnSaveLatestComment_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtLatestComment' . $ActionId;
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Comments = $txtAction->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtAction->Display = false;
        
        $strActionSave = 'btnLatestCommentSave' . $ActionId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnLatestCommentCancel' . $ActionId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblLatestComment' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtAction->Text;
        $lblAction->Display = true;
	}
	
	public function RenderUserComments($objAction) {
		$strControlId = 'txtUserComment' . $objAction->Id;
        $txtUserComment = $this->GetControl($strControlId);     
        if (!$txtUserComment) {
            $txtUserComment = new QTextBox($this->dtgUserActions, $strControlId);
            $txtUserComment->Text = ($objAction->Comments != null)? $objAction->Comments : ' ';
            $txtUserComment->ActionParameter = $objAction->Id;
            $txtUserComment->Width = 200;
            $txtUserComment->TextMode = QTextMode::MultiLine;
            $txtUserComment->Height = 50;
            $txtUserComment->Display = false;
        }
        $strActionSave = 'btnUserCommentSave' . $objAction->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgUserActions,$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objAction->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveUserComment_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnUserCommentCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgUserActions,$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelUserComment_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditUserComment' . $objAction->Id;
        $strLblControlId = 'lblUserComment' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgUserActions,$strLblControlId);
        	$lblAction->Text = ($objAction->Comments != null)? $objAction->Comments : '<span style="color:#aaaaaa;">Add a comment</span>';
        	$lblAction->ActionParameter = $objAction->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 200;
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '5px 15px';
        	$lblAction->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin:10px; cursor:pointer; position:relative; top:5px; left:2px;" src="/assets/images/icons/page_edit.png" />';
        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblUserComment_Clicked(this)'));	
        }
        return ($txtUserComment->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	public function btnSaveUserComment_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtUserComment' . $ActionId;
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Comments = $txtAction->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtAction->Display = false;
        
        $strActionSave = 'btnUserCommentSave' . $ActionId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnUserCommentCancel' . $ActionId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblUserComment' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtAction->Text;
        $lblAction->Display = true;
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
            $txtKpiItem->Height = 50;
            $txtKpiItem->Display = false;
        }
        $strActionSave = 'btnLatestKpiSave' . $objKpi->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgLatestKpi,$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objKpi->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveLatestKpi_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnLatestKpiCancel' . $objKpi->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgLatestKpi,$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objKpi->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelLatestKpi_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditLatestKpi' . $objKpi->Id;
        $strLblControlId = 'lblLatestKpi' .  $objKpi->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgLatestKpi,$strLblControlId);
        	$lblAction->Text = ($objKpi->Kpi != null)? $objKpi->Kpi : '<span style="color:#aaaaaa;">Add a KPI</span>';
        	$lblAction->ActionParameter = $objKpi->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 400;
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '5px 15px';
        	$lblAction->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin:10px; cursor:pointer; position:relative; top:5px; left:2px;" src="/assets/images/icons/page_edit.png" />';
        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblLatestKpi_Clicked(this)'));	
        }
        return ($txtKpiItem->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	public function btnSaveLatestKpi_Click($strFormId, $strControlId, $strParameter) {
		$KpiId = $strParameter;	
		$strControlId = 'txtLatestKpi' . $KpiId;
        $txtKpi = $this->GetControl($strControlId);
        $objKpi = Kpis::Load($KpiId);
        $objKpi->Kpi = $txtKpi->Text;
        $objKpi->ModifiedBy = $this->intUserId;
        $objKpi->Save();
        $txtKpi->Display = false;
        
        $strActionSave = 'btnLatestKpiSave' . $KpiId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnLatestKpiCancel' . $KpiId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblLatestKpi' .  $objKpi->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtKpi->Text;
        $lblAction->Display = true;
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
            $txtActionItem->Height = 50;
            $txtActionItem->Display = false;
        }
        $strActionSave = 'btnLatestActionSave' . $objAction->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgLatestAction,$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objAction->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveLatestAction_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnLatestActionCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgLatestAction,$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelLatestAction_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditLatestAction' . $objAction->Id;
        $strLblControlId = 'lblLatestAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgLatestAction,$strLblControlId);
        	$lblAction->Text = ($objAction->Action != null)? $objAction->Action : '<span style="color:#aaaaaa;">Add an action</span>';
        	$lblAction->ActionParameter = $objAction->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 400;
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '5px 15px';
        	$lblAction->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin:10px; cursor:pointer; position:relative; top:5px; left:2px;" src="/assets/images/icons/page_edit.png" />';
        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblLatestAction_Clicked(this)'));	
        }
        return ($txtActionItem->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	public function btnSaveLatestAction_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtLatestAction' . $ActionId;
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Action = $txtAction->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtAction->Display = false;
        
        $strActionSave = 'btnLatestActionSave' . $ActionId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnLatestActionCancel' . $ActionId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblLatestAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtAction->Text;
        $lblAction->Display = true;
	}
	
	public function RenderAction($objAction) {
		$objStrategy = Strategy::Load($objAction->StrategyId);
		$strControlId = 'txtAction' . $objAction->Id;
		$txtActionItem = $this->GetControl($strControlId);     
        if (!$txtActionItem) {
            $txtActionItem = new QTextBox($this->dtgUnassigned, $strControlId);
            $txtActionItem->Text = $objAction->Action;
            $txtActionItem->ActionParameter = $objAction->Id;
            $txtActionItem->Width = 400;
            $txtActionItem->TextMode = QTextMode::MultiLine;
            $txtActionItem->Height = 50;
            $txtActionItem->Display = false;
        }
        $strActionSave = 'btnActionSave' . $objAction->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgUnassigned,$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objAction->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveAction_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnActionCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgUnassigned,$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelAction_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditAction' . $objAction->Id;
        $strLblControlId = 'lblAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgUnassigned,$strLblControlId);
        	$lblAction->Text = ($objAction->Action != null)? $objAction->Action : '<span style="color:#aaaaaa;">Add an action</span>';
        	$lblAction->ActionParameter = $objAction->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 400;
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '5px 15px';
        	$lblAction->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin:10px; cursor:pointer; position:relative; top:5px; left:2px;" src="/assets/images/icons/page_edit.png" />';
        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblAction_Clicked(this)'));	
        }
        return ($txtActionItem->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	public function btnSaveAction_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtAction' . $ActionId;
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Action = $txtAction->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtAction->Display = false;
        
        $strActionSave = 'btnActionSave' . $ActionId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnActionCancel' . $ActionId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtAction->Text;
        $lblAction->Display = true;
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
            $txtActionItem->Height = 50;
            $txtActionItem->Display = false;
        }
        $strActionSave = 'btnUserActionSave' . $objAction->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgUserActions,$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objAction->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveUserAction_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnUserActionCancel' . $objAction->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgUserActions,$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objAction->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelUserAction_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditUserAction' . $objAction->Id;
        $strLblControlId = 'lblUserAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgUserActions,$strLblControlId);
        	$lblAction->Text = $objAction->Action;
        	$lblAction->ActionParameter = $objAction->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 400;
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '5px 15px';
        	$lblAction->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin:10px; cursor:pointer; position:relative; top:5px; left:2px;" src="/assets/images/icons/page_edit.png" />';
        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblUserAction_Clicked(this)'));	
        }
        return ($txtActionItem->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	public function btnSaveUserAction_Click($strFormId, $strControlId, $strParameter) {
		$ActionId = $strParameter;	
		$strControlId = 'txtUserAction' . $ActionId;
        $txtAction = $this->GetControl($strControlId);
        $objAction = ActionItems::Load($ActionId);
        $objAction->Action = $txtAction->Text;
        $objAction->ModifiedBy = $this->intUserId;
        $objAction->Save();
        $txtAction->Display = false;
        
        $strActionSave = 'btnUserActionSave' . $ActionId;
        $btnSave = $this->GetControl($strActionSave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnUserActionCancel' . $ActionId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblUserAction' .  $objAction->Id;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtAction->Text;
        $lblAction->Display = true;
	}
	
	public function RenderUserPriority($objAction) {
		$strImgPriorityCtrl = 'imgPriority' .$objAction->Id; 
		$imgPriority = $this->GetControl($strImgPriorityCtrl);    
		if (!$imgPriority) {
			$imgPriority = new QImageControl($this->dtgUserActions,$strImgPriorityCtrl);
			$imgPriority->Width = 25;
			$imgPriority->Height = 25;
		}
		
		if ($objAction->Strategy) {
			$intPriority = ($objAction->Strategy->Priority!=null) ? $objAction->Strategy->Priority : 0;
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
			$imgPriority->CssClass = 'priority-'.$intPriority;	
		} else {
			$imgPriority->ImagePath = dirname(__FILE__) .'/../../assets/images/priority-0.png';
			$imgPriority->CssClass = 'priority-0';
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
            $txtLatestStrategy->Width = 450;
            $txtLatestStrategy->Height = 100;
            $txtLatestStrategy->TextMode = QTextMode::MultiLine;
            $txtLatestStrategy->Display = false;
        }
        $strActionSave = 'btnLatestStrategySave' . $objStrategy->Id;
        $btnSave = $this->GetControl($strActionSave); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgLatestStrategy,$strActionSave);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objStrategy->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveLatestStrategy_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $strActionCancel = 'btnLatestStrategyCancel' . $objStrategy->Id;
        $btnCancel = $this->GetControl($strActionCancel); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgLatestStrategy,$strActionCancel);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objStrategy->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelLatestStrategy_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
		$strImgEdit = 'imgEditLatestStrategy' . $objStrategy->Id;
        $strLblControlId = 'lblLatestStrategy' .  $objStrategy->Id;
        $lblAction = $this->GetControl($strLblControlId);     
        if (!$lblAction) {
        	$lblAction = new QLabel($this->dtgLatestStrategy,$strLblControlId);
        	$lblAction->Text = ($objStrategy->Strategy != null)? $objStrategy->Strategy : '<span style="color:#aaaaaa;">Add a Strategy</span>';
        	$lblAction->ActionParameter = $objStrategy->Id;
        	$lblAction->Cursor = 'pointer';
        	$lblAction->Width = 400;
        	$lblAction->HtmlEntities = false;
        	$lblAction->Padding = '5px 15px';
        	$lblAction->HtmlBefore = '<img id="'.$strImgEdit.'" style="display:inline; margin:10px; cursor:pointer; position:relative; top:5px; left:2px;" src="/assets/images/icons/page_edit.png" />';
        	
  			$lblAction->AddAction(new QClickEvent(), new QJavaScriptAction('lblLatestStrategy_Clicked(this)'));	
        }
        return ($txtLatestStrategy->Render(false). $btnSave->Render(false). $btnCancel->Render(false) . $lblAction->RenderWithName(false));
	}
	
	public function btnSaveLatestStrategy_Click($strFormId, $strControlId, $strParameter) {
		$StrategyId = $strParameter;	
		$strControlId = 'txtLatestStrategy' . $StrategyId;
        $txtStrategy = $this->GetControl($strControlId);
        $objStrategy = Strategy::Load($StrategyId);
        $objStrategy->Strategy = $txtStrategy->Text;
        $objStrategy->ModifiedBy = $this->intUserId;
        $objStrategy->Save();
        $txtStrategy->Display = false;
        
        $strStrategySave = 'btnLatestStrategySave' . $StrategyId;
        $btnSave = $this->GetControl($strStrategySave); 
        $btnSave->Display = false;
        $strActionCancel = 'btnLatestStrategyCancel' . $StrategyId;
        $btnCancel = $this->GetControl($strActionCancel); 
        $btnCancel->Display = false;
        
        $strLblControlId = 'lblLatestStrategy' . $StrategyId;
        $lblAction = $this->GetControl($strLblControlId); 
        $lblAction->Text = $txtStrategy->Text;
        $lblAction->Display = true;
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