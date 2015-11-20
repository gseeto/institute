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
$graph->title->Set("Post Venture Assessment");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$performanceArray = array();
$importanceArray = array();	
$categoriesArray = array();

// Set Category Titles
foreach(CategoryType::$NameArray as $key=>$value) {
		$categoriesArray[] = $value;
}
$graph->SetTitles($categoriesArray);

// Aggregate calculation
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach(CategoryType::$NameArray as $key=>$value) {
	$count = 0;
	$ptotal = $itotal = 0;
	foreach($assessmentArray as $intAssessmentId) {
		$resultArray = PostventureResults::LoadArrayByAssessmentIdAndCategory($intAssessmentId,$key);
		foreach( $resultArray as $objResult) {
			$ptotal += $objResult->Performance;
			$itotal += $objResult->Importance;
		}
		$count += count($resultArray);
	}
	$performanceArray[] = ($count)? ($ptotal/$count) : 0;	
	$importanceArray[] = ($count)? ($itotal/$count): 0;
}

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
