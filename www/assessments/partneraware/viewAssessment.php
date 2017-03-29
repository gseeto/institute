<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
// Setup Zend Framework load
set_include_path(get_include_path() . ':' . __INCLUDES__);
require_once(dirname(__FILE__) .'/../../../includes/Zend/Loader.php');
Zend_Loader::loadClass('Zend_Pdf');

class ViewPartnerAwarenessAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Partnering Awareness Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objPartneringAwarenessAssessment;
	protected $dtgAssessmentResultsArray;
	protected $btnReturn;
	protected $lblIntroduction;
	protected $lblDelta;
	protected $lblImportance;
	protected $btnGeneratePdf;
	protected $objUser;
	
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
			$assessmentArray = PartneringAwarenessAssessment::LoadArrayByUserId($intUserId);
			$this->objPartneringAwarenessAssessment = $assessmentArray[0];
			$objUser = User::Load($intUserId);
			$this->lblIntroduction->Text = 'Partnering Awareness Assessment for '.$objUser->FirstName. ' '.$objUser->LastName;
		} else { // show the user's assessment	
			$this->lblIntroduction->Text = 'Thank you for taking the Partnering Awareness Assessment.
Your results are provided below.';
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			
			$assessmentArray = PartneringAwarenessAssessment::LoadArrayByUserId($intUserId);
			$this->objPartneringAwarenessAssessment = $assessmentArray[0];
		}
		$this->objUser = User::Load($intUserId);
		$this->btnGeneratePdf =  new QButton($this);
	 	$this->btnGeneratePdf->Text = 'Generate PDF of Report';
	 	$this->btnGeneratePdf->CssClass = 'primary';
	 	$this->btnGeneratePdf->AddAction(new QClickEvent(), new QAjaxAction('btnGeneratePdf_Click'));
	 	
		$this->initializeChart();
		$this->dtgAssessmentResultsArray = array();
		for($i=0; $i<10;$i++) {
	 		$this->dtgAssessmentResultsArray[$i] = new PartneringAwarenessResultsDataGrid($this);
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_FORM->RenderQuestion($_ITEM->QuestionId) ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Importance', '<?= $_ITEM->Importance ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->AddColumn(new QDataGridColumn('Performance', '<?= $_ITEM->Performance ?>','HtmlEntities=false'));
			$this->dtgAssessmentResultsArray[$i]->CellPadding = 5;
	
			$assessmentArray = PartneringAwarenessResults::LoadArrayByAssessmentIdAndCategory($this->objPartneringAwarenessAssessment->Id, $i+1);					
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
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/partneraware/index.php');
	}
	
    public function RenderQuestion($intQuestionId) {
    	$objQuestion = TenPQuestions::Load($intQuestionId);
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
		foreach(CategoryType::$NameArray as $key=>$value) {			
			$resultArray = PArtneringAwarenessResults::LoadArrayByAssessmentIdAndCategory($this->objPartneringAwarenessAssessment->Id,$key);
			$ptotal = $itotal = 0;
			foreach( $resultArray as $objResult) {
				$ptotal += $objResult->Performance;
				$itotal += $objResult->Importance;
			}
			$objItem = new tenPArray();
			$objItem->P = $value;
			$objItem->performance = round((count($resultArray))? $ptotal/count($resultArray) : 0, 2);	
			$objItem->importance = round((count($resultArray)) ? $itotal/count($resultArray) :0, 2);
			$associatedArray[] = $objItem;
			$delta[$value] = abs($objItem->importance - $objItem->performance);
			$amount[$value] = $objItem->importance;
		}
		$this->lblDelta->Text = array_search(max($delta), $delta);
		$this->lblImportance->Text = array_search(min($amount), $amount);
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
	
	protected function btnGeneratePdf_Click() { 
		// Create the PDF Object for the PDF
		$objTenPPdf = new Zend_Pdf();		
		// Create PDF
		$PageHeight = 750;
		$lineHeight = 13;
		$objPage1 = $objTenPPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objTenPPdf->pages[] = $objPage1;
		$objPage1->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 24);
		$objPage1->drawText("Partnering Awareness Assessment Report",50, $PageHeight, 'UTF-8');
		$ZendImage = Zend_Pdf_Image::imageWithPath(__DOCROOT__ . __IMAGE_ASSETS__ . '/tenPSplashPage.jpg');
		$objPage1->drawImage($ZendImage, 1, $PageHeight-500, 600, $PageHeight-50);
		$objCompany = $this->objUser->GetCompanyArray();
		if(count($objCompany)>0)
			$txtCompany = $objCompany[0]->Name;
		else 
			$txtCompany = 'None Specified';
		$objPage1->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 10);
		$strText = sprintf('Name: %s %s', $this->objUser->FirstName,$this->objUser->LastName);
		$objPage1->drawText($strText, 100, $PageHeight-500, 'UTF-8');
		$strText = sprintf('Organization: %s', $txtCompany);
		$objPage1->drawText($strText, 100, $PageHeight-515, 'UTF-8');
		$strText = sprintf('Title/Designation: %s', $this->objUser->Title ? $this->objUser->Title->Name : ' None Specified');
		$objPage1->drawText($strText, 100, $PageHeight-530, 'UTF-8');
		
		/*******************************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage2 = $objTenPPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objTenPPdf->pages[] = $objPage2;
		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage2->drawText("Your Personal Report", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;	
		$ZendImage = Zend_Pdf_Image::imageWithPath( __UPLOAD_DIR__.'/partneraware' . $this->objPartneringAwarenessAssessment->Id. '.png');		
		$objPage2->drawImage($ZendImage, 10, $yPos-400, 600, $yPos);
		$yPos -= ($lineHeight + 430);
		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage2->drawText("Large gaps between Importance and Performance indicate areas for improvement. ", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Low scores in Importance may suggest areas you have not considered but may be beneficial in improving impact. ", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		
		$objPage2->drawText("Your largest gap between Importance and Performance appears to be under ".$this->lblDelta->Text .".This may indicate areas of improvement", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
				
		$objPage2->drawText("Your lowest score is under ".$this->lblImportance->Text.". After reading the detailed description for this P you may discover opportunities not yet realized.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("A detailed explanation of each of the 10 Drivers of Impact follow.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;
		
		/******************************************/
		$objPage5 = $objTenPPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objTenPPdf->pages[] = $objPage5;
		$yPos = $PageHeight-$lineHeight - 5;
		
		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage5->drawText("PURPOSE", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("The purpose of an organization radically affects the ability of that organization to have an impact. Many organizations spend countless", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("months laboring over clarifying their products, when what they are lacking is a purpose. Others have a stated purpose but lack", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("clarity on the values that are essential to fulfilling the purpose.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;
		 
		
		$objPage5->drawText("PRODUCTS", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("Products and services are key components of how the customer experiences the organization. Products create the 'touch, see, and", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("smell' factors that make an organization come alive. For non-profits and service organizations, products often take the form of programs.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;
		
		
		$objPage5->drawText("POSITIONING", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("If another organization creates an advantage - even if only in the perception of customers - then purpose, products and presence", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("will not be enough. Establishing a clear positioning of both organization and products is essential. The value proposition", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("of the organization and what differentiates it from others is essential to creating Impact.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;	
		
		$objPage5->drawText("PRESENCE", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("Products consumed out of context do not carry the full Impact that the purveyor intends. Traditionally, marketing is intended", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("to make consumers aware of their needs, and how particular products can fill those needs. Marketing creates presence", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("- a mind-set for the product or organization - and it builds a story and experience that goes beyond the simple consumption", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("of the product. Presence results in Impact.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;  
		
		$objPage5->drawText("PARTNERING", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("Numerous books and publications have demonstrated the benefits of partnering. Attempts at partnering have not occurred", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("out of mutual admiration and togetherness. It has been demanded by customers and made a condition of business that", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("suppliers cooperate. Why? Because they know that no one company can do everything well. Partnering creates better", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("Impact for organizations and their customers alike.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight; 
		
		$objPage5->drawText("PROCESSES", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("Process is a driver of Impact for all organizations. Core business processes can either be handled just efficiently,", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("or they can be deliberately directed towards the creation of Impact. Decision-making is an important aspect of business processes.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("With the ever-increasing information component of products, the location, speed, and quality of decision-making processes are", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("influencing customers' perceptions of value.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;
		
		$objPage5->drawText("PEOPLE", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("People have a tremendous effect on the Impact of the organization. When people - including the way in which they are ", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("organized - are thoroughly aligned with the Purpose of the organization, Impact is heightened.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;
		
		$objPage5->drawText("PLACE", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("A company's location, the environment/image of the facilities, the corporate identity that goes beyond buildings, proximity to customers,", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("partners, and others in one's ecosystem ... all of these can be used in the Place spoke of the Impact wheel. This is no less true", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("for virtual organizations.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;
		
		$objPage5->drawText("PLANNING", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("Appropriate planning - not Strategy by Advertising - is still a crucial driver of Impact. The old adage is true: if you fail to plan,", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("you plan to fail.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$yPos -= $lineHeight;
		
		$objPage5->drawText("PROFIT", 16, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("The economic model of a organization is clearly essential. Transitioning profit from an accounting tool to a strategic weapon is the", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("habit of champions. Sustainable impact is best achieved in concert with sustainable economics.", 10, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		
		/*****************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage3 = $objTenPPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objTenPPdf->pages[] = $objPage3;
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
		
		// Columns for the tables
		$col1 = 10;
		$col2 = 30;
		$col3 = 454; 
		$col4 = 534;
		$col5 = 610;
		$tableheight = 0;
		
	for($i=0; $i<5;$i++) {
			$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
			$objPage3->drawText(CategoryType::$NameArray[$i+1], $col1+10, $yPos, 'UTF-8');
			$yPos -= ($lineHeight+5);
			$yPosTableStart = $yPos;
			
			$yPos -= $lineHeight;
			$tableheight += $lineHeight;
			$yPos -= ($lineHeight+5);
			$tableheight += ($lineHeight+5);
			$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
			$assessmentArray = PartneringAwarenessResults::LoadArrayByAssessmentIdAndCategory($this->objPartneringAwarenessAssessment->Id, $i+1);
			foreach($assessmentArray as $objQuestion){
				$objPage3->drawText($objQuestion->QuestionId, $col1+2, $yPos, 'UTF-8');
				$strStatement = PartneringAwarenessQuestions::Load($objQuestion->QuestionId)->Text;
				if(strlen($strStatement)>90) {
					$objPage3->drawText(substr($strStatement,0,90), $col2+2, $yPos, 'UTF-8');
					$objPage3->drawText(substr($strStatement,90), $col2+2, $yPos-($lineHeight+2), 'UTF-8');
				} else {
					$objPage3->drawText($strStatement, $col2+2, $yPos, 'UTF-8');
				}		
				$objPage3->drawText($objQuestion->Importance, $col3+12, $yPos, 'UTF-8');
				$objPage3->drawText($objQuestion->Performance, $col4+12, $yPos, 'UTF-8');
				if(strlen($strStatement)>100) {
					$yPos -= ($lineHeight+2)*2;
					$tableheight += ($lineHeight+2)*2;
				} else {
					$yPos -= ($lineHeight+2);
					$tableheight += ($lineHeight+2);
				}
			}			
			$objPage3->setFillColor(Zend_Pdf_Color_Html::color('#79b9c9'))->drawRectangle($col1, $yPosTableStart, $col5, $yPosTableStart-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
			$objPage3->drawLine($col1, $yPosTableStart, $col1, $yPosTableStart-$tableheight);
			$objPage3->drawLine($col2, $yPosTableStart, $col2, $yPosTableStart-$tableheight);
			$objPage3->drawLine($col3, $yPosTableStart, $col3, $yPosTableStart-$tableheight);
			$objPage3->drawLine($col4, $yPosTableStart, $col4, $yPosTableStart-$tableheight);
			$objPage3->drawLine($col5, $yPosTableStart, $col5, $yPosTableStart-$tableheight);
			$objPage3->drawLine($col1, $yPosTableStart-$tableheight, $col5, $yPosTableStart-$tableheight);
			$objPage3->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
			
			$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
			$objPage3->drawText("Question", $col2+10, $yPosTableStart - $lineHeight, 'UTF-8');
			$objPage3->drawText("Importance", $col3+2, $yPosTableStart - $lineHeight, 'UTF-8');
			$objPage3->drawText("Performance", $col4+2, $yPosTableStart - $lineHeight, 'UTF-8');
			
			$yPos -= ($lineHeight+13);
			$yPosTableStart = $yPos;
			$tableheight = 0;
		}

		
		/*********************************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage4 = $objTenPPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objTenPPdf->pages[] = $objPage4;
		$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
		
		// Columns for the tables
		$col1 = 10;
		$col2 = 30;
		$col3 = 454; 
		$col4 = 534;
		$col5 = 610;
		$tableheight = 0;
		
		for($i=5; $i<10;$i++) {
			$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
			$objPage4->drawText(CategoryType::$NameArray[$i+1], $col1+10, $yPos, 'UTF-8');
			$yPos -= ($lineHeight+5);
			$yPosTableStart = $yPos;
			
			$yPos -= $lineHeight;
			$tableheight += $lineHeight;
			$yPos -= ($lineHeight+5);
			$tableheight += ($lineHeight+5);
			$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
			$assessmentArray = PartneringAwarenessResults::LoadArrayByAssessmentIdAndCategory($this->objPartneringAwarenessAssessment->Id, $i+1);
			foreach($assessmentArray as $objQuestion){
				$objPage4->drawText($objQuestion->QuestionId, $col1+2, $yPos, 'UTF-8');
				$strStatement = PartneringAwarenessQuestions::Load($objQuestion->QuestionId)->Text;
				if(strlen($strStatement)>90) {
					$objPage4->drawText(substr($strStatement,0,90), $col2+2, $yPos, 'UTF-8');
					$objPage4->drawText(substr($strStatement,90), $col2+2, $yPos-($lineHeight+2), 'UTF-8');
				} else {
					$objPage4->drawText($strStatement, $col2+2, $yPos, 'UTF-8');
				}		
				$objPage4->drawText($objQuestion->Importance, $col3+12, $yPos, 'UTF-8');
				$objPage4->drawText($objQuestion->Performance, $col4+12, $yPos, 'UTF-8');
				if(strlen($strStatement)>100) {
					$yPos -= ($lineHeight+2)*2;
					$tableheight += ($lineHeight+2)*2;
				} else {
					$yPos -= ($lineHeight+2);
					$tableheight += ($lineHeight+2);
				}
			}			
			$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#79b9c9'))->drawRectangle($col1, $yPosTableStart, $col5, $yPosTableStart-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
			$objPage4->drawLine($col1, $yPosTableStart, $col1, $yPosTableStart-$tableheight);
			$objPage4->drawLine($col2, $yPosTableStart, $col2, $yPosTableStart-$tableheight);
			$objPage4->drawLine($col3, $yPosTableStart, $col3, $yPosTableStart-$tableheight);
			$objPage4->drawLine($col4, $yPosTableStart, $col4, $yPosTableStart-$tableheight);
			$objPage4->drawLine($col5, $yPosTableStart, $col5, $yPosTableStart-$tableheight);
			$objPage4->drawLine($col1, $yPosTableStart-$tableheight, $col5, $yPosTableStart-$tableheight);
			$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
			
			$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
			$objPage4->drawText("Question", $col2+10, $yPosTableStart - $lineHeight, 'UTF-8');
			$objPage4->drawText("Importance", $col3+2, $yPosTableStart - $lineHeight, 'UTF-8');
			$objPage4->drawText("Performance", $col4+2, $yPosTableStart - $lineHeight, 'UTF-8');
			
			$yPos -= ($lineHeight+13);
			$yPosTableStart = $yPos;
			$tableheight = 0;
			}			
		 
		/******************************************/

		$pdfFile = '/partneraware' . $this->objPartneringAwarenessAssessment->Id .rand(0,50). '.pdf';
		$objTenPPdf->save(__UPLOAD_DIR__ . $pdfFile);
		chmod(__UPLOAD_DIR__ . $pdfFile, 0777);
		QApplication::Redirect(__SUBDIRECTORY__.'/assets/uploads'.$pdfFile);
	}
	
}

ViewPartnerAwarenessAssessmentForm::Run('ViewPartnerAwarenessAssessmentForm');
class tenPArray {
			public $P;
			public $importance;
			public $performance;
		}
?>