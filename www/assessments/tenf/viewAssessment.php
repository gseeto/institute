<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewTenFAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = '10-F Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objTenFAssessment;
	protected $btnReturn;
	protected $lblIntroduction;
	protected $dtgAssessmentResultsArray;
	protected $lblDelta;
	protected $lblImportance;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {	
		$this->lblDelta = new QLabel($this);
		$this->lblImportance  = new QLabel($this);
		$this->lblIntroduction = new QLabel($this);
		$intUserId = QApplication::PathInfo(0);
		if($intUserId) { //show the assessment specified
			$assessmentArray = TenFAssessment::LoadArrayByUserId($intUserId);
			$this->objTenFAssessment = $assessmentArray[0];
			$objUser = User::Load($intUserId);
			$this->lblIntroduction->Text = '10-F Assessment for '.$objUser->FirstName. ' '.$objUser->LastName;
		} else { // show the user's assessment	
			$this->lblIntroduction->Text = 'Thank you for taking the 10-F Assessment.
Your results are provided below.';
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			
			$assessmentArray = TenFAssessment::LoadArrayByUserId($intUserId);
			$this->objTenFAssessment = $assessmentArray[0];
		}
		$this->initializeChart();		
		$this->dtgAssessmentResultsArray = array();
		for($i=0; $i<10;$i++) {
	 		$this->dtgAssessmentResultsArray[$i] = new TenFResultsDataGrid($this);
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Importance', '<?= $_ITEM->Importance ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Performance', '<?= $_ITEM->Performance ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->CellPadding = 5;
	
			$assessmentArray = TenFResults::LoadArrayByAssessmentIdAndCategory($this->objTenFAssessment->Id, $i+1);					
			$this->dtgAssessmentResultsArray[$i]->DataSource = $assessmentArray; 
			
			$this->dtgAssessmentResultsArray[$i]->UseAjax = true;
			
			$objStyle = $this->dtgAssessmentResultsArray[$i]->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 14;
	
	        $objStyle = $this->dtgAssessmentResultsArray[$i]->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgAssessmentResultsArray[$i]->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgAssessmentResultsArray[$i]->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3';  		
	 	}
	 	
        $this->btnReturn = new QButton($this);
        $this->btnReturn->Text = 'Return';
	 	$this->btnReturn->CssClass = 'right primary';
	 	$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));
		if(QApplication::PathInfo(0)) {
	 		$this->btnReturn->Visible = false;
	 	}	
	}
	
	protected function btnReturn_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/tenf/index.php');
	}
	
	public function RenderQuestion($intQuestionId) {
    	$objQuestion = TenFQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 

    public function RenderQuestionId($intQuestionId) {
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$intQuestionId);
    	return $txtReturn;
    }
     
	protected function initializeChart() {
		$associatedArray = array(); 
		$delta = array();
		$amount = array();
		foreach(FCategoryType::$NameArray as $key=>$value) {			
			$resultArray = TenFResults::LoadArrayByAssessmentIdAndCategory($this->objTenFAssessment->Id,$key);
			$ptotal = $itotal = 0;
			foreach( $resultArray as $objResult) {
				$ptotal += $objResult->Performance;
				$itotal += $objResult->Importance;
			}
			$objItem = new tenFArray();
			$objItem->F = $value;
			$objItem->performance = (count($resultArray))? $ptotal/count($resultArray):0;	
			$objItem->importance = (count($resultArray))? $itotal/count($resultArray) :0;
			$associatedArray[] = $objItem;
			$delta[$value] = abs($objItem->importance - $objItem->performance);
			$amount[$value] = $objItem->importance;
		}
		$this->lblDelta->Text = array_search(max($delta), $delta);
		$this->lblImportance->Text = array_search(min($amount), $amount);
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
}

ViewTenFAssessmentForm::Run('ViewTenFAssessmentForm');
class tenFArray {
			public $F;
			public $importance;
			public $performance;
		}
?>