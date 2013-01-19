<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
include (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_table.php');

// We need some data
$actionCount = array(0,0,0,0,0,0,0,0,0,0);
$intScorecardId = QApplication::PathInfo(0);
$intUserId = QApplication::PathInfo(1);
$objScorecard = Scorecard::Load($intScorecardId);
$actionsArray = ActionItems::LoadArrayByScorecardIdAndUserId($intScorecardId, $intUserId);
foreach(CategoryType::$NameArray as $key=>$value) {
	$categoriesArray[] = $value;
}		

foreach($actionsArray as $objAction) {
	$actionCount[$objAction->CategoryId - 1]++;	
}

$datay = array(
    $categoriesArray,
    $actionCount)
;


// Some basic defines to specify the shape of the bar+table
$nbrbar = count($categoriesArray);
$cellwidth = 73;
$tableypos = 300;
$tablexpos = 50;
$tablewidth = $nbrbar*$cellwidth;
$rightmargin = 30;

// Overall graph size
$height = 350;
$width = $tablexpos+$tablewidth+$rightmargin;

// Create the basic graph. 
$graph = new Graph($width,$height);	
$graph->img->SetMargin($tablexpos,$rightmargin,30,$height-$tableypos);
$graph->SetScale("textlin");
$graph->SetMarginColor('white');

// Setup titles and fonts
$graph->title->Set('Resource Allocation');
$graph->title->SetFont(FF_FONT1,FS_BOLD,18);
$graph->yaxis->title->Set("# Of Action Items");
$graph->yaxis->title->SetFont(FF_FONT1,FS_NORMAL,14);
$graph->yaxis->title->SetMargin(10);
$graph->xaxis->HideLabels();

// Create the bars and the accbar plot
$bplot = new BarPlot($datay[1]);
//$bplot->SetFillGradient("navy","lightsteelblue",GRAD_VER);
$bplot->SetFillColor(array('#2c7cba','#7938c4','#e84833','#efbb0e','#e0e80d','#71d127','#13a31d','#20c0d6','#989b9b','#e53487'));
//$bplot->SetColor("navy");
$graph->graph_theme = null;
$graph->Add($bplot);

//Setup the table
$table = new GTextTable();
$table->Set($datay);
$table->SetPos($tablexpos,$tableypos+1);

// Basic table formatting
$table->SetFont(FF_FONT1,FS_NORMAL,7);
$table->SetAlign('center');
$table->SetMinColWidth($cellwidth);
$table->SetNumberFormat('%0.1f');

// Format table header row
$table->SetRowFillColor(0,'teal@0.7');
$table->SetRowFont(0,FF_FONT1,FS_NORMAL,11);
$table->SetRowAlign(0,'center');

// .. and add it to the graph
$graph->Add($table);

$graph->Stroke();

?>