<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
// Setup Zend Framework load
set_include_path(get_include_path() . ':' . __INCLUDES__);
require_once(dirname(__FILE__) .'/../../../includes/Zend/Loader.php');
Zend_Loader::loadClass('Zend_Pdf');

class LemonGroupResultsForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'LEMON Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objLemonAssessment;
	//protected $dtgAssessmentResults;
	protected $btnReturn;
	protected $lblLemonDescription;
	protected $lblIntroduction;
	protected $lblFriendlyName;
	protected $lblGoodDay;
	protected $lblBadDay;
	protected $btnGeneratePdf;
	protected $objUser;
	protected $primary;
	protected $secondary;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemon/groupLogin.php');
	}
	
	protected function Form_Create() {	
	$this->lblIntroduction = new QLabel($this);
	$this->lblIntroduction->HtmlEntities = false;
	$this->lblGoodDay = new QLabel($this);
	$this->lblGoodDay->HtmlEntities = false;
	
	$this->lblBadDay = new QLabel($this);
	$this->lblBadDay->HtmlEntities = false;
	
		$intUserId = QApplication::PathInfo(0);
		if($intUserId) { //show the assessment specified
			$assessmentArray = LemonAssessment::LoadArrayByUserId($intUserId);
			$this->objLemonAssessment = $assessmentArray[0];
		} else { // show the user's assessment	
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			$assessmentArray = LemonAssessment::LoadArrayByUserId($intUserId);
			$this->objLemonAssessment = $assessmentArray[0];
		}
		$this->objUser = User::Load($intUserId);
		$objCompany = $this->objUser->GetCompanyArray();
		if(($objCompany !=null) && count($objCompany)>0 )
			$txtCompany = $objCompany[0]->Name;
		else 
			$txtCompany = 'None Specified';
		$date_modified = $this->objLemonAssessment->DateModified; 
		$this->lblIntroduction->Text = sprintf('<b>Name:</b> %s %s<br><b>Date Of Self-Assessment: </b>%s<br><b>Organization:</b> %s<br><b>Title/Designation:</b> %s',
			$this->objUser->FirstName,$this->objUser->LastName,$date_modified,$txtCompany,$this->objUser->Title ? $this->objUser->Title->Name : ' None Specified');	
	/*								
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
        $objStyle->BackColor = '#0098c3'; 
        
        $objStyle = $this->dtgAssessmentResults->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
       */ 
	 	$this->lblLemonDescription = new QLabel($this);
	 	$this->lblLemonDescription->CssClass = 'tablecell';
	 	$this->lblLemonDescription->Width = 600;
	 	$this->lblLemonDescription->HtmlEntities = false;
	 	$this->lblLemonDescription->Text = $this->getLemonDescription();
	 	
	 	$this->btnGeneratePdf =  new QButton($this);
	 	$this->btnGeneratePdf->Text = 'Generate PDF of Report';
	 	$this->btnGeneratePdf->AddAction(new QClickEvent(), new QAjaxAction('btnGeneratePdf_Click'));
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
				$lemonValues[$key] = $objResult->Value;
			}
		}
		arsort($lemonValues,SORT_NUMERIC);
		$i=1;
		$strPrimary = '';
		$strSecondary = '';
		$strPrimaryKey = '';
		$strSecondaryKey = '';
		foreach($lemonValues as $key=>$value) {
			if(($i==1) ||($i==2)) { // Get Primary and Secondary descriptions
				switch($key) {
					case 'Luminary':
						$strDescription =
						'<h4>Characteristics</h4>
						 <p>You seem to possess elements of a thought leader. It means that your thinking takes something that exists, finds the gaps, 
						 the implications, or the areas of improvement and moves it further down the road. You tend to value concepts, mental constructs and philosophies. 
						 It does not mean you are not concrete in your thought patterns. Your view of reality is one in which principles dominate. </p>
						 <p>Generally, you have an ability to keep things in focus for years, not just months, 
						 weeks or days. You tend to synthesize data from all sorts of places and form an intuitive view of the future that is uncannily accurate.  
						 More often it is the ability to see principles at work in the past, understand today in light of such principles, and then make a clear 
						 statement about what this means for future.</p>
						 <h4>Work</h4>
						 <p>Luminaries think for work, wrestle with ideas, dialogue, form perspective and often write them down. You tend to think through the 
						 implications of your work for the communities and for your organization in particular. You don\'t just think, but also plan. 
						 These plans are not necessarily the detailed action plans, but they are a "big picture" plans which may include more adjectives than words. 
						 Because of long range nature of your plans, you may succeed slowly, unfortunately fail slowly.</p>
						 ';	
						if ($i==1) {
							$this->primary = 'Luminary';
							$strGoodDay = 
							'<h3>Good Day - Strengths of a Luminary</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px; width:700px;">
							<tr><th class="LuminaryHead">Head</th><th class="LuminaryHead">Hands</th><th class="LuminaryHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Blend principle and passion behind Purpose</li>
								<li>See what others can’t</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Talented across multiple areas</li>
								<li>Do things better the first time</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Embrace people with same ideas</li>
								<li>Can stay focused on a dream</li>													
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						if ($i==2) {
							$this->secondary = 'Luminary';
							$strBadDay = 
							'<h3>Bad Day - Weaknesses of a Luminary</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px; width:700px;">
							<tr><th class="LuminaryHead">Head</th><th class="LuminaryHead">Hands</th><th class="LuminaryHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Proprietary</li>
								<li>Hold on too long or jump too quickly</li>	
								<li>Exhaust team with ideas</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Become disconnected</li>
								<li>Hand-off too quickly</li>
								<li>Don\'t adjust speed</li>														
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Write-off those who can\'t keep up</li>
								<li>See lack of enthusiasm as opposition</li>													
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						break;
					case 'Entrepreneur':
						$strDescription = 
						'<h4>Characteristics</h4>
						<p>You as an Entrepreneur have a tendency to see opportunities where others see difficulties, challenges, opposition or nothing. 
						You are not starry eyed about everything working out fine. More often you may sift out bad opportunities quickly. You have incredible 
						knack of spotting good opportunities in people. You believe that Human Capital-and leadership in particular-is a precious asset.</p>						
						<p>Entrepreneurs are opportunists in the most positive sense of the word. Many Entrepreneurs are short-to-medium term thinkers. 
						If you think something does not work, then you will find another opportunity. You tend to tolerate risk and know that all ventures have 
						some risk. Most often you like people who start things and get things done.</p>
						<p>As an entrepreneur, you have a great gift for accumulating the resources that are needed to make something viable, particularly 
						during the early stages. You know how to put together the right mix of intellectual, human, financial, spiritual and relational 
						capital to make something work.</p>				
						<h4>Work</h4>
						<p>Your definition of work has more verbs than it does for a Luminary. You identify needs, find ways to fill needs, and then find ways to 
						design, build, market and manage those products. You keep your eyes and ears open to seize new opportunities. You tend to anticipate and 
						minimize risk. You sell new opportunity to those who can help bring it about (financiers, staff, customers etc.). You pull together necessary 
						elements for opportunity to happen (People, capital, space etc.). You constantly make adjustments until something works or until the writing 
						is on the wall that it won\'t work.   </p>					
						';
						if ($i==1) {
							$this->primary = 'Entrepreneur';
							$strGoodDay = 
							'<h3>Good Day - Strengths of a Entrepreneur</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px; width:700px;">
							<tr><th class="EntrepreneurHead">Head</th><th class="EntrepreneurHead">Hands</th><th class="EntrepreneurHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Intuitively senses viability</li>
								<li>High risk tolerance</li>													
								<li>Rapid pace</li>
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Focus on early action</li>
								<li>Basic building blocks to seize opportunity</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Energy level others warm to</li>
								<li>Can create a following</li>													
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						if ($i==2) {
							$this->secondary = 'Entrepreneur';
							$strBadDay = 
							'<h3>Bad Day - Weaknesses of a Entrepreneur</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px; width:700px;">
							<tr><th class="EntrepreneurHead">Head</th><th class="EntrepreneurHead">Hands</th><th class="EntrepreneurHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Fail to learn</li>
								<li>Blinded by one to two strengths</li>	
								<li>Don\'t see big picture</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Lack depth of skills</li>
								<li>Don\'t like stricture</li>
								<li>Can fake skills</li>														
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Quickly pass over those who don\'t play</li>
								<li>See people as resources to be used</li>													
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						break;
					case 'Manager':
						$strDescription = 
						'<h4>Characteristics</h4>
						 <p>To you, as a Manager, proper planning precedes activities. The game doesn\'t really begin until you have a plan.
						 Anything you do before you have the plan is just activity and not to be confused with work. You are seldom seen
						 being in panic and also perceived to be level headed. You don\'t normally reinvent the wheel. You will rather take
						 the reality as it is and intentionally change it to something better over time. Once it is working, you leave it the
						 way it is.</p>
						 <p>You are a longer-term thinker than an entrepreneur, with a depth of focal length that is not as long as that of a
						 Luminary. You also tend to believe that processes are there to free people to be the best they can be. You find
						 greater joy in building people and organizations.</p>
						 <h4>Work</h4>
						 <p>Taking an idea or an opportunity and turning it into a detailed plan is one of the things that you regard as real
						 work. You like to envision, design and implement processes that help you, your team and organization. You are
						 comfortable working in a clear reporting mechanism that keep everyone informed about whether the
						 team/organization is on track. If you have a team working with you, you love to see them grow and develop and
						 therefore provide regular objective inputs.</p>
						 ';
						if ($i==1) {
							$this->primary = 'Manager';
							$strGoodDay = 
							'<h3>Good Day - Strengths of a Manager</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px;  width:700px;">
							<tr><th class="ManagerHead">Head</th><th class="ManagerHead">Hands</th><th class="ManagerHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Patient, can stay on course</li>
								<li>Understand processes, skilled teams</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>At least one specialty</li>
								<li>Builds for results</li>
								<li>Consistent</li>															
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Deliberate</li>
								<li>Bonds stand test of time</li>													
								<li>Not easily offended</li>
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						if ($i==2) {
							$this->secondary = 'Manager';
							$strBadDay = 
							'<h3>Bad Day - Weaknesses of a Manager</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px;  width:700px;">
							<tr><th class="ManagerHead">Head</th><th class="ManagerHead">Hands</th><th class="ManagerHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Lack creativity and spontaneity</li>
								<li>Failure is due to lack of planning</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Rigid; play by their rules</li>
								<li>Use policies as big stick</li>
								<li>Focused on technicalities</li>														
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Cool and calculating; </li>
								<li>high external wall</li>
								<li>High expectations</li>															
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						break;
					case 'Organizer':
						$strDescription =
						'<h4>Characteristics</h4>
						 <p>You are tipped to be one of intuitive problem solvers. While generally, Organizers are not gifted to anticipate well in advance what 
						 should be done and do not lay out best plans, but you do anticipate that something will go wrong and you are there with the toolbox to 
						 remedy things. One cannot predict a crisis, but when it happens, people can count on you that you would most probably be on the scene. 
						 You are capable and regarded as one with a high degree of instinct. Sometimes, people seldom see value in you because they cannot understand 
						 or explain why or how you do things or get things done. </p>
						 <p>In the competencies continuum one can safely say that you could be placed at a point as a person with unconscious competence. To you, quick 
						 result is the best result and sooner is better than later. You would rather take a chance that something is wrong and redo it later, than see it 
						 lying around open ended for a long time.</p>
						 <h4>Work</h4>
						 <p>At work, you are seen swinging into action and focus with intensity on getting something closed out. You keep a mental catalogue of loose 
						 ends (sometimes you may have lists in writing) and efficiently discern the critical path to closure. You quickly figure out what the issues are, 
						 and who has them. These are not just task related issues, but people issues: who is on board, who has authority, who is at odds with others, 
						 who is happy and unhappy. So, having done the work of finding the issues, you tend to create on-the-spot solutions that may not be sustainable 
						 over time, but are good enough for now. You also tend to empathize with those in need and take on the practical concerns of those who are less 
						 empowered than others.</p>						 
						';
						if ($i==1) {
							$this->primary = 'Organizer';
							$strGoodDay = 
							'<h3>Good Day - Strengths of a Organizer</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px; width:700px;">
							<tr><th class="OrganizerHead">Head</th><th class="OrganizerHead">Hands</th><th class="OrganizerHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Practical implications of vision</li>
								<li>Makes things happen</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Critical tasks for 70% solution</li>
								<li>Temporary fixes</li>
								<li>Spots issues</li>															
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Intuitive sense of others\' needs and wants</li>
								<li>Takes ownership</li>													
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						if ($i==2) {
							$this->secondary = 'Organizer';
							$strBadDay = 
							'<h3>Bad Day - Weaknesses of a Organizer</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px;  width:700px;">
							<tr><th class="OrganizerHead">Head</th><th class="OrganizerHead">Hands</th><th class="OrganizerHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Creates issues</li>
								<li>No boundaries; meanders into others\' work</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Won\'t lay down intuition</li>
								<li>Puts spanners in spokes</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Loyal to self rather than organization</li>
								<li>Feels under-appreciated; "If I left..."</li>															
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						break;
					case 'Networker':
						$strDescription = 
						'<h4>Characteristics</h4>
						   <p>You believe that work starts by gathering - not with idea formulation or planning. You are regarded as people
						   oriented in a way that makes it easy for others to connect with you. You would like to make people feel special,
						   and you are usually good at verbal affirmation. You have the ability to connect the dots on relationships that
						   seem spurious to the rest. You may not be always right, but strongly believe in the power of relational networks.</p>
						   <p>You may also be more of event-driven than people driven. You normally have an instinct to show up at the right
						   places at the right time. You care about who can help you accomplish your agenda at the moment or who you
						   can help achieve their dreams.</p>
						   <h4>Work</h4>
						   <p>You are able to determine who (People, groups) should be connected to accomplish a purpose and are able to
						   pencil dots between such groups before they see the advantages of linkages. Your primary work, therefore
						   involves getting out there, meeting people, assessing what network they need to be successful, building the
						   network one node at a time, and pulling relational pieces together. To you, the real work is relating to people,
						   getting groups together, rubbing shoulders, checking-in, touching base, conferencing, and calling. Achieving
						   objectives and meeting quota.</p></p>';
						if ($i==1) {
							$this->primary = 'Networker';
							$strGoodDay = 
							'<h3>Good Day - Strengths of a Networker</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px;  width:700px;">
							<tr><th class="NetworkerHead">Head</th><th class="NetworkerHead">Hands</th><th class="NetworkerHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Understand people</li>
								<li>Possibilities in networks</li>													
								<li>Make vague links work</li>
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Keep network primed</li>
								<li>Tireless in contacting people</li>															
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Make everyone feel like "Best friend"</li>
								<li>Encourage others</li>													
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						if ($i==2) {
							$this->secondary = 'Networker';
							$strBadDay = 
							'<h3>Bad Day - Weaknesses of a Networker</h3>
							<table style="border:1px solid black; border-collapse:collapse; padding:10px;  width:700px;">
							<tr><th class="NetworkerHead">Head</th><th class="NetworkerHead">Hands</th><th class="NetworkerHead">Heart</th></tr>
							<tr>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Assessing reality</li>
								<li>Vision de jour</li>
								<li>Administering discipline</li>															
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Poor follow through; random if not held accountable</li>
								<li>Being practical</li>													
								</ul>
							</td>
							<td style="border:1px solid black; border-collapse:collapse; padding:10px;">
								<ul>
								<li>Delays sharing bad news</li>
								<li>Assumes same tolerance for ambiguity</li>															
								</ul>
							</td>
							</tr>
							</table>
							';	
						}
						break;
				}
				if($i==1) {
					$strPrimary =  '<h4>Your Primary LEMON Type is: <span class="'.$key.'">' .$key . '</span></h4>' .$strDescription;
					$strPrimaryKey = $key;
				} else {
					$strSecondary = '<h4>Your Secondary LEMON Type is: <span class="'.$key.'">' .$key . '</h4>' .$strDescription;
					$strSecondaryKey = $key;
				}
			}
			$i++;
		}
		$strSummary = 'According to your assessment you are a Primary '. $strPrimaryKey.
					  ' and a Secondary '.$strSecondaryKey.'<br>This means that ... <br>';

		$this->lblGoodDay->Text = $strGoodDay;
		$this->lblBadDay->Text = $strBadDay;
		return $strPrimary .'<br>'. $strSecondary;
	}
	
protected function btnGeneratePdf_Click() { 
		// Create the PDF Object for the PDF
		$objLemonPdf = new Zend_Pdf();		
		// Create PDF
		$PageHeight = 750;
		$objPage1 = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objLemonPdf->pages[] = $objPage1;
		$objPage1->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 24);
		$objPage1->drawText("LEMON Leadership Assessment Report", 50, $PageHeight, 'UTF-8');
		$ZendImage = Zend_Pdf_Image::imageWithPath(__DOCROOT__ . __IMAGE_ASSETS__ . '/LemonReportSplashPage.jpg');
		$objPage1->drawImage($ZendImage, 1, $PageHeight-500, 600, $PageHeight-50);
		$objCompany = $this->objUser->GetCompanyArray();
		if(count($objCompany)>0)
			$txtCompany = $objCompany[0]->Name;
		else 
			$txtCompany = 'None Specified';
		$date_modified = $this->objLemonAssessment->DateModified; 
		$objPage1->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 10);
		$strText = sprintf('Name: %s %s', $this->objUser->FirstName,$this->objUser->LastName);
		$objPage1->drawText($strText, 100, $PageHeight-400, 'UTF-8');
		$strText = sprintf('Date Of Self-Assessment: %s', $date_modified);
		$objPage1->drawText($strText, 100, $PageHeight-412, 'UTF-8');
		$strText = sprintf('Organization: %s', $txtCompany);
		$objPage1->drawText($strText, 100, $PageHeight-424, 'UTF-8');
		$strText = sprintf('Title/Designation: %s', $this->objUser->Title ? $this->objUser->Title->Name : ' None Specified');
		$objPage1->drawText($strText, 100, $PageHeight-436, 'UTF-8');
		/*******************************************/
		$objPage2 = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objLemonPdf->pages[] = $objPage2;
		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage2->drawText("Introduction", 40, $PageHeight, 'UTF-8');
		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$lineHeight = 13;
		$yPos = $PageHeight-$lineHeight - 5;
		$objPage2->drawText("It is often stated that there is no shortage of capital or ideas, but that we have a drastic shortage of leaders.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("The response to this has been a deluge of books and courses on how to lead. However, we live in a culture that is", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("structured around accumulating knowledge but ignoring mechanisms to really find out who we are.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Peter Drucker has stated that of the thousands of students that he has worked with, many knew what to do ... but very few knew ", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("who they were. Our belief is that it is more important in the long run to know who you are - than to know what to do.", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight + 5);  
		$objPage2->drawText("LEMON Leadership is not a \"How to\" of leadership, but \"Who are you?\" It looks at leadership in a fresh way.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;  
		$objPage2->drawText("If you are a good leader you will lead out of your identity. It doesn't matter too much what your style, academic background", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;  
		$objPage2->drawText("or ethnicity may be. The key is to know what type of leader you are. This assessment is based on Brett Johnson's book,", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;  
		$objPage2->drawText("LEMON Leadership, where he writes about five types of leaders:", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$ZendImage = Zend_Pdf_Image::imageWithPath( __DOCROOT__ . __IMAGE_ASSETS__ . '/lemonassessment.png');		
		$objPage2->drawImage($ZendImage, 80, $yPos-40, 510, $yPos);
		$yPos -= ($lineHeight + 80);
		$objPage2->drawText("Have you ever wondered why others see life so differently from you? Do you suspect that others do not grasp reality", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("like you do? Do you understand who you are, and that it is important for others to be different?", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Do you understand how others, even your spouse and close friends, see life? Does the way other people approach a situation", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("confuse, irritate, or exasperate you? In your work environment, do you think that you are the only one really working?", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Do you feel that your contribution is not appreciated? Do you get frustrated with how things are done, or not done?", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Do you frustrate others? Do you experience people getting touchy or defensive about things that, from your perspective,", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("are not that important?", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+5);            
		$objPage2->drawText("Have you had breakdowns in communication? Have you given instructions that are not properly", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("understood, and batons that are dropped, or handovers that are not completed?", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("In your organisation - where are you in the current life-cycle? Do you have the right leadership", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("mix for this stage of your corporate life-cycle? What about the next stage? Are the right staff joining? ", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Are the wrong staff leaving? Do you know who you need and how to identify them?", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("If these are questions you are grappling with, then we believe that LEMON Leadership can assist you and your teams", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("to be more effective and create the right impact in your organisations and with the people that you work with.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Remember! You lead out of your identity.... who you are! Not your style, preference or temperament, but your ", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;$objPage2->drawText("DNA wiring..... your type.", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);
		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage2->drawText("A brief look at LEMON Leadership", 40, $yPos, 'UTF-8');
		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$yPos -= ($lineHeight+5);
		
		$objPage2->drawText("There are 5 types of leaders, and all of us are a combination of the 5 types. When we do coaching we look at these in detail, ", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("but here is the summary:", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+5);
		$objPage2->drawText("The Luminary lives in the world of Ideas and asks the question ... Why?", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("The Entrepreneur lives in the world of Opportunities and asks the question ... Why not? ", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("The Manager lives in the world of Systems and asks the question ... How?", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("The Organiser lives in the world of Tasks and asks the question ... What?", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("The Networker lives in the world of Connections and asks the question ... Who?", 40, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);

		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage2->drawText("LEMON Leadership looks at ...", 40, $yPos, 'UTF-8');
		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$yPos -= ($lineHeight+5);
		$objPage2->drawText("- How each LEMON defines reality", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("- Their starting point for everything that they do", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("- Who they gravitate towards, and who they ignore", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("- What each one defines as \"Work\"", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("- How they approach life, and everything that they do", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("- What they focus on", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("- Their depth of vision", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
	/*****************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage3 = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objLemonPdf->pages[] = $objPage3;
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage3->drawText("Once we have looked at each LEMON type in detail, we move on to see how they interact with", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("one another. We look at, discuss and workshop ...", 40, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+5);
		$objPage3->drawText("- Their strengths and weaknesses", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- What they protect under pressure", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- What they hold on to, and what they let go easily.", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- How they communicate - what they mean when they all say the same thing and it means 5 different things", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- How they handle confrontation and correction", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- How they relate and behave in a team", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- How they are on a good day, and how they are on a bad day", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- What is important and unimportant to each one", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- How to \"twist the LEMON\". i.e. - How to adapt to different circumstances", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("  We get to understand what is on their radar", 40, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);

		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage3->drawText("Understanding LEMON Leadership can help you ...", 40, $yPos, 'UTF-8');
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$yPos -= ($lineHeight+5);
		$objPage3->drawText("- Understand who you really are as a leader.", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- Understand who your colleagues or fellow leaders are and how their 'identity' affects the way", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- Understand who your colleagues or fellow leaders are and how their 'identity' affects the way", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("  they lead, communicate, handle conflict, etc.", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- Understand certain \"Lemon Truisms\" about your leadership", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- Gain an appreciation for your and others leadership DNA and the dynamics this creates at", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("  an individual, team and organisational level", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("- Communicate with your prospective clients, clients and suppliers in a way they understand", 40, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+20);

		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage3->drawText("Testimonials of Benefits", 40, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage3->drawText("'This assessment tool and the program has given a new framework for effective communication among many other benefits'", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_ITALIC), 10);
		$objPage3->drawText("- Harish Kumar, Human Resources, Tata Consultancy Services", 40, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+8);
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage3->drawText("'I think this is quite powerful. I am interested to undergo more advanced training in LEMON Leadership to deeply", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("apply these principles and benefit from it'", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_ITALIC), 10);
		$objPage3->drawText("- Rufus George, Asst Director, Federation of Indian Chamber of Commerce and Industry", 40, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+8);
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage3->drawText("'Refreshing and highly innovative approach with a practical individual and team application.", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("For teams, this becomes a practical way to see what role types are missing. And for decision making and", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("strategy, this becomes critical - especially in tackling innovation and agility across the organization.", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("Thanks for providing the most direct approach I've seen to providing team and individual insights more ", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("quickly and clearly - enabling us to apply immediately.'", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_ITALIC), 10);
		$objPage3->drawText("- Suzanne Lee, Voice of the Customer Manager, Cisco Systems, USA", 40, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+8);
		$objPage3->drawText("'We used LEMON in our senior leadership team to understand ourselves and each other better. A year on, we still", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->drawText("talk about LEMON. It has really helped us understand and value diversity in our team.'", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_ITALIC), 10);
		$objPage3->drawText("- Rose Keanly, Managing Director: Old Mutual Service, Technology & Administration, Old Mutual, South Africa", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;

		/*****************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage4 = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objLemonPdf->pages[] = $objPage4;
		$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage4->drawText("Your Personal Profile and Report", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;	
		$ZendImage = Zend_Pdf_Image::imageWithPath( __UPLOAD_DIR__.'/Lemon' . $this->objLemonAssessment->Id. '.png');		
		$objPage4->drawImage($ZendImage, 10, $yPos-200, 400, $yPos);
		$yPos -= ($lineHeight + 230);
		
		switch($this->primary) {
			case 'Luminary':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Primary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#79b9c9'))->drawText("Luminary", 200, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You seem to possess elements of a thought leader. It means that your thinking takes something that exists, finds the gaps,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("the implications, or the areas of improvement and moves it further down the road. You tend to value concepts, mental constructs", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("and philosophies. It does not mean you are not concrete in your thought patterns. Your view of reality is one in which principles", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("dominate.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("Generally, you have an ability to keep things in focus for years, not just months,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("weeks or days. You tend to synthesize data from all sorts of places and form an intuitive view of the future that is uncannily accurate.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("More often it is the ability to see principles at work in the past, understand today in light of such principles, and then make a clear", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("statement about what this means for future.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("Luminaries think for work, wrestle with ideas, dialogue, form perspective and often write them down. You tend to think through the", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("implications of your work for the communities and for your organization in particular. You don't just think, but also plan.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("These plans are not necessarily the detailed action plans, but they are a \"big picture\" plans which may include more adjectives than", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("words. Because of long range nature of your plans, you may succeed slowly, unfortunately fail slowly.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);				
				break;
			
			case 'Entrepreneur':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Primary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#67df64'))->drawText("Entrepreneur", 200, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You as an Entrepreneur have a tendency to see opportunities where others see difficulties, challenges, opposition or nothing.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("You are not starry eyed about everything working out fine. More often you may sift out bad opportunities quickly. You have incredible", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("knack of spotting good opportunities in people. You believe that Human Capital-and leadership in particular-is a precious asset.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("Entrepreneurs are opportunists in the most positive sense of the word. Many Entrepreneurs are short-to-medium term thinkers.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("If you think something does not work, then you will find another opportunity. You tend to tolerate risk and know that all ventures have", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("some risk. Most often you like people who start things and get things done.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("Your definition of work has more verbs than it does for a Luminary. You identify needs, find ways to fill needs, and then find ways to", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("design, build, market and manage those products. You keep your eyes and ears open to seize new opportunities. You tend to anticipate and", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("minimize risk. You sell new opportunity to those who can help bring it about (financiers, staff, customers etc.). You pull together necessary", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("elements for opportunity to happen (People, capital, space etc.). You constantly make adjustments until something works or until the writing", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;				
				$objPage4->drawText("is on the wall that it won\'t work.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				break;
				
			case 'Manager':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Primary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#ffcb3c'))->drawText("Manager", 200, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("To you, as a Manager, proper planning precedes activities. The game doesn\'t really begin until you have a plan.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("Anything you do before you have the plan is just activity and not to be confused with work. You are seldom seen", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("being in panic and also perceived to be level headed. You don\'t normally reinvent the wheel. You will rather take", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("the reality as it is and intentionally change it to something better over time. Once it is working, you leave it the", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("way it is.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("You are a longer-term thinker than an entrepreneur, with a depth of focal length that is not as long as that of a", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("Luminary. You also tend to believe that processes are there to free people to be the best they can be. You find", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("greater joy in building people and organizations.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("Taking an idea or an opportunity and turning it into a detailed plan is one of the things that you regard as real", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("work. You like to envision, design and implement processes that help you, your team and organization. You are", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("comfortable working in a clear reporting mechanism that keep everyone informed about whether the", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("team/organization is on track. If you have a team working with you, you love to see them grow and develop and", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;				
				$objPage4->drawText("therefore provide regular objective inputs.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				break;
				
			case 'Organizer':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Primary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#e58e42'))->drawText("Organizer", 200, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You are tipped to be one of intuitive problem solvers. While generally, Organizers are not gifted to anticipate well in advance what", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("should be done and do not lay out best plans, but you do anticipate that something will go wrong and you are there with the toolbox", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("to remedy things. One cannot predict a crisis, but when it happens, people can count on you that you would most probably be on", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("the scene. You are capable and regarded as one with a high degree of instinct. Sometimes, people seldom see value in you because", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("they cannot understand or explain why or how you do things or get things done.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("In the competencies continuum one can safely say that you could be placed at a point as a person with unconscious competence.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("To you, quick result is the best result and sooner is better than later. You would rather take a chance that something is wrong", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("and redo it later, than see it lying around open ended for a long time.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("At work, you are seen swinging into action and focus with intensity on getting something closed out. You keep a mental catalogue", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("of loose ends (sometimes you may have lists in writing) and efficiently discern the critical path to closure. You quickly", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("figure out what the issues are, and who has them. These are not just task related issues, but people issues: who is on board,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("who has authority, who is at odds with others, who is happy and unhappy. So, having done the work of finding the issues,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;				
				$objPage4->drawText("you tend to create on-the-spot solutions that may not be sustainable over time, but are good enough for now. You also tend", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("to empathize with those in need and take on the practical concerns of those who are less empowered than others.", 20, $yPos, 'UTF-8');				
				$yPos -= ($lineHeight+10);
				break;
			
			case 'Networker':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Primary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#ff7331'))->drawText("Networker", 200, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You believe that work starts by gathering - not with idea formulation or planning. You are regarded as people", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("oriented in a way that makes it easy for others to connect with you. You would like to make people feel special,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("and you are usually good at verbal affirmation. You have the ability to connect the dots on relationships that", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("seem spurious to the rest. You may not be always right, but strongly believe in the power of relational networks.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("You may also be more of event-driven than people driven. You normally have an instinct to show up at the right", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("places at the right time. You care about who can help you accomplish your agenda at the moment or who you", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("can help achieve their dreams.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You are able to determine who (People, groups) should be connected to accomplish a purpose and are able to", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("pencil dots between such groups before they see the advantages of linkages. Your primary work, therefore", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("involves getting out there, meeting people, assessing what network they need to be successful, building the", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("network one node at a time, and pulling relational pieces together. To you, the real work is relating to people,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;				
				$objPage4->drawText("getting groups together, rubbing shoulders, checking-in, touching base, conferencing, and calling. Achieving", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("objectives and meeting quota.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				break;
		}
		
		switch($this->secondary) {
			case 'Luminary':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Secondary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#79b9c9'))->drawText("Luminary", 220, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You seem to possess elements of a thought leader. It means that your thinking takes something that exists, finds the gaps,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("the implications, or the areas of improvement and moves it further down the road. You tend to value concepts, mental constructs", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("and philosophies. It does not mean you are not concrete in your thought patterns. Your view of reality is one in which principles", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("dominate.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("Generally, you have an ability to keep things in focus for years, not just months,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("weeks or days. You tend to synthesize data from all sorts of places and form an intuitive view of the future that is uncannily accurate.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("More often it is the ability to see principles at work in the past, understand today in light of such principles, and then make a clear", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("statement about what this means for future.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("Luminaries think for work, wrestle with ideas, dialogue, form perspective and often write them down. You tend to think through the", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("implications of your work for the communities and for your organization in particular. You don't just think, but also plan.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("These plans are not necessarily the detailed action plans, but they are a \"big picture\" plans which may include more adjectives than", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("words. Because of long range nature of your plans, you may succeed slowly, unfortunately fail slowly.", 20, $yPos, 'UTF-8');				
				$yPos -= ($lineHeight+10);				
				break;
			
			case 'Entrepreneur':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Secondary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#67df64'))->drawText("Entrepreneur", 220, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You as an Entrepreneur have a tendency to see opportunities where others see difficulties, challenges, opposition or nothing.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("You are not starry eyed about everything working out fine. More often you may sift out bad opportunities quickly. You have incredible", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("knack of spotting good opportunities in people. You believe that Human Capital-and leadership in particular-is a precious asset.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("Entrepreneurs are opportunists in the most positive sense of the word. Many Entrepreneurs are short-to-medium term thinkers.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("If you think something does not work, then you will find another opportunity. You tend to tolerate risk and know that all ventures have", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("some risk. Most often you like people who start things and get things done.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("Your definition of work has more verbs than it does for a Luminary. You identify needs, find ways to fill needs, and then find ways to", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("design, build, market and manage those products. You keep your eyes and ears open to seize new opportunities. You tend to anticipate and", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("minimize risk. You sell new opportunity to those who can help bring it about (financiers, staff, customers etc.). You pull together necessary", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("elements for opportunity to happen (People, capital, space etc.). You constantly make adjustments until something works or until the writing", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;				
				$objPage4->drawText("is on the wall that it won\'t work.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				break;
				
			case 'Manager':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Secondary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#ffcb3c'))->drawText("Manager", 220, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("To you, as a Manager, proper planning precedes activities. The game doesn\'t really begin until you have a plan.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("Anything you do before you have the plan is just activity and not to be confused with work. You are seldom seen", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("being in panic and also perceived to be level headed. You don\'t normally reinvent the wheel. You will rather take", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("the reality as it is and intentionally change it to something better over time. Once it is working, you leave it the", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("way it is.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("You are a longer-term thinker than an entrepreneur, with a depth of focal length that is not as long as that of a", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("Luminary. You also tend to believe that processes are there to free people to be the best they can be. You find", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("greater joy in building people and organizations.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("Taking an idea or an opportunity and turning it into a detailed plan is one of the things that you regard as real", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("work. You like to envision, design and implement processes that help you, your team and organization. You are", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("comfortable working in a clear reporting mechanism that keep everyone informed about whether the", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("team/organization is on track. If you have a team working with you, you love to see them grow and develop and", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;				
				$objPage4->drawText("therefore provide regular objective inputs.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				break;
				
			case 'Organizer':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Secondary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#e58e42'))->drawText("Organizer", 220, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You are tipped to be one of intuitive problem solvers. While generally, Organizers are not gifted to anticipate well in advance what", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("should be done and do not lay out best plans, but you do anticipate that something will go wrong and you are there with the toolbox", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("to remedy things. One cannot predict a crisis, but when it happens, people can count on you that you would most probably be on", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("the scene. You are capable and regarded as one with a high degree of instinct. Sometimes, people seldom see value in you because", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("they cannot understand or explain why or how you do things or get things done.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("In the competencies continuum one can safely say that you could be placed at a point as a person with unconscious competence.", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("To you, quick result is the best result and sooner is better than later. You would rather take a chance that something is wrong", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("and redo it later, than see it lying around open ended for a long time.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("At work, you are seen swinging into action and focus with intensity on getting something closed out. You keep a mental catalogue", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("of loose ends (sometimes you may have lists in writing) and efficiently discern the critical path to closure. You quickly", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("figure out what the issues are, and who has them. These are not just task related issues, but people issues: who is on board,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("who has authority, who is at odds with others, who is happy and unhappy. So, having done the work of finding the issues,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;				
				$objPage4->drawText("you tend to create on-the-spot solutions that may not be sustainable over time, but are good enough for now. You also tend", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("to empathize with those in need and take on the practical concerns of those who are less empowered than others.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				break;
			
			case 'Networker':
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Your Secondary LEMON Type is:", 20, $yPos, 'UTF-8');
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#ff7331'))->drawText("Networker", 220, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				$objPage4->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$objPage4->drawText("Characteristics", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You believe that work starts by gathering - not with idea formulation or planning. You are regarded as people", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("oriented in a way that makes it easy for others to connect with you. You would like to make people feel special,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("and you are usually good at verbal affirmation. You have the ability to connect the dots on relationships that", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("seem spurious to the rest. You may not be always right, but strongly believe in the power of relational networks.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->drawText("You may also be more of event-driven than people driven. You normally have an instinct to show up at the right", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("places at the right time. You care about who can help you accomplish your agenda at the moment or who you", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("can help achieve their dreams.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage4->drawText("Work", 20, $yPos, 'UTF-8');
				$objPage4->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$yPos -= $lineHeight;
				$objPage4->drawText("You are able to determine who (People, groups) should be connected to accomplish a purpose and are able to", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("pencil dots between such groups before they see the advantages of linkages. Your primary work, therefore", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("involves getting out there, meeting people, assessing what network they need to be successful, building the", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("network one node at a time, and pulling relational pieces together. To you, the real work is relating to people,", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;				
				$objPage4->drawText("getting groups together, rubbing shoulders, checking-in, touching base, conferencing, and calling. Achieving", 20, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage4->drawText("objectives and meeting quota.", 20, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+10);
				break;
		}
		/*****************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage5 = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objLemonPdf->pages[] = $objPage5;
		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage5->drawText("Watch out for the Weaknesses of your 2nd Slice", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);	
		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage5->drawText("Unlike other leadership models, we do not believe you can avoid weaknesses, but you do need to know that on", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("a bad day you will exhibit the weaknesses of your secondary slice.", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);
		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage5->drawText("Good Day - Bad Day", 20, $yPos, 'UTF-8');
		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$yPos -= ($lineHeight+10);
		$objPage5->drawText("Pressure or stress has a marked influence on our behavior. We behave, respond or react differently according to", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("our circumstances. At the same time we all have strengths and weakness. We exhibit our strengths and", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("weaknesses according to the circumstances that we find ourselves in.", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+5);
		$objPage5->drawText("You will need to read the book \"LEMON Leadership\" or attend the LEMON Leadership course to get a full", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("understanding of what this means, but put simply - on a Good Day, when there is not pressure and all is right", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("with the world, I live in the strengths of my Primary Slice. However, on a Bad Day, when the pressure is on, I", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("live in the weaknesses of my Secondary Slice.", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+5);
		$objPage5->drawText("Having bad days is normal, but living in the weaknesses of my Secondary slice is unhealthy. Understanding", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("LEMON can help you understand what is happening when you are having a bad day. It can also help you, and", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("others around you, constructively deal with the situation.", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);

		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage5->drawText("Good Day - Strengths of a ". $this->primary, 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);

		// Columns for the tables
		$col1 = 10;
		$col2 = 213; 
		$col3 = 406;
		$col4 = 605;
		$tableheight = 70;
		switch($this->primary) {
			case 'Luminary':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#79b9c9'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Blend principle and passion behind Purpose", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Talented across multiple areas", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Embrace people with same ideas", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("See what others can't", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Do things better the first time", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Can stay focused on a dream", $col3+2, $yPos, 'UTF-8');				
				$yPos -= ($lineHeight+40);
				break;
				
			case 'Entrepreneur':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#67df64'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Intuitively senses viability", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Focus on early action", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Energy level others warm to", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("High risk tolerance", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Basic building blocks to seize opportunity", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Can create a following", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Rapid pace", $col1+2, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+40);
				break;

			case 'Manager':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#ffcb3c'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Patient, can stay on course", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("At least one specialty", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Deliberate", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Understand processes, skilled teams", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Builds for results", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Bonds stand test of time", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Consistent", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Not easily offended", $col3+2, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+40);
				break;

			case 'Organizer':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#e58e42'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);				
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Practical implications of vision", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Critical tasks for 70% solution", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Intuitive sense of others' needs and wants", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Makes things happen", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Temporary fixes", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Takes ownership", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Spots issues", $col2+2, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+40);
				break;
			case 'Networker':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#ff7331'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Understand people", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Keep network primed", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Make everyone feel like \"Best friend\"", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Possibilities in networks", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Tireless in contacting people", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Encourage others", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Make vague links work", $col1+2, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+40);
				break;
		}
		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage5->drawText("Bad Day - Weaknesses of a ".$this->secondary, 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);
		switch($this->secondary) {
			case 'Luminary':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#79b9c9'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Proprietary", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Become disconnected", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Write-off those who can't keep up", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Hold on too long or jump too quickly", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Hand-off too quickly", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("See lack of enthusiasm as opposition", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Exhaust team with ideas", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Don't adjust speed", $col2+2, $yPos, 'UTF-8');									
				$yPos -= ($lineHeight+40);
				break;
				
			case 'Entrepreneur':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#67df64'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Fail to learn", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Lack depth of skills", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Quickly pass over those who don't play", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Blinded by one to two strengths", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Don't like stricture", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("See people as resources to be used", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Don't see big picture", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Can fake skills", $col2+2, $yPos, 'UTF-8');				
				$yPos -= ($lineHeight+40);
				break;

			case 'Manager':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#ffcb3c'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Lack creativity and spontaneity", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Rigid; play by their rules", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Cool and calculating;", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Failure is due to lack of planning", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Use policies as big stick", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("high external wall", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Focused on technicalities", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("High expectations", $col3+2, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+40);
				break;

			case 'Organizer':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#e58e42'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);				
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Creates issues", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Won't lay down intuition", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Loyal to self rather than organization", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("No boundaries; meanders into others' work", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Puts spanners in spokes", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Feels under-appreciated; \"If I left..\".", $col3+2, $yPos, 'UTF-8');		
				$yPos -= ($lineHeight+40);
				break;
				
			case 'Networker':
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#ff7331'))->drawRectangle($col1, $yPos, $col4, $yPos-20, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
				$objPage5->drawLine($col1, $yPos, $col1, $yPos-$tableheight);
				$objPage5->drawLine($col2, $yPos, $col2, $yPos-$tableheight);
				$objPage5->drawLine($col3, $yPos, $col3, $yPos-$tableheight);
				$objPage5->drawLine($col4, $yPos, $col4, $yPos-$tableheight);
				$objPage5->drawLine($col1, $yPos-$tableheight, $col4, $yPos-$tableheight);
				$objPage5->setFillColor(Zend_Pdf_Color_Html::color('#000000'));
				$yPos -= $lineHeight;
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
				$objPage5->drawText("Head", $col1+10, $yPos, 'UTF-8');
				$objPage5->drawText("Hands", $col2+10, $yPos, 'UTF-8');
				$objPage5->drawText("Heart", $col3+10, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+5);
				$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
				$objPage5->drawText("Assessing reality", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Poor follow through; random if not ", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Delays sharing bad news", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Vision de jour", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("held accountable", $col2+2, $yPos, 'UTF-8');
				$objPage5->drawText("Assumes same tolerance for ambiguity", $col3+2, $yPos, 'UTF-8');
				$yPos -= $lineHeight;
				$objPage5->drawText("Administering discipline", $col1+2, $yPos, 'UTF-8');
				$objPage5->drawText("Being practical", $col2+2, $yPos, 'UTF-8');
				$yPos -= ($lineHeight+40);
				break;
		}
		
		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
		$objPage5->drawText("Disclaimer:", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage5->drawText("There are caveats that accompany this report. It is important that the user acknowledges the following:", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("- The LEMON profile is the product of extensive observation over many years. It is focused on the norm, but there will always", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  be exceptions.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("- This is not a psychological profile, and has not been benchmarked against psychological profiles.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("- It is not meant to place you in a box with no means of changing. The purpose is to help you understand yourself", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  and those around you so that you can respect and honour those who are different from you, and so that you can grow.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("- The report is based on the perceptions of the person completing the survey, which perceptions, by their nature, are subjective.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  This is not empirical evidence. The accuracy of this assessment is determined by your understanding of the questions", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  and the veracity of your answers.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("- This is just a small percentage of the profile - just a taste. In order to understand your full profile you would need to read", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  the book \"LEMON Leadership\" or attend LEMON Leadership coaching.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  LEMON Leadership is simple in concept but complex in its application because it is one piece of a large puzzle that makes", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  up who we are. Besides acting or reacting because of our LEMON slice, there are many others reason why we behave like we do.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  LEMON Leadership is just another layer of understanding that helps us understand who we are.", 30, $yPos, 'UTF-8');		
		$yPos -= $lineHeight;
		$objPage5->drawText("- At the end of the day it is our MATURITY (or lack of it) that has the biggest impact on our behaviour.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  There is no right or wrong in how we are wired, but our level of maturity will determine how well we manage our strengths and", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage5->drawText("  weaknesses. LEMON Leadership will help you identify destructive patterns in your life so that you can manage them better.", 30, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		/*****************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage6 = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objLemonPdf->pages[] = $objPage6;
		$objPage6->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage6->drawText("LEMON Communications", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);
		$ZendImage = Zend_Pdf_Image::imageWithPath( __DOCROOT__.__IMAGE_ASSETS__.'/lemonCommunication.jpg');		
		$objPage6->drawImage($ZendImage, 10, $yPos-200, 400, $yPos);
		$yPos -= ($lineHeight + 230);	
		$objPage6->drawText("Group Profiles", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);
		$objPage6->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage6->drawText("This is an individual profile report. We are able to profile groups, teams, companies, etc.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage6->drawText("The group profile is a powerful tool that gives a graphic picture of the strengths and weaknesses of key role-players. It enables", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage6->drawText("us to identify the current state of the business, what will happen if certain things are not addressed and adjustments made,", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage6->drawText("and what can be done to avoid pitfalls.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;	   
		$ZendImage = Zend_Pdf_Image::imageWithPath( __UPLOAD_DIR__.'/GlobalPie.png');
		$objPage6->drawImage($ZendImage, 10, $yPos-300, 400, $yPos);
		
		/*****************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage7 = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objLemonPdf->pages[] = $objPage7;
		$objPage7->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage7->drawText("Contact Information", 20, $yPos, 'UTF-8');
		$yPos -= ($lineHeight+10);
		$objPage7->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
		$objPage7->drawText("In USA", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage7->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage7->drawText("Email - contact@inst.net, lemon@inst.net", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage7->drawText("Phone - +1.650.306.4100", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		
		$yPos -= ($lineHeight+10);
		$objPage7->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
		$objPage7->drawText("In India", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage7->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage7->drawText("Email - thomass@inst.net, lemon@inst.net", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage7->drawText("Phone - +91 9840108887", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		
		$yPos -= ($lineHeight+10);
		$objPage7->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
		$objPage7->drawText("In South Africa", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage7->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$objPage7->drawText("Email - doug@lemonleadership.co.zaF", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage7->drawText("Phone - +27 11 794 1101", 20, $yPos, 'UTF-8');
		
		$yPos -= ($lineHeight+70);

		$objPage7->drawText("Wishing you the very best in your Leadership Journey!", 160, $yPos, 'UTF-8');
		 
		$pdfFile = '/Lemon' . $this->objLemonAssessment->Id .rand(0,50). '.pdf';
		$objLemonPdf->save(__UPLOAD_DIR__ . $pdfFile);
		chmod(__UPLOAD_DIR__ . $pdfFile, 0777);
		QApplication::Redirect('../../assets/uploads'.$pdfFile);
	}
	
/*	public function dtgAssessmentResults_Bind() {
		$assessmentArray = LemonAssessmentResults::LoadArrayByAssessmentId($this->objLemonAssessment->Id);		
		$this->dtgAssessmentResults->DataSource = $assessmentArray; 
	}
	
    public function RenderQuestion($intQuestionId) {
    	$objQuestion = LemonAssessmentQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 
   */
}

LemonGroupResultsForm::Run('LemonGroupResultsForm');
?>