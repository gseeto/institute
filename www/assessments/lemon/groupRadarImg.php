<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_radar.php');

// Create the basic radar graph
$graph = new RadarGraph(700,500);
//$graph->img->SetAntiAliasing();

// Set background color and shadow
$graph->SetColor("white");
$graph->SetShadow();

// Position the graph
$graph->SetCenter(0.4,0.55);

// Setup the axis formatting 	
$graph->axis->SetFont(FF_FONT1,FS_BOLD);

// Setup the grid lines
$graph->grid->SetLineStyle("solid");
$graph->grid->Show();
$graph->HideTickMarks();
		
// Setup graph titles
$graph->title->Set("Group Radar");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$categoriesArray = array();
$usersArray = array();
$userResults = array();
$colorArray = array();
for($i=1; $i<6; $i++) {
	$categoriesArray[] = LemonType::ToString($i);
}
$graph->SetTitles($categoriesArray);
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
$userCount = count($assessmentArray);
foreach($assessmentArray as $intAssessmentId) {
	$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
	$lemonValues = array(0,0,0,0,0);
	foreach($resultArray as $objResult) {
		$intIndex = $objResult->Question->LemonTypeId - 1;
		$lemonValues[$intIndex] += $objResult->Value;
	}
	$userResults[] = $lemonValues;
	$objLemonAssessment = LemonAssessment::Load($intAssessmentId);
	$objUser = User::LoadById($objLemonAssessment->UserId);
	$usersArray[] = $objUser->FirstName .' '. $objUser->LastName;
	$colorArray[] = '#'.dechex(rand(0,256));
}

for($i=0; $i<$userCount; $i++) {	
	$plot = new RadarPlot($userResults[$i]);
	$plot->SetLegend($usersArray[$i]);
	$plot->SetColor(array(rand(0,256),rand(0,256),rand(0,256)));
	$plot->SetFill(false);
	$plot->SetLineWeight(2);
	$graph->Add($plot); 
}

// And output the graph
$graph->Stroke();

?>