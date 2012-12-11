<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewTenFAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = '10-P Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objTenFAssessment;
	protected $dtgAssessmentResults;
	protected $btnReturn;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/inst/index.php');
	}
	
	protected function Form_Create() {		
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		
		$assessmentArray = TenFAssessment::LoadArrayByUserId($intUserId);
		$this->objTenFAssessment = $assessmentArray[0];
				
		$this->dtgAssessmentResults = new TenFResultsDataGrid($this);
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderCategory($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('', '<?= $_ITEM->QuestionId ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=450px' ));			
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Importance', '<?= $_ITEM->Importance ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Performance', '<?= $_ITEM->Performance ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->CellPadding = 5;
		$this->dtgAssessmentResults->SetDataBinder('dtgAssessmentResults_Bind',$this);
		$this->dtgAssessmentResults->UseAjax = true;
		
		$objStyle = $this->dtgAssessmentResults->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgAssessmentResults->AlternateRowStyle;
        $objStyle->BackColor = '#CCCCCC';

        $objStyle = $this->dtgAssessmentResults->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
        
        $objStyle = $this->dtgAssessmentResults->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
        
        $this->btnReturn = new QButton($this);
        $this->btnReturn->Text = 'Return';
	 	$this->btnReturn->CssClass = 'right primary';
	 	$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));	
	}
	
	protected function btnReturn_Click() {
		QApplication::Redirect('/inst/assessments/tenf/index.php');
	}
	
	public function dtgAssessmentResults_Bind() {
		$assessmentArray = TenFResults::LoadArrayByAssessmentId($this->objTenFAssessment->Id);		
		$this->dtgAssessmentResults->DataSource = $assessmentArray; 
	}
	
    public function RenderQuestion($intQuestionId) {
    	$objQuestion = TenFQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 

     public function RenderCategory($intQuestionId) {
    	$objQuestion = TenFQuestions::Load($intQuestionId);
    	return FCategoryType::ToString($objQuestion->CategoryId);
    }  

}

ViewTenFAssessmentForm::Run('ViewTenFAssessmentForm');
?>