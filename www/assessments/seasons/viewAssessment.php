<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewSeasonalAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Seasonal Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objSeasonalAssessment;
	protected $btnReturn;
	protected $lblIntroduction;
	protected $dtgAssessmentResults;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {			
		$this->lblIntroduction = new QLabel($this);		
		$this->lblIntroduction->HtmlEntities = false;
		$intUserId = QApplication::PathInfo(0);
		if($intUserId) { //show the assessment specified
			$assessmentArray = SeasonalAssessment::LoadArrayByUserId($intUserId);
			$this->objSeasonalAssessment = $assessmentArray[0];						
		} else { // show the user's assessment				
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			
			$assessmentArray = SeasonalAssessment::LoadArrayByUserId($intUserId);
			$this->objSeasonalAssessment = $assessmentArray[0];
		}
		$objUser = User::Load($intUserId);
		$this->lblIntroduction->Text = '<h1>Seasonal Assessment for '.$objUser->FirstName. ' '.$objUser->LastName.'</h1>';
		$this->initializeChart();		

 		$this->dtgAssessmentResults = new SeasonalAssessmentDataGrid($this);
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false' ));			
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Rating', '<?= $_ITEM->Result ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->CellPadding = 5;

		$assessmentArray = SeasonalResults::LoadArrayByAssessmentId($this->objSeasonalAssessment->Id);					
		$this->dtgAssessmentResults->DataSource = $assessmentArray; 
		
		$this->dtgAssessmentResults->UseAjax = true;
		$this->dtgAssessmentResults->CssClass = 'table table-striped table-hover';

        $objStyle = $this->dtgAssessmentResults->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgAssessmentResults->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';  		
	 	
        $this->btnReturn = new QButton($this);
        $this->btnReturn->Text = 'Return';
	 	$this->btnReturn->CssClass = 'right btn btn-default';
	 	$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));
		if(QApplication::PathInfo(0)) {
	 		$this->btnReturn->Visible = false;
	 	}
	 		
	}
	
	protected function btnReturn_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/seasons/index.php');
	}
	
	public function RenderQuestion($intQuestionId) {
    	$objQuestion = SeasonalQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 

    public function RenderQuestionId($intQuestionId) {
    	$objQuestion = SeasonalQuestions::Load($intQuestionId);
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$objQuestion->Count);
    	return $txtReturn;
    }
     
	protected function initializeChart() {
		$associatedArray = array(); 
		$colorArray = array('#1E375C','#605032','#B69D70','#2F578F','#888888','#000000','#1E375C');
		foreach(SeasonalCategoryType::$NameArray as $key=>$value) {			
			$resultArray = SeasonalResults::LoadArrayByAssessmentIdAndCategory($this->objSeasonalAssessment->Id,$key);
			$rtotal = 0;
			foreach( $resultArray as $objResult) {
				if(SeasonalQuestions::Load($objResult->QuestionId)->Invert == 1)
					$result = 1+abs($objResult->Result - 7);
				else 
					$result = $objResult->Result;
				$rtotal += $result;
			}
			$objItem = new SeasonalArray();
			$objItem->category = $value;
			$objItem->result = (count($resultArray))? round((($rtotal/count($resultArray))/7)*100 , 2):0;	
			$objItem->color = $colorArray[$key - 1];
			$associatedArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
}

ViewSeasonalAssessmentForm::Run('ViewSeasonalAssessmentForm');
class SeasonalArray {
			public $category;
			public $result;
			public $color;
		}
?>