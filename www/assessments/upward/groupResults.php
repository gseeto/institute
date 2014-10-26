<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class UpwardGroupResults extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Education 8-P Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objUpwardAssessment;
	protected $dtgAssessmentResultsArray;
	protected $lblIntroduction;
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
		$this->lblIntroduction->HtmlEntities = false;
		$intUserId = QApplication::PathInfo(0);
		if($intUserId) { //show the assessment specified
			$assessmentArray = UpwardAssessment::LoadArrayByUserId($intUserId);
			$this->objUpwardAssessment = $assessmentArray[0];
			$objUser = User::Load($intUserId);
			$this->lblIntroduction->Text = 'Education 8-P Assessment for '.$objUser->FirstName. ' '.$objUser->LastName;
		} else { // show the user's assessment	
			$this->lblIntroduction->Text = "Thank you for taking the Education 8-P Assessment.
Your results are provided below. For future reference, if you'd like to review your results you can do so at <a href='".__SUBDIRECTORY__."'>The Institute Portal</a> and by logging in using the Username/Password you created earlier.";
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			
			$assessmentArray = UpwardAssessment::LoadArrayByUserId($intUserId);
			$this->objUpwardAssessment = $assessmentArray[0];
		}
		$this->initializeChart();
		$this->dtgAssessmentResultsArray = array();
		for($i=0; $i<7;$i++) {
	 		$this->dtgAssessmentResultsArray[$i] = new UpwardResultsDataGrid($this);
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Importance', '<?= $_ITEM->Importance ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Performance', '<?= $_ITEM->Performance ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->CellPadding = 5;
	
			$assessmentArray = UpwardResults::LoadArrayByAssessmentIdAndCategory($this->objUpwardAssessment->Id, $i+1);					
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
	 			       
	}
	
    public function RenderQuestion($intQuestionId) {
    	$objQuestion = UpwardQuestions::Load($intQuestionId);
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
		foreach(UpwardCategoryType::$NameArray as $key=>$value) {			
			$resultArray = UpwardResults::LoadArrayByAssessmentIdAndCategory($this->objUpwardAssessment->Id,$key);
			$ptotal = $itotal = 0;
			foreach( $resultArray as $objResult) {
				$ptotal += $objResult->Performance;
				$itotal += $objResult->Importance;
			}
			$objItem = new tenPArray();
			$objItem->P = ($value = 'Product')? 'Service': $value;
			$objItem->performance = (count($resultArray))? $ptotal/count($resultArray) : 0;	
			$objItem->importance = (count($resultArray)) ? $itotal/count($resultArray) :0;
			$associatedArray[] = $objItem;
			$delta[$value] = abs($objItem->importance - $objItem->performance);
			$amount[$value] = $objItem->importance;
		}
		$this->lblDelta->Text = array_search(max($delta), $delta);
		$this->lblImportance->Text = array_search(min($amount), $amount);
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
    
}
UpwardGroupResults::Run('UpwardGroupResults');

class tenPArray {
			public $P;
			public $importance;
			public $performance;
		}
?>