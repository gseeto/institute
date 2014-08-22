<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class LARGroupResults extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Leadership Readiness Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objLRAAssessment;
	protected $dtgAssessmentResultsArray;
	protected $lblIntroduction;
	protected $lblPDelta;
	protected $lblPHigh;
	protected $lblPModerate;
	protected $lblFDelta;
	protected $lblFHigh;
	protected $lblFModerate;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {	
		$this->lblPDelta = new QLabel($this);
		$this->lblPDelta->HtmlEntities = false;
		$this->lblPHigh  = new QLabel($this);
		$this->lblPHigh->HtmlEntities = false;
		$this->lblPModerate = new QLabel($this);
		$this->lblPModerate->HtmlEntities = false;
		$this->lblFDelta = new QLabel($this);
		$this->lblFDelta->HtmlEntities = false;
		$this->lblFHigh  = new QLabel($this);
		$this->lblFHigh->HtmlEntities = false;
		$this->lblFModerate = new QLabel($this);
		$this->lblFModerate->HtmlEntities = false;
		
		$this->lblIntroduction = new QLabel($this);
		$this->lblIntroduction->HtmlEntities = false;
		$intUserId = QApplication::PathInfo(0);
		if($intUserId) { //show the assessment specified
			$assessmentArray = LraAssessment::LoadArrayByUserId($intUserId);
			$this->objLRAAssessment = $assessmentArray[0];
			$objUser = User::Load($intUserId);
			$this->lblIntroduction->Text = 'Leadership Readiness Assessment for '.$objUser->FirstName. ' '.$objUser->LastName;
		} else { // show the user's assessment	
			$this->lblIntroduction->Text = "Thank you for taking the Leadership Readiness Assessment.
Your results are provided below. For future reference, if you'd like to review your results you can do so at <a href='".__SUBDIRECTORY__."'>The Institute Portal</a> and by logging in using the Username/Password you created earlier.";
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			
			$assessmentArray = LraAssessment::LoadArrayByUserId($intUserId);
			$this->objLRAAssessment = $assessmentArray[0];
		}
		$this->initializeChart();
		$this->dtgAssessmentResultsArray = array();
		for($i=0; $i<20;$i++) {
	 		$this->dtgAssessmentResultsArray[$i] = new LraResultsDataGrid($this);
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Head', '<?= $_ITEM->Head ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Hands', '<?= $_ITEM->Hands ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Heart', '<?= $_ITEM->Heart ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->CellPadding = 5;
	
			$assessmentArray = LraResults::LoadArrayByAssessmentIdAndCategory($this->objLRAAssessment->Id, $i+1);					
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
    	$objQuestion = LraQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 

    public function RenderQuestionId($intQuestionId) {
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$intQuestionId);
    	return $txtReturn;
    } 

	protected function initializeChart() {
		$pArray = array();
		$fArray = array();  
		$pDelta = array(); // largest difference between head,heart,hands
		$pAmount = array(); // average between head, heart, hands
		$fDelta = array();
		$fAmount = array();
		foreach(LraCategoryType::$NameArray as $key=>$value) {			
			$resultArray = LraResults::LoadArrayByAssessmentIdAndCategory($this->objLRAAssessment->Id,$key);
			$pHeadTotal = $pHandsTotal = $pHeartTotal = 0;
			$fHeadTotal = $fHandsTotal = $fHeartTotal = 0;
			foreach( $resultArray as $objResult) {
				if(substr($value,0 ,1)=='F') {
					$fHeadTotal += $objResult->Head;
					$fHandsTotal += $objResult->Hands;
					$fHeartTotal += $objResult->Heart;
				} else {
					$pHeadTotal += $objResult->Head;
					$pHandsTotal += $objResult->Hands;
					$pHeartTotal += $objResult->Heart;
				}
			}
			if(substr($value,0 ,1)=='F') {
				$objItem = new tenFArray();
				$objItem->F = $value;
				$objItem->head = round((count($resultArray))? $fHeadTotal/count($resultArray):0 , 2);	
				$objItem->hands = round((count($resultArray))? $fHandsTotal/count($resultArray) :0 , 2);
				$objItem->heart = round((count($resultArray))? $fHeartTotal/count($resultArray) :0 ,2);
				$fArray[] = $objItem;
				$fDelta[$value] = max($objItem->head,$objItem->heart,$objItem->hands) - min($objItem->head,$objItem->heart,$objItem->hands);
				$fAmount[$value] = round(($objItem->head + $objItem->heart + $objItem->hands)/3, 2);
			} else {
				$objItem = new tenPArray();
				$objItem->P = $value;
				$objItem->head = round((count($resultArray))? $pHeadTotal/count($resultArray):0 ,2);	
				$objItem->hands = round((count($resultArray))? $pHandsTotal/count($resultArray) :0 ,2);
				$objItem->heart = round((count($resultArray))? $pHeartTotal/count($resultArray) :0 ,2);
				$pArray[] = $objItem;
				$pDelta[$value] = max($objItem->head,$objItem->heart,$objItem->hands) - min($objItem->head,$objItem->heart,$objItem->hands);
				$pAmount[$value] = round(($objItem->head + $objItem->heart + $objItem->hands)/3, 2);
			}
		}
	arsort($fDelta);
		arsort($fAmount);
		arsort($pDelta);
		arsort($pAmount);
		
		$this->lblFDelta->Text = '';
		$i = 0;
		foreach($fDelta as $key=>$value) {
			$this->lblFDelta->Text .= sprintf("%s (%d)<br>",$key,$value);
			$i++;
			if($i==3)
			break;
		}
	
		$this->lblPDelta->Text = '';
		$i=0;
		foreach($pDelta as $key=>$value) {
			$this->lblPDelta->Text .= sprintf("%s (%d)<br>",$key,$value);
			$i++;
			if($i==3)
			break;
		}
		
		$this->lblFHigh->Text = '';
		$this->lblFModerate->Text = '';
		$i=0;
		foreach($fAmount as $key=>$value) {
			if($i<3) {
				$this->lblFHigh->Text .= sprintf("%s (%d)<br>",$key,$value);
			}
			if($i>6) {
				$this->lblFModerate->Text .= sprintf("%s (%d)<br>",$key,$value);
			}
			$i++;
			
		}
		$this->lblPHigh->Text = '';
		$this->lblPModerate->Text = '';
		$i=0;
		foreach($pAmount as $key=>$value) {
			if($i<3) {
				$this->lblPHigh->Text .= sprintf("%s (%d)<br>",$key,$value);
			}
			if($i>6) {
				$this->lblPModerate->Text .= sprintf("%s (%d)<br>",$key,$value);
			}
			$i++;		
		}
		QApplication::ExecuteJavaScript('DisplayPChart('.json_encode($pArray).');');
		QApplication::ExecuteJavaScript('DisplayFChart('.json_encode($fArray).');');		
	}
    
}

LARGroupResults::Run('LARGroupResults');
class tenFArray {
			public $F;
			public $head;
			public $hands;
			public $heart;
		}
class tenPArray {
			public $P;
			public $head;
			public $hands;
			public $heart;
		}
?>