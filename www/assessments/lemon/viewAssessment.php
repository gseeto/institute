<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewLemonAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'LEMON Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objLemonAssessment;
	protected $dtgAssessmentResults;
	protected $btnReturn;
	protected $lblLemonDescription;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/inst/index.php');
	}
	
	protected function Form_Create() {		
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		
		$assessmentArray = LemonAssessment::LoadArrayByUserId($intUserId);
		$this->objLemonAssessment = $assessmentArray[0];
				
		$this->dtgAssessmentResults = new LemonAssessmentResultsDataGrid($this);
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('', '<?= $_ITEM->QuestionId ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=450px' ));			
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Answer', '<?= $_ITEM->Value ?>','HtmlEntities=false'));
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
	 	
	 	$this->lblLemonDescription = new QLabel($this);
	 	$this->lblLemonDescription->CssClass = 'tablecell';
	 	$this->lblLemonDescription->Width = 600;
	 	$this->lblLemonDescription->HtmlEntities = false;
	 	$this->lblLemonDescription->Text = $this->getLemonDescription();
	}
	
	protected function getLemonDescription() {
		$lemonValues = array();
		$key = '';
		$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($this->objLemonAssessment->Id);
		foreach($resultArray as $objResult) {
			$intLemonType = $objResult->Question->LemonTypeId;
			switch($intLemonType) {
				case 1:
					$key = 'Luminary';
					break;
				case 2:
					$key = 'Entrepreneur';
					break;
				case 3:
					$key = 'Manager';
					break;
				case 4:
					$key = 'Organizer';
					break;
				case 5:
					$key = 'Networker';
					break;
			}
			if(array_key_exists($key,$lemonValues)) {
				$lemonValues[$key] += $objResult->Value;
			} else {
				$lemonValues[$key] = 0;
			}
		}
		arsort($lemonValues);
		$i=1;
		$strPrimary = '';
		$strSecondary = '';
		foreach($lemonValues as $key=>$value) {
			if(($i==1) ||($i==2)) { // Get Primary and Secondary descriptions
				switch($key) {
					case 'Luminary':
						$strDescription =
						'<ul>
						   <li>Believe that ideas precede activities</li>
						   <li>Deal themselves their own hand</li>
						   <li>Thought leaders: value concepts and fresh thinking</li>
						   <li>Often long-range thinkers</li>
						   <li>Can be prophetic in their ability to foresee things</li>
						   <li>Inspire organizations through the power of their ideas</li>
						   <li>Sometimes stay above practical, day-to-day tasks</li>
						   <li>Care more about Why than how</li>
					   </ul>';
						if($i==1) 
							$strPrimary =  '<h4>Your Primary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						else 
							$strSecondary = '<h4>Your Secondary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						break;
					case 'Entrepreneur':
						$strDescription = 
						'<ul>
						   <li>Believe that opportunities precede activities</li>
						   <li>Opportunists: make the most of whatever hand they are dealt</li>
						   <li>Short-to-medium term thinkers</li>
						   <li>Inspire organizations through energy and enthusiasm</li>
						   <li>Will do any tasks in the early phases of the venture</li>
						   <li>Can envision and create something out of nothing</li>
						   <li>See failure as learning experiences</li>
						   <li>Care more about results: the Wherefore</li>
						</ul>';
						if($i==1) 
							$strPrimary =  '<h4>Your Primary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						else 
							$strSecondary = '<h4>Your Secondary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						break;
					case 'Manager':
						$strDescription = 
						'<ul>
						   <li>Believe that proper planning precedes activities</li>
						   <li>Deliberate: will patiently change the hand they are dealt</li>
						   <li>Long-term thinkers</li>
						   <li>Implementers of vision</li>
						   <li>Build organizational loyalty through proven results</li>
						   <li>Will build a team to get tasks done rather than do the tasks themselves</li>
						   <li>Understand process, planning, profits: How</li>
						</ul>';
						if($i==1) 
							$strPrimary =  '<h4>Your Primary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						else 
							$strSecondary = '<h4>Your Secondary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						break;
					case 'Organizer':
						$strDescription =
						'<ul>
						   <li>Action oriented</li>
						   <li>Have an unconscious competence:  they intuitively pick the right things to focus on</li>
						   <li>They feel they have little to teach others on management</li>
						   <li>Love to bring things to a close</li>
						   <li>The quick result is the best result (usually always)</li>
						   <li>Good at identifying Issues</li>
						   <li>They are often practical, and quickly get to what needs to be done</li>
						   <li>Care about When</li>
						</ul>';
						if($i==1) 
							$strPrimary =  '<h4>Your Primary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						else 
							$strSecondary = '<h4>Your Secondary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						break;
					case 'Networker':
						$strDescription = 
						'<ul>
						   <li>People oriented </li>
						   <li>Love to bring people together</li>
						   <li>Instinctively build networks</li>
						   <li>If we get enough smart people in the room, the right thing is sure to happen.</li>
						   <li>Aware of relational capital</li>
						   <li>Often event driven</li>
						   <li>Care about Who</li>
						</ul>';
						if($i==1) 
							$strPrimary =  '<h4>Your Primary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						else 
							$strSecondary = '<h4>Your Secondary LEMON Type is: ' .$key . '</h4>' .$strDescription;
						break;
				}
			}
			$i++;
		}
		return $strPrimary .'<br>'. $strSecondary;
	}
	protected function btnReturn_Click() {
		QApplication::Redirect('/inst/assessments/lemon/index.php');
	}
	
	public function dtgAssessmentResults_Bind() {
		$assessmentArray = LemonAssessmentResults::LoadArrayByAssessmentId($this->objLemonAssessment->Id);		
		$this->dtgAssessmentResults->DataSource = $assessmentArray; 
	}
	
    public function RenderQuestion($intQuestionId) {
    	$objQuestion = LemonAssessmentQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 
}

ViewLemonAssessmentForm::Run('ViewLemonAssessmentForm');
?>