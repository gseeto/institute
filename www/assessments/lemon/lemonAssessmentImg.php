<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');
require_once ("jpgraph/jpgraph_table.php");

// We need some data
$labelArray = array();
$lemonValues = array(0,0,0,0,0);
$intAssessmentId = QApplication::PathInfo(0);
for($i=1; $i<6; $i++) {
	$labelArray[] = LemonType::ToString($i);
}
$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
foreach($resultArray as $objResult) {
	$intIndex = $objResult->Question->LemonTypeId - 1;
	$lemonValues[$intIndex] += $objResult->Value;
}
$datay = array($labelArray,$lemonValues);

// Some basic defines to specify the shape of the bar+table
$nbrbar = 5;
$cellwidth = 110;
$tableypos = 300;
$tablexpos = 60;
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
$graph->title->Set('LEMON Results');
$graph->title->SetFont(FF_FONT1,FS_BOLD,18);
$graph->xaxis->HideLabels();

$bplot = new BarPlot($datay[1]);
$bplot->SetFillColor(array('#6C98B0','#8AC16E','#FFD43F','#FCA343','#E66E24'));
$bplot->SetColor("black");
$graph->graph_theme = null;
$graph->Add($bplot);

//Setup the table
$table = new GTextTable();
$table->Set($datay);
$table->SetPos($tablexpos,$tableypos+1);

// Basic table formatting
$table->SetFont(FF_FONT1,FS_NORMAL,10);
$table->SetAlign('right');
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