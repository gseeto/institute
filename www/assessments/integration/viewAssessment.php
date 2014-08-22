<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewIntegrationAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Integration Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objIntegrationAssessment;
	protected $btnReturn;
	protected $lblIntroduction;
	protected $dtgAssessmentResults;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {			
		$this->lblIntroduction = new QLabel($this);
		$intUserId = QApplication::PathInfo(0);
		if($intUserId) { //show the assessment specified
			$assessmentArray = IntegrationAssessment::LoadArrayByUserId($intUserId);
			$this->objIntegrationAssessment = $assessmentArray[0];
			$objUser = User::Load($intUserId);
			$this->lblIntroduction->Text = 'Integration Assessment for '.$objUser->FirstName. ' '.$objUser->LastName;
		} else { // show the user's assessment	
			$this->lblIntroduction->Text = 'Thank you for taking the Integration Assessment.
Your results are provided below.';
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			
			$assessmentArray = IntegrationAssessment::LoadArrayByUserId($intUserId);
			$this->objIntegrationAssessment = $assessmentArray[0];
		}
		$this->initializeChart();		

 		$this->dtgAssessmentResults = new IntegrationAssessmentDataGrid($this);
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=450px' ));			
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Rating', '<?= $_ITEM->Result ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->CellPadding = 5;

		$assessmentArray = IntegrationResults::LoadArrayByAssessmentId($this->objIntegrationAssessment->Id);					
		$this->dtgAssessmentResults->DataSource = $assessmentArray; 
		
		$this->dtgAssessmentResults->UseAjax = true;
		
		$objStyle = $this->dtgAssessmentResults->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 14;

        $objStyle = $this->dtgAssessmentResults->AlternateRowStyle;
        $objStyle->BackColor = '#CCCCCC';

        $objStyle = $this->dtgAssessmentResults->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $objStyle = $this->dtgAssessmentResults->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3';  		
	 	
        $this->btnReturn = new QButton($this);
        $this->btnReturn->Text = 'Return';
	 	$this->btnReturn->CssClass = 'right primary';
	 	$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));
		if(QApplication::PathInfo(0)) {
	 		$this->btnReturn->Visible = false;
	 	}
	 		
	}
	
	protected function btnReturn_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/integration/index.php');
	}
	
	public function RenderQuestion($intQuestionId) {
    	$objQuestion = IntegrationQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 

    public function RenderQuestionId($intQuestionId) {
    	$objQuestion = IntegrationQuestions::Load($intQuestionId);
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$objQuestion->Count);
    	return $txtReturn;
    }
     
	protected function initializeChart() {
		$associatedArray = array(); 
		$colorArray = array('#1E375C','#605032','#B69D70','#2F578F','#FFFFFF','#000000','#1E375C');
		foreach(IntegrationCategoryType::$NameArray as $key=>$value) {			
			$resultArray = IntegrationResults::LoadArrayByAssessmentIdAndCategory($this->objIntegrationAssessment->Id,$key);
			$rtotal = 0;
			foreach( $resultArray as $objResult) {
				if(IntegrationQuestions::Load($objResult->QuestionId)->Invert == 1)
					$result = 1+abs($objResult->Result - 7);
				else 
					$result = $objResult->Result;
				$rtotal += $result;
			}
			$objItem = new IntegrationArray();
			$objItem->category = $value;
			$objItem->result = (count($resultArray))? round((($rtotal/count($resultArray))/7)*100 , 2):0;	
			$objItem->color = $colorArray[$key - 1];
			$associatedArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
}

ViewIntegrationAssessmentForm::Run('ViewIntegrationAssessmentForm');
class IntegrationArray {
			public $category;
			public $result;
			public $color;
		}
?>