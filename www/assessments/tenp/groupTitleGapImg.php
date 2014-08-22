<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_radar.php');

// Create the basic radar graph
$graph = new RadarGraph(800,533);
//$graph->img->SetAntiAliasing();

// Set background color and shadow
$graph->SetColor("white");
$graph->SetShadow();

// Position the graph
$graph->SetCenter(0.4,0.55);

// Setup the axis formatting 	
$graph->axis->SetFont(FF_FONT1,FS_BOLD);
$graph->SetScale('lin',0,7);

// Setup the grid lines
$graph->grid->SetLineStyle("solid");
$graph->grid->SetColor("navy");
$graph->grid->Show();
$graph->HideTickMarks();
		
// Setup graph titles
$graph->title->Set("10-P Assessment - Gaps By Title");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$categoriesArray = array();
$legendArray = array();
$valueArray = array(); 

// Set Category Titles
foreach(CategoryType::$NameArray as $key=>$value) {
	$categoriesArray[] = $value;
}
$graph->SetTitles($categoriesArray);

// Calculate for each Ttile
foreach(TitleList::LoadAll() as $objTitle) {
	$legendArray[$objTitle->Id] = $objTitle->Name;
	$valueArray[$objTitle->Id] = array();
}
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach(CategoryType::$NameArray as $key=>$value) {
	$count = array();
	$ptotal = array();
	foreach($assessmentArray as $intAssessmentId) {
		$objAssessment = TenPAssessment::Load($intAssessmentId);
		$intTitleId = User::Load($objAssessment->UserId)->TitleId;
		$resultArray = TenPResults::LoadArrayByAssessmentIdAndCategory($intAssessmentId,$key);
		foreach( $resultArray as $objResult) {
			if(array_key_exists ($intTitleId, $ptotal)) {
				$ptotal[$intTitleId] += $objResult->Performance;
			} else {
				$ptotal[$intTitleId] = $objResult->Performance;
			}
			if(array_key_exists ($intTitleId, $count)) {
				$count[$intTitleId] += 1;
			} else {
				$count[$intTitleId] = 1;
			}
		}
	}
	foreach(TitleList::LoadAll() as $objTitle) {
		if(array_key_exists ($objTitle->Id, $count)) {
			$valueArray[$objTitle->Id][] = ($count[$objTitle->Id])? $ptotal[$objTitle->Id]/$count[$objTitle->Id] : 0;
		} else {	
			$valueArray[$objTitle->Id][] = 0;
		}
	}		
}

$colorArray = array("red", "blue", "green");
// Iteratively add plots.
$i=0;
foreach($legendArray as $key=>$value) {
	$plot = new RadarPlot($valueArray[$key]);
	$plot->SetLegend($value);
	$plot->SetColor($colorArray[$i],$colorArray[$i]);
	$plot->SetFill(false);
	$plot->SetLineWeight(2);
	$i++;
	$graph->Add($plot);
}	

// Create the first radar plot		
/*$plot = new RadarPlot($importanceArray);
$plot->SetLegend("Importance");
$plot->SetColor("red","lightred");
$plot->SetFill(false);
$plot->SetLineWeight(2);

// Create the second radar plot
$plot2 = new RadarPlot($performanceArray);
$plot2->SetLegend("Performance");
$plot2->SetLineWeight(2);
$plot2->SetColor("blue");
$plot2->SetFill(false);

// Add the plots to the graph
$graph->Add($plot2);
$graph->Add($plot);
*/

// And output the graph
$graph->Stroke();

?>
