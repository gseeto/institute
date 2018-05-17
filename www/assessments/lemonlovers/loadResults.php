<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
// Setup Zend Framework load
set_include_path(get_include_path() . ':' . __INCLUDES__);
require_once(dirname(__FILE__) .'/../../../includes/Zend/Loader.php');
Zend_Loader::loadClass('Zend_Pdf');

class LemonloversResultsForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'LEMON Lovers Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objLemonAssessment;
	protected $dtgAssessmentResults;
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
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemonlovers/loadLogin.php');
		
		// Log if debug is set
		if (defined('__DEBUG_LOG__') && __DEBUG_LOG__ && defined('DEBUG_LOG_FLAG') && DEBUG_LOG_FLAG) {
				InstituteForm::$time_start = microtime(true);
				InstituteForm::$strDebugLog = sprintf("loadResults Start time: %s\n", InstituteForm::$time_start);
		}
	}
	
	protected function Form_Exit() {
		// Log if debug is set
		if (defined('__DEBUG_LOG__') && __DEBUG_LOG__ && defined('DEBUG_LOG_FLAG') && DEBUG_LOG_FLAG) {
				InstituteForm::$time_end = microtime(true);
				InstituteForm::$strDebugLog .= sprintf("loadResults End time: %s\n", InstituteForm::$time_start);
				InstituteForm::$strDebugLog .= sprintf("loadResults Execution Time: %s\n\n", InstituteForm::$time_end - InstituteForm::$time_start);
				QApplication::MakeDirectory(__DEBUG_LOG__, 0777);
				$strFileName = sprintf('%s/loadResults.log', __DEBUG_LOG__);
				file_put_contents($strFileName, InstituteForm::$strDebugLog, FILE_APPEND|LOCK_EX);
				@chmod($strFileName, 0666);
		}
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
			$assessmentArray = LemonloversAssessment::LoadArrayByUserId($intUserId);
			$this->objLemonAssessment = $assessmentArray[0];
		} else { // show the user's assessment	
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			$assessmentArray = LemonloversAssessment::LoadArrayByUserId($intUserId);
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
									
		$this->dtgAssessmentResults = new LemonloversAssessmentResultsDataGrid($this);
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
		$resultArray = LemonloversAssessmentResults::LoadArrayByAssessmentId($this->objLemonAssessment->Id);
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
		$strGoodDay = '';
		$strBadDay = '';
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
		$objPage2->drawText("INTRODUCTION", 40, $PageHeight, 'UTF-8');
		$objPage2->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
		$lineHeight = 13;
		$yPos = $PageHeight-$lineHeight - 5;
		
		$objPage2->drawText("Thank you for taking the LEMON for Lovers Assessment.  Your results here may be different from original LEMON Basics Assessment.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Why is this? There are several reasons for this, the most significant being that you have adapted how you express affirmation, love and relationship", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("to your spouse or partner. Over time, as one makes conscious choices to serve someone else, this will happen.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
	  
		$objPage2->drawText("Another possible reason for them being different is the idea that people give and receive love differently.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
	 	$objPage2->drawText("In a blogpost, Christin Caliva writes, \"Everyone shows their love differently, and everyone feels loved in different ways.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("This is why I feel there are \"ten\" love languages. Not only do people receive love differently, but they also show love differently.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("While quality time is my top love language for receiving, it's lower when I'm showing love and care to people. I don't like bothering people too much,", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("so sweet and simple is my favorite. For my \"Giving\" Love Languages, my order switches to Giving Gifts, Acts of Service, Quality Time, Physical Touch,", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("and then Words of Affirmation. I really like remaining in the background when it comes to voicing opinions or \"publicly\" expressing my love for others.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("Words of Affirmation do nothing for me, simply because I'm a big believer in \"actions speak louder than words\".\"", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
	 	$objPage2->drawText("LEMON Leadership is about DNA, wiring... how you are born. LEMON for Lovers is about learning to adapt to your loved ones, giving them what they need,", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
	 	$objPage2->drawText("not just that which is your natural inclination.", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
	 
		/*****************************/
		$yPos = $PageHeight-$lineHeight;
		$objPage3 = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
		$objLemonPdf->pages[] = $objPage3;
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage3->drawText("Your Personal Profile and Report", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;	
		$ZendImage = Zend_Pdf_Image::imageWithPath( __UPLOAD_DIR__.'/Lemon' . $this->objLemonAssessment->Id. '.png');		
		$objPage3->drawImage($ZendImage, 10, $yPos-200, 400, $yPos);
		$yPos -= ($lineHeight + 230);
		
		$objPage3->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
		$objPage3->drawText("LEMON FOR Lovers e-book", 40, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		$objPage2->drawText("We recommend you read the LEMON for Lovers e-book to get a deeper understanding of this topic. You can purchase it at <a href=\"http://inst.net/publications\">http://inst.net/publications</a>", 20, $yPos, 'UTF-8');
		$yPos -= $lineHeight;
		/*****************************/
		 
		$pdfFile = '/Lemon' . $this->objLemonAssessment->Id .rand(0,50). '.pdf';
		$objLemonPdf->save(__UPLOAD_DIR__ . $pdfFile);
		chmod(__UPLOAD_DIR__ . $pdfFile, 0777);
				
		QApplication::Redirect('../../assets/uploads'.$pdfFile);
	}
	
	public function dtgAssessmentResults_Bind() {
		$assessmentArray = LemonloversAssessmentResults::LoadArrayByAssessmentId($this->objLemonAssessment->Id);		
		$this->dtgAssessmentResults->DataSource = $assessmentArray; 
	}
	
    public function RenderQuestion($intQuestionId) {
    	$objQuestion = LemonloversAssessmentQuestions::Load($intQuestionId);
    	return $objQuestion->Text;
    } 
   
}

LemonloversResultsForm::Run('LemonloversResultsForm');
?>