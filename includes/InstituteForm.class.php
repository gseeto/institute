<?php
class InstituteForm extends QForm {
	protected $strPageTitle;
	protected $intNavSectionId;

	const NavSectionHome = 1;
	const NavSectionAssessments = 2;
	const NavSectionScorecard = 3;
	const NavSectionAdministration = 4;
	const DirCompany = '/company/';
	const DirUser = '/user/';
	
	const NavScorecardTenP = 1;
	const NavScorecardView = 2;
	const NavScorecardTools = 3;
	const NavScorecardResource = 4;
	const NavScorecardSocietal = 5;
	const NavScorecardGlobal = 6;
	
	public static $NavSectionArray = array(
	InstituteForm::NavSectionHome => array('Home', '/home/'),
	InstituteForm::NavSectionAssessments => array('Assessments', '/assessments/'),
	InstituteForm::NavSectionScorecard => array('Scorecard', '/scorecard/'),
	InstituteForm::NavSectionAdministration => array('Admin', '/admin/')
	);
	
	public static $NavScorecardArray = array(
	InstituteForm::NavScorecardTenP => array('10-Ps', '/scorecard/scorecard.php'),
	InstituteForm::NavScorecardView => array('My View', '/scorecard/view/index.php'),
	InstituteForm::NavScorecardTools => array('Tools', '/scorecard/tools/index.php'),
	InstituteForm::NavScorecardResource => array('Resource Management', '/scorecard/resource/index.php'),
	InstituteForm::NavScorecardSocietal => array('Societal Analysis', '/scorecard/societal/index.php'),
	InstituteForm::NavScorecardGlobal => array('Global Statistics', '/scorecard/global/index.php'),
	);
}
?>