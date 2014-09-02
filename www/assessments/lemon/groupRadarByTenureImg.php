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
$graph->SetUserFont('dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);

$categoriesArray = array();
$valueArray = array();
$userResults = array();
$colorArray = array();
$legendArray = array();
$tenureCount = array();
for($i=1; $i<6; $i++) {
	$categoriesArray[] = LemonType::ToString($i);
}
foreach(TenureList::LoadAll() as $objTenure) {
	$legendArray[$objTenure->Id] = $objTenure->Range;
	$valueArray[$objTenure->Id] = array(0,0,0,0,0);
	$tenureCount[$objTenure->Id] = 0;
}
$graph->SetTitles($categoriesArray);
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);

foreach($assessmentArray as $intAssessmentId) {
	$objAssessment = LemonAssessment::Load($intAssessmentId);
	$intTenureId = $objAssessment->User->TenureId; 
	if($intTenureId) { // only calculate if tenure was specified.
		if($objAssessment->L) {
			$valueArray[$intTenureId][0] += $objAssessment->L;
			$valueArray[$intTenureId][1] += $objAssessment->E;
			$valueArray[$intTenureId][2] += $objAssessment->M;
			$valueArray[$intTenureId][3] += $objAssessment->O;
			$valueArray[$intTenureId][4] += $objAssessment->N;
		} else {
			$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
			foreach($resultArray as $objResult) {
				$intIndex = $objResult->Question->LemonTypeId - 1;
				$valueArray[$intTenureId][$intIndex] += $objResult->Value;
			}
		}
		$tenureCount[$intTenureId]++;
	}
}
foreach(TenureList::LoadAll() as $objTenure) {
	if($tenureCount[$objTenure->Id] >0) {
		$valueArray[$objTenure->Id][0] = ($valueArray[$objTenure->Id][0])/$tenureCount[$objTenure->Id];
		$valueArray[$objTenure->Id][1] = ($valueArray[$objTenure->Id][1])/$tenureCount[$objTenure->Id];
		$valueArray[$objTenure->Id][2] = ($valueArray[$objTenure->Id][2])/$tenureCount[$objTenure->Id];
		$valueArray[$objTenure->Id][3] = ($valueArray[$objTenure->Id][3])/$tenureCount[$objTenure->Id];
		$valueArray[$objTenure->Id][4] = ($valueArray[$objTenure->Id][4])/$tenureCount[$objTenure->Id];
	}
}
$colorArray = array('#6C98B0','#8AC16E','#FFD43F');
$i=0;
foreach($legendArray as $key=>$value) {
	$plot = new RadarPlot($valueArray[$key]);
	$plot->SetLegend($value);
	$plot->SetColor($colorArray[$i],$colorArray[$i]);
	$plot->SetFill(false);
	$plot->SetLineWeight(3);
	$i++;
	$graph->Add($plot);
}	

/*for($i=0; $i<3; $i++) {	
	$plot = new RadarPlot($valueArray[$i]);
	$plot->SetLegend($legendArray[$i]);
	$plot->SetColor(array(rand(0,256),rand(0,256),rand(0,256)));
	$plot->SetFill(false);
	$plot->SetLineWeight(2);
	$graph->Add($plot); 
}*/

// And output the graph
$graph->Stroke();

?>