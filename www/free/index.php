<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class FreeForm extends InstituteForm {
	protected $dtgPAssessment;
	protected $arrayPerformance;
	protected $arrayImportance;
	protected $assessmentArray;
	protected $page1;
	protected $page2;
	protected $page3;
	protected $page4;
	protected $txtIntro;
	protected $imgInfo;
	protected $txtPAssessmentIntro;
	protected $txtPDefinitions;
	protected $txtFAssessmentIntro;
	protected $txtFDefinitions;
	protected $dtgFAssessment;
	protected $arrayFPerformance;
	protected $arrayFImportance;
	protected $assessmentFArray;
	protected $txtSummary;
	protected $btnPage1Next;
	protected $btnPage2Prev;
	protected $btnPage2Next;
	protected $btnPage3Prev;
	protected $btnPage3Next;
	protected $btnPage4Prev;
	protected $imgFrame;
	protected $imgSummary;
	
	protected function Form_Run() {
	}
	
	protected function Form_Create() {
		$this->imgFrame = new QImageButton($this);
		$this->imgFrame->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/frame1.png';
		$this->imgFrame->CssClass = 'bicycleFrame';
		$this->imgFrame->Visible = false;
		
		$this->imgInfo = new QImageButton($this);
		$this->imgInfo->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/whatsnext.jpg';
		
		$this->page1 = new QImageButton($this);
		$this->page1->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page1Selected.png';
		$this->page1->AddAction(new QClickEvent(), new QAjaxAction('displayPage1'));
		$this->page1->Cursor = 'pointer';
		
		$this->page2 = new QImageButton($this);
		$this->page2->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page2.png';
		$this->page2->AddAction(new QClickEvent(), new QAjaxAction('displayPage2'));
		$this->page2->Cursor = 'pointer';
		
		$this->page3 = new QImageButton($this);
		$this->page3->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page3.png';
		$this->page3->AddAction(new QClickEvent(), new QAjaxAction('displayPage3'));
		$this->page3->Cursor = 'pointer';
		
		$this->page4 = new QImageButton($this);
		$this->page4->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page4.png';
		$this->page4->AddAction(new QClickEvent(), new QAjaxAction('displayPage4'));
		$this->page4->Cursor = 'pointer';
		
		$this->btnPage1Next = new QButton($this);
		$this->btnPage1Next->CssClass = 'primary';
		$this->btnPage1Next->Text = 'Next';
		$this->btnPage1Next->AddAction(new QClickEvent(), new QAjaxAction('displayPage2'));
		
		$this->btnPage2Next = new QButton($this);
		$this->btnPage2Next->CssClass = 'primary';
		$this->btnPage2Next->Text = 'Next';
		$this->btnPage2Next->AddAction(new QClickEvent(), new QAjaxAction('displayPage3'));
		$this->btnPage2Next->Visible = false;
		
		$this->btnPage2Prev = new QButton($this);
		$this->btnPage2Prev->CssClass = 'primary';
		$this->btnPage2Prev->Text = 'Previous';
		$this->btnPage2Prev->AddAction(new QClickEvent(), new QAjaxAction('displayPage1'));
		$this->btnPage2Prev->Visible = false;
		
		$this->btnPage3Next = new QButton($this);
		$this->btnPage3Next->CssClass = 'primary';
		$this->btnPage3Next->Text = 'Next';
		$this->btnPage3Next->AddAction(new QClickEvent(), new QAjaxAction('displayPage4'));
		$this->btnPage3Next->Visible = false;
		
		$this->btnPage3Prev = new QButton($this);
		$this->btnPage3Prev->CssClass = 'primary';
		$this->btnPage3Prev->Text = 'Previous';
		$this->btnPage3Prev->AddAction(new QClickEvent(), new QAjaxAction('displayPage2'));
		$this->btnPage3Prev->Visible = false;
		
		$this->btnPage4Prev = new QButton($this);
		$this->btnPage4Prev->CssClass = 'primary';
		$this->btnPage4Prev->Text = 'Previous';
		$this->btnPage4Prev->AddAction(new QClickEvent(), new QAjaxAction('displayPage3'));
		$this->btnPage4Prev->Visible = false;
		
		$this->txtIntro = new QLabel($this);
		$this->txtIntro->HtmlEntities = false;
		$this->txtIntro->Text = "<h2>Introduction</h2>";
		$this->txtIntro->Text .= "<p>We trust you've been encouraged and inspired as you've stepped through</p>";
		$this->txtIntro->Text .= "<ul><li>The History of God and Business</li>";
		$this->txtIntro->Text .= "<li>Business is Ministry</li>";
		$this->txtIntro->Text .= "<li>Repurposing Business</li>";
		$this->txtIntro->Text .= "<li> and Transforming Society.</li></ul>";
		
		$this->txtIntro->Text .= "As you consider the key points: ";
		$this->txtIntro->Text .= "<ul><li>that God has been using business to further his Kingdom through the ages,</li>";
		$this->txtIntro->Text .= "<li>the work you do can and should be ministry,</li>";
		$this->txtIntro->Text .= "<li>to effectively do so often requires a shift or repurposing of the way we do business,</li>";
		$this->txtIntro->Text .= "<li>and that in the process, God invites us to partner with him in transforming society</li></ul>";
		$this->txtIntro->Text .= "<p>the question you might be asking is HOW?</p>";
		$this->txtIntro->Text .= "<p>HOW do I effectively partner with God in this incredible undertaking?<br>";
		$this->txtIntro->Text .= "WHAT are the next steps I should be considering?</p>";
		$this->txtIntro->Text .= "<p>Before you can determine the next steps, you first need to assess your current state. The following abbreviated assessments assist in this and 
			introduce you to the Bicycle Model used by The Institute to bridge the gap from revelation to application.</p>";
		
		$this->txtPAssessmentIntro = new QLabel($this);
		$this->txtPAssessmentIntro->Text = "<h2>Corporate Impact</h2>";
		$this->txtPAssessmentIntro->Text .= "<p>This is an abbreviated version of The 10-P Assessment. It indicates potential areas of improvement in 10 drivers of corporate impact.</p>";
		$this->txtPAssessmentIntro->Text .= "<p>Please rate each statement below using the scale from 1 to 7 in the drop-down box to the right of the statement.<br>
			    1 - No, I do not agree, definitely not<br>
			    4 - Neutral, I neither agree nor disagree, maybe <br>
			    7 - Yes, I strongly agree, definitely<br></p>";
		$this->txtPAssessmentIntro->HtmlEntities = false;
		$this->txtPAssessmentIntro->Visible = false;
		
		$this->txtPDefinitions  = new QLabel($this);
		$this->txtPDefinitions->Text = "<h3>Definitions</h3>";
		$this->txtPDefinitions->Text .= "<p>PURPOSE - The purpose of an organization radically affects the ability of that organization to have an impact.<br>";
		$this->txtPDefinitions->Text .= "<p>PRODUCTS - Products and services are key components of how the customer experiences the organization.<br>";
		$this->txtPDefinitions->Text .= "<p>POSITIONING - The value proposition of the organization and what differentiates it from others is essential to creating Impact.<br>";
		$this->txtPDefinitions->Text .= "<p>PRESENCE - Marketing creates presence - a mind-set for the product or organization - and it builds a story and experience that goes beyond the simple consumption of the product. Presence results in Impact.<br>";
		$this->txtPDefinitions->Text .= "<p>PARTNERING - Partnering creates better Impact for organizations and their customers alike, because no one company can do everything well<br>";
		$this->txtPDefinitions->Text .= "<p>PROCESS - Core business processes can either be handled just efficiently, or they can be deliberately directed towards the creation of Impact<br>";
		$this->txtPDefinitions->Text .= "<p>PEOPLE - People have a tremendous effect on the Impact of the organization. When people - including the way in which they are organized - are thoroughly aligned with the Purpose of the organization, Impact is heightened.<br>";
		$this->txtPDefinitions->Text .= "<p>PLACE - A company's location, the environment/image of the facilities, the corporate identity that goes beyond buildings, proximity to customers, partners, and others in one's ecosystem ... all this is under Place, and can result in impact.<br>";
		$this->txtPDefinitions->Text .= "<p>PLANNING - Appropriate planning - not Strategy by Advertising - is still a crucial driver of Impact. Sustainable impact is best achieved in concert with sustainable economics.<br>";
		$this->txtPDefinitions->Text .= "<p>PROFIT - The economic model of a organization is clearly essential.<br>";
		$this->txtPDefinitions->Visible = false;
		$this->txtPDefinitions->HtmlEntities = false;
		
		$this->txtFAssessmentIntro = new QLabel($this);
		$this->txtFAssessmentIntro->Text = "<h2>Personal Impact</h2>";
		$this->txtFAssessmentIntro->Text .= "<p>This is an abbreviated version of The 10-F Assessment. It indicates potential areas of improvement in 10 drivers of personal impact.</p>";
		$this->txtFAssessmentIntro->Text .= "<p>Please rate each statement below using the scale from 1 to 7 in the drop-down box to the right of the statement.<br>
			    1 - No, I do not agree, definitely not<br>
			    4 - Neutral, I neither agree nor disagree, maybe <br>
			    7 - Yes, I strongly agree, definitely<br></p>";
		$this->txtFAssessmentIntro->HtmlEntities = false;
		$this->txtFAssessmentIntro->Visible = false;
		
		$this->txtFDefinitions  = new QLabel($this);
		$this->txtFDefinitions->Text = "<h3>Definitions</h3>";
		$this->txtFDefinitions->Text .= "<p>FUN - Fun involves the extent to which recreation is integrated into your life as well ensuring that fun is part of the routine of living.<br>";
		$this->txtFDefinitions->Text .= "<p>FULFILLMENT AT WORK - is about producing quality work, the personal meaning of work, and a sense of vocation about what you do.<br>";
		$this->txtFDefinitions->Text .= "<p>FUNCTION IN SOCIETY - It concerns your place in society and your contribution to the community of which you are a part.<br>";
		$this->txtFDefinitions->Text .= "<p>FRESH THINKING - people are born to create and that environments of fresh thinking rejuvenate you. Fresh thinking requires risking, perseverance, and a healthy degree of autonomy.<br>";
		$this->txtFDefinitions->Text .= "<p>FINANCES - reflect not just your ability to earn but also the ability to maximize your impact through effective management your finances. <br>";
		$this->txtFDefinitions->Text .= "<p>FITNESS - is often a practical expression of other personal values concerning self-respect and self-worth.<br>";
		$this->txtFDefinitions->Text .= "<p>FRIENDSHIPS - are true indicators of our connectedness, appropriate awareness of our brokenness, and the deep inner qualities of trust and genuine care.<br>";
		$this->txtFDefinitions->Text .= "<p>FEELINGS - concern attitudes to self and others. Feelings are often the unseen but powerful motivators of actions and relationships. <br>";
		$this->txtFDefinitions->Text .= "<p>FAITH - is about what ultimately concerns us the most and counteracts the human tendency to be consumed with self.<br>";
		$this->txtFDefinitions->Text .= "<p>FAMILY - speaks about your roots. Integrity begins at home where you are known for who you are.<br>";
		$this->txtFDefinitions->Visible = false;
		$this->txtFDefinitions->HtmlEntities = false;
		
		$this->txtSummary = new QLabel($this);
		$this->txtSummary->CssClass = 'freeassessmentSummary';
		$this->txtSummary->Text = "<h2>Summary</h2>";
		$this->txtSummary->Text .= "<p>Congratulations on completing the abbreviated 10-P and 10-F Assessments!</p>";
		$this->txtSummary->Text .= "<p>You'll no doubt be wondering what it means and how it relates to your future training.";
		$this->txtSummary->Text .= "You want to make an Impact? To do this you will need a leader's bicycle with a good front and back wheel. The back wheel represents Competence (The 10-P Model) and the front wheel represents Character (The 10-F Model).</p>";
		$this->txtSummary->Text .= "<p>In the Repurposing Business training classes that lie ahead you will have the opportunity to inspect each spoke of the wheel through a biblical lens. Just how does God develop product, market and recruit? How does one plan in faith and use one's brain?</p>"; 
		$this->txtSummary->Text .= "<p>101 dives right into Purpose and Profit, giving you a chance to develop a clear purpose statement, and comparing and contrasting God's economy with what happens out there today.</p>";
		$this->txtSummary->Text .= "<p>102 Gets into Product, Presence and Positioning: did you know a company's positioning can be determined by how God sees them? And that God markets through miracles?</p>";
		$this->txtSummary->Text .= "<p>103 couples People and Partnering, with a fresh understanding of Households... this powerful trio has changed many a business leader's life.</p>";
		$this->txtSummary->Text .= "<p>104 gets to the nitty gritty of Operating Models. Here you have a deeper dive into 'wineskins' with a focus on Process and Planning.</p>";
		$this->txtSummary->Text .= "<p>105 showcases Place which, when coupled with Hospitality, can cause God's presence to come in business. Did you know God uses Place as a megaphone for his message?</p>";					
		$this->txtSummary->HtmlEntities = false;
		$this->txtSummary->Visible = false;
		
		$this->imgSummary = new QImageButton($this);
		$this->imgSummary->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/classHierarchy.png';
		$this->imgSummary->CssClass = 'hierarchymodel';
		$this->imgSummary->Visible = false;
		
		$this->arrayPerformance = array();
		$this->arrayImportance = array();
		$this->dtgPAssessment = new TenPQuestionsDataGrid($this);
		$this->dtgPAssessment->AddColumn(new QDataGridColumn('', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgPAssessment->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
		$this->dtgPAssessment->AddColumn(new QDataGridColumn('Importance', '<?= $_FORM->lstImportance_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgPAssessment->AddColumn(new QDataGridColumn('Performance', '<?= $_FORM->lstPerformance_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgPAssessment->CellPadding = 5;
		$this->dtgPAssessment->UseAjax = true;
		
		$objStyle = $this->dtgPAssessment->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgPAssessment->AlternateRowStyle;
        $objStyle->BackColor = '#CCCCCC';

        $objStyle = $this->dtgPAssessment->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $objStyle = $this->dtgPAssessment->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $this->dtgPAssessment->SetDataBinder('dtgPAssessmentQuestions_Bind',$this); 
		$this->dtgPAssessment->Visible = false;
		
		/***********************************/
		$this->arrayFPerformance = array();
		$this->arrayFImportance = array();
		$this->dtgFAssessment = new TenFQuestionsDataGrid($this);
		$this->dtgFAssessment->AddColumn(new QDataGridColumn('', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgFAssessment->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
		$this->dtgFAssessment->AddColumn(new QDataGridColumn('Importance', '<?= $_FORM->lstFImportance_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgFAssessment->AddColumn(new QDataGridColumn('Performance', '<?= $_FORM->lstFPerformance_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgFAssessment->CellPadding = 5;
		$this->dtgFAssessment->UseAjax = true;
		
		$objStyle = $this->dtgFAssessment->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgFAssessment->AlternateRowStyle;
        $objStyle->BackColor = '#CCCCCC';

        $objStyle = $this->dtgFAssessment->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $objStyle = $this->dtgFAssessment->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $this->dtgFAssessment->SetDataBinder('dtgFAssessmentQuestions_Bind',$this); 
		$this->dtgFAssessment->Visible = false;
	
	}
	
	public function dtgPAssessmentQuestions_Bind() {
		/*
         * id
			1 	- purpose
			6	- product
			11	- positioning
			13	- presence
			18 	- partnering
			21	- process
			25 	- people
			32	- place
			33	- planning
			37	- profit
         */
        $this->assessmentArray = array();
        $this->assessmentArray[] = TenPQuestions::LoadById(1);	
        $this->assessmentArray[] = TenPQuestions::LoadById(6);
        $this->assessmentArray[] = TenPQuestions::LoadById(11);
        $this->assessmentArray[] = TenPQuestions::LoadById(13);
        $this->assessmentArray[] = TenPQuestions::LoadById(18);
        $this->assessmentArray[] = TenPQuestions::LoadById(21);
        $this->assessmentArray[] = TenPQuestions::LoadById(25);
        $this->assessmentArray[] = TenPQuestions::LoadById(32);
        $this->assessmentArray[] = TenPQuestions::LoadById(33);
        $this->assessmentArray[] = TenPQuestions::LoadById(37);			
		$this->dtgPAssessment->DataSource = $this->assessmentArray;
	}

	public function dtgFAssessmentQuestions_Bind() {
		/*
         * id
			1 	- feelings
			7	- fresh thinking
			11 	- friendships
			13	- fulfillment at work
			19	- function in society											
			22	- fun
			25	- family
			32	- fitness
			36 	- finances
			37	- faith
			
         */
        $this->assessmentFArray = array();
        $this->assessmentFArray[] = TenFQuestions::LoadById(1);	
        $this->assessmentFArray[] = TenFQuestions::LoadById(7);
        $this->assessmentFArray[] = TenFQuestions::LoadById(11);
        $this->assessmentFArray[] = TenFQuestions::LoadById(13);
        $this->assessmentFArray[] = TenFQuestions::LoadById(19);
        $this->assessmentFArray[] = TenFQuestions::LoadById(22);
        $this->assessmentFArray[] = TenFQuestions::LoadById(25);
        $this->assessmentFArray[] = TenFQuestions::LoadById(32);
        $this->assessmentFArray[] = TenFQuestions::LoadById(36);
        $this->assessmentFArray[] = TenFQuestions::LoadById(37);			
		$this->dtgFAssessment->DataSource = $this->assessmentFArray;
	}
	public function displayPage1() {
		// Hide all other pages and just display page 1
		$this->txtIntro->Visible = true;
		$this->dtgPAssessment->Visible = false;
		QApplication::ExecuteJavaScript('HideChart();');
		$this->dtgFAssessment->Visible = false;
		$this->txtPAssessmentIntro->Visible = false;
		$this->txtFAssessmentIntro->Visible = false;
		$this->txtSummary->Visible = false;
		$this->imgSummary->Visible = false;
		$this->btnPage1Next->Visible = true;
		$this->btnPage2Next->Visible = false;
		$this->btnPage2Prev->Visible = false;
		$this->btnPage3Next->Visible = false;
		$this->btnPage3Prev->Visible = false;
		$this->btnPage4Prev->Visible = false;
		$this->page1->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page1Selected.png';
		$this->page2->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page2.png';
		$this->page3->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page3.png';
		$this->page4->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page4.png';
		$this->imgInfo->Visible = true;
		$this->txtPDefinitions->Visible = false;
		$this->txtFDefinitions->Visible = false;
		$this->imgFrame->Visible = false;
	}
	
	public function displayPage2() {
		// Hide all other pages and just display page 2
		$this->txtIntro->Visible = false;
		$this->dtgPAssessment->Visible = true;
		$this->txtPAssessmentIntro->Visible = true;
		$this->txtFAssessmentIntro->Visible = false;
		$this->dtgFAssessment->Visible = false;
		$this->txtSummary->Visible = false;
		$this->imgSummary->Visible = false;
		$this->updateChart();
		$this->btnPage1Next->Visible = false;
		$this->btnPage2Next->Visible = true;
		$this->btnPage2Prev->Visible = true;
		$this->btnPage3Next->Visible = false;
		$this->btnPage3Prev->Visible = false;
		$this->btnPage4Prev->Visible = false;
		$this->page1->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page1.png';
		$this->page2->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page2Selected.png';
		$this->page3->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page3.png';
		$this->page4->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page4.png';
		$this->imgInfo->Visible = false;
		$this->txtPDefinitions->Visible = true;
		$this->txtFDefinitions->Visible = false;
		$this->imgFrame->Visible = false;
	}
	public function displayPage3() {
		// Hide all other pages and just display page 3
		$this->txtIntro->Visible = false;
		$this->dtgPAssessment->Visible = false;
		$this->txtPAssessmentIntro->Visible = false;
		$this->txtFAssessmentIntro->Visible = true;
		$this->updateFChart();
		$this->dtgFAssessment->Visible = true;
		$this->txtSummary->Visible = false;
		$this->imgSummary->Visible = false;
		$this->btnPage1Next->Visible = false;
		$this->btnPage2Next->Visible = false;
		$this->btnPage2Prev->Visible = false;
		$this->btnPage3Next->Visible = true;
		$this->btnPage3Prev->Visible = true;
		$this->btnPage4Prev->Visible = false;
		$this->page1->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page1.png';
		$this->page2->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page2.png';
		$this->page3->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page3Selected.png';
		$this->page4->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page4.png';
		$this->imgInfo->Visible = false;
		$this->txtPDefinitions->Visible = false;
		$this->txtFDefinitions->Visible = true;
		$this->imgFrame->Visible = false;
	}
	public function displayPage4() {
		// Hide all other pages and just display page 4
		$this->txtIntro->Visible = false;
		$this->dtgPAssessment->Visible = false;
		$this->txtPAssessmentIntro->Visible = false;
		$this->txtFAssessmentIntro->Visible = false;
		QApplication::ExecuteJavaScript('HideChart();');
		$this->dtgFAssessment->Visible = false;
		$this->txtSummary->Visible = true;
		$this->imgSummary->Visible = true;
		$this->btnPage1Next->Visible = false;
		$this->btnPage2Next->Visible = false;
		$this->btnPage2Prev->Visible = false;
		$this->btnPage3Next->Visible = false;
		$this->btnPage3Prev->Visible = false;
		$this->btnPage4Prev->Visible = true;
		$this->page1->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page1.png';
		$this->page2->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page2.png';
		$this->page3->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page3.png';
		$this->page4->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/page4Selected.png';
		$this->imgInfo->Visible = false;
		$this->txtPDefinitions->Visible = false;
		$this->txtFDefinitions->Visible = false;
		$this->imgFrame->Visible = true;
		$this->updateBicycle();
	}
	
	public function lstImportance_Render(TenPQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'importance' . $objQuestions->Id;
        // Let's see if the Checkbox exists already
        $lstImportance = $this->GetControl($strControlId);
            
        if (!$lstImportance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstImportance = new QListBox($this->dtgPAssessment, $strControlId);
            $lstImportance->Width = 100;
            $lstImportance->ForeColor = '#F90949';
            $lstImportance->AddAction(new QChangeEvent(), new QAjaxAction('updateChart'));
            for ($i=1; $i<8; $i++) {
	            $lstImportance->AddItem($i,$i);
	        }
                                 
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstImportance->ActionParameter = $objQuestions->Id;
            $this->arrayImportance[] = $lstImportance;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstImportance->Render(false);
    }
    
	public function lstFImportance_Render(TenFQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'Fimportance' . $objQuestions->Id;
        // Let's see if the Checkbox exists already
        $lstImportance = $this->GetControl($strControlId);
            
        if (!$lstImportance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstImportance = new QListBox($this->dtgFAssessment, $strControlId);
            $lstImportance->Width = 100;
            $lstImportance->ForeColor = '#F90949';
            $lstImportance->AddAction(new QChangeEvent(), new QAjaxAction('updateFChart'));
            for ($i=1; $i<8; $i++) {
	            $lstImportance->AddItem($i,$i);
	        }
                                 
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstImportance->ActionParameter = $objQuestions->Id;
            $this->arrayFImportance[] = $lstImportance;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstImportance->Render(false);
    }
    
	public function lstPerformance_Render(TenPQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'performance' . $objQuestions->Id;
		
        // Let's see if the Checkbox exists already
        $lstPerformance = $this->GetControl($strControlId);
            
        if (!$lstPerformance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstPerformance = new QListBox($this->dtgPAssessment, $strControlId);
            $lstPerformance->Width = 100;
            $lstPerformance->ForeColor = '#131BF9';
            
            for ($i=1; $i<8; $i++) {
	            $lstPerformance->AddItem($i,$i);
	        }
            $lstPerformance->AddAction(new QChangeEvent(), new QAjaxAction('updateChart')); 
             
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstPerformance->ActionParameter = $objQuestions->Id;
            $this->arrayPerformance[] = $lstPerformance;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstPerformance->Render(false);
    }
    
	public function lstFPerformance_Render(TenFQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'Fperformance' . $objQuestions->Id;
		
        // Let's see if the Checkbox exists already
        $lstPerformance = $this->GetControl($strControlId);
            
        if (!$lstPerformance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstPerformance = new QListBox($this->dtgFAssessment, $strControlId);
            $lstPerformance->Width = 100;
            $lstPerformance->ForeColor = '#131BF9';
            
            for ($i=1; $i<8; $i++) {
	            $lstPerformance->AddItem($i,$i);
	        }
            $lstPerformance->AddAction(new QChangeEvent(), new QAjaxAction('updateFChart')); 
             
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstPerformance->ActionParameter = $objQuestions->Id;
            $this->arrayFPerformance[] = $lstPerformance;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstPerformance->Render(false);
    }
    
	protected function updateChart() {
		$chartArray = array();
		$i=0;
		foreach($this->assessmentArray as $objQuestion) {
			$objItem = new valuesArray();
			$objItem->P = CategoryType::ToString($objQuestion->CategoryId);
			$objItem->importance = (count($this->arrayImportance)>$i)? $this->arrayImportance[$i]->SelectedValue : 0;
			$objItem->performance = (count($this->arrayPerformance)>$i)? $this->arrayPerformance[$i]->SelectedValue : 0;		
			$chartArray[] = $objItem;
			$i++;
		}
			
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($chartArray).');');
	}
	
	protected function updateFChart() {
		$chartArray = array();
		$i=0;
		foreach($this->assessmentFArray as $objQuestion) {
			$objItem = new valuesArray();
			$objItem->P = FCategoryType::ToString($objQuestion->CategoryId);
			$objItem->importance = (count($this->arrayFImportance)>$i)? $this->arrayFImportance[$i]->SelectedValue : 0;
			$objItem->performance = (count($this->arrayFPerformance)>$i)? $this->arrayFPerformance[$i]->SelectedValue : 0;		
			$chartArray[] = $objItem;
			$i++;
		}
			
		QApplication::ExecuteJavaScript('DisplayFChart('.json_encode($chartArray).');');
	}
	
	protected function updateBicycle() {
		$backWheel = array();
		$i=0;
		foreach($this->assessmentArray as $objQuestion) {
			$objItem = new valuesArray();
			$objItem->P = CategoryType::ToString($objQuestion->CategoryId);
			$objItem->importance = (count($this->arrayImportance)>$i)? $this->arrayImportance[$i]->SelectedValue : 0;
			$objItem->performance = (count($this->arrayPerformance)>$i)? $this->arrayPerformance[$i]->SelectedValue : 0;		
			$backWheel[] = $objItem;
			$i++;
		}

		$frontWheel = array();
		$i=0;
		foreach($this->assessmentFArray as $objQuestion) {
			$objItem = new valuesArray();
			$objItem->P = FCategoryType::ToString($objQuestion->CategoryId);
			$objItem->importance = (count($this->arrayFImportance)>$i)? $this->arrayFImportance[$i]->SelectedValue : 0;
			$objItem->performance = (count($this->arrayFPerformance)>$i)? $this->arrayFPerformance[$i]->SelectedValue : 0;		
			$frontWheel[] = $objItem;
			$i++;
		}
		QApplication::ExecuteJavaScript('DisplayBike('.json_encode($backWheel).','.json_encode($frontWheel).');');
	}
}

FreeForm::Run('FreeForm');

class valuesArray {
	public $P;
	public $importance;
	public $performance;
} 
?>