<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class ScorecardForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardTenP;
	protected $objScorecard;
	protected $btnCategoryArray;
	protected $dtgPArray;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		$this->btnCategoryArray = array();
		$this->dtgPArray = array();
		
		$this->initializeChart();
		
		// Create a specific button for Summary and by default start there
		$btnCategory = new QButton($this);
		$btnCategory->Name = 'Summary';
		$btnCategory->Text = 'Summary';
		$btnCategory->CssClass = 'ptabSelected';
		$btnCategory->ActionParameter = 'Summary';
		$btnCategory->AddAction(new QClickEvent(), new QAjaxAction('btnCategory_Clicked'));
		$this->btnCategoryArray[] = $btnCategory;
		// Then iterate through the Ps
		foreach(CategoryType::$NameArray as $key=>$objValue) {
			$btnCategory = new QButton($this);
			$btnCategory->Name = $objValue;
			$btnCategory->Text = $objValue;
			$btnCategory->CssClass = 'ptab';
			$btnCategory->ActionParameter = $key;
			$btnCategory->AddAction(new QClickEvent(), new QAjaxAction('btnCategory_Clicked'));
			$this->btnCategoryArray[] = $btnCategory;
		}

		// Generate a summary of the P Strategys
		foreach(CategoryType::$NameArray as $key=>$value) {
			$dtgP = new QDataGrid($this);
			$dtgP->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false'));
			$dtgP->AddColumn(new QDataGridColumn($value.' Strategy Summary', '<?= $_ITEM->Strategy ?>', 'HtmlEntities=false'));
			$dtgP->AddColumn(new QDataGridColumn('Average KPI', '<?= $_FORM->RenderKPI($_ITEM->Id) ?>', 'HtmlEntities=false'));
			$dtgP->CellPadding = 5;

			$objConditions = QQ::All();
			$objClauses = array();					
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->ScorecardId, $this->objScorecard->Id));
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->CategoryTypeId, $key));
		
			$strategyArray = Strategy::QueryArray($objConditions,$objClauses);		
			$dtgP->DataSource = $strategyArray; 
			
			$dtgP->NoDataHtml = '<div style=\'padding:20px;\'><p><b>'.$value.' Strategy Summary</b></p>' .'No Strategies.<br></div>';
			$dtgP->UseAjax = true;
			$dtgP->CssClass = 'table table-bordered scorecard_table';	
			$objStyle = $dtgP->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 	
        		     			
			$this->dtgPArray[] = $dtgP;
		}	
	}

	protected function initializeChart() {
		$associatedArray = array(); 		
		$colorArray = array('#FF0F00','#FF6600','#FF9E01','#FCD202','#F8FF01','#B0DE09','#04D215','#0D8ECF','#0D52D1','#2A0CD0');
		foreach(CategoryType::$NameArray as $key=>$value) {
			$categoriesArray[] = $value;
			$kpiArray = Kpis::LoadArrayByScorecardIdAndCategoryId($this->objScorecard->Id,$key);
			$ptotal = 0;
			foreach( $kpiArray as $objKpi) {
				$ptotal += $objKpi->Rating;
			}
			$objItem = new summaryArray();
			$objItem->P = $value;
			if(count($kpiArray) == 0) {
				$objItem->Kpi = 0;
			}else {
				$objItem->Kpi  = round($ptotal/count($kpiArray),2);
			}
			$objItem->color = $colorArray[$key - 1];
			$associatedArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
	
	public function btnCategory_Clicked($strFormId, $strControlId, $strParameter) {
		if ($strParameter == 'Summary') {
			QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/scorecard.php/'.$this->objScorecard->Id);
		} else { 
			$intCategoryId = $strParameter;
			QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$intCategoryId );
		}
    }
    
    public function RenderKPI($intStrategyId) {
    	$kpiArray = Kpis::LoadArrayByStrategyId($intStrategyId);
    	$total = 0;
    	foreach($kpiArray as $objKPI) {
    		$total += $objKPI->Rating;
    	}
    	if(count($kpiArray) == 0) {
    		return 0;
    	} else {
    		return round($total/count($kpiArray),2);
    	}
    }
    
 	public function btnSubmit_Click() {
		// redirect to appropriate scorecard
		QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/scorecard.php/'.$this->rbnScorecards->SelectedValue);
	}

}

ScorecardForm::Run('ScorecardForm');
class summaryArray {
			public $P;
			public $Kpi;
			public $color;
		}
?>