<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class MyViewForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardView;
	protected $objScorecard;
	protected $dtgTopActions;
	protected $dtgRecurringActions;
	protected $objUser;
	protected $btnAddAction;
	protected $btnRemoveAction;
	protected $dtgAddAction;
	protected $dtgRemoveAction;
	protected $btnSubmit;
	protected $selectedActionArray;
	protected $bSelectAdd;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		$this->objUser = User::Load($intUserId);
		$this->dtgTopActions = new QDataGrid($this);
		$this->dtgTopActions->AddColumn(new QDataGridColumn('Rank', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgTopActions->AddColumn(new QDataGridColumn('Strategy and Action', '<?= $_FORM->RenderStrategyAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=850px' ));
        $this->dtgTopActions->SetDataBinder('dtgTopActions_Bind');	
        $this->dtgTopActions->CellPadding = 4;
		$this->dtgTopActions->NoDataHtml = '';
		$this->dtgTopActions->UseAjax = true;
		$this->dtgTopActions->GridLines = 'both';	
		
		$this->dtgRecurringActions = new QDataGrid($this);
		$this->dtgRecurringActions->AddColumn(new QDataGridColumn('Rank', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgRecurringActions->AddColumn(new QDataGridColumn('Strategy and Action', '<?= $_FORM->RenderStrategyAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=850px' ));
        $this->dtgRecurringActions->SetDataBinder('dtgRecurringActions_Bind');	
        $this->dtgRecurringActions->CellPadding = 4;
		$this->dtgRecurringActions->NoDataHtml = '';
		$this->dtgRecurringActions->UseAjax = true;
		$this->dtgRecurringActions->GridLines = 'both';	
		
		$this->selectedActionArray = array();
		$this->bSelectAdd = true;
		$this->btnAddAction = new QButton($this);
		$this->btnAddAction->Name = 'Add an Action Item to my list';
		$this->btnAddAction->Text = 'Add an Action Item to my list';
		$this->btnAddAction->CssClass = 'primary';
		$this->btnAddAction->AddAction(new QClickEvent(), new QAjaxAction('btnAddAction_Clicked'));
		
		$this->btnRemoveAction = new QButton($this);
		$this->btnRemoveAction->Name = 'Remove an Action Item to my list';
		$this->btnRemoveAction->Text = 'Remove an Action Item to my list';
		$this->btnRemoveAction->CssClass = 'primary';
		$this->btnRemoveAction->AddAction(new QClickEvent(), new QAjaxAction('btnRemoveAction_Clicked'));
		
		$this->dtgAddAction = new QDataGrid($this);
		$this->dtgAddAction->AddColumn(new QDataGridColumn('P', '<?= $_FORM->RenderP($_ITEM) ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgAddAction->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RenderAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=800px' ));
        $this->dtgAddAction->AddColumn(new QDataGridColumn('Select', '<?= $_FORM->RenderSelectAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgAddAction->SetDataBinder('dtgAddAction_Bind');	
        $this->dtgAddAction->CellPadding = 4;
		$this->dtgAddAction->NoDataHtml = '';
		$this->dtgAddAction->UseAjax = true;
		$this->dtgAddAction->GridLines = 'both';
		$this->dtgAddAction->Visible = false;
		$this->dtgAddAction->HtmlBefore = "<b>Actions to add to my task list:</b>";	
		
		$this->dtgRemoveAction = new QDataGrid($this);
		$this->dtgRemoveAction->AddColumn(new QDataGridColumn('P', '<?= $_FORM->RenderP($_ITEM) ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgRemoveAction->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RenderAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=800px' ));
        $this->dtgRemoveAction->AddColumn(new QDataGridColumn('Select', '<?= $_FORM->RenderRemoveSelectAction($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgRemoveAction->SetDataBinder('dtgRemoveAction_Bind');	
        $this->dtgRemoveAction->CellPadding = 4;
		$this->dtgRemoveAction->NoDataHtml = '';
		$this->dtgRemoveAction->UseAjax = true;
		$this->dtgRemoveAction->GridLines = 'both';
		$this->dtgRemoveAction->Visible = false;
		$this->dtgRemoveAction->HtmlBefore = "<b>Actions to remove from my task list:</b>";
		
		$this->btnSubmit = new QButton($this);
		$this->btnSubmit->Name = 'Submit';
		$this->btnSubmit->Text = 'Submit';
		$this->btnSubmit->CssClass = 'primary';
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Clicked'));
		$this->btnSubmit->Visible = false;
	}

	public function RenderP(ActionItems $objItem) {
		return CategoryType::ToString($objItem->CategoryId);
	}
	
	public function RenderAction(ActionItems $objItem) {
		return ($objItem->Action);
	}
	
	public function RenderSelectAction(ActionItems $objItem) { 
     	$strControlId = 'chkAddSelected' . $objItem->Id;
     	
        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgAddAction, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $objItem->Id;
            $chkSelected->AddAction(new QClickEvent(), new QAjaxAction('chkSelected_Click'));
        }
        return $chkSelected->Render(false);	            	    
	}

	public function RenderRemoveSelectAction(ActionItems $objItem) { 
     	$strControlId = 'chkRemoveSelected' . $objItem->Id;

        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgRemoveAction, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $objItem->Id;
            $chkSelected->AddAction(new QClickEvent(), new QAjaxAction('chkSelected_Click'));
        }
        return $chkSelected->Render(false);	            	    
	}
	
	public function chkSelected_Click($strFormId, $strControlId, $strParameter) {
			$intActionId = $strParameter;
			if ($this->GetControl($strControlId)->Checked) {
				if ((!$this->selectedActionArray) ||(!in_array ($intActionId, $this->selectedActionArray)))
					$this->selectedActionArray[] = $intActionId;
			} else {
				$key = array_search($intActionId, $this->selectedActionArray);
				unset($this->selectedActionArray[$key]);
			}
    	}
    	
    	protected function dtgRemoveAction_Bind() { 	
  		$count = 0;
		$objMyActions = array();
		$objCondition = QQ::Equal(QQN::ActionItems()->ScorecardId, $this->objScorecard->Id);
		$objCondition = QQ::AndCondition($objCondition,QQ::IsNotNull(QQN::ActionItems()->Rank));
		$objActionRankedArray = ActionItems::QueryArray($objCondition);
		foreach($objActionRankedArray as $objActionItem) {
			if(($objActionItem->Who == $this->objUser->Id)&& ($objActionItem->Rank == true)) {
				$objMyActions[] = $objActionItem;
				$count++;
				if($count >4) break;
			}
		}
		if($count <5) {
	  		$objOptionalClauses = QQ::OrderBy(QQN::ActionItems()->Strategy->Priority,false);
			$objActionItemArray = $this->objScorecard->GetActionItemsArray($objOptionalClauses);
			
			foreach($objActionItemArray as $objActionItem) {
				if($count >4) break;
				if($objActionItem->Who == $this->objUser->Id) {
					// Populate top 5 Actions Array
					if($objActionItem->Strategy) {
						if(($objActionItem->StatusType != StatusType::_100)&& ($objActionItem->StatusType != StatusType::Recurring)&& 
							($objActionItem->Strategy->Priority != null) && ($objActionItem->Rank != false) && ($objActionItem->Rank != true)) {
							$objMyActions[] = $objActionItem;
							$count++;
						}
					}
				}
			}
		}
            $this->dtgRemoveAction->DataSource = $objMyActions;
        }     
        
	protected function dtgAddAction_Bind() { 	
  		$objOptionalClauses = QQ::OrderBy(QQN::ActionItems()->Strategy->Priority,false);
		$objActionItemArray = $this->objScorecard->GetActionItemsArray($objOptionalClauses);
		$objMyActions = array();
		foreach($objActionItemArray as $objActionItem) {
				if(($objActionItem->Who == $this->objUser->Id)&&($objActionItem->Rank != true)&&
					($objActionItem->StatusType != StatusType::_100)) {
					// Populate Actions Array
					$objMyActions[] = $objActionItem;
				}
			}
            $this->dtgAddAction->DataSource = $objMyActions;
        }     
        
	public function btnAddAction_Clicked($strFormId, $strControlId, $strParameter) {
		// Display selection dialog
		$this->dtgAddAction->Visible = true;
		$this->btnSubmit->Visible = true;
		$this->dtgRemoveAction->Visible = false;
		unset($this->selectedActionArray);
		$this->bSelectAdd = true;
    }
    
	public function btnRemoveAction_Clicked($strFormId, $strControlId, $strParameter) {
		// Display selection dialog
		$this->dtgRemoveAction->Visible = true;
		$this->btnSubmit->Visible = true;
		$this->dtgAddAction->Visible = false;
		unset($this->selectedActionArray);
		$this->bSelectAdd = false;
    }
    
    public function btnSubmit_Clicked($strFormId, $strControlId, $strParameter) {
		// Hide selection dialog
		$this->dtgAddAction->Visible = false;
		$this->dtgRemoveAction->Visible = false;
		$this->btnSubmit->Visible = false;
		if($this->selectedActionArray) {
			foreach($this->selectedActionArray as $intActionId) {
				$objAction = ActionItems::Load($intActionId);
				if($this->bSelectAdd)
					$objAction->Rank = true;
				else 
					$objAction->Rank = false;
				$objAction->Save();
			}
			$this->dtgTopActions->Refresh();
		}
    }
    
	public function RenderStrategyAction($objItem) {
		return $objItem;
	}
	
	protected function dtgRecurringActions_Bind() { 	
  		$objOptionalClauses = QQ::OrderBy(QQN::ActionItems()->Strategy->Priority,false);
		$objActionItemArray = $this->objScorecard->GetActionItemsArray($objOptionalClauses);
		$objRecurring = array();
		foreach($objActionItemArray as $objActionItem) {
				if($objActionItem->Who == $this->objUser->Id) {
					// Populate Recurring Actions Array
					//	$objScorecard->Name,$objActionItem->Strategy->Strategy,$objActionItem->Action);
					if($objActionItem->StatusType == StatusType::Recurring) {
						$objRecurring[] = sprintf("<b>Strategy: </b> %s<br><br><b>Action: </b><a href='%s/scorecard/tenp/index.php/%d/%d/%d' >%s</a>",
							$objActionItem->Strategy->Strategy,
							__SUBDIRECTORY__,
							$objActionItem->ScorecardId, $objActionItem->CategoryId,$objActionItem->Id,
							$objActionItem->Action
							);
					}
				}
			}
            $this->dtgRecurringActions->DataSource = $objRecurring;
        }     
        
	protected function dtgTopActions_Bind() { 	
		$count = 0;
		$objTopFive = array();
		$objCondition = QQ::Equal(QQN::ActionItems()->ScorecardId, $this->objScorecard->Id);
		$objCondition = QQ::AndCondition($objCondition,QQ::IsNotNull(QQN::ActionItems()->Rank));
		$objCondition = QQ::AndCondition($objCondition,QQ::NotEqual(QQN::ActionItems()->StatusType,StatusType::_100));
		$objActionRankedArray = ActionItems::QueryArray($objCondition);
		foreach($objActionRankedArray as $objActionItem) {
			if(($objActionItem->Who == $this->objUser->Id)&& ($objActionItem->Rank == true)) {
				$objTopFive[] = sprintf("<b>Strategy: </b> %s<br><br><b>Action: </b><a href='%s/scorecard/tenp/index.php/%d/%d/%d' >%s</a>",
							$objActionItem->Strategy->Strategy,
							__SUBDIRECTORY__,
							$objActionItem->ScorecardId, $objActionItem->CategoryId,$objActionItem->Id,
							$objActionItem->Action
							);
				$count++;
				if($count >4) break;
			}
		}
		if($count <=4) {
	  		$objOptionalClauses = QQ::OrderBy(QQN::ActionItems()->Strategy->Priority,false);
			$objActionItemArray = $this->objScorecard->GetActionItemsArray($objOptionalClauses);
			
			foreach($objActionItemArray as $objActionItem) {
					if($objActionItem->Who == $this->objUser->Id) {
						// Populate remaining top 5 Actions Array
						//	$objScorecard->Name,$objActionItem->Strategy->Strategy,$objActionItem->Action);
						if($objActionItem->Strategy) {
							if(($objActionItem->StatusType != StatusType::_100)&& ($objActionItem->StatusType != StatusType::Recurring)&& 
								($objActionItem->Strategy->Priority != null) && ($objActionItem->Rank != true)) {
										$objTopFive[] = sprintf("<b>Strategy: </b> %s<br><br><b>Action: </b><a href='%s/scorecard/tenp/index.php/%d/%d/%d' >%s</a>",
											$objActionItem->Strategy->Strategy,
											__SUBDIRECTORY__,
											$objActionItem->ScorecardId, $objActionItem->CategoryId,$objActionItem->Id,
											$objActionItem->Action
											);
										$count++;
								if($count >4) break;
							}
						}
					}
				}
			}
        $this->dtgTopActions->DataSource = $objTopFive;
    }       
}

MyViewForm::Run('MyViewForm');
?>