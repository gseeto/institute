<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class AnalyticsForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Analytics';
	protected $intNavSectionId = InstituteForm::NavSectionAnalytics;
	protected $lblDebug;
	protected $dtgScorecard;	
	protected $dtgLemonEmails;
	protected $dtgLemonKeyCodes;	
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		// If not administrator, go to login page.
		if (!QApplication::$Login->IsAdmin()) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		$this->dtgScorecard = new QDataGrid($this);
		$this->dtgScorecard->AddColumn(new QDataGridColumn('#', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgScorecard->AddColumn(new QDataGridColumn('Scorecard', '<?= $_FORM->RenderScorecard($_ITEM) ?>', 'HtmlEntities=false', 'Width=400px' ));
		$this->dtgScorecard->AddColumn(new QDataGridColumn('Date Last Modified', '<?= $_FORM->RenderModified($_ITEM) ?>', 'HtmlEntities=false', 'Width=200px' ));
		$this->dtgScorecard->AddColumn(new QDataGridColumn('Person Who Last Modified', '<?= $_FORM->RenderPerson($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgScorecard->SetDataBinder('dtgScorecard_Bind');	
        $this->dtgScorecard->CellPadding = 4;
		$this->dtgScorecard->NoDataHtml = '';
		$this->dtgScorecard->UseAjax = true;
		$this->dtgScorecard->GridLines = 'both';	

		$this->dtgLemonEmails = new QDataGrid($this);
		$this->dtgLemonEmails->AddColumn(new QDataGridColumn('#', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgLemonEmails->AddColumn(new QDataGridColumn('Name', '<?= $_FORM->RenderLemonName($_ITEM) ?>', 'HtmlEntities=false', 'Width=400px' ));
		$this->dtgLemonEmails->AddColumn(new QDataGridColumn('Email', '<?= $_FORM->RenderLemonEmail($_ITEM) ?>', 'HtmlEntities=false', 'Width=200px' ));
		$this->dtgLemonEmails->AddColumn(new QDataGridColumn('When Last Taken', '<?= $_ITEM->DateModified ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgLemonEmails->SetDataBinder('dtgLemonEmails_Bind');	
        $this->dtgLemonEmails->CellPadding = 4;
		$this->dtgLemonEmails->NoDataHtml = '';
		$this->dtgLemonEmails->UseAjax = true;
		$this->dtgLemonEmails->GridLines = 'both';

		$this->dtgLemonKeyCodes = new QDataGrid($this);
		$this->dtgLemonKeyCodes->AddColumn(new QDataGridColumn('#', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'HtmlEntities=false', 'Width=10px' ));
		$this->dtgLemonKeyCodes->AddColumn(new QDataGridColumn('Keycode', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=400px' ));
		$this->dtgLemonKeyCodes->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=400px' ));
        $this->dtgLemonKeyCodes->SetDataBinder('dtgLemonKeyCodes_Bind');	
        $this->dtgLemonKeyCodes->CellPadding = 4;
		$this->dtgLemonKeyCodes->NoDataHtml = '';
		$this->dtgLemonKeyCodes->UseAjax = true;
		$this->dtgLemonKeyCodes->GridLines = 'both';
	}

	public function dtgLemonKeyCodes_Bind() {
		$groupIdArray = array();
		$objConditions = QQ::Equal(QQN::GroupAssessmentList()->ResourceId, 5); // get lemon keycodes only
		$LemonArray = GroupAssessmentList::QueryArray($objConditions);	
		$this->dtgLemonKeyCodes->DataSource = $LemonArray; 
	}
	
	public function dtgLemonEmails_Bind() {
		$objConditions = QQ::IsNotNull(QQN::LemonAssessment()->User->Email);
		$LemonArray = LemonAssessment::QueryArray($objConditions);
		$this->dtgLemonEmails->DataSource = $LemonArray; 
	}
	
	public function RenderLemonName(LemonAssessment $row) {
		$user = User::LoadById($row->UserId);
		return ($user != null)? $user->FirstName .' '.$user->LastName : '';
	}
	
	public function RenderLemonEmail(LemonAssessment $row) {
		$user = User::LoadById($row->UserId);
		return ($user != null)? $user->Email : '';
	}
	
	public function dtgScorecard_Bind() {
		$tableArray = array();
		$objConditions = QQ::All();
		$scorecardArray = Scorecard::QueryArray($objConditions);
		foreach($scorecardArray as $objItem){
			$row = new scorecardRow();
			$row->name = $objItem->Name;
			$row->date = null;
			$row->person = null;
			// Now find latest date modified.
			// Check Strategies
			$objConditions = QQ::Equal(QQN::Strategy()->ScorecardId, $objItem->Id);
			$strategyArray = Strategy::QueryArray($objConditions);
			foreach($strategyArray as $objStrategy){
				if(($row->date == null)||($objStrategy->Modified > $row->date)) {
					$row->date = $objStrategy->Modified;
					$row->person = $objStrategy->ModifiedBy;
				}				 
			}
			// Check Action items
			$objConditions = QQ::Equal(QQN::ActionItems()->ScorecardId, $objItem->Id);
			$actionArray = ActionItems::QueryArray($objConditions);
			foreach($actionArray as $objAction){
				if(($row->date == null)||($objAction->Modified > $row->date)) {
					$row->date = $objAction->Modified;
					$row->person = $objAction->ModifiedBy;
				}				 
			}
			// Check KPIs
			$objConditions = QQ::Equal(QQN::Kpis()->ScorecardId, $objItem->Id);
			$kpiArray = Kpis::QueryArray($objConditions);
			foreach($kpiArray as $objKpi){
				if(($row->date == null)||($objKpi->Modified > $row->date)) {
					$row->date = $objKpi->Modified;
					$row->person = $objKpi->ModifiedBy;
				}				 
			}
			$tableArray[] = $row;
		}		
		$this->dtgScorecard->DataSource = $tableArray; 
	}
	
	public function RenderScorecard(scorecardRow $row) {
		return $row->name;
	}
	
	public function RenderModified(scorecardRow $row) {
		return $row->date;
	}

	public function RenderPerson(scorecardRow $row) {
		$user = User::LoadById($row->person);
		return ($user != null)? $user->FirstName .' '.$user->LastName : '';
	}

}

AnalyticsForm::Run('AnalyticsForm');
class scorecardRow {
	public $name;
	public $date;
	public $person;
}	
?>