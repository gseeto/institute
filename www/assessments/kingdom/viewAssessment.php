<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewKingdomAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Kingdom Business Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objKingdomAssessment;
	protected $dtgAssessmentResultsArray;
	protected $btnReturn;
	protected $lblIntroduction;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->lblIntroduction = new QLabel($this);
		$intUserId = QApplication::PathInfo(0);
		if($intUserId) { //show the assessment specified
			$assessmentArray = KingdomBusinessAssessment::LoadArrayByUserId($intUserId);
			$this->objKingdomAssessment = $assessmentArray[0];
			$objUser = User::Load($intUserId);
			$this->lblIntroduction->Text = 'Kingdom Assessment for '.$objUser->FirstName. ' '.$objUser->LastName;
		} else { // show the user's assessment	
			$this->lblIntroduction->Text = 'Thank you for taking the Kingdom Business Assessment.
Your results are provided below.';
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			
			$assessmentArray = KingdomBusinessAssessment::LoadArrayByUserId($intUserId);
			$this->objKingdomAssessment = $assessmentArray[0];
		}
				
		$this->dtgAssessmentResultsArray = array();
		for($i=0; $i<10;$i++) {
	 		$this->dtgAssessmentResultsArray[$i] = new KingdomBusinessResultsDataGrid($this);
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Importance', '<?= $_ITEM->Importance ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Performance', '<?= $_ITEM->Performance ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->CellPadding = 5;
	
			$assessmentArray = KingdomBusinessResults::LoadArrayByAssessmentIdAndCategory($this->objKingdomAssessment->Id, $i+1);					
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
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/kingdom/index.php');
	}
	
	
    public function RenderQuestion($intQuestionId) {
    	$objQuestion = KingdomBusinessQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 

    public function RenderQuestionId($intQuestionId) {
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$intQuestionId);
    	return $txtReturn;
    } 
    
     public function RenderCategory($intQuestionId) {
    	$objQuestion = KingdomBusinessQuestions::Load($intQuestionId);
    	return CategoryType::ToString($objQuestion->CategoryId);
    }  

}

ViewKingdomAssessmentForm::Run('ViewKingdomAssessmentForm');
?>