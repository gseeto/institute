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
  		$objOptionalClauses = QQ::OrderBy(QQN::ActionItems()->Strategy->Priority,false);
		$objActionItemArray = $this->objScorecard->GetActionItemsArray($objOptionalClauses);
		$objTopFive = array();
		$count = 0;
		foreach($objActionItemArray as $objActionItem) {
				if($objActionItem->Who == $this->objUser->Id) {
					// Populate top 5 Actions Array
					//	$objScorecard->Name,$objActionItem->Strategy->Strategy,$objActionItem->Action);
					if(($objActionItem->StatusType != StatusType::_100)&& ($objActionItem->StatusType != StatusType::Recurring)&& ($objActionItem->Strategy->Priority != null)) {
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
            $this->dtgTopActions->DataSource = $objTopFive;
        }       
}

MyViewForm::Run('MyViewForm');
?>