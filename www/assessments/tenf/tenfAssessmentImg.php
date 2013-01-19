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
$graph->title->Set("10-F Assessment");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$performanceArray = array();
$importanceArray = array();	
$categoriesArray = array();
$intAssessmentId = QApplication::PathInfo(0);
foreach(FCategoryType::$NameArray as $key=>$value) {
	$categoriesArray[] = $value;
	$resultArray = TenFResults::LoadArrayByAssessmentIdAndCategory($intAssessmentId,$key);
	$ptotal = $itotal = 0;
	foreach( $resultArray as $objResult) {
		$ptotal += $objResult->Performance;
		$itotal += $objResult->Importance;
	}
	$performanceArray[] = $ptotal/count($resultArray);	
	$importanceArray[] = $itotal/count($resultArray);
}
$graph->SetTitles($categoriesArray);

// Create the first radar plot		
$plot = new RadarPlot($importanceArray);
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

// And output the graph
$graph->Stroke();

?>
