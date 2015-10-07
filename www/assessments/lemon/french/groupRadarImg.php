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
$graph->SetUserFont('dejavu/DejaVuSans.ttf');

// Position the graph
$graph->SetCenter(0.4,0.55);

// Setup the axis formatting 	
$graph->axis->SetFont(FF_USERFONT,FS_NORMAL);

// Setup the grid lines
$graph->grid->SetLineStyle("solid");
$graph->grid->Show();
$graph->HideTickMarks();
		
// Setup graph titles
$graph->title->Set("Group Radar");
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);

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
	$lemonValues = array(0,0,0,0,0);
	$objAssessment = LemonAssessment::Load($intAssessmentId);
	if($objAssessment->L) {
		$lemonValues[0] += $objAssessment->L;
		$lemonValues[1] += $objAssessment->E;
		$lemonValues[2] += $objAssessment->M;
		$lemonValues[3] += $objAssessment->O;
		$lemonValues[4] += $objAssessment->N;
	} else {
		$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
		foreach($resultArray as $objResult) {
			$intIndex = $objResult->Question->LemonTypeId - 1;
			$lemonValues[$intIndex] += $objResult->Value;
		}
	}
	$userResults[] = $lemonValues;
	$objUser = User::LoadById($objAssessment->UserId);
	$usersArray[] = $objUser->FirstName .' '. $objUser->LastName;
	$colorArray[] = '#'.dechex(rand(0,256));
}
$r = array();
$g = array();
$b = array();
for($i=0; $i<$userCount; $i++) {	
	$plot = new RadarPlot($userResults[$i]);
	$plot->SetLegend($usersArray[$i]);
	$temp = rand(1,255);
	while(in_array($temp, $r)){
		$temp = rand(1,255);
	} 
	$r[$i] = $temp;
	
	$temp = rand(1,255);
	while(in_array($temp, $g)){
		$temp = rand(1,255);
	} 
	$g[$i] = $temp;
	
	$temp = rand(1,255);
	while(in_array($temp, $b)){
		$temp = rand(1,255);
	} 
	$b[$i] = $temp;

	$plot->SetColor(array($r[$i],$g[$i],$b[$i]));
	$plot->SetFill(false);
	$plot->SetLineWeight(3);
	$graph->Add($plot); 
}

// And output the graph
$graph->Stroke();

?>